<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
<<<<<<< HEAD
    public function product_cart()
    {
        $productlist = product::with('Category')->get();
        return view ('order.productlist', compact('productlist'));
       
    }

=======
    // public function addTocart($id)
    // {

    //     // dd($id);
    //     $product = Product::find($id);


    //     Cart::add([
    //         'id' => $id,
    //         'image' => $product->image,
    //         'name' => $product->name,
    //         'price' => $product->price,
    //         'qty' => 1,
    //         'weight' => 0,
    //         'options' => array('image' => $product->image)
    //     ]);
    //     // dd($cart);
    //     //   dd($a);
    //     return redirect()->back()->with('success', 'product added to cart');
    //     // dd(Cart::content());
    // }
    // public function viewCart()
    // {
    //     $cart = Cart::content();
    //     //
    //     return view('website.cart_view', compact('cart',));
    // }
    // public function remove($rowId)
    // {

    //     // dd($id);
    //     Cart::remove($rowId);


    //     return redirect()->back();
    // }
>>>>>>> 26df531658424574b6cd9ebdfe5a9b24681ec7e5








<<<<<<< HEAD
    // add to cart--------------------------------------------------
    // 
    
    // new cart ---------------------------------------------------------------------------
=======



    // ------------------------------------------new cart---------------------------------------


>>>>>>> 26df531658424574b6cd9ebdfe5a9b24681ec7e5
    public function Cart($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'no product found');
        }
        $cartExist = session()->get('cart');

        if (!$cartExist) {
<<<<<<< HEAD
            
=======
>>>>>>> 26df531658424574b6cd9ebdfe5a9b24681ec7e5

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
<<<<<<< HEAD
        // dd(isset($cartExisr[$id]));
        if (!isset($cartExist[$id])) {
          
=======
        if (!isset($cartExisr[$id])) {
>>>>>>> 26df531658424574b6cd9ebdfe5a9b24681ec7e5
            $cartExist[$id] = [

                'product_id' => $id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_qty' => 1,

            ];
            session()->put('cart', $cartExist);
            return redirect()->back()->with('success', 'product add');
        }
<<<<<<< HEAD

        
=======
>>>>>>> 26df531658424574b6cd9ebdfe5a9b24681ec7e5
        $cartExist[$id]['product_qty'] = $cartExist[$id]['product_qty'] + 1;

        session()->put('cart', $cartExist);
        return redirect()->back()->with('success', 'product add');
    }
    public function getCart()

    {
        $carts = session()->get('cart');
<<<<<<< HEAD
        return view('order.cart', compact('carts'));
=======
        return view('website.cart', compact('carts'));
>>>>>>> 26df531658424574b6cd9ebdfe5a9b24681ec7e5
    }
    public function clearcart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'cart cleared successfully');
    }
    

}


