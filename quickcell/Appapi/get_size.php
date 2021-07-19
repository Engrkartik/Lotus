<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
$size_type=$con->real_escape_string($_POST['size_type']);
$query = mysqli_query($con,"SELECT * FROM `sizemaster` WHERE (aid='0' or aid='$admin_id') and size_type='$size_type' group by type");

$count = mysqli_num_rows($query);

while($run = mysqli_fetch_assoc($query)){
  $size=[];
  $type=$run['type'];
$query2 = mysqli_query($con,"SELECT * FROM `sizemaster` WHERE (aid='0' or aid='$admin_id') and size_type='$size_type' and type='$type'");
while ($run2=mysqli_fetch_assoc($query2)) {
  $size[]=array('Name'=>$run2['size_name'],
                  'qty'=>$run2['qty']);
}
    $data[] = array('Type' =>$run['type'],
                    'Size'=>$size
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