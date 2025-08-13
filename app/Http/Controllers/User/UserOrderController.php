<?php

namespace  App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{

    public function index()
    {
        $user_id = Auth::guard('user')->id();
        $orders = Order::where('user_id', $user_id)->latest()->get();
        return view('user.order.orderList', compact('orders'));
    }

    public function destroy($id)
    {
        $user_id = Auth::guard('user')->id();

        $order = Order::where('id', $id)->where('user_id', $user_id)->firstOrFail();
        $order->delete();
        return redirect()->Route('userOrder.index')->with([
            'variant' => 'danger',
            'message1' => 'Delete Successfully.'
        ]);
    }
}
