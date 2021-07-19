<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login','App\Http\Controllers\AppControllers\HomeController@gen_otp');
Route::post('/otp','App\Http\Controllers\AppControllers\HomeController@verify_otp');
Route::post('/home','App\Http\Controllers\AppControllers\HomeController@home');
Route::post('/category_product','App\Http\Controllers\AppControllers\HomeController@category_product');
Route::post('/feature_product','App\Http\Controllers\AppControllers\HomeController@feature_product');
Route::post('/top_product','App\Http\Controllers\AppControllers\HomeController@top_product');
Route::post('/new_product','App\Http\Controllers\AppControllers\HomeController@new_product');
Route::post('/add_cart','App\Http\Controllers\AppControllers\HomeController@add_cart');
Route::post('/cart_list','App\Http\Controllers\AppControllers\HomeController@cart_list');
Route::post('/remove_cart','App\Http\Controllers\AppControllers\HomeController@remove_cart');
Route::post('/add_wishlist','App\Http\Controllers\AppControllers\HomeController@add_wishlist');
Route::post('/wishlist','App\Http\Controllers\AppControllers\HomeController@wishlist');
Route::post('/color_size','App\Http\Controllers\AppControllers\HomeController@color_size');
Route::post('/color_size_test','App\Http\Controllers\AppControllers\HomeController@color_size_test');
Route::post('/get_attribute','App\Http\Controllers\AppControllers\HomeController@get_attribute');
Route::post('/place_order','App\Http\Controllers\AppControllers\HomeController@place_order');
Route::post('/get_order','App\Http\Controllers\AppControllers\HomeController@get_order');
Route::post('/payment_status','App\Http\Controllers\AppControllers\HomeController@payment_status');
Route::post('/banner','App\Http\Controllers\AppControllers\HomeController@banner');