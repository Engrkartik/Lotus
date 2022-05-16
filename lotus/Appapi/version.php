<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // $cat_id = $_POST['cat_id'];
    // if(!empty($cat_id)){
        $query = mysqli_query($con,"SELECT * from `version`");
        $row = mysqli_fetch_assoc($query);

            $data = $row['current_version'];
        // }

if($query){

  $json = array(
      "status"=>true,
      "version"=>$data,
      "msg"=>"Success"
  );
    
}
    else{
    $json = array(
        "status" => "false",
        "version"=>$data,
        "msg" =>"Error"
    );
    }
   
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>