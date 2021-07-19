<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$aid=$con->real_escape_string($_POST['admin_id']);
$cust_id=$con->real_escape_string($_POST['cust_id']);
// $pid=$con->real_escape_string($_POST['p_id']);
$chk=mysqli_query($con,"SELECT product.*,prod_img.id as i_id,prod_img.img_id,prod_img.img_url,prod_img.date,prod_img.aid,wishlist.id as wid,wishlist.aid,wishlist.cid,wishlist.pid,wishlist.date,wishlist.status FROM `wishlist` LEFT JOIN product on product.id=wishlist.pid LEFT JOIN prod_img ON product.img=prod_img.img_id WHERE wishlist.cid='$cust_id' group by wishlist.id");
while ($row=mysqli_fetch_assoc($chk)) {
	$data[]=$row;
}
if(is_null($data))
	{
	 $json = array(
      "status"=>false,
      "details"=>$data,
      "msg"=>"Wishlist is empty"
  );
	}
	else
{

  $json = array(
      "status"=>true,
      "details"=>$data,
      "msg"=>"Added"
  );

}
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>