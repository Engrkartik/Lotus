<?php
include('include/db.php');
session_start();
$m_no=$_POST['m_no'];
$otp=$_POST['otp'];
$type=$_POST['type'];

if($type=="chk"){
// $otp=rand(1000,9999);
	$otp='1234';
$chk=mysqli_query($con,"SELECT * FROM `otp` WHERE MOBILE_NO='$m_no'");
if((mysqli_num_rows($chk))>0)
{
	$upd=mysqli_query($con,"UPDATE `otp` SET `OTP`='$otp',`GENERATED_ON`='$dj' WHERE MOBILE_NO='$m_no'");
}else{
	$upd=mysqli_query($con,"INSERT INTO `otp`(`MOBILE_NO`, `OTP`, `GENERATED_ON`) VALUES ('$m_no','$otp','$dj')");
}
if($upd){
	echo "OTP Sent";
}else
{
	echo mysqli_error($con);
}
}
elseif($type=='l_chk')
{
	$chk=mysqli_query($con,"SELECT * FROM `otp` WHERE MOBILE_NO='$m_no' and `OTP`='$otp'");
if((mysqli_num_rows($chk))>0)
{
	$chk2=mysqli_query($con,"SELECT * FROM `admin` WHERE mobile='$m_no'");
	$row=mysqli_fetch_assoc($chk2);

$_SESSION['admin_id']=$row['id'];
// $admin_id=$_SESSION['admin_id'];
// $_SESSION['mobile']=$m_no;
$_SESSION['timestamp']=time();
if(empty($_SESSION['admin_id']))
{
echo 0;
}else{
echo 1;
}
}
else{
	echo 2;
}
}elseif($type=="sign_up")
{
	$firm_name= $_POST['firm_name'];
	$address= $_POST['address'];
	$name= $_POST['name'];
	$b_type= $_POST['b_type'];
	$access= $_POST['access'];
	$mobile= $_POST['mobile'];
	$web_address=str_replace(' ','_',$firm_name).".com";
	// $insert=mysqli_query($con,"INSERT INTO `company_reg`(`aid`, `OWNER_NAME`, `FIRM_NAME`, `web_address`, `BUSINESS`, `ADDRESS`, `COUNTRY`, `STATE`, `DISTRICT`, `CITY`, `PIN_CODE`, `CONTACT_NO`, `ALT_NO`, `EMAIL_ID`, `GST_TYPE`, `GSTIN_NO`, `image`, `AADHAAR`, `PAN`, `STATUS`, `DATE`, `REMARK`,`access`) VALUES ('$admin_id','$name','$firm_name','$web_address','$b_type','$address','INDIA',' ',' ',' ',' ','$mobile','$mobile',' ','U',' ',' ',' ',' ','A','$dj',' ','$access')");
	$insert=mysqli_query($con,"INSERT INTO `admin`(`username`, `firm_name`, `web_address`, `mobile`, `access`, `business_type`, `status`, `remark`,`date`) VALUES ('$name','$firm_name','$web_address','$mobile','$access','$b_type','A','','$dj')");
	if($insert)
	{
	$_SESSION['admin_id']=mysqli_insert_id($con);

		echo 1;
	}else{
		echo mysqli_error($con);
	}
}
?>