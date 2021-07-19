<?php
include('db.php');
$today=date('Y-m-d');
$admin_id=$_POST['admin_id'];
$disc_name=$_POST['disc_name'];
$disc_type=$_POST['disc_type'];
$disc=$_POST['disc'];
$from_dt=$_POST['from_dt'];
$to_dt=$_POST['to_dt'];
// echo $today;
if($_SERVER['REQUEST_METHOD']=='POST')
{
$query=mysqli_query($con,"SELECT * FROM `discount` WHERE aid='$admin_id' and to_dt>='$today' and disc_name='$disc_name' GROUP by disc_id");
if(mysqli_num_rows($query)>0)
{
	$json=array('status'=>false,
				'details'=>$data,
				'msg'=>$disc_name." discount name already given..!!");

}else
{
	$query1=mysqli_query($con,"SELECT * FROM `discount` WHERE aid='$admin_id' order by disc_id desc LIMIT 1");
	$row=mysqli_fetch_assoc($query1);
	$disc_id=$row['disc_id']+1;
	$query=mysqli_query($con,"INSERT INTO `discount`(`disc_id`, `aid`,`disc_name`, `disc_type`, `disc`, `from_dt`, `to_dt`, `status`, `created_on`, `ap`) VALUES ('$disc_id','$admin_id','$disc_name','$disc_type','$disc','$from_dt','$to_dt','A','$dj','D')");
	if($query)
	{
		$json=array('status'=>true,
				// 'details'=>$data,
				'msg'=>"Success");
	}
}
}
else{
	$json=array('status'=>false,
				// 'details'=>$data,
				'msg'=>"No Record");
}
 header('Content-Type: application/json');
 echo json_encode($json);
?>