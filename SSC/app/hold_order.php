<?php 
include '../includes/connect.php';
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){
$key = mysqli_real_escape_string($con,$_POST['filter']);
$bid = mysqli_real_escape_string($con,$_POST['bid']);
$waiter_id = mysqli_real_escape_string($con,$_POST['waiter_id']);
$table_no = mysqli_real_escape_string($con,$_POST['table_no']);
$order = $_POST['order'];
$someArray = json_decode($order);
$net_amt = $_POST['net_amt'];
$net_gst = $_POST['gst'];

if($key == "insert"){
$ii = mysqli_query($con,"SELECT * from save_to_later where table_no = '$table_no' and bid = '$bid'");
    $isAvlbl = mysqli_num_rows($ii);
    if($isAvlbl<1)
    {
        $upt=mysqli_query($con,"SELECT * FROM `tables` WHERE `id`='$table_no' and `status`='empty' and `branch`='$bid'");
		if(mysqli_num_rows($upt)>0)
		{
			$upd=mysqli_query($con,"UPDATE `tables` SET `status`='occupied' WHERE `id`='$table_no' and `branch`='$bid'");
		}
    foreach($someArray as $value)
    { 
        $qty = $value->item_qty;
        $remark = $value->item_remark;
        $itemid = $value->item_id;
        $price=round(( $value->item_price),2);
        $itemcat= $value->item_cat_id;
        $total = round(($qty * $price),2);
        $gst = round(($value->gst),2);
        $gst_amt =round(((($total)*$gst)/100),2);
        $final_total = round(($total + $gst_amt ),2);
        $t_qty = $t_qty+$qty;
        
        $query = mysqli_query($con, "INSERT INTO `save_to_later`(`bid`, `waiter_id`, `item_id`, `cat_id`, `qty`, `price`, `table_no`, `net_amt`, `gst_amt`, `date`,`remark`) VALUES ('$bid','$waiter_id','$itemid','$itemcat','$qty','$price','$table_no','$net_amt','$net_gst','$dj','$remark')");
        // $chk = mysqli_num_rows($query);
    }

    if ($query)
    {
                    
        // $delete = mysqli_query($con,"DELETE FROM `save_to_later` WHERE table_no = '$table_no' and bid = '$bid'");
        $json = array(
            // "count"  => $chk,
            "status" =>true,
            "msg"=> "Order added Successfully"
        );
    }
    else{
        $json = array(
            // "count"=> $chk,
            "status" =>false,
            "msg"    =>"Error, Not Added To Cart"
        );
    } 
}else{
	$upt=mysqli_query($con,"SELECT * FROM `tables` WHERE `id`='$table_no' and `status`='empty' and `branch`='$bid'");
		if(mysqli_num_rows($upt)>0)
		{
			$upd=mysqli_query($con,"UPDATE `tables` SET `status`='occupied' WHERE `id`='$table_no' and `branch`='$bid'");
		}
        $json = array(
            "status" => false ,
            "msg" => "Already in Save to later"
        );
    }
}
if($key=="update"){

// $ii = mysqli_query($con,"SELECT * from save_to_later where table_no = '$table_no' and bid = '$bid'");
//     $isAvlbl = mysqli_num_rows($ii);
//     if($isAvlbl<1)
//     {
        // $upt=mysqli_query($con,"SELECT * FROM `tables` WHERE `id`='$table_no' and `status`='empty' and `branch`='$bid'");
        // if(mysqli_num_rows($upt)>0)
        // {
        //     $upd=mysqli_query($con,"UPDATE `tables` SET `status`='occupied' WHERE `id`='$table_no' and `branch`='$bid'");
        // }
    foreach($someArray as $value)
    { 
        $qty = $value->item_qty;
        $remark = $value->item_remark;
        $itemid = $value->item_id;
        $price=round(( $value->item_price),2);
        $itemcat= $value->item_cat_id;
        $total = round(($qty * $price),2);
        $gst = round(($value->gst),2);
        $gst_amt =round(((($total)*$gst)/100),2);
        $final_total = round(($total + $gst_amt ),2);
        $t_qty = $t_qty+$qty;
        
        $ii = mysqli_query($con,"SELECT * from save_to_later where table_no = '$table_no' and bid = '$bid' AND item_id = '$itemid'");
        $isAvlbl = mysqli_num_rows($ii);

        if($isAvlbl>0){
            $query1 = mysqli_query($con,"UPDATE `save_to_later` SET `qty`='$qty' WHERE bid = '$bid' AND table_no = '$table_no' AND item_id = '$itemid'"); 
        }else{
            $query1 = mysqli_query($con, "INSERT INTO `save_to_later`(`bid`, `waiter_id`, `item_id`, `cat_id`, `qty`, `price`, `table_no`, `net_amt`, `gst_amt`, `date`,`remark`) VALUES ('$bid','$waiter_id','$itemid','$itemcat','$qty','$price','$table_no','$net_amt','$net_gst','$dj','$remark')");
        }// $chk = mysqli_num_rows($query);
    }

    if ($query1)
    {           
        // $delete = mysqli_query($con,"DELETE FROM `save_to_later` WHERE table_no = '$table_no' and bid = '$bid'");
        $json = array(
            // "count"  => $chk,
            "status" =>true,
            "msg"=> "Order added Successfully"
        );
    }
    else{
        $json = array(
            // "count"=> $chk,
            "status" =>false,
            "msg"    =>"Error, Not Added To Cart"
        );
    }
}
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>