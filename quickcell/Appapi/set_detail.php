<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$pid=$con->real_escape_string($_POST['p_id']);
$set_id=$con->real_escape_string($_POST['set_id']);
// $pid=$con->real_escape_string($_POST['p_id']);
$chk=mysqli_query($con,"SELECT * FROM `set_details` LEFT JOIN product ON product.set_id=set_details.set_id WHERE set_details.set_id='$set_id' and set_details.pid='$pid'");
while($row=mysqli_fetch_assoc($chk)) {
	$data[]=$row;
}
if(is_null($data))
	{
	 $json = array(
      "status"=>false,
      "details"=>$data,
      "msg"=>"Set detail is empty"
  );
	}
	else
{

  $json = array(
      "status"=>true,
      "details"=>$data,
      "msg"=>"Success"
  );

}
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>