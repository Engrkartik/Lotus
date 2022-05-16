<?php 
include '../includes/connect.php';
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $key = mysqli_real_escape_string($con,$_POST['filter']);
$bid = mysqli_real_escape_string($con,$_POST['bid']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$mobile = mysqli_real_escape_string($con,$_POST['mobile']);
$address = mysqli_real_escape_string($con,$_POST['address']);
$description = mysqli_real_escape_string($con,$_POST['description']);
$table_no = mysqli_real_escape_string($con,$_POST['table_no']);
$waiter_id = mysqli_real_escape_string($con,$_POST['waiter_id']);
$total = mysqli_real_escape_string($con,$_POST['total']);
$order = $_POST['order'];
$someArray = json_decode($order);
$net_amt = $_POST['net_amt'];
$net_gst = $_POST['gst'];

$chk=mysqli_query($con,"SELECT * FROM `orders` WHERE bid = '$bid'");
$order_id='2020-21/'.(mysqli_num_rows($chk)+1);

$ii = mysqli_query($con,"SELECT * FROM `orders` WHERE table_no = '$table_no' and bid = '$bid' AND status = 'pending'");
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
            $itemid = $value->item_id;
            $price=round(( $value->item_price),2);
            $itemcat= $value->item_cat_id;
            $itemremark = $value->item_remark;
            // $total1 = round(($qty * $price),2);
            // $gst = round(($value->gst),2);
            // $gst_amt =round(((($total)*$gst)/100),2);
            // $final_total = round(($total + $gst_amt ),2);
            $t_qty = $t_qty+$qty;
            
            $query = mysqli_query($con, "INSERT INTO `order_details`(`order_id`, `item_id`, `quantity`, `price`,`remark`) VALUES ('$order_id','$itemid','$qty','$price','$itemremark')");
            $chk1 = mysqli_num_rows($query);
        }

        $query1 = mysqli_query($con,"INSERT INTO `orders`(`order_id`, `bid`, `table_no`,`waiter_id` ,`customer_name`, `mobile`, `address`, `description`, `date`, `items`, `total`, `gst`, `total_amt`) VALUES ('$order_id','$bid','$table_no','$waiter_id','$name','$mobile','$address','$description','$dj','$t_qty','$total','$net_gst','$net_amt')");

        if ($query1)
        {
                        
            $delete = mysqli_query($con,"DELETE FROM `save_to_later` WHERE table_no = '$table_no' and bid = '$bid'");
            $json = array(
                "status" => true,
                "msg"  => "Order Placed Successfully"
            );
        }
        else{
            $json = array(
                "status" => false,
                "msg" => "Error"
            );
        } 
}
else{
	$upt=mysqli_query($con,"SELECT * FROM `tables` WHERE `id`='$table_no' and `status`='empty' and `branch`='$bid'");
		if(mysqli_num_rows($upt)>0)
		{
			$upd=mysqli_query($con,"UPDATE `tables` SET `status`='occupied' WHERE `id`='$table_no' and `branch`='$bid'");
		}
        $json = array(
            "status" => false ,
            "msg" => "Already in orders"
        );
    }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>