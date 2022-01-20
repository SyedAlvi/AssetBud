<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmployeeUserController;

class EmployeeUserController extends Controller
{
    public function Carousel_product()
    {
        
        $product=Product::all();
        $categories=Category::all();
        return view('website.master', compact('product', 'categories'));

    }
    public function employeelogin()

    {
       return view('website.employee_login');
    }
public function employeeLoginView(Request $request)
{
 
    $employeeInfo=$request->except('_token');
   //dd($employeeInfo);
            if(Auth::attempt($employeeInfo)){
                return redirect()->route('Carousel.product')->with('message','Login successful.');
            }
            return redirect()->back()->with('error','Invalid user credentials');
}

    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('employee.login')->with('message','Logging out.');
    }
    
    // public function employee_profile($user_id)
    // {
    //     $user= User::find($user_id);
    //     return view('website.employee_profile',compact('user'));
    // }
}
