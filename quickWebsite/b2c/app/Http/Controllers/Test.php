<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use Carbon\Carbon;
use DB;
use Session;
use Redirect;
use View;
use compact;

class Test extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
     public function cart()
    {
        return view('cart');
    }

   

    public function feedback()
    {
        return view('feedback');
    }

    public function order()
    {
        return view('orders');
    }

   

    public function profile()
    {
        return view('profile');
    }

    public function editProfile()
    {
        return view('edit-profile');
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

     public function singleProduct()
    {
        return view('single-product');
    }

     public function otp()
    {
        return view('otp');
    }

     public function faq()
    {
        return view('faq');
    }

    public function otpConfirm()
    {
        return view('otp-confirm');
    }

     public function exchange()
    {
        return view('exchange');
    }

    public function orderDetailsDel()
    {
        return view('order-details-d');
    }

     public function orderDelcanc()
    {
        return view('order-details-dc');
    }

     public function orderCanc()
    {
        return view('order-details-c');
    }

    public function orderStatus()
    {
        return view('order-status');
    }

    public function replaceOrder()
    {
        return view('replace_order');
    }

    public function cancelOrder()
    {
        return view('cancel-order');
    }

    public function cancelOrder2()
    {
        return view('cancel-order2');
    }

    public function complaintPage()
    {
        return view('replacement_product');
    }

    public function wishlist()
    {
        return view('wishlist-list');
    }

     public function topProducts()
    {
        return view('top-products');
    }

    public function weeklyProducts()
    {
        return view('weekly-products');
    }

    public function featuredProducts()
    {
        return view('featured-products');
    }

    public function allProducts()
    {
        return view('all-products');
    }

    public function aboutUs()
    {
        return view('blankPages/aboutus_blank');
    }
    public function contactUs()
    {
        return view('blankPages/contact_blank');
    }
    public function faqBlank()
    {
        return view('blankPages/faq_blank');
    }
    public function help()
    {
        return view('blankPages/help_blank');
    }
    public function wishlistBlank()
    {
        return view('blankPages/wishlist_blank');
    }

    public function cartAddress()
    {
        return view('cartAddress');
    }

    public function addAddress()
    {
        return view('addAddress');
    }

     public function orderSummary()
    {
        return view('order_summary');
    }
}
