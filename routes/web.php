<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\AssetController;
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
Route::get('/asset/cart',[CartController::class,'asset_cart'])->name('asset.cart');

// ------- add to cart----------------------
Route::get('/add/cart/{id}',[CartController::class,'Cart'])->name('new.cart');
Route::get('/get/cart/view',[CartController::class,'getCart'])->name('new.cart.get');
Route::get('/clear/cart',[CartController::class,'clearCart'])->name('clear.cart');
Route::get('/checkout',[RequestController::class,'checkout'])->name('cart.checkout');
Route::get('transfer/list',[RequestController::class,'transferList'])->name('transfer.list');



//admin_grouping
Route::group(['prefix'=> 'admin','middleware'=>['auth']], function(){

    Route::get('/', function(){
        return view('master');
    })->name('home');

//admin_logout
 Route::get('/logout',[AdminUserController::class,'logout'])->name('admin.logout');

//for AdminController
Route::get('/manage/employee', [AdminController::class, 'ManageEmployee'])->name('manage.employee');
Route::get('/manage/asset', [AdminController::class, 'ManageAsset'])->name('manage.asset');
Route::get('/manage/ request', [AdminController::class, 'ManageRequest'])->name('manage. request');

// //for EmployeeController
Route::get('/create/employee', [EmployeeController::class, 'CreateEmployee'])->name('create.employee');
Route::get('employee/delete/{employee_id}', [EmployeeController::class, 'deleteemployee'])->name('delete.employee');
Route::get('employee/view/{employee_id}', [EmployeeController::class, 'viewemployee'])->name('view.employee');
Route::post('employee/update/{user_id}', [EmployeeController::class, 'employee_update'])->name('employee.update');
Route::match(['get','post'],'/employee/update/{user_id}',[EmployeeController::class,'employee_edit'])->name('employee.edit');


// //for EmployeeList
Route::get('/employee/list',[EmployeeController:: class,'EmployeeList'])->name('employee.list');
Route::post('/employee/store', [EmployeeController:: class, 'userstore'])->name('employee.store');

// //for AssetController
Route::get('/create/asset', [AssetController::class, 'Createasset'])->name('create.asset');
Route::get('asset/delete/{asset_id}', [AssetController::class, 'deleteasset'])->name('delete.asset');
Route::get('asset/view/{asset_id}', [AssetController::class, 'viewasset'])->name('view.asset');
Route::post('asset/update/{asset_id}', [AssetController::class, 'asset_update'])->name('asset.update');
Route::match(['get','post'],'update/{asset_id}',[AssetController::class,'asset_edit'])->name('asset.edit');
Route:: get('/view/asset',[AssetController::class,'User_view_asset'])->name('asset.view');
// // for AssetList
Route::get('/asset/list',[AssetController:: class,'Search_AssetList'])->name('asset.list');
Route::post('/asset/store', [AssetController:: class, 'AssetStore'])->name('asset.store');


// //for RequestController


// //forRequestList
Route::get('/request/list',[RequestController:: class,'requestList'])->name('request.list');

Route::get('request/cancel/{id}',[RequestController::class,'requestCancel'])->name('admin.request.cancel');
Route::get('request/approve/{id}',[RequestController::class,'requestApprove'])->name('admin.request.approve');



//category
Route::get('/category/create',[CategoryController::class,'asset_category'])->name('asset.category');
Route::post('/category/add',[CategoryController::class,'category_create'])->name('category.store');
Route::get('/asset/category',[CategoryController::class,'categoryList'])->name('category.list');
});
