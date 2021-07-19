<?php
include '../includes/connect.php';
// include '../includes/header.php';
$type=$_POST['type'];
$id=$_POST['id'];
if($type=='category')
{
    	$query=mysqli_query($con,"UPDATE `category` SET `status`='R' WHERE id='$id'");
    	// header('location:../category.php');

}elseif($type=='users')
{
    	$query=mysqli_query($con,"UPDATE `users` SET `status`='R' WHERE id='$id'");
    	// echo '<script>window.location.href="users.php";</script>';


}elseif($type=='chef')
{
    	$query=mysqli_query($con,"UPDATE `users` SET `status`='R' WHERE id='$id'");
    	// echo '<script>window.location.href="chef.php";</script>';
}elseif($type=='waiters')
{
    	$query=mysqli_query($con,"UPDATE `users` SET `status`='R' WHERE id='$id'");
    	// echo '<script>window.location.href="chef.php";</script>';
}elseif($type=='branch')
{
    	$query=mysqli_query($con,"UPDATE `branch` SET `status`='R' WHERE id='$id'");
    	// echo '<script>window.location.href="chef.php";</script>';
}elseif($type=='table')
{
    	$query=mysqli_query($con,"UPDATE `tables` SET `status`='delete' WHERE id='$id'");
    	// echo '<script>window.location.href="chef.php";</script>';
}elseif($type=='admin-page')
{
    	$query=mysqli_query($con,"UPDATE `items` SET `status`='R' WHERE id='$id'");
    	// echo '<script>window.location.href="chef.php";</script>';
}
if($query)
{
	echo $type;
}else{
	echo mysqli_error($con);
}
?>