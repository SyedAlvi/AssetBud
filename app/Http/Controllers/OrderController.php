<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OrderController;

class OrderController extends Controller
{
    
    public function checkout()
    {
        // insert order data into order table- user_id, total
        $carts= session()->get('cart');
//dd($carts);
        if($carts)
        {
            $order=Order::create([
                'user_id'=>auth()->user()->id,
                'total_price'=>array_sum(array_column($carts,'product_price')),
            ]);

            // insert details into order details table
            foreach ($carts as $cart)
            {
                OrderDetails::create([
                    'order_id'=> $order->id,
                    'product_id'=>$cart['product_id'],
                    'unit_price'=>$cart['product_price'],
                    'quantity'=>$cart['product_qty'],
                    'sub_total'=>$cart['product_qty'] * $cart['product_price'] ,
                ]);
            }
            session()->forget('cart');
            return redirect()->back()->with('message','Order Placed Successfully.');
        }
        return redirect()->back()->with('message','No Data found in cart.');


    }
    

    public function orderList(Request $request)
    {
        $orders = Order::with('user')->get();
        return view('order.order_list',compact('orders'));
    }
    public function orderCancel($id)
    {
        //find the data
        $order=Order::find($id);
       $order->update([
           'status'=>'cancel'
           
       ]);

       return redirect()->back();
    }
    // public function orderApprove(Request $viewreq, $id){
    //     Req::find($id)->update([
    //         'status'=>$viewreq->status
    //     ]);

    //     return view('oder.oder_list');

    // }
    


}