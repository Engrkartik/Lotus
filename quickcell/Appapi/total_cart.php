<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
$cust_id=$con->real_escape_string($_POST['cust_id']);

$query = mysqli_query($con,"SELECT DISTINCT add_cart.pid FROM `add_cart` LEFT JOIN product ON product.id=add_cart.pid WHERE product.aid='$admin_id' and add_cart.cid='$cust_id'");

$count = mysqli_num_rows($query);

if($count>0)
{
  $json = array(
      "status"=>true,
      "details"=>$count,
      "msg"=>"Success"
  );

} else{
    $json = array(
        "status"=>false,
      "details"=>$count,
        "msg"=>"No Data"
    );

 }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>