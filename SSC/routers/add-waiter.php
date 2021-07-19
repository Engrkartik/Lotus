<?php
include '../includes/connect.php';

$name = ucwords($_POST['name']);
$branch=$_POST['branch'];
$waiter_id=$_POST['waiter_id'];
$password=$_POST['password'];
$phone_no=$_POST['phone_no'];
$sql="INSERT INTO `users`(`role`, `name`, `username`, `password`, `email`, `address`, `contact`, `verified`, `created_at`, `branch`) VALUES ('Waiter','$name','$waiter_id','$password','Null','Null','$phone_no','0','$dj','$branch')";
// $sql = "INSERT INTO `waiter`(`name`,`phone_number`,`waiter_id`, `password`, `branch`, `created_on`, `status`) VALUES ('$name','$phone_no','$waiter_id','$password','$branch','$dj','A')";
$con->query($sql);
// echo mysqli_error($con);
header("location: ../waiters.php");
?>