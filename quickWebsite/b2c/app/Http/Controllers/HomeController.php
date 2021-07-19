<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use Carbon\Carbon;
use App\Models\EndUser;
use App\Models\add_cart;
use App\Models\WishList;

use DB;
use Session;
use Redirect;
use View;
use compact;

class HomeController extends Controller
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

/////////////////////////////////////////////////////index////////////////////////////////////////////////
    public function index()
    {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $aid = 2;

        if(session()->has('uid'))
        {
            $cid = Session::get('uid');
        // $featured = DB::table('product')
        //             ->select('product.*','prod_img.img_url')
        //             ->leftJoin('prod_img', function($join) {
        //                   $join->on('product.img', '=', 'prod_img.img_id');
        //                 })
        //             ->where('feature','=','Y')  
        //             ->where('product.aid','=',$aid)
        //             ->groupBy('product.id')
        //             ->get();
        
        $feature=DB::table('product_order')
            ->leftjoin('product','product_order.pid','product.id')
            ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `wishlist` WHERE product.id=wishlist.pid AND wishlist.aid='".$aid."' AND wishlist.cid='".$cid."') AS wishlist"))
            ->where([['product.aid','=',$aid],['product_order.status','=','A'],['product_order.feature','!=','0'],['product.feature','=','Y']])
            ->orderBy('product_order.feature','ASC')->take(4)
            ->get();
            // echo $feature;
        $top=DB::table('product_order')
            ->leftjoin('product','product_order.pid','product.id')
            ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `wishlist` WHERE product.id=wishlist.pid AND wishlist.aid='".$aid."' AND wishlist.cid='".$cid."') AS wishlist"))
            ->where([['product.aid','=',$aid],['product_order.status','=','A'],['product_order.top','!=','0'],['product.top','=','Y']])
            ->orderBy('product_order.top','ASC')->take(4)
            ->get();    
        }
        else{
        
        $feature=DB::table('product_order')
            ->leftjoin('product','product_order.pid','product.id')
            ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"))
            ->where([['product.aid','=',$aid],['product_order.status','=','A'],['product_order.feature','!=','0'],['product.feature','=','Y']])
            ->orderBy('product_order.feature','ASC')->take(4)
            ->get(); 
            
        $top=DB::table('product_order')
            ->leftjoin('product','product_order.pid','product.id')
            ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"))
            ->where([['product.aid','=',$aid],['product_order.status','=','A'],['product_order.top','!=','0'],['product.top','=','Y']])
            ->orderBy('product_order.top','ASC')->take(4)
            ->get();  
        }  

        $video = DB::table('banner')
                ->select('img')
                ->where('aid','=',$aid)
                ->where('title','=','Video Banner')
                ->where('status','=','A')
                ->get();

        // echo $discount;
        // die();

        $data=category::where('parent_id','=','0')->where('aid',$aid)
            ->get();

        $discount = DB::table('banner')
                ->select('img')
                ->where('aid','=',$aid)
                ->where('status','=','A')
                ->where('title','=','Discount Banner')
                ->get();

        return View::make('home', compact('data','video','feature','top','discount'));
    }

