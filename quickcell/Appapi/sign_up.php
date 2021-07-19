<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$firm_name=$con->real_escape_string($_POST['firm_name']);
$owner_name=$con->real_escape_string($_POST['owner_name']);
$business_type=$con->real_escape_string($_POST['business_type']);
$address=$con->real_escape_string($_POST['address']);
$access=$con->real_escape_string($_POST['access']);
// $city="";
// $district="";//$con->real_escape_string($_POST['district']);
// $state="";//$con->real_escape_string($_POST['state']);
// $pin_code="";//$con->real_escape_string($_POST['pin_code']);
$email=$con->real_escape_string($_POST['email']);
// $gst_no="";//$con->real_escape_string($_POST['gst_no']);
$mobile=$con->real_escape_string($_POST['mobile']);
// $alt_mobile=$con->real_escape_string($_POST['alt_mobile']);
$admin_id=$con->real_escape_string($_POST['admin_id']);
$shipping=$con->real_escape_string($_POST['shipping']);
$payment_det=$con->real_escape_string($_POST['payment_det']);
$payment_type=$con->real_escape_string($_POST['payment_type']);
$notification=$con->real_escape_string($_POST['notification']);
// $email="";
$chk=mysqli_query($con,"SELECT * FROM `admin` WHERE admin.mobile='$mobile'");
if(mysqli_num_rows($chk)>0)
{

    $json = array(
        "status" => false,
        "details" =>$mobile,
        "msg" =>"Mobile Number Already Exist..!!!"
    );
}else{
// if(empty($gst_no))
// {
//   $gst_type='U';
// }else{
//   $gst_type='R';
// }
$insert=mysqli_query($con,"INSERT INTO `admin`(`username`, `firm_name`, `web_address`, `email`, `mobile`, `access`, `business_type`, `status`, `remark`, `shipping`, `payment_det`, `date`, `payment_type`, `notification`) VALUES('$owner_name','$firm_name','','$email','$mobile','$access','$business_type','A','','$shipping','$payment_det','$dj','$payment_type','$notification')");
// $insert=mysqli_query($con,"INSERT INTO `company_reg`(`aid`, `OWNER_NAME`, `FIRM_NAME`, `BUSINESS`, `ADDRESS`, `COUNTRY`, `STATE`, `DISTRICT`, `CITY`, `PIN_CODE`, `CONTACT_NO`, `ALT_NO`, `EMAIL_ID`, `GST_TYPE`, `GSTIN_NO`,`STATUS`, `DATE`, `REMARK`) VALUES ('$admin_id','$owner_name','$firm_name','$business_type','$address','INDIA','$state','$district','$city','$pin_code','$mobile','$mobile','$email','$gst_type','$gst_no','A','$dj','')");

if($insert)
{
  $json = array(
      "status"=>true,
      "details"=>$mobile,
      "msg"=>"Company Register..!!"
  );
 }else{   

    $json = array(
        "status" => false,
        "details" =>$mobile,
        "msg" =>mysqli_error($con)
    );
  }
 }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>