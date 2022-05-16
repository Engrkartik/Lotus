<?php
include '../includes/connect.php';
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){
		
	$bid = mysqli_real_escape_string($con,$_POST['bid']);
	$table_no = mysqli_real_escape_string($con,$_POST['table_no']);
	$order = mysqli_real_escape_string($con,$_POST['order']);
	$someArray = json_decode($order);

	$ii = mysqli_query($con,"SELECT * from save_to_later where table_no = '$table_no' and bid = '$bid'");
    $isAvlbl = mysqli_num_rows($ii);
    if($isAvlbl<1)
	{

		foreach($someArray as $value)
	    { 
	        $qty = $value->qty;
	        $itemid = $value->itemid;
	        $price=round(( $value->price),2);
	        $itemcat= $value->itemcat;
	        	        
	        $query = mysqli_query($con, "INSERT INTO `save_to_later`(`bid`,`item_id`, `cat_id`, `qty`, `price`, `table_no`, `date`) VALUES ('$bid','$itemid','$itemcat','$qty','$price','$table_no','$dj')");
	        $chk = mysqli_num_rows($query);
	    }
	
		if ($query)
			{
			$json = array(
				"status" => 1,
				"msg"  => "Save to later"
			);
			}
		  else
			{
			$json = array(
				"status" => 0,
				"msg" => "Error, Not Save to later"
			);
			}
	}else{

	    $json = array(
	        "status" => 2 ,
	        "msg" => "Already in Save to later"
	    );
	}

		echo json_encode($json);
		exit;
		}
?>

