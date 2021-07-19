<?php
include('db.php');
$admin_id=$_POST['admin_id'];
$today=date('Y-m-d');
// echo $today;
if ($_SERVER['REQUEST_METHOD']=='POST')
{
$query=mysqli_query($con,"SELECT * FROM `discount` WHERE aid='$admin_id' and to_dt>='$today' GROUP by disc_id");
while ($row=mysqli_fetch_assoc($query)) {
	$data[]=$row;
}
if(mysqli_num_rows($query)>0)
{
	$json=array('status'=>true,
				'details'=>$data,
				'msg'=>"Success");
}
else{
	$json=array('status'=>false,
				'details'=>$data,
				'msg'=>"No Record");
}
 header('Content-Type: application/json');
 }       echo json_encode($json);
?>