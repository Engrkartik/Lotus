<?php
include '../includes/connect.php';

$name = $_POST['name'];
$piece = $_POST['piece'];
$price = $_POST['price'];
$category = $_POST['category'];
$branch = $_POST['branch'];
// $sql = "INSERT INTO items (name, price, branch, category, piece) VALUES ('$name', '$price', '$branch', '$category', '$piece')";
// $con->query($sql);
$query = mysqli_query($con,"INSERT INTO items (name, price, branch, category, piece) VALUES ('$name', '$price', '$branch', '$category', '$piece')");
header("location: ../admin-page.php");
?>