<?php
include ('include/db.php');
$pro_id=$_POST['item'];
$admin_id=$_POST['admin_id'];
$t_id=$_POST['t_id'];

if($_POST['type']=='Insert')
{
$chk=mysqli_query($con,"SELECT * FROM add_to_cart where `admin_id`='$admin_id' and `pro_id`='$pro_id'");
if((mysqli_num_rows($chk))>0)
{
	echo "Already in Cart";
}
else
{
$query=mysqli_query($con,"INSERT INTO `add_to_cart`(`admin_id`, `pro_id`, `qty`, `status`, `date`, `remarks`) VALUES ('$admin_id','$pro_id','1','A','$dj','NA')");
// echo mysqli_error($con);
echo'Added';
}
}
elseif($_POST['type']=='Update')
{
if($t_id=='M')
{
	$update=mysqli_query($con,"UPDATE `add_to_cart` SET `qty`=`qty`-1 where `id`='$pro_id'");
	echo $t_id;
}
else
{
	$update=mysqli_query($con,"UPDATE `add_to_cart` SET `qty`=`qty`+1 where `id`='$pro_id'");
	echo $t_id;
}
}
elseif($_POST['type']=='Delete')
{

	$update=mysqli_query($con,"DELETE FROM `add_to_cart`  where id='$t_id'");
}
?>