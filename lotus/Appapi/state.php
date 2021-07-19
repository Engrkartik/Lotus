<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){
$query = mysqli_query($con,"SELECT state FROM `districts` GROUP BY state");
$count = mysqli_num_rows($query);

while($run = mysqli_fetch_assoc($query)){
    $data[] =$run;

}

  $json = array(
      "status"=>true,
      "details"=>$data,
      "msg"=>"Success"
  );

    header('Content-Type: application/json');
    echo json_encode($json);
}
?>