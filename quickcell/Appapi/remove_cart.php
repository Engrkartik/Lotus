<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$id=$con->real_escape_string($_POST['id']);
// $cust_id=$con->real_escape_string($_POST['cust_id']);

$query = mysqli_query($con,"DELETE FROM `add_cart` WHERE id='$id'");

// $count = mysqli_num_rows($query);

if($query)
{
  $json = array(
      "status"=>true,
      // "details"=>$count,
      "msg"=>"Remove"
  );

} else{
    $json = array(
        "status"=>false,
      // "details"=>$count,
        "msg"=>mysqli_error($con)
    );

 }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>