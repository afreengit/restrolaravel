<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

//default in web.php:
// Route::get('/', function () {
//     return view('welcome');
// });

//common
Route::get('/',[HomeController::class,'index']);
Route::view('/loginregister','loginregister');
Route::post('/registerform',[HomeController::class,'registeraction']);
Route::post('/loginform',[HomeController::class,'loginaction']);
Route::get('/products/{ctid}',[HomeController::class,'viewproducts']);

// admin
Route::view('/adminhome','Admin.layout');

Route::get('/category',[AdminController::class,'index']);
Route::view('/add_category','Admin.add_category');
Route::post('/insert_action',[AdminController::class,'addcategoryaction']);
Route::get('/edit/{ct_id}',[AdminController::class,'editcategory']);
// Route::post('/edit_action/{ct_id}',[AdminController::class,'updatecategory']);
Route::post('/edit_action',[AdminController::class,'updatecategory']);
Route::get('/delete/{ct_id}',[AdminController::class,'categorydelete']);


Route::get('/deliveryboy',[AdminController::class,'delindex']);
Route::view('/add_deliveryboy','Admin.add_deliveryboy');
Route::post('/adddeliveryboy_action',[AdminController::class,'adddeliverboyaction']);
//Route::get('edit/{ct_id}',[AdminController::class,'editdeliveryboy']);



Route::get('/coupon',[AdminController::class,'couponindex']);
Route::view('/add_coupon','Admin.add_coupon');
Route::post('/addcoupon_action',[AdminController::class,'addcouponaction']);


Route::get('/location',[AdminController::class,'locationindex']);
Route::view('/addlocation','Admin.addlocation');
Route::post('/addlocation_action',[AdminController::class,'addlocationaction']);