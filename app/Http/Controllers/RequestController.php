<?php

namespace App\Http\Controllers;

use App\Models\RequestAsset;
use App\Models\RequestDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RequestController;

class RequestController extends Controller
{
    
    public function checkout()
    {
        // insert order data into order table- user_id, total
        $carts= session()->get('cart');
//dd($carts);
        if($carts)
        {
            $request=RequestAsset::create([
                'user_id'=>auth()->user()->id,
                'total_price'=>array_sum(array_column($carts,'asset_price')),
                
            ]);

            // insert details into order details table
            foreach ($carts as $cart)
            {

                RequestDetails::create([
                    'request_id'=> $request->id,
                    'asset_id'=>$cart['asset_id'],
                    'unit_price'=>$cart['asset_price'],
                    'quantity'=>$cart['asset_qty'],
                    'sub_total'=>$cart['asset_qty'] * $cart['asset_price'] ,
                ]);
            }
            session()->forget('cart');
            return redirect()->back()->with('message','Request Placed Successfully.');
        }
        return redirect()->back()->with('message','No Data found in cart.');


    }
    

    public function requestList(Request $request)
    {
        $requests = RequestAsset::with('user')->get();
        return view('request.request_list',compact('requests'));
    }
    public function requestCancel($id)
    {
        //find the data
        $request=RequestAsset::find($id);
       $request->update([
           'status'=>'cancel'
           
       ]);

       return redirect()->back();
    }
    public function requestApprove(Request $viewreq, $id){
        RequestAsset::find($id)->update([
            'status'=>'apporve'
        ]);

        return redirect()->back();
    }
    public function transferList(Request $request)
    {
        if(auth()->user()->role=='admin')
        {
            $requests=RequestAsset::all();
        }else{
            $requests=RequestAsset::where('user_id',auth()->user()->id)->get();
        }
        
      
        return view('request.transferhistory',compact('requests'));
    }


}