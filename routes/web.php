<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\HomeController;

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
//default in web.php:
// Route::get('/', function () {
//     return view('welcome');
// });

//common
Route::view('/','homepage');
Route::view('/loginregister','loginregister');
Route::post('/registerform',[HomeController::class,'registeraction']);
Route::post('/loginform',[HomeController::class,'loginaction']);
