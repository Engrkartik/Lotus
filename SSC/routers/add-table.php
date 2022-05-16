<?php
include '../includes/connect.php';

$table_no=$_POST['table_no'];
$no_of_sitting=$_POST['no_of_sitting'];
$branch=$_POST['branch'];
$sql = "INSERT INTO `tables`(`tables_no`, `sitting`, `branch`, `created_on`,`status`) VALUES ('$table_no','$no_of_sitting','$branch','$dj','empty')";
$con->query($sql);
// echo mysqli_error($con);
header("location: ../table.php");
?>