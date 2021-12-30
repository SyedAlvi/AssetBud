<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\EmployeeUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//user_login
Route::get('/employee/login',[EmployeeUserController::class,'employeelogin'])->name('employee.login');
Route::post('/employee/login-view',[EmployeeUserController::class,'employeeLoginView'])->name('employee.LoginView');


//User_grouping
Route::group(['prefix'=> 'user'], function(){

    Route::get('/', function(){
        return view('website.master');
    })->name('website');

Route:: get('/view/product',[ProductController::class,'view_product'])->name('product.view');

//user_logout
Route::get('/logout',[EmployeeUserController::class,'logout'])->name('employee.logout');

 });

//admin_Login
Route::get('/admin/login',[AdminUserController::class,'login'])->name('admin.login');
Route::post('/admin/login-view',[AdminUserController::class,'LoginView'])->name('admin.LoginView');

//admin_grouping
Route::group(['prefix'=> 'admin','middleware'=>'auth'], function(){

    Route::get('/', function(){
        return view('master');
    })->name('home');
 
//admin_logout
 Route::get('/logout',[AdminUserController::class,'logout'])->name('admin.logout');

//for AdminController
Route::get('/manage/employee', [AdminController::class, 'ManageEmployee'])->name('manage.employee');
Route::get('/manage/product', [AdminController::class, 'ManageProduct'])->name('manage.product');
Route::get('/manage/order', [AdminController::class, 'ManageOrder'])->name('manage.order');

// //for EmployeeController
Route::get('/create/employee', [EmployeeController::class, 'CreateEmployee'])->name('create.employee');
Route::get('employee/delete/{employee_id}', [EmployeeController::class, 'deleteemployee'])->name('delete.employee');
Route::get('employee/view/{employee_id}', [EmployeeController::class, 'viewemployee'])->name('view.employee');
// //Route::get('employee/update/{employee_id}', [EmployeeController::class, 'updateemployee'])->name('update.employee');


// //for EmployeeList
Route::get('/employee/list',[EmployeeController:: class,'EmployeeList'])->name('employee.list');
Route::post('/employee/store', [EmployeeController:: class, 'userstore'])->name('employee.store');

// //for ProductController
Route::get('/create/product', [ProductController::class, 'CreateProduct'])->name('create.product');
Route::get('product/delete/{product_id}', [ProductController::class, 'deleteproduct'])->name('delete.product');
Route::get('product/view/{product_id}', [ProductController::class, 'viewproduct'])->name('view.product');
Route::post('product/update/{product_id}', [ProductController::class, 'Product_update'])->name('product.update');
Route::match(['get','post'],'update/{product_id}',[ProductController::class,'product_edit'])->name('product.edit');
// // for ProductList
Route::get('/product/list',[ProductController:: class,'ProductList'])->name('product.list');
Route::post('/product/store', [ProductController:: class, 'ProductStore'])->name('product.store');

// //for OrderController
Route::get('/create/order', [OrderController::class, 'CreateOrder'])->name('create.order');
// //for OrderList
Route::get('/order/list',[OrderController:: class,'OrderList'])->name('order.list');
Route::post('/order/store', [OrderController:: class, 'OrderStore'])->name('order.store');
});