/////////////////////////////////////////////////////single product////////////////////////////////////////////////
    public function singleProduct(Request $req)
    {
    	$id=$req->id;
    	$aid=2;
        // $product = product::where('id','=',$aid)->get();
        if(session()->has('uid'))
        {
          $cid = Session::get('uid');

          $product = DB::table('product')
            ->select('product.*',DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `wishlist` WHERE product.id=wishlist.pid AND wishlist.aid='".$aid."' AND wishlist.cid='".$cid."') AS wishlist"))
            ->where([['product.aid','=',$aid],['product.id','=',$id]])
            ->orderBy('product.id','DESC')
            ->get();
        }
        else{
        	$product = product::where('id','=',$id)->get();
        }

        $findCat = product::where('id','=',$id)->first();
        $sub_cat = $findCat->sub_cat;

        $pro_img = product::where('product.id','=',$id)->select('*')
                    ->leftJoin('prod_img', function($join) {
                          $join->on('product.img', '=', 'prod_img.img_id');
                        })->get();

        $relatedProduct = DB::table('product')->where('sub_cat','=',$sub_cat)->where('product.id','!=',$id)
                        ->select('product.*','prod_img.img_url')->groupBy('product.id')
                        ->leftJoin('prod_img', function($join) {
                          $join->on('product.img', '=', 'prod_img.img_id');
                        })->get();

        $color = DB::table('product')->where('product.aid','=',$aid)->where('product.id','=',$id)
        		// ->where('set_details_whole.qty','!=',0)
                ->select('color','size','qty')->groupBy('color')
                        ->leftJoin('set_details_whole', function($join) {
                          $join->on('set_details_whole.pid', '=', 'product.id');
                        })->get();

        $size = DB::table('product')->where('product.aid','=',$aid)->where('product.id','=',$id)
        		// ->where('set_details_whole.qty','!=',0)
                ->select('color','size','qty')->groupBy('size')
                        ->leftJoin('set_details_whole', function($join) {
                          $join->on('set_details_whole.pid', '=', 'product.id');
                        })->orderBy('set_details_whole.size','DESC')->get();

        return View::make('single-product', compact('product','pro_img','relatedProduct','color','size'));
    }

/////////////////////////////////////////////////////shop product////////////////////////////////////////////////
    public function shopProduct(Request $req)
    {
        $id=$req->id;
        $aid = 2;
        if(session()->has('uid'))
        {
            $cid = Session::get('uid');
        // $data=DB::table('product')->where('sub_cat','=',$id)->where('product.aid','=',$aid)->select('product.*','prod_img.img_url')->groupBy('product.id')
        //             ->leftJoin('prod_img', function($join) {
        //                   $join->on('product.img', '=', 'prod_img.img_id');
        //                 })->get();
        $data = DB::table('product')
            ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `wishlist` WHERE product.id=wishlist.pid AND wishlist.aid='".$aid."' AND wishlist.cid='".$cid."') AS wishlist"))
            ->where([['product.aid','=',$aid],['product.sub_cat','=',$id]])
            ->orderBy('product.id','DESC')
            ->get();
        }
        else{
            $data = DB::table('product')
            ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"))
            ->where([['product.aid','=',$aid],['product.sub_cat','=',$id]])
            ->orderBy('product.id','DESC')
            ->get();
        }

        $cat_img = DB::table('category')
            ->select('img','id','title')
            ->where('id','=',$id)
            ->get();

        // $pro_img = product::where('product.id','=',$aid)->select('*')
        //             ->leftJoin('prod_img', function($join) {
        //                   $join->on('product.img', '=', 'prod_img.img_id');
        //                 })->orderBy('pro_img.id','asc')->take(1)
        //             ->get();

        // return view('shop-list');
        return View::make('shop-list',compact('data','cat_img'));
    }


/////////////////////////////////////////////////// for grid view//////////////////////////////////////////////
    
        public function shopProductGrid(Request $req)
    {
        $id=$req->id;
        $aid = 2;
        if(session()->has('uid'))
        {
            $cid = Session::get('uid');
        // $data=DB::table('product')->where('sub_cat','=',$id)->where('product.aid','=',$aid)->select('product.*','prod_img.img_url')->groupBy('product.id')
        //             ->leftJoin('prod_img', function($join) {
        //                   $join->on('product.img', '=', 'prod_img.img_id');
        //                 })->get();
        $data = DB::table('product')
            ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `wishlist` WHERE product.id=wishlist.pid AND wishlist.aid='".$aid."' AND wishlist.cid='".$cid."') AS wishlist"))
            ->where([['product.aid','=',$aid],['product.sub_cat','=',$id]])
            ->orderBy('product.id','DESC')
            ->get();
        }
        else{
            $data = DB::table('product')
            ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"))
            ->where([['product.aid','=',$aid],['product.sub_cat','=',$id]])
            ->orderBy('product.id','DESC')
            ->get();
        }

        $cat_img = DB::table('category')
            ->select('img','id','title')
            ->where('id','=',$id)
            ->get();

        // $pro_img = product::where('product.id','=',$aid)->select('*')
        //             ->leftJoin('prod_img', function($join) {
        //                   $join->on('product.img', '=', 'prod_img.img_id');
        //                 })->orderBy('pro_img.id','asc')->take(1)
        //             ->get();

        // return view('shop-list');
        return View::make('shop-grid',compact('data','cat_img'));
    }

