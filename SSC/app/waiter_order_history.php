<?php 
include '../includes/connect.php';
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$wid = mysqli_real_escape_string($con,$_POST['wid']);
// $bid = mysqli_real_escape_string($con,$_POST['bid']);

$findwid = mysqli_query($con,"SELECT * FROM `users` WHERE role = 'Waiter' AND id = '$wid'");
$getwid = mysqli_fetch_assoc($findwid);
$bid = $getwid['branch'];
    
$getPend = mysqli_query($con,"SELECT orders.*, tables.tables_no as table_name FROM `orders` LEFT JOIN tables on orders.table_no = tables.id WHERE waiter_id = '$wid' AND bid='$bid' AND orders.status = 'delivered' order by orders.id desc");
            
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