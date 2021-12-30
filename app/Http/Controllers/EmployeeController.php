<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\EmployeeController;

class EmployeeController extends Controller

{
   

    public function CreateEmployee()
    {
        return view('employee.create_employee');
    }
    public function EmployeeList()
    {
        $user = User::all();
        return view ('employee.employee_list', compact('user'));
    }
  
    public function userstore(Request $request)
    {

      
        // dd($request->all());
        $request->validate([ 
            'name'=>'required',
            'email'=>'required',
            'password'=> 'required',
            'address'=>'required',
            'category'=>'required',
            'city'=> 'required',
            'mnumber'=>'required',

           
        ]);

         
        $image_name='';
        //step 1: check image exist in this request.
        if($request->hasFile('image'))
         // step 2: generate file name
        {
            $image_name=date('Ymdhis').'.'. $request->file('image')->getClientOriginalExtension();
        
             //step 3 : store into project directory
            $request->file('image')->storeAs('/uploads/users',$image_name);
        }
        // dd($request->all());
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=>bcrypt( $request->password),
            'address'=>$request->address,
            'category'=> $request->category,
            'city'=> $request->city,
            'mnumber'=> $request->mnumber,
            'image'=>$image_name,
        ]);
        return redirect()->back()->with('success', 'Employee Created Successfully');
}
        public function viewemployee($employee_id)
        {
            $user= User::find($employee_id);
            return view('employee.employee_view',compact('user'));

        }
        public function deleteemployee($employee_id)
        {
            User::find($employee_id)->delete();
            return redirect()->back()->with('sucecess', 'Employee has beeen Deleted Successfully');
        }
}