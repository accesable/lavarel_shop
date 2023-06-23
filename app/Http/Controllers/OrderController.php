<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders=Order::all();
        return view('admin.orders.index',compact('orders'));
    }
    public function confirm($id) {
        //find the Order
        $order= Order::find($id);

        //update the Order status
        $order->update([
            'status'=>1
        ]);

        return redirect()->back()->with('msg','Order Status Updated');
    }
    public function pending($id) {
        //find the Order
        $order= Order::find($id);

        //update the Order status
        $order->update([
            'status'=>0
        ]);

        return redirect()->back()->with('msg','Order Status Updated');
    }
    public function show($id)  {
        $order = Order::find($id);
        return view('admin.orders.details',compact('order'));
    }
}
