<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        if ($product->stock < $request->quantity) {
            return response()->json(['error' => 'Not enough stock'], 400);
        }

        // Cart logic (you can use session or database)
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
                'image' => $product->img
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => 'Product added to cart',
            'cart_count' => count($cart),
            'product_name' => $product->name
        ]);
    }

    public function viewCart()
    {
        // Get cart items from session (or database if needed)
        $cart = session()->get('cart', []);

        // Calculate total price
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('front.cartView', compact('cart', 'total'));
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart');

        if (isset($cart[$request->product_id])) {
            $productName = $cart[$request->product_id]['name']; // Get product name before removing
            unset($cart[$request->product_id]); // Remove item from cart
            session()->put('cart', $cart);
        } else {
            return response()->json([
                'error' => 'Product not found in cart'
            ]);
        }

        return response()->json([
            'success' => 'Item removed from cart',
            'cart_count' => count($cart), // Ensure cart count is updated
            'product_name' => $productName
        ]);
    }


    public function getCartItems()
    {
        $cart = session()->get('cart', []);

        $cartHTML = view('front.partials.cart-items', compact('cart'))->render(); // Render cart items view

        return response()->json(['cart_html' => $cartHTML]);
    }


    public function clearCart()
    {
        $cart = Session::forget('cart'); // Clear the cart
        $cartHTML = view('front.partials.cart-items', compact('cart'))->render(); // Render cart items view

        return response()->json([
            'success' => 'Cart cleared successfully!',
            'cart_count' => 0,
            'cart_html' => $cartHTML, // Update cart UI
        ]);
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            // Get product stock from database
            $product = Product::find($request->product_id); // Assume you have a Product model

            if (!$product) {
                return redirect()->back()->with('error', 'Product not found!');
            }

            $maxStock = $product->stock; // Assuming 'stock' column exists

            if ($request->quantity > $maxStock) {
                return redirect()->back()->with('error', 'Only ' . $maxStock . ' items available in stock!');
            }

            $cart[$request->product_id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Cart updated successfully!');
        }

        return redirect()->back()->with('error', 'Invalid request!');
    }

    public function addToWishlist(Request $request)
    {
        $product_id = $request->product_id;
        $wishlist = Session::get('wishlist', []);

        if (!in_array($product_id, $wishlist)) {
            $wishlist[] = $product_id;
            Session::put('wishlist', $wishlist);
        }

        $product = Product::find($product_id);

        return response()->json([
            'success' => true,
            'count' => count($wishlist),
            'product_name' => $product ? $product->name : 'Unknown Product'
        ]);
    }

    public function wishlistCount()
    {
        $wishlist = Session::get('wishlist', []);
        return response()->json(['count' => count($wishlist)]);
    }

    public function addTocompare(Request $request)
    {
        $product_id = $request->product_id;
        $compare = Session::get('compare', []);

        if (!in_array($product_id, $compare)) {
            $compare[] = $product_id;
            Session::put('compare', $compare);
        }

        $product = Product::find($product_id);

        return response()->json([
            'success' => true,
            'count' => count($compare),
            'product_name' => $product ? $product->name : 'Unknown Product'
        ]);
    }

    public function compareCount()
    {
        $compare = Session::get('compare', []);
        return response()->json(['count' => count($compare)]);
    }
    
}
