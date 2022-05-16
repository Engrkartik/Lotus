<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$dj=date('Y-m-d H:i:s');
$servername = "localhost";
$server_user = "root";
$server_pass = "Priyam@123";
$dbname = "food";
$name = $_SESSION['name'];
$role = $_SESSION['role'];
$con = new mysqli($servername, $server_user, $server_pass, $dbname);

?>