<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("d-m-Y");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $cid = $_POST['cust_id'];
    $aid = $_POST['admin_id'];

    $o_name=$_POST['owner_name'];
    $f_name=$_POST['firm_name'];
    $mobile=$_POST['mobile'];
    $city = $_POST['city'];
    $t_amt = $_POST['t_amt'];
    // $agent = $_POST['agent'];
    $buyer_remark=$_POST['buyer_remark'];
    $sub_total = $_POST['sub_total'];
    $gst_total = $_POST['gst_total'];
    $disc_amt = $_POST['dis_amt'];
    $booking_station = $_POST['booking_station'];
    $transport = $_POST['transport'];
    $agent_name = $_POST['agent_name'];
    $payment_mode = $_POST['payment_mode'];

    $mydata1=$_POST['mydata'];
    $myarray=json_decode($mydata1);
    $chk=mysqli_query($con,"SELECT * FROM `manage_order` where aid='$aid'");
    $order_id='LOTUS/2020-21/'.(mysqli_num_rows($chk)+1);
    foreach ($myarray as $value) {
        $qty=$value->qty;
        $amt=$value->amt;
        $packing=$value->packing;
        $price=$value->sale_price;
        $tax=$value->tax;
        $disc=$value->discount;

        // $qty=$qty1*$packing;
        $amount = $price*$qty*$packing;
        $item = $value->pid;
        $set_id=$value->set_id;
        $t_qty=$t_qty+$qty;
        // $t_amt=$t_amt+$amt;
        $insert=mysqli_query($con,"INSERT INTO `detail_order`(`aid`,`cid`, `order_id`, `design_no`, `set_id`, `packing`, `qty`, `price`,`discount`, `tax`, `amount`, `date`) VALUES ('$aid','$cid','$order_id','$item','$set_id','$packing','$qty','$price','$disc','$tax','$amount','$dj')");
    }
    if($insert)
    {
        $m_insert=mysqli_query($con,"INSERT INTO `manage_order`(`aid`,`cid`, `order_id`, `owner_name`, `firm_name`, `mobile`, `quantity`, `disc_amt`,`gst_total`,`amount`, `city`,`transport`,`payment_mode`,`agent_name`, `date`, `buyer_remark`,`sub_total`,`booking_station`) VALUES ('$aid','$cid','$order_id','$o_name','$f_name','$mobile','$t_qty','$disc_amt','$gst_total','$t_amt','$city','$transport','$payment_mode','$agent_name','$dj','$buyer_remark','$sub_total','$booking_station')");

        $del_add_cart=mysqli_query($con,"DELETE FROM `add_cart` WHERE cid = '$cid'");
    }

    if($m_insert){
      $json = array(
          "status"=>true,
          "msg"=>"Success"
      );
    }
       else{
        $json = array(
            "status"=>false,
            "msg"=> mysqli_error($con)
        );
    } 
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>