<?php
include('include/db.php');
$id=$_POST['id'];
$type=$_POST['type'];
$admin=$_POST['admin'];
if($type=="del")
{
$query=mysqli_query($con,"DELETE FROM `discount` WHERE disc_name='$id' and aid='$admin'");
if($query)
{
	echo 'Deleted Successfully..!';
}else
{
	echo mysqli_error($con);
}

}elseif($type=="sub")
{
	$disc=$_POST["disc"];
	$disc_name=$_POST["disc_name"];
	$type=$_POST["type"];
	$admin_id=$_POST["admin_id"];
	$disc_type=$_POST["disc_type"];
	$from_dt=$_POST["from_dt"];
	$to_dt=$_POST["to_dt"];
	$someArray=json_decode($_POST['item']);
	foreach ($someArray as $value) {
		$item=$value->item;
$insert=mysqli_query($con,"INSERT INTO `discount`(`aid`, `pid`, `disc_name`, `disc_type`, `disc`, `from_dt`, `to_dt`, `status`, `created_on`) VALUES ('$admin_id','$item','$disc_name','$disc_type','$disc','$from_dt','$to_dt','A','$dj')");
	}
	if($insert)
	{
		echo "Success";
	}else{
		echo mysqli_error($con);
	}
}elseif($type=="rem")
{
	$rem=$_POST['rem'];
	$oid=$_POST['oid'];
	$up=mysqli_query($con,"UPDATE `manage_order` SET `remark`='$rem' WHERE `id`='$oid'");
	if($up){
		echo "Updated";
	}else{
		echo mysqli_error($con);
	}
}
?>