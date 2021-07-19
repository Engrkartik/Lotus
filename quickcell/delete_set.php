<?php
include('include/db.php');
$set_id=$_POST['set_id'];
$pid=$_POST['pid'];
$del=mysqli_query($con,"DELETE FROM `set_details_whole` WHERE set_id='$set_id' and aid='$admin_id'");
$up=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE pid='$pid' and aid='$admin_id'");
if(mysqli_num_rows($up)>0)
{

}else
{
	mysqli_query($con,"UPDATE `product` SET `set_id`='0' WHERE id='$pid'");
}
if($del)
{
	echo 1;
}else
{
	echo mysqli_error($con);
}
?>