<?php 
include '../includes/connect.php';
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){
$data=array();

$bid = mysqli_real_escape_string($con,$_POST['bid']);
$order_id = mysqli_real_escape_string($con,$_POST['order_id']);
$t_no = mysqli_real_escape_string($con,$_POST['table_no']);
$waiter_id = mysqli_real_escape_string($con,$_POST['wid']);

	// $query = mysqli_query($con,"SELECT * FROM `orders` LEFT JOIN order_details USING (order_id) WHERE orders.order_id = '$order_id'");
	$query = mysqli_query($con,"SELECT orders.id,date(orders.date) as date, orders.order_id,branch.name as bname,tables.tables_no,users.name as username,orders.customer_name,orders.mobile,orders.description,orders.date,orders.payment_type,items.name,order_details.quantity,order_details.price,orders.gst,orders.total_amt FROM `orders` LEFT JOIN order_details USING (order_id) LEFT JOIN branch ON orders.bid = branch.id LEFT JOIN `tables` ON orders.table_no = tables.id LEFT JOIN users on orders.waiter_id = users.id LEFT JOIN items ON order_details.item_id = items.id WHERE orders.order_id ='$order_id'");
	
$html='';
$i=0;
$data2=array();
	while ($row=mysqli_fetch_assoc($query)) {
		$i++;
        $data[]=$row;
        $id = $row['id'];
        // $order_id = $row['order_id'];
        $date = date('Y-m-d',strtotime($row['date']));
		$waiter = $row['username'];
        $table_no = $row['tables_no'];
        $name = $row['name'];
        $quantity = $row['quantity'];
        $price = $row['price'];
		// $data2=array('price'=>$price,
		// 		'total'=>($price*$quantity));
        
		// $total=round(($price*$quantity),2);
		// $net_total+=$total;
		$html.='{%22WAITER%22:%22'.urlencode($waiter).'%22,%22TABLENO%22:%22'.$table_no.'%22,%22ITEM%22:%22'.urlencode($name).'%22,%22DESCRIPTION%22:%22%22,%22QTY%22:%22'.$quantity.'%22,%22UNIT%22:%22PCS%22,%22RATE%22:%22'.$price.'%22,%22AMOUNT%22:%22'.($price*$quantity).'%22,%22DATE%22:%22'.$date.'%22,%22STATUS%22:%22UNPAID%22,%22REMARKS%22:%22thanks%22}';
		if($i<mysqli_num_rows($query))
		{
			$html.=',';
		}

    }

    if($query){

    	// $response = file_get_contents('http://app.ssspltd.com/apiRestro/AddOrderDetails?DB=A100&MOB=8053520936&ORDERDETAILS=[{%22REMOTEID%22:%22'.$id.'%22,%22ORDERNO%22:%22'.$order_id.'%22,%22WAITER%22:%22'.$waiter.'%22,%22TABLENO%22:%22'.$table_no.'%22,%22ITEM%22:%22'.$name.'%22,%22DESCRIPTION%22:%22%22,%22QTY%22:%22'.$qty.'%22,%22UNIT%22:%22PCS%22,%22RATE%22:%222'.$price.'%22,%22AMOUNT%22:%22200%22,%22DATE%22:%22'.$date.'%22,%22STATUS%22:%22UNPAID%22,%22REMARKS%22:%22thanks%22}]');
		
	$sql1 = mysqli_query($con, "SELECT * FROM order_details WHERE order_id = '$order_id'");
	$sql2 = mysqli_query($con, "SELECT * FROM order_details WHERE order_id = '$order_id' and status='Delivered'");
	$order_count=mysqli_num_rows($sql1);
	$order_count2=mysqli_num_rows($sql2);
if($order_count==$order_count2)
{
	$response=file_get_contents('http://app.ssspltd.com/apiRestro/AddOrderDetails?DB=A100&MOB=8053520936&REMOTEID='.$id.'&ORDERNO='.$order_id.'&ORDERDETAILS=['.$html.']');
  if($response){

	if((mysqli_num_rows($query))>0){

		$update = mysqli_query($con,"UPDATE `orders` SET `status`= 'delivered' WHERE order_id = '$order_id'");
	}

	$query1 = mysqli_query($con,"SELECT * FROM `tables` WHERE id = '$t_no' ");

	if((mysqli_num_rows($query1))>0){

		$update = mysqli_query($con,"UPDATE `tables` SET `status`= 'empty' WHERE id = '$t_no'");
	}
	
	if($response)
		{
			 $json = array(
	        "status" => true,
	        "details" => $data,
	        "msg"  => "Order Billed Successfully"
	    );
	} else {
		$json = array(
	        "status" => false,
	        "details" => $data,
	        "msg" => 'Bill not generated'
	    );
	}
  }else {
		$json = array(
	        "status" => false,
	        "details" => $data,
	        "msg" => 'Server not responding Please try again'
	    );
	}
}else {
		$json = array(
		"status" => false,
		"details" => $data,
		"msg" => "Some Items are yet to be delivered..!!"
	);
}
	
    }
    else{
	    	$json = array(
	        "status" => false,
	        "details" => $data,
	        "msg" => "No data..!!"
	    );
    }

     header('Content-Type: application/json');
    echo json_encode($json);
}
?>