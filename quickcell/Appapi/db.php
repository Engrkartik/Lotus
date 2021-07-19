<?php 

 $con = mysqli_connect("localhost","root","Priyam@123","quickcell");

 if($con){
 	date_default_timezone_set('Asia/Kolkata');
$dj=date('d-m-Y H:i:s');
session_start();

// $_SESSION["admin_id"] = "1";
$admin_id="1";
 }
 else{
 	echo "no";
 }

 // $data = mysqli_query($con,"SELECT * FROM `admin`");

 // $fetch = mysqli_fetch_assoc($data);
 // $name = $fetch['username'];
 // echo $name;
?>
