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
//     return view('home')->middleware(checkSession::class);
// });
// Route::get('/home','App\Http\Controllers\HomeController@index')->middleware(checkSession::class);
// Route::get('/', 'App\Http\Controllers\HomeController@index')->middleware(checkSession::class);
// Route::get('/', 'App\Http\Controllers\HomeController@index')->middleware(checkSession::class);

Route::get('/', function(){
    return view('B2Cadmin/login');
});

Route::get('/setup-store', 'App\Http\Controllers\HomeController@setupstore')->middleware(checkSession::class);

Route::any('/get-otp', 'App\Http\Controllers\HomeControllers@getotp');
Route::any('/gen-otp', 'App\Http\Controllers\HomeControllers@gen_otp');
Route::any('/verify-otp/{mob}', 'App\Http\Controllers\HomeControllers@verify_otp');
Route::any('/logout', 'App\Http\Controllers\HomeControllers@logout')->middleware(checkSession::class);
Route::get('/select-business', 'App\Http\Controllers\HomeController@bustype')->middleware(checkSession::class);


Route::get('/home', 'App\Http\Controllers\HomeController@index')->middleware(checkSession::class);

//category part start

Route::get('/categories', 'App\Http\Controllers\CategoryController@category')->middleware(checkSession::class);
Route::any('/add_category', 'App\Http\Controllers\CategoryController@addcategory')->middleware(checkSession::class);
Route::any('/add_subcategory', 'App\Http\Controllers\CategoryController@addsubcategory')->middleware(checkSession::class);
Route::get('/sub-categories', 'App\Http\Controllers\CategoryController@subcategory')->middleware(checkSession::class);
Route::any('/update_cat/{id}', 'App\Http\Controllers\CategoryController@updatecategory')->middleware(checkSession::class);
Route::any('/update_subcat', 'App\Http\Controllers\CategoryController@updatesubcategory')->middleware(checkSession::class);

//category part end

//banner part start
Route::any('/banner', 'App\Http\Controllers\BannerController@banner')->middleware(checkSession::class);
Route::any('/add_banner', 'App\Http\Controllers\BannerController@add_banner')->middleware(checkSession::class);
Route::any('/update_banner/{id}', 'App\Http\Controllers\BannerController@update_banner')->middleware(checkSession::class);

//banner part end

//brand part start
Route::any('/brand', 'App\Http\Controllers\BrandController@brand')->middleware(checkSession::class);
Route::any('/add_brand', 'App\Http\Controllers\BrandController@add_brand')->middleware(checkSession::class);
Route::any('/update_brand/{id}', 'App\Http\Controllers\BrandController@update_brand')->middleware(checkSession::class);

//brand part end

//discount part start
Route::any('/discount','App\Http\Controllers\DiscountController@discount')->middleware(checkSession::class);
Route::any('/add_discount','App\Http\Controllers\DiscountController@add_discount')->middleware(checkSession::class);
Route::any('/check_discount','App\Http\Controllers\DiscountController@check_discount')->middleware(checkSession::class);
Route::any('/update_discount/{id}','App\Http\Controllers\DiscountController@update_discount')->middleware(checkSession::class);

//discount part end

//product part start

Route::get('/product_list', 'App\Http\Controllers\ProductController@index')->middleware(checkSession::class);
Route::get('/add_product', 'App\Http\Controllers\ProductController@addproduct')->middleware(checkSession::class);
Route::any('/create_set', 'App\Http\Controllers\ProductController@create_set')->middleware(checkSession::class);
Route::any('/show_colorSize', 'App\Http\Controllers\ProductController@show_colorSize')->middleware(checkSession::class);
// Route::get('/ep', 'App\Http\Controllers\ProductController@editproduct2')->middleware(checkSession::class);
Route::any('/save_product', 'App\Http\Controllers\ProductController@save_product')->middleware(checkSession::class);
Route::any('/add_pro', 'App\Http\Controllers\ProductController@save_product')->middleware(checkSession::class);
Route::any('gen_subcat','App\Http\Controllers\ProductController@get_subcat')->middleware(checkSession::class);
Route::any('get_subcatImg','App\Http\Controllers\CategoryController@get_subcatImg')->middleware(checkSession::class);
Route::any('sub_att','App\Http\Controllers\ProductController@sub_att')->middleware(checkSession::class);
Route::get('/edit_product/{id}/{img_id}', 'App\Http\Controllers\ProductController@editproduct')->middleware(checkSession::class);
Route::any('/update_product/{id}', 'App\Http\Controllers\ProductController@updateproduct')->middleware(checkSession::class);
Route::any('/view_set/{id}', 'App\Http\Controllers\ProductController@view_set')->middleware(checkSession::class);
Route::any('/update_set/{set_id}/{pid}', 'App\Http\Controllers\ProductController@update_set')->middleware(checkSession::class);
Route::any('/delete/{id}/{page}/{model}', 'App\Http\Controllers\global_con@delete')->middleware(checkSession::class);
Route::any('/delete2/{id}/{page}/{model}', 'App\Http\Controllers\global_con@delete2')->middleware(checkSession::class);
Route::any('/change_status', 'App\Http\Controllers\ProductController@change_status')->middleware(checkSession::class);
//product part end


// customer part start
Route::any('/customer', 'App\Http\Controllers\CustomerController@customer')->middleware(checkSession::class);
Route::any('/add_customer', 'App\Http\Controllers\CustomerController@add_customer')->middleware(checkSession::class);
Route::any('/district', 'App\Http\Controllers\CustomerController@fetch_district')->middleware(checkSession::class);
Route::any('/add_cust', 'App\Http\Controllers\CustomerController@add_cust')->middleware(checkSession::class);
Route::any('/edit_customer/{id}', 'App\Http\Controllers\CustomerController@edit_customer')->middleware(checkSession::class);
Route::any('/edit_cust/{id}', 'App\Http\Controllers\CustomerController@edit_cust')->middleware(checkSession::class);
// Route::any('/add_customer',function(){return view('B2Cadmin/Customer/add_customer')->middleware(checkSession::class);});

// customer part end

// attribute part start
Route::any('/attributes', 'App\Http\Controllers\AttributeController@attribute')->middleware(checkSession::class);
Route::any('/add_attribute', 'App\Http\Controllers\AttributeController@add_attribute')->middleware(checkSession::class);
Route::any('/add_att', 'App\Http\Controllers\AttributeController@add_att')->middleware(checkSession::class);
Route::any('/get_attribute', 'App\Http\Controllers\AttributeController@get_attribute')->middleware(checkSession::class);
Route::any('/edit_attribute/{id}/{type}', 'App\Http\Controllers\AttributeController@edit_attribute')->middleware(checkSession::class);

//attribute part end