<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class AdminController extends Controller
{
    public function ManageEmployee()
    {
        return view('admin.pages.manage_employee');
    }
    public function ManageProduct()
    {
        return view('admin.pages.manage_product');
    }
    public function ManageOrder()
    {
        return view('admin.pages.manage_order');
    }
}

