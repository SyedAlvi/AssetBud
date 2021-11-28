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
        return redirect()->back();
    }
}
