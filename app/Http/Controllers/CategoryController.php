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
        return view('asset.category_list',compact('categories'));
        }
    public function asset_category()
    {
        return view('asset.asset_category');
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
