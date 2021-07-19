<?php 
include '../includes/connect.php';
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$oid = mysqli_real_escape_string($con,$_POST['order_id']);
$item_id = mysqli_real_escape_string($con,$_POST['item_id']);
$id = mysqli_real_escape_string($con,$_POST['id']);
$query=mysqli_query($con,"SELECT order_details.*,items.name as item_name FROM `orders` LEFT JOIN order_details ON order_details.order_id=orders.order_id LEFT JOIN items ON items.id=order_details.item_id where order_details.order_id='$oid' and order_details.item_id='$item_id' and order_details.id = '$id'");
if(mysqli_num_rows($query)>0) 
{
    $upt=mysqli_query($con,"UPDATE `order_details` SET `status`='Delivered' WHERE order_details.order_id='$oid' and order_details.item_id='$item_id' and order_details.id = '$id'");
    
    if($upt)
    {
 //        $sql1 = mysqli_query($con, "SELECT * FROM order_details WHERE order_id = '$oid'");
	// $sql2 = mysqli_query($con, "SELECT * FROM order_details WHERE order_id = '$oid' and status='Delivered'");
	// $order_count=mysqli_num_rows($sql1);
	// $order_count2=mysqli_num_rows($sql2);
 //    if($order_count2==$order_count)
 //    {
 //        $sql3 = mysqli_query($con, "UPDATE `orders` SET `status`='delivered' WHERE `order_id`='$oid'");
 //        $upt=mysqli_query($con,"SELECT * FROM `tables` LEFT JOIN orders ON orders.table_no=tables.id WHERE orders.bid=tables.branch AND orders.order_id='$oid' and tables.status='occupied'");
	// 	if(mysqli_num_rows($upt)>0)
	// 	{
 //            $row=mysqli_fetch_assoc($upt);
 //            $table_no=$row['table_no'];
 //            $bid=$row['bid'];
	// 		$upd=mysqli_query($con,"UPDATE `tables` SET `status`='empty' WHERE `id`='$table_no' and `branch`='$bid'");
	// 	}
 //    }
    $json = array(
        "status" => true,
        "msg"  => "Delivered Successfully"
    );
    }else{
        $json = array(
            "status" => false,
            "msg" => "Something Went Wrong..!!"
        );
    }
}       
else{
    $json = array(
        "status" => false,
        "msg" => "No Order..!!"
    );
} 
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>