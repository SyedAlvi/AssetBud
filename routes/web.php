<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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

// Route::post ('/employee/profile/{user_id}',[EmployeeUserController::class,'employee_profile'])->name('employee.profile');

// Route:: get('/view/product/{product_id}',[ProductController::class,'font'])->name('product.view');
Route::get('/view/carousel',[EmployeeUserController::class,'Carousel_product'])->name('Carousel.product');

//user_logout
Route::get('/logout',[EmployeeUserController::class,'logout'])->name('employee.logout');
// cart route -----------------

Route::get('/add-to-cart/{id}',[CartController::class,'addTocart'])->name('add.cart');
Route::get('/view-cart',[CartController::class,'viewCart'])->name('view.cart');
Route::get('/remove-cart/{rowId}',[CartController::class,'remove'])->name('remove.cart');



//  });

//admin_Login
Route::get('/admin/login',[AdminUserController::class,'login'])->name('admin.login');
Route::post('/admin/login-view',[AdminUserController::class,'LoginView'])->name('admin.LoginView');

//admin_grouping
Route::group(['prefix'=> 'admin','middleware'=>['auth','admin']], function(){

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
Route::post('employee/update/{user_id}', [EmployeeController::class, 'employee_update'])->name('employee.update');
Route::match(['get','post'],'/employee/update/{user_id}',[EmployeeController::class,'employee_edit'])->name('employee.edit');


// //for EmployeeList
Route::get('/employee/list',[EmployeeController:: class,'EmployeeList'])->name('employee.list');
Route::post('/employee/store', [EmployeeController:: class, 'userstore'])->name('employee.store');

// //for ProductController
Route::get('/create/product', [ProductController::class, 'CreateProduct'])->name('create.product');
Route::get('product/delete/{product_id}', [ProductController::class, 'deleteproduct'])->name('delete.product');
Route::get('product/view/{product_id}', [ProductController::class, 'viewproduct'])->name('view.product');
Route::post('product/update/{product_id}', [ProductController::class, 'Product_update'])->name('product.update');
Route::match(['get','post'],'update/{product_id}',[ProductController::class,'product_edit'])->name('product.edit');
Route:: get('/view/product',[ProductController::class,'User_view_product'])->name('product.view');
// // for ProductList
Route::get('/product/list',[ProductController:: class,'Search_ProductList'])->name('product.list');
Route::post('/product/store', [ProductController:: class, 'ProductStore'])->name('product.store');
// Route::post('/product/search', [ProductController:: class, 'productSearch'])->name('product.search');

// //for OrderController
// Route::get('/create/order', [OrderController::class, 'CreateOrder'])->name('create.order');
// //for OrderList
Route::get('/order/list',[OrderController:: class,'OrderList'])->name('order.list');
Route::get('/order/store', [OrderController:: class, 'OrderStore'])->name('order.store');
Route::post('/status/{id}', [OrderController:: class, 'OrderStatus'])->name('order.status');


//category
Route::get('/category/create',[CategoryController::class,'product_category'])->name('product.category');
Route::post('/category/add',[CategoryController::class,'category_create'])->name('category.store');
Route::get('/product/category',[CategoryController::class,'categoryList'])->name('category.list');
});