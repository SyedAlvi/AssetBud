<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;

class CategoryController extends Controller
{
    public function categoryList(){
        $categories=Category::all();
    //    dd($categories);
        return view('product.category_list',compact('categories'));
        }
    public function product_category()
    {
        return view('product.product_category');
    }
    public function category_create(Request $request)
    {
            // dd($request->all());

        $request->validate([
            'Cname'=>'required'
            

        ]);
        Category::create([
            'Cname'=>$request->Cname
            
        ]);
        return redirect()->back()->with('success','Category Created Successfully.');
    }
    
}
