<?php 
include '../includes/connect.php';
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

// $wid = mysqli_real_escape_string($con,$_POST['wid']);
$order_id = mysqli_real_escape_string($con,$_POST['order_id']);

// $findwid = mysqli_query($con,"SELECT * FROM `users` WHERE role = 'Waiter' AND id = '$wid'");
// $getwid = mysqli_fetch_assoc($findwid);
// $bid = $getwid['branch'];
    
$getPend = mysqli_query($con,"SELECT order_details.*,items.name FROM `order_details` LEFT JOIN items ON order_details.item_id = items.id WHERE order_id = '$order_id' AND order_details.status = 'Delivered' order by order_details.id asc");
            
    $JSON = array();
    while ($rw = mysqli_fetch_assoc($getPend)) {
    
    	$JSON[] = $rw;
        // print_r($JSON);
    }
if(mysqli_num_rows($getPend)>0)
{
    $json = array(
        "status" => true,
        "orderlist" => $JSON,
    );
 } else{

    $json = array(
        "status" => false,
        "orderlist" => $JSON,
    );
 }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>