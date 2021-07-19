<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
$query = mysqli_query($con,"SELECT * FROM `banner` WHERE title='Last Banner' and aid='$admin_id' and status!='R'");
$query2 = mysqli_query($con,"SELECT * FROM `banner` WHERE title='Middle Banner' and aid='$admin_id'and status!='R'");
// $query3 = mysqli_query($con,"SELECT * FROM `banner` WHERE title='Top Banner' and aid='$admin_id'and status!='R'");

$count = mysqli_num_rows($query);

while($run = mysqli_fetch_assoc($query)){
    $data[] =$run;

}
while($run2 = mysqli_fetch_assoc($query2)){
    $data2[] =$run2;

}

// while($run3 = mysqli_fetch_assoc($query3)){
//     $data3[] =$run3;

// }
// while($run4 = mysqli_fetch_assoc($query4)){
//     $data4[] =$run4;

// }
// if($count>0)
// {
  $json = array(
      "status"=>true,
      "last"=>$data,
      "middle"=>$data2,
      "top"=>$data3,
      "msg"=>"Success"
  );

    header('Content-Type: application/json');
    echo json_encode($json);
}
?>