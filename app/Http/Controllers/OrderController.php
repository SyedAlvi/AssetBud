<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;

class OrderController extends Controller
{
   
    public function OrderList()
    {
        $orderlist = order::all();
        return view ('order.order_list', compact('orderlist'));
    }
  
    public function OrderStore(Request $request)
    {
         
        // dd($request->all());
        // $request->validate([
        //     'id'=>'required',
        //     'name'=>'required',
           
        //     'details'=> 'required',
        // ]);
        
       $a = Order::create([
            'id'=>$request->id,
            'name'=> $request->name,
            'image'=> $request->image,
            'status'=> $request->status,
        ]);


      
        return redirect()->route('Carousel.product')->with('success', 'Order Created Successfully');
}
public function OrderStatus($id){

          $data=Order::find($id);

         $data->update(['status'=>'Approved']);

         return redirect()-back();
}

}