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
            'id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'password'=> 'required',
            'address'=>'required',
            'category'=>'required',
            'city'=> 'required',
            'mnumber'=>'required',
           
        ]);
        Employee::create([
            'id'=>$request->id,
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
            'address'=>$request->address,
            'category'=> $request->category,
            'city'=> $request->city,
            'mnumber'=> $request->mnumber,
        ]);
        return redirect()->back()->with('success', 'Employee Created Successfully');
}
}