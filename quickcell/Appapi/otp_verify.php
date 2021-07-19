<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$otp=$con->real_escape_string($_POST['otp']);
$mobile=$con->real_escape_string($_POST['mobile']);
$query = mysqli_query($con,"SELECT * FROM `otp` WHERE MOBILE_NO='$mobile' and OTP='$otp'");
$count = mysqli_num_rows($query);

if($count>0)
{
$main_query = mysqli_query($con,"SELECT * FROM `admin` WHERE mobile='$mobile' AND status='A'");
if(mysqli_num_rows($main_query)>0)
{
$status=true;
}else{
$status=false;
}
while($run = mysqli_fetch_assoc($main_query)){
    $data =$run;

}
  $json = array(
      "status"=>true,
      "details"=>$data,
      "Register"=>$status,
      "msg"=>"Success"
  );
    
} else{
    $json = array(
        "status" => false,
        "details" => $data,
        "Register"=>$status,
        "msg" =>"Invalid OTP"
    );

 }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>