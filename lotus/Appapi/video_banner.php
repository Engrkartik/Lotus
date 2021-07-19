<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){
$admin_id=$con->real_escape_string($_POST['admin_id']);
$query = mysqli_query($con,"SELECT * FROM `banner` WHERE `title`='Video Banner' and aid='$admin_id' and status='A' ORDER BY `id` DESC");
$count = mysqli_num_rows($query);

while($run = mysqli_fetch_assoc($query)){
    $data[] =$run;
}
if($count>0)
{
  $json = array(
      "status"=>"true",
      "details"=>$data,
      "msg"=>"Success"
  );
}else{
	$json = array(
      "status"=>"false",
      "details"=>$data,
      "msg"=>"No Data"
  );
}
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>