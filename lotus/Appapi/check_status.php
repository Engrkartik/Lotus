<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
$cust_id=$con->real_escape_string($_POST['cust_id']);
$chk=mysqli_query($con,"SELECT STATUS FROM `company_reg` WHERE aid='$admin_id' and id='$cust_id'");
if(mysqli_num_rows($chk)>0)
{
	$row=mysqli_fetch_assoc($chk);
	  $json = array(
      "status"=>true,
      "active_status"=>($row['STATUS']=='A')?true:false,
      "msg"=>"Success"
    );
}else
{
	$json = array(
      "status"=>false,
      "active_status"=>($row['STATUS']=='A')?true:false,
      "msg"=>"User Inactive"
    );
}
 header('Content-Type: application/json');
    echo json_encode($json);
}

?>