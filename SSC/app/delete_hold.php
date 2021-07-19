<?php 
include '../includes/connect.php';
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){
$id = mysqli_real_escape_string($con,$_POST['id']);
$bid = mysqli_real_escape_string($con,$_POST['bid']);
$table_no = mysqli_real_escape_string($con,$_POST['table_no']);
$wid = mysqli_real_escape_string($con,$_POST['wid']);
$main_query=mysqli_query($con,"SELECT * FROM `save_to_later` WHERE bid='$bid' AND waiter_id='$wid' AND table_no='$table_no'");
if(mysqli_num_rows($main_query)>0)
{
$query=mysqli_query($con,"DELETE FROM `save_to_later` WHERE id='$id'");
$main_query2=mysqli_query($con,"SELECT * FROM `save_to_later` WHERE bid='$bid' AND waiter_id='$wid' AND table_no='$table_no'");
if(mysqli_num_rows($main_query2)<1)
{
    $query = mysqli_query($con,"UPDATE `tables` SET `status`= 'empty' WHERE id = '$table_no'");

}
}
    if ($query)
    {
                    
        $json = array(
            "status" =>true,
            "msg"=> "Deleted Successfully"
        );
    }
    else{
        $json = array(
            // "count"=> $chk,
            "status" =>false,
            "msg"    =>"Error, Not Added To Cart"
        );
    } 

    header('Content-Type: application/json');
    echo json_encode($json);
}
?>