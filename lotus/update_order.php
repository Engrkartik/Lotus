<?php
include('include/db.php');
$rem=$_POST['rem'];
$status=$_POST['sts'];
$oid=$_POST['sid'];
$type=$_POST['type'];
if($type=="status")
{
	$up=mysqli_query($con,"UPDATE `manage_order` SET `status`='$status',`remark`='$rem' WHERE `order_id`='$oid'");
	echo 2;
}
?>