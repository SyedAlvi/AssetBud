<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function product_cart()
    {
        $productlist = product::with('Category')->get();
        return view ('order.productlist', compact('productlist'));
       
    }









    // add to cart--------------------------------------------------
    // 
    
    // new cart ---------------------------------------------------------------------------
    public function Cart($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'no product found');
        }
        $cartExist = session()->get('cart');

        if (!$cartExist) {
            

            $CartData = [
                $id => [
                    'product_id' => $id,
                    'product_name' => $product->name,
                    'product_price' => $product->price,
                    'product_qty' => 1,
                ]
            ];
            session()->put('cart', $CartData);
            return redirect()->back()->with('success', 'product add');
        }
        // dd(isset($cartExisr[$id]));
        if (!isset($cartExist[$id])) {
          
            $cartExist[$id] = [

                'product_id' => $id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_qty' => 1,

            ];
            session()->put('cart', $cartExist);
            return redirect()->back()->with('success', 'product add');
        }

        
        $cartExist[$id]['product_qty'] = $cartExist[$id]['product_qty'] + 1;

        session()->put('cart', $cartExist);
        return redirect()->back()->with('success', 'product add');
    }
    public function getCart()

    {
        $carts = session()->get('cart');
        return view('order.cart', compact('carts'));
    }
    public function clearcart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'cart cleared successfully');
    }
    

}