////////////////////////////////////////////sort////////////////////////////////////////////////
    public function filter(Request $req)
    {
        $msg = $_POST['val1'];
        $id = $_POST['id'];
        $aid = 2;
        $html='';
        $one='';
        if($msg=="high"){
            // $one = product::where('aid','=',$aid)
            //     ->where('sub_cat','=',$id)
            //     ->orderBy('sale_price', 'DESC')->get();
            $one = DB::table('product')->where('sub_cat','=',$id)->where('product.aid','=',$aid)->select('product.*','prod_img.img_url')->groupBy('product.id')
                    ->leftJoin('prod_img', function($join) {
                          $join->on('product.img', '=', 'prod_img.img_id');
                        })->orderBy('sale_price', 'DESC')->get();
        }
        else if($msg="low"){
            // $one = product::where('aid','=',$aid)
            //     ->where('sub_cat','=',$id)
            //     ->orderBy('sale_price', 'ASC')->get();
            $one = DB::table('product')->where('sub_cat','=',$id)->where('product.aid','=',$aid)->select('product.*','prod_img.img_url')->groupBy('product.id')
                    ->leftJoin('prod_img', function($join) {
                          $join->on('product.img', '=', 'prod_img.img_id');
                        })->orderBy('sale_price', 'ASC')->get();
        }
        else if($msg="new"){
            // $one = product::where('aid','=',$aid)
            //     ->where('sub_cat','=',$id)
            //     ->orderBy('created_at', 'DESC')->get();
            $one = DB::table('product')->where('sub_cat','=',$id)->where('product.aid','=',$aid)->select('product.*','prod_img.img_url')->groupBy('product.id')
                    ->leftJoin('prod_img', function($join) {
                          $join->on('product.img', '=', 'prod_img.img_id');
                        })->orderBy('created_at', 'DESC')->get();
        }
        // $msg = "world";
        foreach($one as $key=>$value){
            // $html=$value->item_name;
            $html.='<div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side"><span class="badge badge-success">Sale</span><a class="wishlist-btn" href="wishlist-list"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product/'.$value->id.'"><img src="http://34.72.9.224/quickWebsite/b2c_admin/'.$value->img_url.'" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block" href="single-product/'.$value->id.'">'.$value->item_name.'</a>
                    <p class="sale-price"><i class="lni lni-rupee"></i>'.$value->sale_price.'&nbsp;&nbsp;<span>₹'.$value->mrp.'</span></p>
                    <button class="btn btn-danger btn-sm" data-index="{{$value->id}}" onclick="addtowish('.$value->id.')"><i class="lni lni-heart"></i>Wishlist</button>
                  </div>
                </div> 
              </div>
            </div>';
        }
        return $html;
        // return response()->json(array('msg'=> $one), 200);
    }


/////////////////////////////////////////////////////categary////////////////////////////////////////////////
    public function category(Request $req)
    {
        $aid=$req->id;
        $products=category::where('parent_id','=',$aid)
        // $products=DB::table('product')
        // ->where('cat_id','=',$aid)
        ->get(); 

        $cat = DB::table('category')
            ->select('title','img')
            ->where('id','=',$aid)
            ->get();

        return View::make('catagory', compact('cat','products'));
        // return view('catagory');
    }

