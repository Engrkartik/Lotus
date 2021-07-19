<?php
include('include/db.php');
$new_number=$_POST['new_number'];
$type=$_POST['type'];
if($type=='otp')
{
$chk=mysqli_query($con,"SELECT * FROM `otp` WHERE MOBILE_NO='$new_number'");
if(mysqli_num_rows($chk)>0)
{
	$otp=mt_rand(1000,10000);
	$query=mysqli_query($con,"UPDATE `otp` SET `OTP`='$otp' WHERE MOBILE_NO='$new_number'");
}else
{
	$otp=mt_rand(1000,10000);
	$query=mysqli_query($con,"INSERT INTO `otp`(`MOBILE_NO`, `OTP`, `GENERATED_ON`) VALUES ('$new_number','$otp','$dj')");
}
if($query)
{
	echo $otp;
}
else
{
	echo mysqli_error($con);
}
}elseif ($type=="verify") {
$otp=$_POST['otp'];
$chk=mysqli_query($con,"SELECT * FROM `otp` WHERE MOBILE_NO='$new_number' and OTP='$otp'");
if(mysqli_num_rows($chk)>0)
{
	$update=mysqli_query($con,"UPDATE `admin` SET `mobile`='$new_number' WHERE id='$admin_id'");
	echo 1;
}
else
{
	echo "Invalid OTP";
}
}
elseif ($type=="full_up") {
	$username=$_POST['username'];
	$email=$_POST['email'];
	$b_type=$_POST['b_type'];
	$access=$_POST['access'];
	$notification=$_POST['notification'];
	$shipping_add=$_POST['shipping_add'];
	$payment_det=$_POST['payment_det'];

$update=mysqli_query($con,"UPDATE `admin` SET `username`='$username',`email`='$email',`access`='$access',`business_type`='$b_type',`shipping`='$shipping_add',`payment_det`='$payment_det',`notification`='$notification' WHERE id='$admin_id'");

if($update)
{
	
	echo 1;
	
}
else
{
	echo mysqli_error($con);
}
}
elseif($type=='auto_stock')
{
	$auto_stock=$_POST['auto_stock'];
	$update2=mysqli_query($con,"UPDATE `product` SET `auto_reduce_qty`='$auto_stock' WHERE aid='$admin_id'");

}
?>