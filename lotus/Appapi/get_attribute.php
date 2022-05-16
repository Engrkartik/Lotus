<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

// $admin_id=$con->real_escape_string($_POST['admin_id']);
// $cust_id=$con->real_escape_string($_POST['cust_id']);
$att_id=$con->real_escape_string($_POST['att_id']);

$chk=mysqli_query($con,"SELECT * FROM `prod_attribute` WHERE att_id='$att_id' group by sub_cat");
if(mysqli_num_rows($chk)>0)
{
	while($row=mysqli_fetch_assoc($chk))
  {
    $sub_cat=$row['sub_cat'];
$chk2=mysqli_query($con,"SELECT * FROM `prod_attribute` WHERE att_id='$att_id' and sub_cat='$sub_cat'");
  $att=[];

while ($row2=mysqli_fetch_assoc($chk2)) {
  $att[]=str_replace('_', ' ',$row2['attribute']);
}
    $data[]=array("main_cat"=>trim(str_replace('_',' ',$row['sub_cat'])),
    "attribute"=>$att);
  }
	  $json = array(
      "status"=>true,
      "details"=>$data,
      "msg"=>"Success"
    );
}else
{
	$json = array(
      "status"=>false,
      "details"=>$data,
      "msg"=>"No Attribute"
    );
}
 header('Content-Type: application/json');
    echo json_encode($json);
}

?>