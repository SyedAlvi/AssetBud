<?php

namespace App\Http\Controllers\API;

use App\Models\Asset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class apiAssetController extends Controller
{
    public function asset_cart(){

        $assetlist = Asset::with('Category')->get();

        return response()->json([
            'success'=>true,
            'data'=>$assetlist,
            'message'=>'success',
            'status'=>200,
        ]);
    }

    public function AssetStore(Request $request){
        
        $val=Validator::make($request->all(),[
            'name'=>'required',
            'Cname'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'details'=>'required',
        ]);

        if($val->fails())
        {
            return $this->responseWithError($val->getMessageBag());
        }
        
       $asset=Asset::create([
            //'id'=>$request->id,
            'name'=> $request->name,
            'Cname'=> $request->Cname,
            'quantity'=> $request->quantity,
            'price'=> $request->price,
            'details'=> $request->details,
           
           
        ]);
        return $this->responseWithSuccess($asset,'Asset created.');
        
    }
}
