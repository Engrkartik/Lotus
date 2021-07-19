<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\checkSession;

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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/home','App\Http\Controllers\HomeController@index');

Route::get('/','App\Http\Controllers\HomeController@index');
	
Route::post('/sort/{val1}/{id}','App\Http\Controllers\HomeController@filter');

//profile
Route::post('/profile1','App\Http\Controllers\Login@profile1');

Route::get('/profile','App\Http\Controllers\HomeController@profile');

Route::post('/updateProfile','App\Http\Controllers\Login@updateProfile')->middleware(checkSession::class);

Route::get('/edit-profile','App\Http\Controllers\HomeController@editProfile')->middleware(checkSession::class);

Route::post('/selectCity','App\Http\Controllers\HomeController@selectCity');

//view category and products
Route::get('/category/shop-product/{id}','App\Http\Controllers\HomeController@shopProduct');

Route::get('/category/shop-product-grid/{id}','App\Http\Controllers\HomeController@shopProductGrid');

Route::get('/single','App\Http\Controllers\HomeController@singleProduct');

Route::get('/category/{id}','App\Http\Controllers\HomeController@category');

Route::get('/category/shop-product/single-product/{id}','App\Http\Controllers\HomeController@singleProduct');

//about us and feedback
Route::get('/faqs','App\Http\Controllers\Test@faq');

Route::get('/feedback','App\Http\Controllers\HomeController@feedback');

Route::get('/contact','App\Http\Controllers\HomeController@contact');

//login and registration
Route::get('/register','App\Http\Controllers\Login@register');

Route::post('/save_registeration','App\Http\Controllers\Login@save_registeration');

Route::get('/otp','App\Http\Controllers\Test@otp');

Route::get('/login','App\Http\Controllers\Login@login');

Route::post('/check_login','App\Http\Controllers\Login@check_login');

Route::post('/chk_otp','App\Http\Controllers\Login@chk_otp');

Route::get('/logout','App\Http\Controllers\Login@logout');

Route::get('/otp-confirm','App\Http\Controllers\Login@otpConfirm');

//cart and wishlist
Route::post('/removeWishlist','App\Http\Controllers\WishlistController@removeWishlist');

Route::post('/removeWishlisthome','App\Http\Controllers\WishlistController@removeWishlisthome');

Route::post('/removeWishlistview','App\Http\Controllers\WishlistController@removeWishlistview');

Route::post('/wishlistAjax','App\Http\Controllers\WishlistController@wishlistAjax');

Route::get('/wishlist-list','App\Http\Controllers\WishlistController@wishlistlist');

Route::get('/wishlist-grid','App\Http\Controllers\WishlistController@wishgrid');

Route::post('/wishlist','App\Http\Controllers\WishlistController@wish');

Route::post('/showColor','App\Http\Controllers\CartController@showColor');

Route::post('/addtoCart','App\Http\Controllers\CartController@addtoCart')->middleware(checkSession::class);

Route::get('/removeCart/{cart_id}','App\Http\Controllers\CartController@cartDelete');

Route::get('/cart','App\Http\Controllers\CartController@cart')->middleware(checkSession::class);

//payment and order
Route::get('razorpay-payment', [App\Http\Controllers\OrderController::class, 'index']);
Route::get('/payment', 'App\Http\Controllers\OrderController@payment');

Route::post('/pay' , 'App\Http\Controllers\OrderController@pay');
Route::post('razorpay-payment', [App\Http\Controllers\OrderController::class, 'store'])->name('razorpay.payment.store');

Route::post('/updateCheck','App\Http\Controllers\OrderController@updateCheck');

Route::get('/checkout','App\Http\Controllers\OrderController@outCheck');

Route::get('/checkout-payment','App\Http\Controllers\OrderController@getPayment');

Route::get('/orders','App\Http\Controllers\OrderController@order')->middleware(checkSession::class);

Route::get('/order-details','App\Http\Controllers\OrderController@orderDetails');

Route::get('/cancel-order/{id}','App\Http\Controllers\OrderController@cancelOrder');

Route::get('/cancel-order-confirm/{id}','App\Http\Controllers\OrderController@cancelOrder2');

Route::get('/order-details-del','App\Http\Controllers\Test@orderDetailsDel');

Route::get('/order-delcanc','App\Http\Controllers\Test@orderDelcanc');

Route::get('/order-canc','App\Http\Controllers\Test@orderCanc');

Route::get('/order-status','App\Http\Controllers\Test@orderStatus');

Route::get('/replace-order','App\Http\Controllers\Test@replaceOrder');

Route::get('/complaint-page','App\Http\Controllers\Test@complaintPage');


// view all pages
Route::get('/top-products','App\Http\Controllers\HomeController@topProducts');

Route::get('/weekly-products','App\Http\Controllers\HomeController@weeklyProducts');

Route::get('/featured-products','App\Http\Controllers\HomeController@featuredProducts');

Route::any('/color-code','App\Http\Controllers\Login@color_code');

Route::get('/all-products','App\Http\Controllers\Test@allProducts');

//blank pages 

Route::get('/about-us','App\Http\Controllers\Test@aboutUs');

Route::get('/contact','App\Http\Controllers\Test@contactUs');

Route::get('/faq-blank','App\Http\Controllers\Test@faqBlank');

Route::get('/wishlist-blank','App\Http\Controllers\Test@wishlistBlank');

Route::get('/help','App\Http\Controllers\Test@help');


// new pages in test

Route::get('/cartAddress','App\Http\Controllers\Test@cartAddress');

Route::get('/addAddress','App\Http\Controllers\Test@addAddress');

Route::get('/order-summary','App\Http\Controllers\Test@orderSummary');