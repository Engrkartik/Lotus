<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\otp;
use App\Models\category;
use App\Models\product_order;
use App\Models\banner;
use App\Models\add_cart;
use App\Models\wishlist;
use App\Models\prod_attribute;
use App\Models\order;
use App\Models\order_detail;
use App\Models\payment;
use view;
use DB;
use Session;
class HomeController extends Controller
{
    //
    public function gen_otp(Request $req)
    {
        // print_r($req->all());
        $chk=DB::table('otp')->where('MOBILE_NO','=',$req->mob)->get();
        // print_r($chk->count());
        if($chk->count()>0)
        {
            $otp='1234';
            // $upt=DB::table('otp')->where('MOBILE_NO','=',$req->login_mobile)->update(array('OTP'=>$otp));
            $upt=1;
        }else
        {
            $otp='1234';
            $ins=new otp;
            $ins->MOBILE_NO=$req->mob;
            $ins->OTP=$otp;
            $upt=$ins->save();
        }
        // print_r($upt);
        if($upt)
        {
            return response()->json(['status'=>true,'msg'=>'Otp Sent..!!']);
        }else {
            return response()->json(['status'=>false,'msg'=>'Error..!!']);
        }
    }
    public function verify_otp(Request $req)
    {
        // print_r($req->all());
        $otp=$req->otp;
        // $otp='1234';
        $chk=DB::table('otp')->leftjoin('admin','admin.mobile','otp.MOBILE_NO')
        ->select('admin.*')
        ->where([['admin.mobile','=',$req->mob],['otp.OTP','=',$req->otp],['admin.business_type','=','R'],['admin.status','=','A']])->get();
        $data = array();
        if($chk->count()>0)
        {
            $chk2=DB::table('otp')->leftjoin('admin','admin.mobile','otp.MOBILE_NO')
            ->select('admin.*')
            ->where([['admin.mobile','=',$req->mob],['otp.OTP','=',$req->otp],['admin.business_type','=','R'],['admin.status','=','A']])->get();
            $data = $chk2;
            return response()->json(['status'=>true,'data'=>$data,'msg'=>'Success']);
        }else {
            return response()->json(['status'=>false,'data'=>$data,'msg'=>'Mobile Number does not register with us..!!']);
        }
    }
    public function home(Request $req)
    {
        if(!empty($req->aid))
        {
        $category=category::where([['aid','=',$req->aid],['status','=','A'],['parent_id','=','0']])->get();
        $banner=banner::where([['aid','=',$req->aid],['status','=','A']])->get();
        $feature=DB::table('product_order')
        ->leftjoin('product','product_order.pid','product.id')
        ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `app_wishlist` WHERE product.id=app_wishlist.pid AND app_wishlist.aid='".$req->aid."' AND app_wishlist.cid='".$req->cid."') AS wishlist"))
        ->where([['product.aid','=',$req->aid],['product_order.status','=','A'],['product_order.feature','!=','0'],['product.feature','=','Y']])
        ->orderBy('product_order.feature','ASC')
        ->get();
        $top=DB::table('product_order')
        ->leftjoin('product','product_order.pid','product.id')
        ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `app_wishlist` WHERE product.id=app_wishlist.pid AND app_wishlist.aid='".$req->aid."' AND app_wishlist.cid='".$req->cid."') AS wishlist"))
        ->where([['product.aid','=',$req->aid],['product_order.status','=','A'],['product_order.top','!=','0'],['product.top','=','Y']])
        ->orderBy('product_order.top','ASC')
        ->get();
        $new=DB::table('product_order')
        ->leftjoin('product','product_order.pid','product.id')
        ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `app_wishlist` WHERE product.id=app_wishlist.pid AND app_wishlist.aid='".$req->aid."' AND app_wishlist.cid='".$req->cid."') AS wishlist"))
        ->where([['product.aid','=',$req->aid],['product_order.status','=','A'],['product_order.new','!=','0'],['product.new','=','Y']])
        ->orderBy('product_order.new','ASC')
        ->get();
        
            return response()->json(['status'=>true,'category'=>$category,'banner'=>$banner,'feature'=>$feature,'top'=>$top,'new'=>$new,'msg'=>'Success']);
        }
        else 
        {
            return response()->json(['status'=>false,'msg'=>'Error']);
        }
    }
    public function category_product(Request $req)
    {
        if(isset($req->aid) && isset($req->cat_id) && isset($req->type))
        {
        $product=DB::table('product')
        ->leftjoin('category','category.id','product.cat_id')
        ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `app_wishlist` WHERE product.id=app_wishlist.pid AND app_wishlist.aid='".$req->aid."' AND app_wishlist.cid='".$req->cid."') AS wishlist"))
        ->where([['product.aid','=',$req->aid],['product.status','=','A']]);
        if($req->type=='cat')
        {
            $product=$product->where('product.cat_id','=',$req->cat_id);
        }elseif ($req->type=='sub_cat') {
            $product=$product->where([['product.sub_cat','=',$req->sub_cat],['product.cat_id','=',$req->cat_id]]);
        }
        $product=$product->get();
        $sub_cat=category::where([['aid','=',$req->aid],['status','=','A'],['parent_id','=',$req->cat_id]])->get();
    
        return response()->json(['status'=>true,'product'=>$product,'sub_cat'=>$sub_cat,'msg'=>'Success']);
        }
        else 
        {
            return response()->json(['status'=>false,'msg'=>'Error']);
        }  
    }
    public function feature_product(Request $req)
    {
        if(isset($req->aid))
        {
            if($req->type=='full')
            {
                $feature=DB::table('product_order')
                ->leftjoin('product','product_order.pid','product.id')
                ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `app_wishlist` WHERE product.id=app_wishlist.pid AND app_wishlist.aid='".$req->aid."' AND app_wishlist.cid='".$req->cid."') AS wishlist"))
                ->where([['product.aid','=',$req->aid],['product_order.status','=','A'],['product_order.feature','!=','0'],['product.feature','=','Y']])
                ->orderBy('product_order.feature','ASC')
                ->get();
            }else {
                $feature=DB::table('product_order')
            ->leftjoin('product','product_order.pid','product.id')
            ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `app_wishlist` WHERE product.id=app_wishlist.pid AND app_wishlist.aid='".$req->aid."' AND app_wishlist.cid='".$req->cid."') AS wishlist"))
            ->where([['product.aid','=',$req->aid],['product_order.status','=','A'],['product_order.feature','!=','0'],['product.feature','=','Y']])
            ->orderBy('product_order.feature','ASC')
            ->take(6)
            ->get();
            }
            return response()->json(['status'=>true,'feature'=>$feature,'msg'=>'Success']);
        }
        else 
        {
        return response()->json(['status'=>false,'msg'=>'Error']);
        }
    }
    public function new_product(Request $req)
    {
        if(isset($req->aid))
        {
            if($req->type=='full')
            {
                $new=DB::table('product_order')
                ->leftjoin('product','product_order.pid','product.id')
                ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `app_wishlist` WHERE product.id=app_wishlist.pid AND app_wishlist.aid='".$req->aid."' AND app_wishlist.cid='".$req->cid."') AS wishlist"))
                ->where([['product.aid','=',$req->aid],['product_order.status','=','A'],['product_order.new','!=','0'],['product.new','=','Y']])
                ->orderBy('product_order.new','ASC')
                ->get();
            }else {
                $new=DB::table('product_order')
            ->leftjoin('product','product_order.pid','product.id')
            ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `app_wishlist` WHERE product.id=app_wishlist.pid AND app_wishlist.aid='".$req->aid."' AND app_wishlist.cid='".$req->cid."') AS wishlist"))
            ->where([['product.aid','=',$req->aid],['product_order.status','=','A'],['product_order.new','!=','0'],['product.new','=','Y']])
            ->orderBy('product_order.new','ASC')
            ->take(6)
            ->get();
            }
            return response()->json(['status'=>true,'new'=>$new,'msg'=>'Success']);
        }
        else 
        {
        return response()->json(['status'=>false,'msg'=>'Error']);
        }
    }
    public function top_product(Request $req)
    {
        if(isset($req->aid))
        {
            if($req->type=='full')
            {
                $top=DB::table('product_order')
                ->leftjoin('product','product_order.pid','product.id')
                ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `app_wishlist` WHERE product.id=app_wishlist.pid AND app_wishlist.aid='".$req->aid."' AND app_wishlist.cid='".$req->cid."') AS wishlist"))
                ->where([['product.aid','=',$req->aid],['product_order.status','=','A'],['product_order.top','!=','0'],['product.top','=','Y']])
                ->orderBy('product_order.top','ASC')
                ->get();
            }else {
                $top=DB::table('product_order')
            ->leftjoin('product','product_order.pid','product.id')
            ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `app_wishlist` WHERE product.id=app_wishlist.pid AND app_wishlist.aid='".$req->aid."' AND app_wishlist.cid='".$req->cid."') AS wishlist"))
            ->where([['product.aid','=',$req->aid],['product_order.status','=','A'],['product_order.top','!=','0'],['product.top','=','Y']])
            ->orderBy('product_order.top','ASC')
            ->take(6)
            ->get();
            }
            return response()->json(['status'=>true,'top'=>$top,'msg'=>'Success']);
        }
        else 
        {
        return response()->json(['status'=>false,'msg'=>'Error']);
        }
    }
    public function add_cart(Request $req)
    {
        if(!empty($req->aid))
        {
        $chk=add_cart::where([['aid','=',$req->aid],['cid','=',$req->cid],['pid','=',$req->pid],['qty','=',$req->qty],['color','=',$req->color],['size','=',$req->size]])->get();
        if($chk->count()>0)
        {
            return response()->json(['status'=>false,'msg'=>'Already In Cart']);
        }else
        {
        $chk3=add_cart::where([['aid','=',$req->aid],['cid','=',$req->cid],['pid','=',$req->pid],['color','=',$req->color],['size','=',$req->size]])->get();
        if($chk3->count()>0)
        {
        $result=add_cart::where([['aid','=',$req->aid],['cid','=',$req->cid],['pid','=',$req->pid],['color','=',$req->color],['size','=',$req->size]])->update(array(
        'qty'=>$req->qty,'tax'=>$req->tax,'price'=>$req->price));
        }
        else{
        $ad=DB::table('admin')->select('gst_type')->where('id','=',$req->aid)->get();
        $add=new add_cart;
        $add->aid=$req->aid;        
        $add->cid=$req->cid;
        $add->pid=$req->pid;
        $add->size=$req->size;
        $add->color=$req->color;
        $add->qty=$req->qty;
        $add->tax=$ad[0]->gst_type=='INCLUDED'?'0':$req->tax;
        $add->price=$req->price;
        $add->status='A';
        $add->remark=$req->remark;
        $result=$add->save();
        }
        if($result)
        {
            return response()->json(['status'=>true,'msg'=>'Success']);
        }else {
            return response()->json(['status'=>false,'msg'=>'Error']);
        }
    }
    }
    else {
        return response()->json(['status'=>false,'msg'=>'Invalid']);
        }
    }
    public function cart_list(Request $req)
    {
        $cart_item=DB::table('add_cart_app')
        ->leftjoin('product','add_cart_app.pid','product.id')
        ->leftjoin('admin','add_cart_app.aid','admin.id')
        ->select('add_cart_app.*','product.item_name',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `app_wishlist` WHERE product.id=app_wishlist.pid AND app_wishlist.aid='".$req->aid."' AND app_wishlist.cid='".$req->cid."') AS wishlist"),DB::raw("(SELECT set_details_whole.id FROM set_details_whole WHERE set_details_whole.set_id=product.set_id and set_details_whole.pid=product.id and set_details_whole.size=add_cart_app.size and set_details_whole.color=add_cart_app.color ) as set_id"),'admin.shipping','admin.shipping_price','admin.shipping_free_above',DB::raw("'5' as discount"))
        ->where([['add_cart_app.aid','=',$req->aid],['add_cart_app.cid','=',$req->cid]])->get();
        $shipping_type=DB::table('add_cart_app')
        ->leftjoin('product','add_cart_app.pid','product.id')
        ->leftjoin('admin','add_cart_app.aid','admin.id')
        ->select('admin.shipping')
        ->where([['add_cart_app.aid','=',$req->aid],['add_cart_app.cid','=',$req->cid]])->get();
        $shipping_price=DB::table('add_cart_app')
        ->leftjoin('product','add_cart_app.pid','product.id')
        ->leftjoin('admin','add_cart_app.aid','admin.id')
        ->select('admin.shipping_price')
        ->where([['add_cart_app.aid','=',$req->aid],['add_cart_app.cid','=',$req->cid]])->get();
        $shipping_free=DB::table('add_cart_app')
        ->leftjoin('product','add_cart_app.pid','product.id')
        ->leftjoin('admin','add_cart_app.aid','admin.id')
        ->select('admin.shipping_free_above')
        ->where([['add_cart_app.aid','=',$req->aid],['add_cart_app.cid','=',$req->cid]])->get();
        
        if(!empty($req->aid) && !empty($req->cid))
        {
            
            return response()->json(['status'=>true,'msg'=>'Success','shipping_type'=>$shipping_type->count()>0?$shipping_type[0]->shipping:'','shipping_price'=>$shipping_price->count()>0?$shipping_price[0]->shipping_price:'','shipping_free'=>$shipping_free->count()>0?$shipping_free[0]->shipping_free_above:'','cart_item'=>$cart_item]);
        }else {
            return response()->json(['status'=>false,'msg'=>'Error','cart_item'=>$cart_item]);
        }
    }
    public function remove_cart(Request $req)
    {
        if(!empty($req->id))
        {
            $remove=add_cart::where('id','=',$req->id)->delete();
            if($remove)
            {
                return response()->json(['status'=>true,'msg'=>'Success']);
            }else {
                return response()->json(['status'=>false,'msg'=>'Try Again']);
            }
        }
        else {
            return response()->json(['status'=>false,'msg'=>'Error']);
        }
    }

    public function add_wishlist(Request $req)
    {
        if(!empty($req->aid))
        {
        $chk=wishlist::where([['aid','=',$req->aid],['cid','=',$req->cid],['pid','=',$req->pid]])->get();
        if($chk->count()>0)
        {
            $chk=wishlist::where([['aid','=',$req->aid],['cid','=',$req->cid],['pid','=',$req->pid]])->delete();
            return response()->json(['status'=>true,'msg'=>'Removed..!!']);
        }else
        {
            $add=new wishlist;
            $add->aid=$req->aid;        
            $add->cid=$req->cid;
            $add->pid=$req->pid;
            $add->status='A';
            $add->remark=$req->remark;
            $result=$add->save();
            if($result)
            {
                return response()->json(['status'=>true,'msg'=>'Success']);
            }else {
                return response()->json(['status'=>false,'msg'=>'Error']);
            }
        }
    }
    else {
        return response()->json(['status'=>false,'msg'=>'Invalid']);
        }
    }
    public function wishlist(Request $req)
    {
        $cart_item=DB::table('app_wishlist')
        ->leftjoin('product','app_wishlist.pid','product.id')
        ->select('app_wishlist.*','product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT IF(COUNT(*)>0,'true','false') FROM `app_wishlist` WHERE product.id=app_wishlist.pid AND app_wishlist.aid='".$req->aid."' AND app_wishlist.cid='".$req->cid."') AS wishlist"))
        ->where([['app_wishlist.aid','=',$req->aid],['app_wishlist.cid','=',$req->cid]])->get();
        if(!empty($req->aid) && !empty($req->cid))
        {
            return response()->json(['status'=>true,'msg'=>'Success','wishlist_item'=>$cart_item]);
        }else {
            return response()->json(['status'=>false,'msg'=>'Error','wishlist_item'=>$cart_item]);
        }
    }
    public function color_size(Request $req)
    {
        if (!empty($req->set_id) && !empty($req->aid)) 
        {    
            $color_size=DB::table('set_details_whole')
            ->select('set_details_whole.color as color','set_details_whole.size as size','set_details_whole.qty as qty')
            ->where([['aid','=',$req->aid],['set_id','=',$req->set_id]])
            ->get();
            return response()->json(['status'=>true,'msg'=>'Success','color_size'=>$color_size]);
        } else {
            return response()->json(['status'=>false,'msg'=>'Error','color_size'=>$color_size]);
        }
        
    }
    
    public function get_attribute(Request $req)
    {
        $data=array();
        if(!empty($req->att_id) && !empty($req->aid))
        {
            $sub_cat=DB::table('prod_attribute')
            ->select('prod_attribute.sub_cat as sub_cat')
            ->where([['att_id','=',$req->att_id],['aid','=',$req->aid]])
            ->groupBy('sub_cat')
            ->get();
            foreach ($sub_cat as $key => $value) {
                $att=prod_attribute::where([['att_id','=',$req->att_id],['aid','=',$req->aid],['sub_cat','=',$value->sub_cat]])
                ->get();       
                $data[]=array('main_cat'=>$value->sub_cat,'att'=>$att);
            }
            return response()->json(['status'=>true,'msg'=>'Success','attribute'=>$data]);
        }else {
            return response()->json(['status'=>false,'msg'=>'Error','attribute'=>$data]);
        }
    }

    public function place_order(Request $req)
    {
        if(!empty($req->aid) && !empty($req->cid))
        {
            $oid=order::where('aid','=',$req->aid)->orderBy('order_id','DESC')->get();
            $order_id=$oid->count()>0?($oid[0]->order_id)+1:'1000';
            $total_tax=0;
            $final_amt=0;
            $total_disc=0;
            $total_qty=0;
            $value=json_decode($req->cart_item,true);
            for ($i=0; $i <sizeof($value) ; $i++) { 
                
                $det_o=new order_detail;
                $det_o->aid=$req->aid;
                $det_o->cid=$req->cid;
                $det_o->order_id=$order_id;
                $det_o->design_no=$value[$i]['pid'];
                $det_o->set_id=$value[$i]['set_id'];
                $det_o->qty=$value[$i]['qty'];
                $det_o->price=$value[$i]['price'];
                $det_o->discount='0';//$value[$i]['discount'];
                $det_o->tax=$value[$i]['tax'];
                $det_o->amount=($value[$i]['price']+$value[$i]['tax']);
                $det_o->status='Pending';
                $det_o->remark=$value[$i]['remark'];
                $res=$det_o->save();
                $total_tax+=$value[$i]['tax'];
                $final_amt+=($value[$i]['price']+$value[$i]['tax']);
                $total_disc='0';
                $total_qty=$value[$i]['qty'];
                if($res)
                {
                $del_add_to_cart=add_cart::where([['aid','=',$req->aid],['cid','=',$req->cid],['pid','=',$value[$i]['pid']]])->delete();
                }
            }
            if($res)
            {
            $od=new order;
            $od->aid=$req->aid;
            $od->cid=$req->cid;
            $od->order_id=$order_id;
            $od->owner_name=$req->owner_name;
            $od->firm_name=$req->firm_name;
            $od->mobile=$req->mobile;
            $od->quantity=$total_qty;
            $od->disc_amt=$total_disc;
            $od->gst_total=$total_tax;
            $od->amount=$final_amt;
            $od->payment_mode='Pending';
            $od->status='Pending';
            $od->remark=$req->remark;
            $result=$od->save();
            }
            if($result)
            {
                return response()->json(['status'=>true,'msg'=>'Success','order_id'=>$order_id,'amount'=>$final_amt]);
            }
            else {
                return response()->json(['status'=>false,'msg'=>'Insertion Error']);
            }
        }else {
            return response()->json(['status'=>false,'msg'=>'Error']);
        }
    }
    public function get_order(Request $req)
    {
        $data=array();
        if(!empty($req->aid) && !empty($req->cid))
        {
            $orders=order::where([['aid','=',$req->aid],['cid','=',$req->cid]])->get();
            foreach ($orders as $key => $value) {
                $det_order=DB::table('detail_order')
                ->leftjoin('product','detail_order.design_no','product.id')
                ->select('product.item_name as item_name','detail_order.*')
                ->where([['detail_order.aid','=',$req->aid],['detail_order.cid','=',$req->cid],['detail_order.order_id','=',$value->order_id]])
                ->get();
                $data[]=array(  "id"=> $value->id,
                                "aid"=> $value->aid,
                                "cid"=> $value->cid,
                                "order_id"=>$value->order_id,
                                "owner_name"=> $value->owner_name,
                                "firm_name"=> $value->firm_name,
                                "mobile"=> $value->mobile,
                                "quantity"=> $value->quantity,
                                "disc_amt"=> $value->disc_amt,
                                "gst_total"=> $value->gst_total,
                                "amount"=>$value->amount,
                                "payment_mode"=> $value->payment_mode,
                                "status"=> $value->status,
                                "remark"=> $value->remark,
                                "buyer_remark"=>$value->buyer_remark,
                                "updated_at"=> $value->updated_at,
                                "created_at"=> $value->created_at,
                                "order_detail"=>$det_order);
            }
            return response()->json(['status'=>true,'msg'=>'Success','detail'=>$data]);
        
        }else {
            return response()->json(['status'=>false,'msg'=>'Error','detail'=>$data]);
        }
    }
    public function color_size_test(Request $req)
    {
        $data=array();
        if (!empty($req->set_id) && !empty($req->aid)) 
        {    
            $size=DB::table('set_details_whole')
            ->select('set_details_whole.size as size')
            ->where([['aid','=',$req->aid],['set_id','=',$req->set_id]])
            ->groupBy('set_details_whole.size')
            ->get();
            foreach ($size as $key => $value) {
                $color=DB::table('set_details_whole')
                ->select('set_details_whole.color as color')
                ->where([['aid','=',$req->aid],['set_id','=',$req->set_id],['size','=',$value->size]])
                ->get();
                $data[]=array("size_s"=>$value->size,
                            "color_s"=>$color);
            }
            return response()->json(['status'=>true,'msg'=>'Success','color_size'=>$data]);
        } else {
            return response()->json(['status'=>false,'msg'=>'Error','color_size'=>$data]);
        }
        
    }
    public function payment_status(Request $req)
    {
        $pay=new payment;
        $pay->cid=$req->cid;
        $pay->order_id=$req->order_id;
        $pay->payment_id=$req->payment_id;
        $pay->razorpay_id=$req->razorpay_id;
        $pay->payment_mode=$req->payment_mode;
        $pay->payment_status=$req->payment_status;
        $res=$pay->save();
        if($res)
        {
            $upd=order::where([['aid','=',$req->aid],['order_id','=',$req->order_id]])
            ->update(array('status'=>'Pending','payment_mode'=>$req->payment_mode));
        }
        if($upd)
        {
            return response()->json(['status'=>true,'msg'=>'Success']);
        } else {
            return response()->json(['status'=>false,'msg'=>'Error']);
        }
    }
    
    public function banner(Request $req)
    {
        $data=array();
        if(!empty($req->aid))
        {
        $video=DB::table('banner')->select('img')->where([['aid','=',$req->aid],['title','=','Video Banner']])
        ->orderBy('id','DESC')
        ->limit(1)
        ->get();
        $top=DB::table('banner')->select('img')->where([['aid','=',$req->aid],['title','=','Top Banner']])
        ->orderBy('id','DESC')
        ->limit(1)
        ->get();
        $middle=DB::table('banner')->select('img')->where([['aid','=',$req->aid],['title','=','Middle Banner']])
        ->orderBy('id','DESC')
        ->limit(1)
        ->get();
        $last=DB::table('banner')->select('img')->where([['aid','=',$req->aid],['title','=','Last Banner']])
        ->orderBy('id','DESC')
        ->limit(1)
        ->get();
        $discount=DB::table('banner')->select('img')->where([['aid','=',$req->aid],['title','=','Discount Banner']])
        ->orderBy('id','DESC')
        ->limit(1)
        ->get();
       $data=array('top_banner'=>$top,
                    'middle_banner'=>$middle,
                    'last_banner'=>$last,
                    'discount_banner'=>$discount,
                    'video_banner'=>$video); 
                
                return response()->json(['status'=>true,'msg'=>'Success','detail'=>$data]);
            
            }else {
                return response()->json(['status'=>false,'msg'=>'Error','detail'=>$data]);
            }
    }
}
