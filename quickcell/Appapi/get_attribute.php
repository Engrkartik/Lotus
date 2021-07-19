<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
$cat_id=$con->real_escape_string($_POST['cat_id']);
$query = mysqli_query($con,"SELECT * FROM `attributes` WHERE att_id='0' and (aid='0' or aid='$admin_id') and cat_id='$cat_id'");

$count = mysqli_num_rows($query);

while($run = mysqli_fetch_assoc($query)){
  $attributes=[];
  $att_id=$run['id'];
$query2 = mysqli_query($con,"SELECT * FROM `attributes` WHERE att_id='$att_id' and (aid='0' or aid='$admin_id') and cat_id='$cat_id'");
while ($run2=mysqli_fetch_assoc($query2)) {
  $attributes[]=trim($run2['att_name']);
}
    $data[] = array('Sub_cat' =>str_replace('_',' ',trim($run['att_name'])) ,
                    'Attribute'=>str_replace('_',' ',$attributes), );
}
if($count>0)
{
  $json = array(
      "status"=>true,
      "details"=>$data,
      "msg"=>"Success"
  );

} else{
    $json = array(
        "status"=>false,
      "details"=>$data,
        "msg"=>"No Data"
    );

 }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>