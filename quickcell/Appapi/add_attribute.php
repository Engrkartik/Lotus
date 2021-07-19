<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("d-m-Y H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
$cat_id=$con->real_escape_string($_POST['cat_id']);
$sub_cat=$con->real_escape_string($_POST['sub_cat']);
$variant=$con->real_escape_string($_POST['variant']);
$query=mysqli_query($con,"SELECT * FROM `attributes` WHERE cat_id='$cat_id' and att_name='$sub_cat' and (aid='$admin_id' or aid='0') and att_id='0'");
$row=mysqli_fetch_assoc($query);
if(mysqli_num_rows($query)>0)
{
  $att_id=$row['id'];
  $query2=mysqli_query($con,"SELECT * FROM `attributes` WHERE cat_id='$cat_id' and att_name='$variant' and (aid='$admin_id' or aid='0') and att_id='$att_id'");
  if(mysqli_num_rows($query2)>0)
  {
    $json = array(
      "status"=>false,
      // "details"=>$data,
      "msg"=>"Variant already exist..!!"
  );   
  }
  else
  {
    $query3=mysqli_query($con,"INSERT INTO `attributes`(`aid`, `cat_id`, `att_name`, `att_id`, `status`, `date`) VALUES ('$admin_id','$cat_id','$variant','$att_id','A','$dj')");
    
if($query3)
    {
       $json = array(
      "status"=>true,
      // "details"=>$data,
      "msg"=>"Success"
  );

    }
  }
}else
{
   $json = array(
      "status"=>false,
      // "details"=>$data,
      "msg"=>"No Data"
  );  
}
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>