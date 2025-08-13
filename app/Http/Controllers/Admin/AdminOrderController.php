<?php

namespace  App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();
        return view('admin.orders.orderList', compact('orders'));
    }


    public function updateStatus($id, $status)
    {
        $order = Order::findOrFail($id);
        $order->status = $status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the category
        $products = Order::findOrFail($id);

        // Finally, delete the category
        $products->delete();
        return redirect()->Route('order.index')->with([
            'variant' => 'danger',
            'message1' => 'Delete Successfully.'
        ]);
    }
}
