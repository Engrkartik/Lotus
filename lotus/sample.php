<?php
include('include/db.php');

$insert = mysqli_query($con,"INSERT INTO `admin`(`username`, `email`, `password`, `mobile`) VALUES ('test','test@123','123','9956789045')");

?>