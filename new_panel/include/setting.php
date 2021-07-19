<?php
include('include/db.php');
$Payment=$_POST['Payment'];
$Shipping=$_POST['Shipping'];
$type=$_POST['type'];
$result=$_POST['result'];
$ship_type=$_POST['ship_type'];
if($type=='setting')
{
	if($Shipping=='on')
	{
	$query=mysqli_query($con,"UPDATE `admin` SET `shipping`='$Shipping',`payment_det`='$Payment' WHERE id='$admin_id'");
	if($ship_type=='price')
	{
		$split=explode('~',$result);
	$chk=mysqli_query($con,"INSERT INTO `shipping`(`aid`, `shipping_type`, `min`, `max`, `amount`, `date`, `status`, `remark`) VALUES ('$admin_id','PRICE ACCORDING TO ORDER PRICE','$split[0]','$split[1]','','$dj','A','')");
	}elseif($ship_type=='fixed')
	{
	$chk=mysqli_query($con,"INSERT INTO `shipping`(`aid`, `shipping_type`, `min`, `max`, `amount`, `date`, `status`, `remark`) VALUES ('$admin_id','FIXED PRICE','0','0','$result','$dj','A','')");
	}elseif($ship_type=='free')
	{
	$chk=mysqli_query($con,"INSERT INTO `shipping`(`aid`, `shipping_type`, `min`, `max`, `amount`, `date`, `status`, `remark`) VALUES ('$admin_id','FREE SHIPPING','0','0','FREE SHIPPING','$dj','A','')");
	}
	}
	if($query)
	{
		echo "Updated";
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>