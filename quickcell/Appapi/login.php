<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$mobile=$con->real_escape_string($_POST['mobile']);
// $query = mysqli_query($con,"SELECT * FROM `company_reg` WHERE CONTACT_NO='$mobile' AND STATUS='A'");
// $count = mysqli_num_rows($query);

// while($run = mysqli_fetch_assoc($query)){
//     $data =$run;

// }
// $otp=mt_rand(1000,9999);
$otp='1234';
  $chk=mysqli_query($con,"SELECT * FROM `otp` WHERE MOBILE_NO='$mobile'");
  if(mysqli_num_rows($chk)>0)
  {
    $ins=mysqli_query($con,"UPDATE `otp` SET `OTP`='$otp',`GENERATED_ON`='$dj' WHERE MOBILE_NO='$mobile'");
  }else{
  $ins=mysqli_query($con,"INSERT INTO `otp`(`MOBILE_NO`, `OTP`, `GENERATED_ON`) VALUES ('$mobile','$otp','$dj')");
}
if($ins)
{
  $json = array(
      "status"=>true,
      // "details"=>$data,
      "msg"=>"Success"
  );

} else{
    $json = array(
        "status" => false,
        // "details" => $data,
        "msg" =>"No Record Found"
    );

 }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>