<?php 
include '../includes/connect.php';
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){
$data=array();
$bid = mysqli_real_escape_string($con,$_POST['bid']);
$table_no = mysqli_real_escape_string($con,$_POST['table_no']);
$waiter_id = mysqli_real_escape_string($con,$_POST['wid']);
$order_id = mysqli_real_escape_string($con,$_POST['order_id']);
// $query=mysqli_query($con,"SELECT order_details.*,items.name as item_name FROM `orders` LEFT JOIN order_details ON order_details.order_id=orders.order_id LEFT JOIN items ON items.id=order_details.item_id where orders.bid='$bid' and orders.table_no='$table_no' AND waiter_id='$waiter_id'");
// $query=mysqli_query($con,"SELECT order_details.*,items.name as item_name FROM `orders` LEFT JOIN order_details ON order_details.order_id=orders.order_id LEFT JOIN items ON items.id=order_details.item_id where orders.bid='$bid' and orders.table_no='$table_no' AND (orders.status = 'pending' or orders.status ='preparing' or orders.status='cancel')");
$query=mysqli_query($con,"SELECT order_details.*,items.name as item_name, orders.table_no FROM `orders` LEFT JOIN order_details ON order_details.order_id=orders.order_id LEFT JOIN items ON items.id=order_details.item_id where orders.bid='$bid' and orders.table_no='$table_no' AND (orders.status != 'delivered')");


if(mysqli_num_rows($query)>0) 
{
    while ($row=mysqli_fetch_assoc($query)) {
        $order_id = $row['order_id'];
        $table_no = $row['table_no'];
        $data[]=$row;
    }
    $json = array(
        "status" => true,
        "msg"  => "Order Placed Successfully",
        "table_no" =>$table_no,
        "order_id" => $order_id,
        "details" => $data
    );
}       
else{
    $json = array(
        "status" => false,
        "order_id" => $order_id,
        "details" => $data,
        "msg" => "No Order..!!"
    );
} 
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>