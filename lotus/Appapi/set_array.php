<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$set_id=$con->real_escape_string($_POST['set_id']);


  $chk2=mysqli_query($con,"SELECT * FROM set_details WHERE set_details.set_id='$set_id'");
  while($row2=mysqli_fetch_assoc($chk2))
  {
 
  $color_arr[]=array("color_name"=>$row2['color'],
                    "size_name"=>$row2['size']);
 
}


if(is_null($color_arr))
	{
	 $json = array(
      "status"=>false,
      "details_set"=>$color_arr,
      "msg"=>"Set detail is empty"
  );
	}
	else
{

  $json = array(
      "status"=>true,
      "details_set"=>$color_arr,
      "msg"=>"Success"
  );

}
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>