/////////////////////////////////////////////////////profile////////////////////////////////////////////////
    public function profile()
    {
    	$name = Session::get('name');
    	$aid = Session::get('uid');

        $user = EndUser::where('id','=',$aid)->get();

        return View::make('edit-profile', compact('user','name'));
        // return View::make('profile')->with('name', $value);
    }

/////////////////////////////////////////////////////edit profile////////////////////////////////////////////////
    public function editProfile()
    {
    	$aid = Session::get('uid');
    	$name = Session::get('name');

        $districts = DB::table('districts')->select('state')->distinct()->get();

        $user = EndUser::where('id','=',$aid)->get();

        $city = EndUser::where('id',$aid)->first();

        $listCity = DB::table('districts')->where('state',$city->state)->get();
    
        return View::make('edit-profile', compact('user','name','districts','listCity'));
        // return view('edit-profile');
    }

/////////////////////////////////////////////////////selectCity////////////////////////////////////////////////
    public function selectCity()
    {
        $state = $_POST['state'];

        $districts = DB::table('districts')->where('state',$state)->get();

        $dist = '';

        foreach ($districts as $key => $value) {
            # code...
            $dist.='<option value="'.$value->id.'">'.$value->district.'</option>';
        }

        return $dist;
        // return view('edit-profile');
    }

/////////////////////////////////////////////////////topProducts////////////////////////////////////////////////

    public function topProducts()
    {
        $aid = 2;

        if(session()->has('uid'))
        {
            $cid = Session::get('uid');
        
            // echo $feature;
        $top=DB::table('product_order')
            ->leftjoin('product','product_order.pid','product.id')
            ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `wishlist` WHERE product.id=wishlist.pid AND wishlist.aid='".$aid."' AND wishlist.cid='".$cid."') AS wishlist"))
            ->where([['product.aid','=',$aid],['product_order.status','=','A'],['product_order.top','!=','0'],['product.top','=','Y']])
            ->orderBy('product_order.top','ASC')
            ->get();    
        }
        else{ 
            
        $top=DB::table('product_order')
            ->leftjoin('product','product_order.pid','product.id')
            ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"))
            ->where([['product.aid','=',$aid],['product_order.status','=','A'],['product_order.top','!=','0'],['product.top','=','Y']])
            ->orderBy('product_order.top','ASC')
            ->get();  
        }
        // return view('top-products');
        return View::make('top-products', compact('top'));

    }

/////////////////////////////////////////////////////edit profile////////////////////////////////////////////////

    public function weeklyProducts()
    {
        return view('weekly-products');
    }

/////////////////////////////////////////////////////edit profile////////////////////////////////////////////////

    public function featuredProducts()
    {
        $aid = 2;

        if(session()->has('uid'))
        {
        
        $cid = Session::get('uid');
     
        $feature=DB::table('product_order')
            ->leftjoin('product','product_order.pid','product.id')
            ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `wishlist` WHERE product.id=wishlist.pid AND wishlist.aid='".$aid."' AND wishlist.cid='".$cid."') AS wishlist"))
            ->where([['product.aid','=',$aid],['product_order.status','=','A'],['product_order.feature','!=','0'],['product.feature','=','Y']])
            ->orderBy('product_order.feature','ASC')
            ->get();
            // echo $feature;   
        }
        else{
        
        $feature=DB::table('product_order')
            ->leftjoin('product','product_order.pid','product.id')
            ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"))
            ->where([['product.aid','=',$aid],['product_order.status','=','A'],['product_order.feature','!=','0'],['product.feature','=','Y']])
            ->orderBy('product_order.feature','ASC')
            ->get(); 
          
        }
        // return view('featured-products');
        return View::make('featured-products', compact('feature'));
    }

/////////////////////////////////////////////////////edit profile////////////////////////////////////////////////

}
