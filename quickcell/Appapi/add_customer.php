<?php
include('db.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{

$firm_name=$con->real_escape_string($_POST['firm_name']);
$owner_name=$con->real_escape_string($_POST['owner_name']);
$business_type=$con->real_escape_string($_POST['business_type']);
$address=$con->real_escape_string($_POST['address']);
$city=$con->real_escape_string($_POST['city']);;
$district=$con->real_escape_string($_POST['district']);
$state=$con->real_escape_string($_POST['state']);
$pin_code=$con->real_escape_string($_POST['pin_code']);
$email=$con->real_escape_string($_POST['email']);
$gst_no=$con->real_escape_string($_POST['gst_no']);
$mobile=$con->real_escape_string($_POST['mobile']);
$alt_mobile=$con->real_escape_string($_POST['alt_mobile']);
$admin_id=$con->real_escape_string($_POST['admin_id']);
$profile_pic=$_FILES['profile_pic']['name'];
// $email="";
$chk=mysqli_query($con,"SELECT * FROM `company_reg` WHERE company_reg.CONTACT_NO='$mobile'");
if(mysqli_num_rows($chk)>0)
{

    $json = array(
        "status" => false,
        "details" =>$mobile,
        "msg" =>"Mobile Number Already Exist..!!!"
    );
}else{
if(empty($gst_no))
{
  $gst_type='U';
}else{
  $gst_type='R';
}
if(!empty($profile_pic))
{


$IDproofImage = $admin_id."_".uniqid()."_id.png";
    $base1 = $profile_pic;
    $binary1 = base64_decode($base1);
    header('Content-Type: bitmap; charset=utf-8');
    $file1 = fopen('../images/' . $IDproofImage, 'wb');
    $path='images/'.$IDproofImage;
    fwrite($file1, $binary1);
    fclose($file1);
}else{
	$path='';
}
$insert=mysqli_query($con,"INSERT INTO `company_reg`(`aid`, `OWNER_NAME`, `FIRM_NAME`, `BUSINESS`, `ADDRESS`, `COUNTRY`, `STATE`, `DISTRICT`, `CITY`, `PIN_CODE`, `CONTACT_NO`, `ALT_NO`, `EMAIL_ID`, `GST_TYPE`, `GSTIN_NO`,`image`,`STATUS`, `DATE`, `REMARK`) VALUES ('$admin_id','$owner_name','$firm_name','$business_type','$address','INDIA','$state','$district','$city','$pin_code','$mobile','$mobile','$email','$gst_type','$gst_no','$path','A','$dj','')");

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