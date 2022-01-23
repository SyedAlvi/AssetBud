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




//admin_Login
Route::get('login',[AdminUserController::class,'login'])->name('admin.login');
Route::post('/admin/login',[AdminUserController::class,'LoginView'])->name('admin.LoginView');
Route::get('/product/cart',[CartController::class,'product_cart'])->name('product.cart');

// ------- add to cart----------------------
Route::get('/add/cart/{id}',[CartController::class,'Cart'])->name('new.cart');
Route::get('/get/cart/view',[CartController::class,'getCart'])->name('new.cart.get');
Route::get('/clear/cart',[CartController::class,'clearCart'])->name('clear.cart');



//admin_grouping
Route::group(['prefix'=> 'admin','middleware'=>['auth']], function(){

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


// //for OrderList
Route::get('/order/list',[OrderController:: class,'OrderList'])->name('order.list');
// Route::post('/order/store', [OrderController:: class, 'OrderStore'])->name('order.store');
// Route::post('/status/{id}', [OrderController:: class, 'OrderStatus'])->name('order.status');
Route::get('/checkout',[OrderController::class,'checkout'])->name('cart.checkout');
Route::get('order/cancel/{id}',[OrderController::class,'orderCancel'])->name('admin.order.cancel');
// Route::get('order/approve/{id}',[OrderController::class,'orderApprove'])->name('admin.order.approve');


//category
Route::get('/category/create',[CategoryController::class,'product_category'])->name('product.category');
Route::post('/category/add',[CategoryController::class,'category_create'])->name('category.store');
Route::get('/product/category',[CategoryController::class,'categoryList'])->name('category.list');
});