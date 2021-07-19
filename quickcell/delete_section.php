<?php
include('include/db.php');
date_default_timezone_get('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

$type = $_POST['type'];
///////////////////////////////////////////////delete feature///////////////////////////////////////////////////
if($type=="deleteF"){
	$id = $_POST['id'];
	$pid = $_POST['pid'];
	// $uporder=mysqli_query($con,"UPDATE `product_order` SET `status`= 'D' where id = '$id' and feature != '0'");
	$uporder=mysqli_query($con,"DELETE FROM `product_order` WHERE id = '$id' and feature != '0'");
	$upprod = mysqli_query($con,"UPDATE `product` SET `feature`='N' where id = '$pid'");
	if($uporder){
		echo "Success";
	}
	else{
		echo mysqli_error($con);
	}
}
/////////////////////////////////////////////////////END////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////delete NewArrival//////////////////////////////////////////
if($type=="deleteNew"){
	$id = $_POST['id'];
	$pid = $_POST['pid'];
	// $uporder=mysqli_query($con,"UPDATE `product_order` SET `status`= 'D' where id = '$id' and new != '0'");
	$uporder=mysqli_query($con,"DELETE FROM `product_order` WHERE id = '$id' and new != '0'");
	$upprod = mysqli_query($con,"UPDATE `product` SET `new`='N' where id = '$pid'");

	if($uporder){
		echo "Success";
	}
	else{
		echo mysqli_error($con);
	}
}
if($type=="deleteTop"){
	$id = $_POST['id'];
	$pid = $_POST['pid'];
	// $uporder=mysqli_query($con,"UPDATE `product_order` SET `status`= 'D' where id = '$id' and new != '0'");
	$uporder=mysqli_query($con,"DELETE FROM `product_order` WHERE id = '$id' and top != '0'");
	$upprod = mysqli_query($con,"UPDATE `product` SET `top`='N' where id = '$pid'");

	if($uporder){
		echo "Success";
	}
	else{
		echo mysqli_error($con);
	}
}
//////////////////////////////////////////////////END///////////////////////////////////////////////////////////////

?>