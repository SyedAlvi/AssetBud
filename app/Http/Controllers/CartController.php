<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addTocart($id){

        // dd($id);
     $product=Product::find($id);
    
    
      Cart::add([
         'id' => $id, 
         'image'=>$product->image,
         'name'=> $product->name,
         'price'=>$product->price,
         'qty' => 1, 
         'weight'=>0,
         'options' =>array('image'=>$product->image)
      ]);
// dd($cart);
    //   dd($a);
     return redirect()->back()->with('success','product added to cart');
    // dd(Cart::content());
    }
    public function viewCart(){
        $cart=Cart::content();
        // 
        return view('website.cart_view' , compact('cart',));
    }
    public function remove($rowId){
        
// dd($id);
        Cart::remove($rowId);
        
       
        return redirect()->back();
    }
}
