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
    public function ManageAsset()
    {
        return view('admin.pages.manage_asset');
    }
    public function ManageRequest()
    {
        return view('admin.pages.manage_request');
    }
}

