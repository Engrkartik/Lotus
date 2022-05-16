<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$aid=$con->real_escape_string($_POST['admin_id']);
$cust_id=$con->real_escape_string($_POST['cust_id']);
$pid=$con->real_escape_string($_POST['p_id']);
$chk=mysqli_query($con,"SELECT * FROM `wishlist` WHERE cid='$cust_id' and pid='$pid' and aid='$aid'");
if(mysqli_num_rows($chk)>0)
{
 $json = array(
        "status"=>false,
        "msg"=>"Already In Cart"
    );
}else{
$query = mysqli_query($con,"INSERT INTO `wishlist`(`aid`, `cid`, `pid`,`date`, `status`) VALUES ('$aid','$cust_id','$pid','$dj','A')");
}


if($query)
{
  $json = array(
      "status"=>true,
      "msg"=>"Added"
  );

}
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>