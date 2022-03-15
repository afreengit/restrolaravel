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

//adminlogin
Route::view('/admin','Admin.login');
Route::post('/adminlogin',[AdminController::class,'loginaction']);

//logout
Route::get('/logout',[AdminController::class,'logout']);

//category
Route::get('/category',[AdminController::class,'index']);
Route::view('/add_category','Admin.add_category');
Route::post('/insert_action',[AdminController::class,'addcategoryaction']);
//Route::get('/edit/{ct_id}',[AdminController::class,'editcategory']);
//Route::post('/edit_action',[AdminController::class,'updatecategory']);
Route::post('/category_action',[AdminController::class,'updatecategory']);

Route::get('/delete/{ct_id}',[AdminController::class,'categorydelete']);

//deliveryboy
Route::get('/deliveryboy',[AdminController::class,'delindex']);
Route::view('/add_deliveryboy','Admin.add_deliveryboy');
Route::post('/adddeliveryboy_action',[AdminController::class,'adddeliverboyaction']);
Route::get('editdel/{dl_id}',[AdminController::class,'editdeliveryboy']);
Route::post('/editdeliveryboy_action',[AdminController::class,'updatedeliveryboy']);
Route::get('/deletedel/{dl_id}',[AdminController::class,'deliveryboydelete']);

//coupon
Route::get('/coupon',[AdminController::class,'couponindex']);
Route::view('/add_coupon','Admin.add_coupon');
Route::post('/addcoupon_action',[AdminController::class,'addcouponaction']);
Route::get('editcpn/{cp_id}',[AdminController::class,'editcoupon']);
Route::post('/editcoupon_action',[AdminController::class,'updatecoupon']);
Route::get('/deletecpn/{cp_id}',[AdminController::class,'coupondelete']);


//location
Route::get('/location',[AdminController::class,'locationindex']);
Route::view('/addlocation','Admin.addlocation');
Route::post('/addlocation_action',[AdminController::class,'addlocationaction']);
Route::get('editloc/{lo_id}',[AdminController::class,'editlocation']);
Route::post('/editlocation_action',[AdminController::class,'updatelocation']);
Route::get('/deleteloc/{lo_id}',[AdminController::class,'locationdelete']);

//dish
Route::get('/dish',[AdminController::class,'dishindex']);
Route::get('/dish-details',[AdminController::class,'dishdetails']);
Route::view('/add_dish','Admin.add_dish');
Route::post('/adddish_action',[AdminController::class,'adddishaction']);