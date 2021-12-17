<?php

namespace App\Http\Controllers;

use App\Models\Employee;
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
        $employeelist = employee::all();
        return view ('employee.employee_list', compact('employeelist'));
    }
  
    public function EmployeeStore(Request $request)
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
        if($request->hasFile('employee_image'))
         // step 2: generate file name
        {
            $image_name=date('Ymdhis').'.'. $request->file('employee_image')->getClientOriginalExtension();
        
             //step 3 : store into project directory
            $request->file('employee_image')->storeAs('/uploads/employees',$image_name);
        }
        
        Employee::create([
            // 'id'=>$request->id,
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
            'address'=>$request->address,
            'category'=> $request->category,
            'city'=> $request->city,
            'mnumber'=> $request->mnumber,
            'employee_image'=>$image_name,
        ]);
        return redirect()->back()->with('success', 'Employee Created Successfully');
}
        public function viewemployee($employee_id)
        {
            $employee= employee::find($employee_id);
            return view('employee.employee_view',compact('employee'));

        }
        public function deleteemployee($employee_id)
        {
            Employee::find($employee_id)->delete();
            return redirect()->back()->with('sucecess', 'Eemployee has beeen Deleted Successfully');
        }
}