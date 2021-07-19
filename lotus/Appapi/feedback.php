<?php 
include('db.php');
// date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $c_id = $_POST['cust_id'];
    $msg =$_POST['msg'];
    $remark = $_POST['remark'];
    $star = $_POST['star'];

    // if(!empty($c_id)){
$query = mysqli_query($con,"INSERT INTO `feedback`( `cid`, `msg`, `date`, `status`, `remark`, `rating`) VALUES ('$c_id', '$msg','$dj','active','$remark','$star')");
   
if($query){

  $json = array(
      "status"=>true,
      "msg"=>"Success"
  );
    
}
    else{
    $json = array(
        "status" => false,
        "msg" =>mysqli_error($con)
    );
    }
// }
//     else{
//         $json = array(
//             "status" => false,
//             "msg" =>"Server did't respond"
//         );
//     }
 
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>