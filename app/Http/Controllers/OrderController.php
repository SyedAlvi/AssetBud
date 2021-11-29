<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;

class OrderController extends Controller
{
    public function CreateOrder()
    {
        return view('order.create_order');
    }
    public function OrderList()
    {
        $orderlist = order::all();
        return view ('order.order_list', compact('orderlist'));
    }
  
    public function OrderStore(Request $request)
    {
        //dd($request->all());
        Order::create([
            'id'=>$request->id,
            'name'=> $request->name,
            'category'=> $request->category,
            'details'=> $request->details,
        ]);
        return redirect()->back();
    }
}
