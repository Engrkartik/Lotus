<?php 
include '../includes/connect.php';
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$tid = mysqli_real_escape_string($con,$_POST['tid']);
$bid = mysqli_real_escape_string($con,$_POST['bid']);
$st = mysqli_real_escape_string($con,$_POST['status']);

$up = mysqli_query($con,"UPDATE `tables` SET `status`='$st' WHERE id='$tid' and branch='$bid'");
   if($up)
   {
    $getPend=mysqli_query($con,"SELECT * FROM `tables` WHERE branch='$bid'");
    while ($rw = mysqli_fetch_assoc($getPend)) {
      
        $JSON[] = $rw;
        // print_r($JSON);
    }
   }
         
if(mysqli_num_rows($getPend)>0)
{
    $json = array(
        "status" => true,
        "tablelist" => $JSON,
    );
 } else{

    $json = array(
        "status" => false,
        "tablelist" => $JSON,
    );
 }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>