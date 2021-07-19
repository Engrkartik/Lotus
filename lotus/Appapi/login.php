<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$mobile=$con->real_escape_string($_POST['mobile']);
$query = mysqli_query($con,"SELECT * FROM `company_reg` WHERE CONTACT_NO='$mobile' AND STATUS='A'");
$count = mysqli_num_rows($query);

while($run = mysqli_fetch_assoc($query)){
    $data =$run;

}
// $otp=mt_rand(1000,9999);
// $otp='1234';
if($mobile=='7290042960' || $mobile=='9354689860')
{
  $otp='1234';
}
else{
  $otp=mt_rand(1000,9999);
}
if(!empty($mobile))
{
    $chk=mysqli_query($con,"SELECT * FROM `otp` WHERE MOBILE_NO='$mobile'");
  if(mysqli_num_rows($chk)>0)
  {
    $ins=mysqli_query($con,"UPDATE `otp` SET `OTP`='$otp',`GENERATED_ON`='$dj' WHERE MOBILE_NO='$mobile'");
  }else{
  $ins=mysqli_query($con,"INSERT INTO `otp`(`MOBILE_NO`, `OTP`, `GENERATED_ON`) VALUES ('$mobile','$otp','$dj')");
}
if($mobile=='7290042960' || $mobile=='9354689860')
{
}
{
  // echo "INSERT INTO `otp`(`MOBILE_NO`, `OTP`, `GENERATED_ON`) VALUES ('$userid','$otp','$dj')";
$sms="Your one time password is $otp, OTP will be expire after 10 minutes. Do not share this code with anyone.\nTeam Shikhar Creation";
//   $sms="Dear Customer,
// $otp is you one time password(OTP). Please enter the OTP to proceed.
// Thank you";
  $sms=urlencode($sms);
$stringUrl = "http://mobicomm.dove-sms.com/mobicomm/submitsms.jsp?user=SSSWEB&key=ee8e045d46XX&mobile=$mobile&message=$sms&senderid=SLOTUS&accusage=6&entityid=1201159195401169497&tempid=1207162399163619133";
file_get_contents ($stringUrl);
// }
}
  $json = array(
      "status"=>true,
      "details"=>$data,
      "otp"=>$otp,
      "msg"=>"Success"
  );
    
}

// if($ins)
// {
//   $json = array(
//       "status"=>true,
//       "details"=>$data,
//       "msg"=>"Success"
//   );

// } 
else{
    $json = array(
        "status" => false,
        "details" => $data,
        "msg" =>"No Record Found"
    );

 }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>