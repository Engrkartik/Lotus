<?php
include '../includes/connect.php';

$name = ucwords($_POST['name']);
$location=$_POST['location'];
$from_time=$_POST['from_time'];
$to_time=$_POST['to_time'];
$st_date=$_POST['st_date'];
$total_table=$_POST['total_table'];
$sql = "INSERT INTO `branch`(`name`, `location`, `from_time`, `to_time`, `start_date`, `no_of_tables`, `no_of_waiters`, `no_of_chef`, `created_on`, `status`) VALUES ('$name','$location','$from_time','$to_time','$st_date','$total_table','0','0','$dj','A')";
$con->query($sql);
// echo mysqli_error($con);
header("location: ../branch.php");
?>