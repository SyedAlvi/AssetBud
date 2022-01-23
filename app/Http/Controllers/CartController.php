<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
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











    // ------------------------------------------new cart---------------------------------------


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
        if (!isset($cartExisr[$id])) {
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
        return view('website.cart', compact('carts'));
    }
    public function clearcart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'cart cleared successfully');
    }
}
