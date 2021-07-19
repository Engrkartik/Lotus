<?php
include '../includes/connect.php';
$id=$_POST['id'];
$st=$_POST['st'];
$o_id=$_POST['o_id'];
$order_count='';
$order_count2='';
if($st=='Cooked')
{
	$query=mysqli_query($con,"UPDATE `order_details` SET `status`='$st' WHERE id='$id'");
	$sql1 = mysqli_query($con, "SELECT * FROM order_details WHERE order_id = '$o_id'");
	$sql2 = mysqli_query($con, "SELECT * FROM order_details WHERE order_id = '$o_id' and status='$st'");
	$order_count=mysqli_num_rows($sql1);
	$order_count2=mysqli_num_rows($sql2);
	// echo $order_count.'-'.$order_count2;
	if($order_count2==$order_count)
	{
		$sql3 = mysqli_query($con, "UPDATE `orders` SET `status`='cooked' WHERE `order_id`='$o_id'");
	}
}else
{
$query=mysqli_query($con,"UPDATE `order_details` SET `status`='$st' WHERE id='$id'");
$sql3 = mysqli_query($con, "UPDATE `orders` SET `status`='preparing' WHERE `order_id`='$o_id'");
}
// echo $order_count.'-'.$order_count2;
if(empty(mysqli_error($con)) && $query)
{
	echo 1;
}else
{
	echo 0;
}
?>