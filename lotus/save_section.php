<?php
include('include/db.php');

date_default_timezone_get('Asia/Kolkata');
$dj = date("Y-m-d:H:i:s");

$type = $_POST['type'];
//////////////////////////////////////////////////////NEW ARRIVAL///////////////////////////////////////////////////////////////
if($type=="Arrival"){
	$pid = $_POST['new_id'];
	// echo $id;
	$avlbl = mysqli_query($con,"SELECT * FROM `product_order` WHERE pid = '$pid' and new != '0' and status = 'A'");
	if((mysqli_num_rows($avlbl))<1){

	$findorder = mysqli_query($con,"SELECT * FROM `product_order` WHERE new !=0 order by id desc");
	$fetchorder = mysqli_fetch_array($findorder);
	$order = $fetchorder['new'];

	if((mysqli_num_rows($findorder))>0){
		$val = $order+1;

		// $order_check = mysqli_query($con,"SELECT * from `product_order` where new != '0' and status = 'D' order by id");
		// $order_count = mysqli_num_rows($order_check);
		
		// if($order_count>0){
		// 	$order_fetch = mysqli_fetch_array($order_check);
		// 	$id1	= $order_fetch['id'];
		// 	$new = $order_fetch['new'];

		// 	$inorder = mysqli_query($con,"UPDATE `product_order` SET `pid`='$pid',`feature`='0',`top`='0',`new`='$new',`date`='$dj',`status`='A' where id = '$id1'");
		// }
		// else{
			$inorder = mysqli_query($con,"INSERT INTO `product_order`(`pid`, `feature`, `top`, `new`, `date`) VALUES ('$pid','0','0','$val','$dj')");
		// }

		$upnew = mysqli_query($con,"UPDATE `product` SET `new`='Y' WHERE id='$pid'");

	}
	else{
		$val = $order+1;

		$inorder = mysqli_query($con,"INSERT INTO `product_order`(`pid`, `feature`, `top`, `new`, `date`) VALUES ('$pid','0','0','$val','$dj')");
		$upnew = mysqli_query($con,"UPDATE `product` SET `new`='Y' WHERE id='$pid'");

	}

	if($inorder){
		echo "Success";
	}
	else{
		echo mysqli_error($con);
	}
  }
  else{
  	echo "Duplicate Entry";
  }
}
////////////////////////////////////////////////////-END-////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////-FEATURE-///////////////////////////////////////////////////////////////
if($type=="Feature"){
	$pid = $_POST['new_id'];
	// echo $id;
	$avlbl = mysqli_query($con,"SELECT * FROM `product_order` WHERE pid = '$pid' and feature != '0' and status ='A'");
	if((mysqli_num_rows($avlbl))<1){

	$findorder = mysqli_query($con,"SELECT * FROM `product_order` WHERE feature !=0 order by id desc");
	$fetchorder = mysqli_fetch_array($findorder);
	$order = $fetchorder['feature'];

	if((mysqli_num_rows($findorder))>0){
		$val = $order+1;

		// $order_check = mysqli_query($con,"SELECT * from `product_order` where feature != '0' and status = 'D' order by id");
		// $order_count = mysqli_num_rows($order_check);
		
		// if($order_count>0){
		// 	$order_fetch = mysqli_fetch_array($order_check);
		// 	$id1	= $order_fetch['id'];
		// 	$feature = $order_fetch['feature'];

		// 	$inorder = mysqli_query($con,"UPDATE `product_order` SET `pid`='$pid',`feature`='$feature',`top`='0',`new`='0',`date`='$dj',`status`='A' where id = '$id1'");
		// }
		// else{
			$inorder = mysqli_query($con,"INSERT INTO `product_order`(`pid`, `feature`, `top`, `new`, `date`) VALUES ('$pid','$val','0','0','$dj')");
		// }

		$upnew = mysqli_query($con,"UPDATE `product` SET `feature`='Y' WHERE id='$pid'");

	}
	else{
		$val = $order+1;
		$inorder = mysqli_query($con,"INSERT INTO `product_order`(`pid`, `feature`, `top`, `new`, `date`) VALUES ('$pid','$val','0','0','$dj')");
		$upnew = mysqli_query($con,"UPDATE `product` SET `feature`='Y' WHERE id='$pid'");

	}

	if($inorder){
		echo "Success";
	}
	else{
		echo mysqli_error($con);
	}
  }
  else{
  	echo "Duplicate Entry";
  }
}
///////////////////////////////////////////////////////-END-///////////////////////////////////////////////////////////////////////
?>