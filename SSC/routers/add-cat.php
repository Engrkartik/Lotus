<?php
include '../includes/connect.php';

// $name = ucwords($_POST['name']);
$location=$_POST['location'];
$name=$_POST['name'];

$sql = "INSERT INTO `category`(`bid`, `name`, `created_at`) VALUES ('$location','$name','$dj')";
$con->query($sql);
// echo mysqli_error($con);
header("location: ../category.php");
?>