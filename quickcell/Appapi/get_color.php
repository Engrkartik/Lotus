<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
// $cat_id=$con->real_escape_string($_POST['cat_id']);
$query = mysqli_query($con,"SELECT * FROM `color` WHERE (aid='0' or aid='$admin_id') GROUP BY color_type");

$count = mysqli_num_rows($query);

while($run = mysqli_fetch_assoc($query)){
  $color=[];
  $color_type=$run['color_type'];
$query2 = mysqli_query($con,"SELECT * FROM `color` WHERE (aid='0' or aid='$admin_id') and color_type ='$color_type'");
while ($run2=mysqli_fetch_assoc($query2)) {
  $color[]=trim(str_replace('_',' ',$run2['c_name']));
}
    $data[] = array('Type' =>$run['color_type'],
                    'Color'=>$color
                  );
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