<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use Carbon\Carbon;
use App\Models\EndUser;
use App\Models\add_cart;
use App\Models\WishList;
use App\Models\set_detail_whole;

use DB;
use Session;
use Redirect;
use View;
use compact;

class CartController extends Controller
{
    //
    /////////////////////////////////////////////////////cart////////////////////////////////////////////////
    public function cart()
    {
    	if(session()->has('uid'))
        {
    		$cid = Session::get('uid');

    		$getaddcart = add_cart::where('add_cart.cid',$cid)
    					->select('product.id','product.item_name','prod_img.img_url','product.sale_price','product.mrp','product.discount','product.tax','add_cart.qty','add_cart.color','add_cart.size','add_cart.id AS cart_id')->groupBy('add_cart.id')
                    	->leftJoin('product', function($join) {
                          $join->on('add_cart.pid', '=', 'product.id');
                        })
                        ->leftJoin('prod_img', function($join) {
                          $join->on('product.img', '=', 'prod_img.img_id');
                        })
                        ->orderBy('add_cart.id', 'DESC')
                        ->get();

            $countcart = count($getaddcart);
            // echo $count;
            // die();
            $totalamt = add_cart::where('cid',$cid)
            			->select(DB::raw('sum(qty * price) as total'))
            			->get(); 
            
            $totalmrp = add_cart::where('cid',$cid)
                        ->select(DB::raw('sum(add_cart.qty * product.mrp) as totalmrp'))
                        ->leftJoin('product','add_cart.pid','=','product.id')
                        ->get(); 

            $totaldsc = add_cart::where('cid',$cid)
                        ->select(DB::raw('sum(add_cart.qty * product.discount) as totaldsc'))
                        ->leftJoin('product','add_cart.pid','=','product.id')
                        ->get(); 
            // if($countcart>0){
    		  return View::make('cart',compact('getaddcart','totalamt','totalmrp','totaldsc','countcart'));
            // }
            // else{
            //     return View::make('cart',compact('countcart'));
            // }
    	}
        else{

            return View::make('login');
        }

    	// else{
    	// 	$cid = session()->getId();

    	// 	$getaddcart = add_cart::where('add_cart.cid',$cid)
    	// 				->select('product.id','product.item_name','prod_img.img_url','product.sale_price','product.mrp','product.discount','product.tax','add_cart.qty','add_cart.color','add_cart.size','add_cart.id AS cart_id')->groupBy('add_cart.id')
     //                	->leftJoin('product', function($join) {
     //                      $join->on('add_cart.pid', '=', 'product.id');
     //                    })
     //                    ->leftJoin('prod_img', function($join) {
     //                      $join->on('product.img', '=', 'prod_img.img_id');
     //                    })
     //                    ->orderBy('add_cart.id', 'DESC')
     //                    ->get();

     //        $totalamt = add_cart::where('cid',$cid)
     //        			->select(DB::raw('sum(qty * price) as total'))
     //        			->get();  
     //        // echo $getaddcart->sale_price*$getaddcart->qty;
     //        // die();
    	// }
		// return view('cart');
        
    }

/////////////////////////////////////////////////////add to cart//////////////////////////////////////////////////////////
    public function addtoCart()
    {
    	if(session()->has('uid'))
        {
    		$cid = Session::get('uid');
    	// }
    	// else{
    	// 	$cid = session()->getId();
    	// }
    	$id = $_POST['id'];
    	$size = $_POST['size'];
    	$qty = $_POST['qty'];
    	$color = $_POST['color'];

    	$product = product::find($id);
    	$aid = $product->aid;
    	$price = $product->sale_price;
        $tax = $product->tax;

        $taxamt = $price * $tax/100;

    	$checkCart = add_cart::where('cid',$cid)
    						->where('pid',$id)
    						->where('color',$color)
    						->where('size',$size)
    						->count();

    	if($checkCart<1)
    	{
	    	$addcart = new add_cart;

	    	$addcart->aid = $aid;
	    	$addcart->cid = $cid;
	    	$addcart->pid = $id;
	    	$addcart->size = $size;
	    	$addcart->color = $color;
	    	$addcart->qty = $qty;
            $addcart->tax = $taxamt;
	    	$addcart->price = $price;

	    	$addcart->save();

    		$success = "Successfully Added in your bag";
    	}
    	else{
    		$success = "Already in bag";
    	}
    	// $success = $cid;

    	return $success;
    }
    else{
            return "login";
        }
    }
////////////////////////////////////////////////showColor///////////////////////////////////////////////////////////
    public function showColor(Request $req)
    {
        // SELECT id,pid,color,size,qty, IF(color = '#dc5050', 'true', 'false')  as status FROM `set_details_whole` WHERE pid = 2 AND color = '#dc5050' UNION
        // SELECT id,pid,color,size,qty, IF(color = '#dc5050', 'true', 'false')  as status FROM `set_details_whole` WHERE pid = 2 AND color != '#dc5050' and size NOT IN (SELECT size FROM set_details_whole WHERE color = '#dc5050') GROUP BY size
        $id = $_POST['id'];
        $color = $_POST['color'];
        $html = '';
        // $checkColor = set_detail_whole::where('color',$color)
        //                 ->where('pid',$id)->where('qty','>',0)
        //                 ->orderBy('size','DESC')
        //                 ->get();
        $checkColor = DB::select(DB::raw("SELECT id,pid,color,size,qty, IF(color = '$color', 'true', 'false')  as status FROM `set_details_whole` WHERE pid = '$id' AND color = '$color' UNION SELECT id,pid,color,size,qty, IF(color = '$color', 'true', 'false')  as status FROM `set_details_whole` WHERE pid = '$id' AND color != '$color' and size NOT IN (SELECT size FROM set_details_whole WHERE color = '$color' and pid = '$id') GROUP BY size order by size desc "));

        // echo $checkColor;
        // die();

        $html .= '<p class="mb-1" style="text-align: left;">Size</p>
                    <div class="choose-size-radio d-flex align-items-center" style="margin-left: -20px;">';

        foreach($checkColor as $key=>$val){
            // $html .= '<div class="form-check mb-0">
            //       <input class="form-check-input" style="background-color: '.$val->color.'" value="'.$val->color.'" id="color" type="radio" name="colorRadio">

            //       <label class="form-check-label" for="colorRadio1"></label>
            //     </div>';
            if($val->status=="true"){
            $html .= '  <div class="form-check mb-0 me-2">
                            <input class="form-check-input" id="size" value="'.$val->size.'" type="radio" name="sizeRadio">
                            <label class="form-check-label" for="sizeRadio1">'.$val->size.'</label>
                        </div>';
            }else{
            $html .= '  <div class="form-check mb-0 me-2">
                            <input class="form-check-input" id="size" value="'.$val->size.'" type="radio" name="sizeRadio" disabled>
                            <label class="form-check-label cut-through" for="sizeRadio1">'.$val->size.'</label>
                        </div>';
            }
        }
            $html .='</div>';
        // echo $checkColor;
        // echo $checkColor;
        return $html;

    }
/////////////////////////////////////////////removeCart/////////////////////////////////////////////////////////////
    public function cartDelete(Request $req)
    {
        $id = $req->cart_id;

        $delete=add_cart::find($id);
        $delete->delete();

        return redirect('cart');
    }

}
