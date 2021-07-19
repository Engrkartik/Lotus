<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use Carbon\Carbon;
use App\Models\EndUser;
use App\Models\add_cart;
use App\Models\WishList;
use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderDetail;
use App\Models\set_detail_whole;
use Razorpay\Api\Api;

use DB;
use Session;
use Redirect;
use View;
use compact;
use Exception;

class OrderController extends Controller
{
    //


/////////////////////////////////////////////////////checkout////////////////////////////////////////////////
    public function outCheck()
    {   
        if(session()->has('uid'))
        {
            $cid = Session::get('uid');
            $aid = 2;
            $charges = '';

            $userDetails = EndUser::find($cid);

            $totalamt = add_cart::where('cid',$cid)
            			->select(DB::raw('sum(qty * price) as total'),DB::raw('sum(qty) as totalqty'))
            			->first();    
            
            $totalmrp = add_cart::where('cid',$cid)
                        ->select(DB::raw('sum(add_cart.qty * product.mrp) as totalmrp'))
                        ->leftJoin('product','add_cart.pid','=','product.id')
                        ->get(); 

            $totaldsc = add_cart::where('cid',$cid)
                        ->select(DB::raw('sum(add_cart.qty * product.discount) as totaldsc'))
                        ->leftJoin('product','add_cart.pid','=','product.id')
                        ->get(); 
            // SELECT shipping, shipping_price, shipping_free_above FROM `admin` where id = 2
            $shippingDetail = DB::table('admin')
                        ->select('shipping','shipping_price','shipping_free_above')
                        ->where('id',$aid)->first();

            if($shippingDetail->shipping=="Free"){
                $charges = 0;
            }
            elseif ($shippingDetail->shipping=="Order") {
                $charges = $shippingDetail->shipping_price;
            }
            elseif ($shippingDetail->shipping=="Item") {
                $charges = $shippingDetail->shipping_price * $totalamt->totalqty;
            }
            // echo $charges;
            // die();  
            return View::make('checkout',compact('userDetails','totalamt','totalmrp','totaldsc','charges'));
            
        }
        else{

            return View::make('login');
        }
        // return view('checkout');
    }
//////////////////////////////////////////////////////update cart///////////////////////////////////////////////
    public function updateCheck()
    {
            $totqty = $_POST['totqty'];
            $totpro = $_POST['totpro'];
            // $allotqty = array_values($totqty);
            // $allotpro = array_values($totpro);
            // $canada = $totpro[1];
        //     $get_cart = '';
            for($i=0; $i<count($totqty); $i++){

                $get_cart = add_cart::find($totpro[$i]);
                $update_cart = add_cart::where('id',$totpro[$i])
                                ->update(['qty' => $totqty[$i]]);
                // $test = $totpro[$i];
            }
        if($get_cart){
            return 'Success';
        }   
        else{
           return 'error';
        }    // die();
            // return "canada";
    }
/////////////////////////////////////////////////////get payment////////////////////////////////////////////////
    public function getPayment()
    {
        return view('checkout-payment');
    }

/////////////////////////////////////////////////////feedback////////////////////////////////////////////////
    public function feedback()
    {
        return view('feedback');
    }

/////////////////////////////////////////////////////order////////////////////////////////////////////////
    public function order()
    {
    	// if(session()->has('uid'))
     //    {

        $data=array();
    	$cid = Session::get('uid');

    	$orderId = Order::where('cid',$cid)->where('status','!=',"Pending")->orderBy('id','DESC')->get();

    	$detailOrder = '';

    	foreach ($orderId as $key => $value) {
    		# code...
    		$detailOrder = OrderDetail::where('order_id',$value->order_id)->where('cid',$cid)
    						->where('detail_order.status','!=',"Pending")
    						->select('detail_order.id','detail_order.status','detail_order.qty','product.item_name','product.descrpt','detail_order.price','set_details_whole.size','set_details_whole.color','prod_img.img_url')
	    					->leftJoin('set_details_whole','detail_order.set_id','=','set_details_whole.id')
	    					->leftJoin('product','set_details_whole.pid','=','product.id')
	    					->leftJoin('prod_img','set_details_whole.pid','=','prod_img.img_id')
	    					->groupBy('detail_order.id')->get();

	    	$data[]=array( "order_id"=>$value->order_id,
	    					"status"=>$value->status,
	    					"updated_at"=>$value->updated_at,
	    					"order_details"=>$detailOrder);

    	}
    	// echo $detailOrder;
    	// die();
        return View::make('orders',compact('data'));
    // }
    // else{
            $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            Session::put('urlval',$url);
            
    //         return View::make('login');
    //     }
    	// return view('orders');
    }
//////////////////////////////////////////////////////razorpay///////////////////////////////////////////////////
    public function payment(Request $request){

    	$cid = Session::get('uid');
        $aid = 2;
        $charges = '';
        $qtytotal = '';
    	// SELECT sum(add_cart.price), SUM(add_cart.qty),SUM(add_cart.qty * product.discount) as disc,SUM(add_cart.tax) as tax,users.name,users.mobile FROM `add_cart` left join users on add_cart.cid = users.id LEFT JOIN product on add_cart.pid = product.id WHERE cid = 2 
        $id='';

        $amount = add_cart::where('cid',$cid)
                    ->select(DB::raw('SUM(add_cart.price * add_cart.qty) as price'))
                    ->first();
        
        $userdetails = EndUser::find($cid);
        
           	$getOrder = add_cart::where('cid',$cid)
           				->leftJoin('users','add_cart.cid','=','users.id')
           				->leftJoin('product','add_cart.pid','=','product.id')
           				->get(array(
                                DB::raw('SUM(add_cart.price * add_cart.qty) as price'),
                                DB::raw('SUM(add_cart.qty) as qty'),
                                DB::raw('SUM(add_cart.qty * product.discount) as disc'),
                                DB::raw('SUM(add_cart.tax) as tax'),
                                DB::raw('users.name'),
                                DB::raw('users.mobile'),
                                DB::raw('product.aid'),

                              ));

           	$orderCount = Order::latest('order_id')->first();
           	$orderC = $orderCount->order_id + 1;
			
            foreach ($getOrder as $key => $value) {
                $qtytotal = $value->qty;
            	# code...
            	$order = new Order;
            	$order->aid = $value->aid;
            	$order->cid = $cid;
            	$order->order_id = $orderC;
            	$order->owner_name = $value->name;
            	$order->mobile = $value->mobile;
            	$order->quantity = $value->qty;
            	$order->disc_amt = $value->disc;
            	$order->gst_total = $value->tax;
            	$order->amount = $value->price;
            	$order->status = 'Pending';
            	$order->save();
            }
    	    
            $OrderDetail = add_cart::where('cid',$cid)
                        ->select('add_cart.price', 'add_cart.qty','add_cart.tax' ,'add_cart.color','add_cart.size','product.aid','product.id','add_cart.id as cart_id')
                        ->leftJoin('users','add_cart.cid','=','users.id')
                        ->leftJoin('product','add_cart.pid','=','product.id')
                        ->get();
            
            foreach ($OrderDetail as $key => $val) {
                # code...
            $checkset = set_detail_whole::select('id')
                            ->where('pid',$val->id)
                            ->where('color',$val->color)
                            ->where('size',$val->size)
                            ->first();

                $detail = new OrderDetail;
                $detail->aid = $val->aid;
                $detail->cid = $cid;
                $detail->order_id = $orderC;
                $detail->set_id = $checkset->id;
                $detail->qty = $val->qty;
                $detail->price = $val->price;
                $detail->tax = $val->tax;
                $detail->amount = $val->price + $val->tax;
                $detail->status = 'Pending';
                $detail->save();

            $deleteCart = add_cart::find($val->cart_id);
            $deleteCart->delete();

            }

        $shippingDetail = DB::table('admin')
                        ->select('shipping','shipping_price','shipping_free_above')
                        ->where('id',$aid)->first();

            if($shippingDetail->shipping=="Free"){
                $charges = 0;
            }
            elseif ($shippingDetail->shipping=="Order") {
                $charges = $shippingDetail->shipping_price;
            }
            elseif ($shippingDetail->shipping=="Item") {
                $charges = $shippingDetail->shipping_price * $qtytotal;
            }

        $money1 = $amount->price + $charges;
        $money = $money1 * 100;

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $order  = $api->order->create(array('receipt' => '123', 'amount' => $money, 'currency' => 'INR')); // Creates order
        $orderId = $order['id']; 

        $user_pay = new Payment();
    
        $user_pay->cid = $cid;
        $user_pay->order_id = $orderC;
        $user_pay->payment_id = $orderId;
        $user_pay->payment_status = 'Pending';
        $user_pay->amount = $money1;
        $user_pay->save();


        $data = array(
            'order_id' => $orderId,
            'amount' => $money,
            'mobile' => $userdetails->mobile,
            'email' => $userdetails->email
        );
        // echo $data->amount;
        // die();
        Session::put('order_id', $orderId);
        // Session::put('amount' , $money);
        // Session::put('mobile' , $userdetails->mobile);

       return redirect('checkout-payment')->with('data', $data);
        // return redirect()->route('home')->with('data', $data);
    }

