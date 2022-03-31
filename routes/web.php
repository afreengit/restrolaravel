<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

//default in web.php:
// Route::get('/', function () {
//     return view('welcome');
// });

//common
Route::get('/',[HomeController::class,'index']);
// Route::view('/productbycategory','productbycategory');
Route::get('/products/{ctname}/{ctid}',[HomeController::class,'viewproducts']);
// Route::get('/products/{ctname}',[HomeController::class,'viewproducts'])->name('productss'); working products
// Route::post('/addtocart/{dmid}',[CartController::class,'add_to_cart'])->middleware('auth');
Route::post('/addtocart',[CartController::class,'add_to_cart']);

Route::middleware(['guest'])->group(function(){
Route::view('/register','register');
Route::post('/register',[HomeController::class,'registeraction'])->name('register');
Route::view('/login','login');
Route::post('/login',[HomeController::class,'loginaction'])->name('login');
});

// Route::view('/userexclusive','userexclusive')->middleware('auth');
Route::middleware(['auth'])->group(function(){
Route::view('/userexclusive','userexclusive');
Route::view('/displayprofile','displayprofile');
Route::post('/updateprofile',[HomeController::class,'updateprofile'])->name('updateprofile');
Route::view('/changepassword','changepassword');
Route::post('/changepasswordaction',[HomeController::class,'changepasswordaction'])->name('changepasswordaction');
Route::get('/showcart',[CartController::class,'show_cart'])->name('showcart');
Route::post('/deletefromcart',[CartController::class,'delete_from_cart'])->name('deletefromcart');
Route::post('/updatecart',[CartController::class,'update_cart'])->name('updatecart');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::get('/customerlogout',[HomeController::class,'logout'])->name('customerlogout');
});




// admin
Route::view('/adminhome','Admin.layout');

//adminlogin

Route::view('/admin','Admin.login');
Route::post('/adminlogin',[AdminController::class,'loginaction']);
//Route::middleware(['auth','isAdmin'])->group(function(){
	//Route::resource('category','AdminController');

//});	

//logout
Route::get('/logout',[AdminController::class,'logout']);

//admin operations:
Route::get('/category',[AdminController::class,'index']);
Route::post('/category_action',[AdminController::class,'updatecategory']);
Route::get('/delete/{ct_id}',[AdminController::class,'categorydelete']);

Route::get('/deliveryboy',[AdminController::class,'delindex']);
Route::post('/editdeliveryboy_action',[AdminController::class,'updatedeliveryboy']);
Route::get('/deletedel/{dl_id}',[AdminController::class,'deliveryboydelete']);

Route::get('/coupon',[AdminController::class,'couponindex']);
Route::post('/editcoupon_action',[AdminController::class,'updatecoupon']);
Route::get('/deletecpn/{cp_id}',[AdminController::class,'coupondelete']);

Route::get('/location',[AdminController::class,'locationindex']);
Route::post('/editlocation_action',[AdminController::class,'updatelocation']);
Route::get('/deleteloc/{lo_id}',[AdminController::class,'locationdelete']);

//dish
Route::get('/dish',[AdminController::class,'dishindex']);
//Route::get('/dish-details',[AdminController::class,'dishdetails']);
Route::view('/dish-details','Admin.create-edit-dish');
Route::get('editdish/{dm_id}',[AdminController::class,'editdish']);
Route::post('/adddish_action',[AdminController::class,'adddishaction']);
Route::post('/editdish_action',[AdminController::class,'updatedish']);
Route::get('/deletedish/{dm_id}',[AdminController::class,'dishdelete']);

Route::get('/ordermaster',[AdminController::class,'orderindex']);
Route::get('/user',[AdminController::class,'userindex']);

Route::view('/changepassword',[AdminController::class,'changepwd']);

//Route::get('/admin',[AdminController::class,'adminindex']);
//Route::post('/admin_action',[AdminController::class,'updateadmin']);
//Route::get('/deletedel/{dl_id}',[AdminController::class,'deliveryboydelete']);