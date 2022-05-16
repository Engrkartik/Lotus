<?php
include('db.php');
$aid=$_POST['admin_id'];

$query=mysqli_query($con,"SELECT * FROM `issue_type` WHERE aid='$aid'");
while ($row=mysqli_fetch_assoc($query)) {
  $data[]=$row;
}
if($query)
{
	 $json = array(
      "status"=>true,
      "details"=>$data,
      "msg"=>"Success"
  );
    
}
    else{
    $json = array(
        "status" => false,
      "details"=>$data,
        "msg" =>mysqli_error($con)
    );
    }
    header('Content-Type: application/json');
    echo json_encode($json);
?>