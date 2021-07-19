<?php
include ("include/db.php");
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");
// $someJSON = $_POST["mydata"];
// $someArray = json_decode($someJSON);
// echo $someJSON;
// $prev_o=1;
$s_order='0';
$f_order='0';
$sn='';
$type=$_POST['type'];
if($type=='F')
{

		$up=mysqli_query($con,"SELECT pid, COUNT(*) c FROM product_order WHERE feature != 0 GROUP BY pid HAVING c > 1");
		$find=mysqli_fetch_assoc($up);
		$val = $find['c'];
		if($val>1)
		{
			$e = "Duplicate Entries";
		}
		else{
			$e= "Success";
		}
echo $e;

}
if($type=='C')
	{
		$pid=$_POST['pid'];
		$order=$_POST['row'];
		$ins=mysqli_query($con,"UPDATE `product_order` SET `pid`='$pid',`date`='$dj' WHERE `feature`='$order'");
		
	}
if($type=='N')
{

		$up=mysqli_query($con,"SELECT pid, COUNT(*) c FROM product_order WHERE new != 0 GROUP BY pid HAVING c > 1");
		$find=mysqli_fetch_assoc($up);
		$val = $find['c'];
		if($val>1)
		{
			$e = "Duplicate Entries";
		}
		else{
			$e= "Success";
		}
echo $e;

}
if($type=='Cnew')
	{
		$pid=$_POST['pid'];
		$order=$_POST['row'];
		$ins=mysqli_query($con,"UPDATE `product_order` SET `pid`='$pid',`date`='$dj' WHERE `new`='$order'");
		
	}
if($type=='T')
	{
		$pid=$_POST['pid'];
		$order=$_POST['row'];
		$ins=mysqli_query($con,"UPDATE `product_order` SET `pid`='$pid',`date`='$dj' WHERE `top`='$order'");
		
	}
if($type=='TT')
{

		$up=mysqli_query($con,"SELECT pid, COUNT(*) c FROM product_order WHERE top != 0 GROUP BY pid HAVING c > 1");
		$find=mysqli_fetch_assoc($up);
		$val = $find['c'];
		if($val>1)
		{
			$e = "Duplicate Entries";
		}
		else{
			$e= "Success";
		}
echo $e;

}
?>