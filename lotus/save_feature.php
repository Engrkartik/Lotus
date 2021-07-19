<?php
include ("include/db.php");
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");
$someJSON = $_POST["mydata"];
$someArray = json_decode($someJSON);
// echo $someJSON;
// $prev_o=1;
$s_order='0';
$f_order='0';
$sn='';
$type=$_POST['type'];
if($type=='F')
{
foreach($someArray as $value)
	{ 
	
		$order =$value->order;
		$pid = $value->pid;
		$up=mysqli_query($con,"SELECT * FROM product_order WHERE pid='$pid' and product_order.feature != 0 and status = 'A' order by pid asc");
		if(mysqli_num_rows($up)>1)
		{
			$e= "Duplicate Record";
			break;
			
		}

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

//top selling

	if($type=='T')
{
foreach($someArray as $value)
	{ 
	
		$order =$value->order;
		$pid = $value->pid;
		$up=mysqli_query($con,"SELECT * FROM product_order WHERE pid='$pid' and product_order.top != 0 and status = 'A' order by pid asc");
		if(mysqli_num_rows($up)>1)
		{
			$e= "Duplicate Record";
			break;
			
		}

		$e= "Success";

	}
echo $e;

}	
if($type=='TC')
	{
		$pid=$_POST['pid'];
		$order=$_POST['row'];
		$ins=mysqli_query($con,"UPDATE `product_order` SET `pid`='$pid',`date`='$dj' WHERE `top`='$order'");
		
		
	}
//new arrival

	if($type=='N')
{
foreach($someArray as $value)
	{ 
	
		$order =$value->order;
		$pid = $value->pid;
		$up=mysqli_query($con,"SELECT * FROM product_order WHERE pid='$pid' and product_order.new != 0 and status = 'A' order by pid asc");
		if(mysqli_num_rows($up)>1)
		{
		$e= "Duplicate Record";
			break;
			
		}

		$e= "Success";

	}
echo $e;
}	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($type=='NC')
	{
		$pid=$_POST['pid'];
		$order=$_POST['row'];
		$ins=mysqli_query($con,"UPDATE `product_order` SET `pid`='$pid',`date`='$dj' WHERE `new`='$order'");
		
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if($type=='deleteF')
	{
		$scode=$_POST['id'];
		$ins=mysqli_query($con,"DELETE FROM `product` WHERE `scode`='$scode' and feature = 'Y'");
		$del=mysqli_query($con,"UPDATE `product_order` SET `status`='D' where `pid`='$scode' and feature != '0'");
		if($ins){
			echo "Success";
		}
		else{
			echo "Error";
		}
	}
	if($type=='deleteNew')
	{
		$scode=$_POST['id'];
		$ins=mysqli_query($con,"DELETE FROM `product` WHERE `scode`='$scode' and new = 'Y'");
		$del=mysqli_query($con,"UPDATE `product_order` SET `status`='D' where `pid`='$scode' and new != '0'");
		if($ins){
			echo "Success";
		}
		else{
			echo "Error";
		}
	}
	if($type=='deleteTop')
	{
		$scode=$_POST['id'];
		$ins=mysqli_query($con,"DELETE FROM `product` WHERE `scode`='$scode' and top = 'Y'");
		$del=mysqli_query($con,"UPDATE `product_order` SET `status`='D' where `pid`='$scode' and top != '0'");
		if($ins){
			echo "Success";
		}
		else{
			echo "Error";
		}
	}
// if($type=='N')
// {
// foreach($someArray as $value)
// 	{ 
	// 		$order =$value->order;
// 		$pid = $value->pid;
// 		$up=mysqli_query($con,"SELECT * FROM product_order WHERE pid='$pid' order by pid asc");
// 		if(mysqli_num_rows($up)>1)
// 		{
// 		$e= "Duplicate Record";
// 			break;
			
// 		}

// 		$e= "Success";
// 	}
// echo $e;
// }	
//add feature item

	if($type=='Feature')
	{
		$item=$_POST['new_id'];

		$split = explode("~", $item);

		$scode = $split[0];
		$code  = $split[1];
		$party = $split[2];
		$img   = urlencode(utf8_encode($split[3]));
		$category=$split[4];
				
		$query=mysqli_query($con,"SELECT * FROM `product_order` WHERE pid='$scode' AND feature != 0");
		if(mysqli_num_rows($query)>0)
		{	echo "Already Added";
	}
	else{
		$chk=mysqli_query($con,"SELECT * FROM `product_order` ORDER by feature desc limit 1");
		if(mysqli_num_rows($chk)>0)
		{
			$row=mysqli_fetch_array($chk);
			$id=$row['feature']+1;
			$upt=mysqli_query($con,"INSERT INTO `product`(`aid`, `party`, `art`, `scode`,`category`, `img`, `feature`,`date`) VALUES ('1','$party','$code','$scode','$category','$img','Y','$dj')");
		}
		else
		{
			$id=1;
			$upt=mysqli_query($con,"INSERT INTO `product`(`aid`, `party`, `art`, `scode`,`category`, `img`, `feature`,`date`) VALUES ('1','$party','$code','$scode','$category','$img','Y','$dj')");
		}
			$order_check = mysqli_query($con,"SELECT * from `product_order` where feature != '0' and status = 'D' order by id");
			$order_count = mysqli_num_rows($order_check);
		
		if($order_count>0){
			$order_fetch = mysqli_fetch_array($order_check);
			$id1	= $order_fetch['id'];
			$feature = $order_fetch['feature'];
			$ins = mysqli_query($con,"UPDATE `product_order` SET `pid`='$scode',`feature`='$feature',`top`='0',`new`='0',`date`='$dj',`status`='A' where id = '$id1'");
		}
		else{
			$ins=mysqli_query($con,"INSERT INTO `product_order`(`pid`, `feature`, `top`, `new`, `date`) VALUES ('$scode','$id','0','0','$dj')");
		}
		if($ins)
			{
				echo "Success";
			}
			else{
				echo "Error";
			}		
	}
}
if($type=='New Arrival')
	{
		$item=$_POST['new_id'];

		$split = explode("~", $item);

		$scode = $split[0];
		$code  = $split[1];
		$party = $split[2];
		$img   = urlencode($split[3]);
		$category=$split[4];
				
		$query=mysqli_query($con,"SELECT * FROM `product_order` WHERE pid='$scode' AND new != 0");
		if(mysqli_num_rows($query)>0)
		{	echo "Already Added";
	}
	else{
		$chk=mysqli_query($con,"SELECT * FROM `product_order` ORDER by new desc limit 1");
		if(mysqli_num_rows($chk)>0)
		{
			$row=mysqli_fetch_array($chk);
			$id=$row['new']+1;
			// if($id>6){
			// 	echo "six product already added, remove any product first";
			// 	break;
			// }
			// else{
			$upt=mysqli_query($con,"INSERT INTO `product`(`aid`, `party`, `art`, `scode`,`category`, `img`, `new`,`date`) VALUES ('1','$party','$code','$scode','$category','$img','Y','$dj')");
			// }
		}
		else
		{
			$id=1;
			$upt=mysqli_query($con,"INSERT INTO `product`(`aid`, `party`, `art`, `scode`,`category`, `img`, `new`,`date`) VALUES ('1','$party','$code','$scode','$category','$img','Y','$dj')");
		}
		$order_check = mysqli_query($con,"SELECT * from `product_order` where new != '0' and status = 'D' order by id");
			$order_count = mysqli_num_rows($order_check);
				if($order_count>0){
			$order_fetch =	 mysqli_fetch_array($order_check);
			$id1		 =	 $order_fetch['id'];
			$feature 	 =	 $order_fetch['new'];
			$ins = mysqli_query($con,"UPDATE `product_order` SET `pid`='$scode',`feature`='0',`top`='0',`new`='$feature',`date`='$dj',`status`='A' where id = '$id1'");
		}
		else{
			$ins=mysqli_query($con,"INSERT INTO `product_order`(`pid`, `feature`, `top`, `new`, `date`) VALUES ('$scode','0','0','$id','$dj')");
		}
		
		if($ins)
			{
				echo "Success";
			}
			else{
				echo "Error";
			}
		
	}
}	
if($type=='Top Selling')
	{
		$item=$_POST['new_id'];

		$split = explode("~", $item);

		$scode = $split[0];
		$code  = $split[1];
		$party = $split[2];
		$img   = urlencode($split[3]);
		$category=$split[4];
				
		$query=mysqli_query($con,"SELECT * FROM `product_order` WHERE pid='$scode' AND top != 0");
		if(mysqli_num_rows($query)>0)
		{	echo "Already Added";
	}
	else{
		$chk=mysqli_query($con,"SELECT * FROM `product_order` ORDER by top desc limit 1");
		if(mysqli_num_rows($chk)>0)
		{
			$row=mysqli_fetch_array($chk);
			$id=$row['top']+1;
			$upt=mysqli_query($con,"INSERT INTO `product`(`aid`, `party`, `art`, `scode`,`category`, `img`, `top`,`date`) VALUES ('1','$party','$code','$scode','$category','$img','Y','$dj')");
		}
		else
		{
			$id=1;
			$upt=mysqli_query($con,"INSERT INTO `product`(`aid`, `party`, `art`, `scode`,`category`, `img`, `top`,`date`) VALUES ('1','$party','$code','$scode','$category','$img','Y','$dj')");
		}
			$order_check = mysqli_query($con,"SELECT * from `product_order` where top != '0' and status = 'D' order by id");
			$order_count = mysqli_num_rows($order_check);
		
		if($order_count>0){
			$order_fetch = mysqli_fetch_array($order_check);
			$id1	= $order_fetch['id'];
			$feature = $order_fetch['top'];
			$ins = mysqli_query($con,"UPDATE `product_order` SET `pid`='$scode',`feature`='0',`top`='$feature',`new`='0',`date`='$dj',`status`='A' where id = '$id1'");
		}
		else{
			$ins=mysqli_query($con,"INSERT INTO `product_order`(`pid`, `feature`, `top`, `new`, `date`) VALUES ('$scode','0','$id','0','$dj')");
		}
		if($ins)
			{
				echo "Success";
			}
			else{
				echo "Error";
			}		
	}
}
?>