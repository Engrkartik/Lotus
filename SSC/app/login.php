<?php 
include '../includes/connect.php';
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$user = mysqli_real_escape_string($con,$_POST['user']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$imei = mysqli_real_escape_string($con,$_POST['imei']);
$device_id = mysqli_real_escape_string($con,$_POST['device_id']);

$getPend = mysqli_query($con,"SELECT * FROM `users` WHERE role='Waiter' AND contact ='$user' AND password = '$password'");
$count = mysqli_num_rows($getPend);

if($count>0){       

    $JSON = array();
    $rw = mysqli_fetch_assoc($getPend);
    $id = $rw['id'];

    $update = mysqli_query($con,"UPDATE `users` SET `imei`='$imei',`device_id`='$device_id' WHERE id = '$id'");

    $change = mysqli_query($con,"SELECT * FROM `users` WHERE role='Waiter' AND contact ='$user' AND password = '$password'");
    $val = mysqli_fetch_assoc($change);

        $JSON = $val;
        // print_r($JSON);
    // }

    $json = array(
        "status" => true,
        "waiter" => $JSON,
        "msg" =>'Successfully Logged In'
    );
}
else{
    $json = array(
        "status" => false,
        "waiter" => $JSON,
        "msg" =>'Error'
    );
}  
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>