<?php
include '../includes/connect.php';

$name = ucwords($_POST['name']);
$branch=$_POST['branch'];
$chef_id=$_POST['chef_id'];
$password=$_POST['password'];
$phone_no=$_POST['phone_no'];
$query=mysqli_query($con,"SELECT * FROM `users` where contact='$phone_no' and role='Chef'");

if(mysqli_num_rows($query)>0)
{
echo '<script>window.history.back();alert("'.$name.' Already exist..!!");</script>';
}else
{
	$sql="INSERT INTO `users`(`role`, `name`, `username`, `password`, `email`, `address`, `contact`, `verified`, `created_at`, `branch`) VALUES ('Chef','$name','$chef_id','$password','Null','Null','$phone_no','0','$dj','$branch')";
	// $sql = "INSERT INTO `chef`(`name`,`phone_number`,`chef_id`, `password`, `branch`, `created_on`, `status`) VALUES ('$name','$phone_no','$chef_id','$password','$branch','$dj','A')";
$con->query($sql);
// echo mysqli_error($con);
header("location: ../chef.php");
}
// echo $branch;

?>