    public function index()
    {        
        return view('razorpayView');
    }
    
    public function pay(Request $request){
        $data = $request->all();
        // dd($data);
        // die();
        $user = Payment::where('payment_id', $data['razorpay_order_id'])->first();
        // $user->payment_done = true;
        $user->razorpay_id = $data['razorpay_payment_id'];
        $user->payment_status = "Confirm";
        
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        

        try{
        $attributes = array(
             'razorpay_signature' => $data['razorpay_signature'],
             'razorpay_payment_id' => $data['razorpay_payment_id'],
             'razorpay_order_id' => $data['razorpay_order_id']
        );
        $order = $api->utility->verifyPaymentSignature($attributes);
        $success = true;
    }catch(SignatureVerificationError $e){

        $succes = false;
    }

        
    if($success){
        $user->save();
        $razor = $user->id;
        return redirect('/order-details')->with('razor',$razor);
        // return View::make('order-details',compact('razor'));

    }
    else{

        return redirect()->route('order-canc');
    }
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    // public function store(Request $request)
    // {
    //     $input = $request->all();
  
    //     $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
    //     $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
    //     if(count($input)  && !empty($input['razorpay_payment_id'])) {
    //         try {
    //             $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
    //         } catch (Exception $e) {
    //             return  $e->getMessage();
    //             Session::put('error',$e->getMessage());
    //             return redirect()->back();
    //         }
    //     }
          
    //     Session::put('success', 'Payment successful');
    //     return redirect()->back();
    // }

    ///////////////////////////////////////////////////////order-details///////////////////////////////////////////////////////

    public function orderDetails(Request $req)
    {
    	// SELECT detail_order.id, product.item_name,product.descrpt,detail_order.price,set_details_whole.size,set_details_whole.color,prod_img.img_url FROM `detail_order` LEFT JOIN set_details_whole on detail_order.set_id = set_details_whole.id LEFT JOIN product on set_details_whole.pid = product.id LEFT JOIN prod_img on prod_img.img_id = set_details_whole.pid WHERE detail_order.order_id = '1044' GROUP BY detail_order.id
    	$orderId = Session::get('order_id');

    	$findorderId = Payment::where('payment_id',$orderId)->select('order_id','cid','amount')->first();

    	$update_order = Order::where('order_id', $findorderId->order_id)
            			->update(['status' => "Confirm"]);

        $update_details = OrderDetail::where('order_id', $findorderId->order_id)
        					->update(['status'=>"Confirm"]);

    	$detail_order = OrderDetail::where('order_id',$findorderId->order_id)
    					->select('detail_order.id','detail_order.qty','product.item_name','product.descrpt','detail_order.price','set_details_whole.size','set_details_whole.color','prod_img.img_url')
    					->leftJoin('set_details_whole','detail_order.set_id','=','set_details_whole.id')
    					->leftJoin('product','set_details_whole.pid','=','product.id')
    					->leftJoin('prod_img','set_details_whole.pid','=','prod_img.img_id')
    					->groupBy('detail_order.id')->get();

    	$user_det = EndUser::find($findorderId->cid);

    	$orderPrice = Order::where('order_id',$findorderId->order_id)->first();
        // return view('order-details');
        return View::make('order-details',compact('detail_order','user_det','findorderId','orderPrice'));

    }
//////////////////////////////////////////////////////order cancel//////////////////////////////////////////////////////

    public function cancelOrder(Request $req)
    {
    	// SELECT detail_order.id, set_details_whole.pid, set_details_whole.size, set_details_whole.color FROM `detail_order` LEFT JOIN set_details_whole on detail_order.set_id = set_details_whole.id WHERE detail_order.id = '67'
    	$id = $req->id;
    	$aid = 2;
    	$product = OrderDetail::where('detail_order.id',$id)
    			->select('detail_order.id','set_details_whole.pid','set_details_whole.size','set_details_whole.color')
    			->leftJoin('set_details_whole','detail_order.set_id','=','set_details_whole.id')
    			->first();
    	// echo $product->pid;
    	// die();
    	$data = DB::table('product')
            ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"))
            ->where([['product.aid','=',$aid],['product.id','=',$product->pid]])
            ->orderBy('product.id','DESC')
            ->first();
        // return view('cancel-order');
        return View::make('cancel-order',compact('data','product'));    
    }

//////////////////////////////////////////////////////order cancel//////////////////////////////////////////////////////

    public function cancelOrder2(Request $req)
    {
    	$id = $req->id;
        $aid = 2;
        $one = 0;
    	$updatedetail = OrderDetail::where('id',$id)
              		->update(['status' => "Cancel"]);
    	$product = OrderDetail::where('detail_order.id',$id)
    			->select('detail_order.order_id','set_details_whole.pid','set_details_whole.size','set_details_whole.color')
    			->leftJoin('set_details_whole','detail_order.set_id','=','set_details_whole.id')
    			->first();
    	$checkOrder = OrderDetail::where('order_id',$product->order_id)
    					->select('status')
    					->get();
    	$count = count($checkOrder);
    	foreach ($checkOrder as $key => $value) {
    		if($value->status=="Cancel"){
    			$one +=1;
    		}
		}
		if ($count==$one) {
			$updateOrder = Order::where('order_id',$product->order_id)
              		->update(['status' => "Cancel"]);
		}
    	$data = DB::table('product')
            ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img ORDER BY prod_img.id ASC LIMIT 1) as img_url"))
            ->where([['product.aid','=',$aid],['product.id','=',$product->pid]])
            ->orderBy('product.id','DESC')
            ->first();		
        // return view('cancel-order2');
        return View::make('cancel-order2',compact('data','product'));
    }
}
