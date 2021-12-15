<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;

class ProductController extends Controller
{
    public function CreateProduct()
    {
        return view('product.create_product');
    }
    public function ProductList()
    {
        $productlist = product::all();
        return view ('product.product_list', compact('productlist'));
    }
  
    public function ProductStore(Request $request)
    {
        // dd($request->all());
        //for image upload
        $image_name=null;
        //step 1: check image exist in this request.
        if($request->hasFile('product_image'))
         // step 2: generate file name
        {
            $image_name=date('Ymdhis').'.'. $request->file('product_image')->getClientOriginalExtension();
             //step 3 : store into project directory
            $request->file('product_image')->storeAs('/uploads/products',$image_name);
        }
        //  dd($request->all());
        $request->validate([
            'id'=>'required',
            'name'=>'required',
            'category'=>'required',
            'quantity'=>'required' ,
            'details'=> 'required',
            
        ]);
        Product::create([
            'id'=>$request->id,
            'name'=> $request->name,
            'category'=> $request->category,
            'quantity'=> $request->quantity,
            'details'=> $request->details,
            'image'=>$image_name
           
        ]);
        return redirect()->back()->with('success', 'Asset Created Successfully');
    }
}
