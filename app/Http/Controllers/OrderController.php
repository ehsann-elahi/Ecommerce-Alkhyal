<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Mail\OrderMail;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Mail;



class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('front.checkout', compact('cart'));
    }
    private function generateUniqueOrderNumber()
    {
        do {
            // Example: ORD-20250808-12345
            $orderNumber = 'ORD-' . date('Ymd') . '-' . mt_rand(10000, 99999);
        } while (\App\Models\Order::where('order_number', $orderNumber)->exists());

        return $orderNumber;
    }



    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'password' => $request->account == 1 ? 'required|min:6' : '',
        ]);

        $totalPrice = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        // Save data in session until payment is confirmed
        session()->put('checkout_data', [
            'cart' => $cart,
            'name' => $request->name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'address' => $request->address,
            'account' => $request->account,
            'password' => $request->password,
            'total_price' => $totalPrice
        ]);

        // Call Tap API to start payment
        $response = Http::withToken(env('TAP_SECRET_KEY'))->post(env('TAP_API_URL') . '/charges', [
            "amount" => $totalPrice,
            "currency" => "AED",
            "threeDSecure" => true,
            "description" => "Product Purchase",
            "metadata" => [
                "session_id" => session()->getId()
            ],
            "reference" => [
                "transaction" => "txn_" . uniqid(),
                "order" => "ord_" . uniqid()
            ],
            "receipt" => [
                "email" => true,
                "sms" => false
            ],
            "customer" => [
                "first_name" => $request->name,
                "email" => $request->email,
                "phone" => [
                    "country_code" => "971",
                    "number" => $request->mobile_number
                ]
            ],
            "source" => [
                "id" => "src_all"
            ],
            "redirect" => [
                "url" => route('payment.callback')
            ]
        ]);

        $responseData = $response->json();

        if (isset($responseData['transaction']['url'])) {
            return redirect($responseData['transaction']['url']);
        }

        return back()->with('error', 'Something went wrong while initiating the payment.');
    }

    public function paymentCallback(Request $request)
    {

        $tapChargeId = $request->get('tap_id');

        // 1. Get payment status from Tap
        $response = Http::withToken(env('TAP_SECRET_KEY'))
            ->get(env('TAP_API_URL') . '/charges/' . $tapChargeId);

        if (!$response->successful()) {
            return view('payment.error', [
                'payment' => null,
                'message' => 'Payment verification failed.'
            ]);
        }

        $paymentDetails = $response->json();

        // 2. Always store payment record (for history)
        $payment = Payment::create([
            'tap_id'         => $tapChargeId,
            'amount'         => $paymentDetails['amount'] ?? 0,
            'currency'       => $paymentDetails['currency'] ?? 'AED',
            'status'         => $paymentDetails['status'] ?? 'FAILED',
            'payment_method' => $paymentDetails['source']['payment_method'] ?? null,
            'transaction_id' => $paymentDetails['reference']['transaction'] ?? null,
            'raw_response'   => json_encode($paymentDetails),
        ]);

        // 3. Only proceed if payment is successful
        if ($paymentDetails['status'] !== 'CAPTURED') {
            $errorCode = $paymentDetails['response']['code'] ?? null;
            $customMessage = match ($errorCode) {
                'invalid_card'       => 'Your card is invalid. Please try another card.',
                'card_declined'      => 'Your card was declined by the issuer.',
                'insufficient_funds' => 'Insufficient funds on your card.',
                'stolen_card'        => 'This card has been reported as stolen.',
                'expired_card'       => 'The card has expired.',
                default              => $paymentDetails['response']['message'] ?? 'Payment failed. Please try again.',
            };

            return view('payment.error', [
                'payment' => $payment,
                'message' => $customMessage
            ]);
        }

        // 4. Get checkout data from session
        $checkoutData = session()->get('checkout_data');
        if (!$checkoutData) {
            return view('payment.error', [
                'payment' => $payment,
                'message' => 'Session expired. Please try again.'
            ]);
        }

        // 5. Handle user / guest
        $userId = null;
        $guestDetails = null;

        if ($checkoutData['account'] == 1) {
            $existingUser = User::where('email', $checkoutData['email'])->first();
            if ($existingUser) {
                $userId = $existingUser->id;
            } else {
                $user = User::create([
                    'name'          => $checkoutData['name'],
                    'email'         => $checkoutData['email'],
                    'mobile_number' => $checkoutData['mobile_number'],
                    'address'       => $checkoutData['address'],
                    'password'      => Hash::make($checkoutData['password']),
                ]);
                $userId = $user->id;
            }
        } else {
            $guestDetails = [
                'name'          => $checkoutData['name'],
                'email'         => $checkoutData['email'],
                'mobile_number' => $checkoutData['mobile_number'],
                'address'       => $checkoutData['address'],
            ];
        }

        // 6. Create order
        $order = Order::create([
            'user_id'       => $userId,
            'order_number'  => $this->generateUniqueOrderNumber(),
            'total_price'   => $checkoutData['total_price'],
            'status'        => 1, // confirmed
            'guest_name'    => $guestDetails['name'] ?? null,
            'guest_email'   => $guestDetails['email'] ?? null,
            'guest_phone'   => $guestDetails['mobile_number'] ?? null,
            'guest_address' => $guestDetails['address'] ?? null,
        ]);

        // 7. Attach payment to order
        $payment->order_id = $order->id;
        $payment->save();

        // 8. Save order items
        foreach ($checkoutData['cart'] as $id => $product) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $product['id'],
                'quantity'   => $product['quantity'],
                'price'      => $product['price']
            ]);
        }

        // 9. Clear session
        session()->forget(['cart', 'checkout_data']);

        // 10. Show success page
        return view('payment.success', [
            'payment' => $payment,
            'order'   => $order
        ]);
    }






    public function thankYou()
    {
        return view('front.thank-you');
    }
}
