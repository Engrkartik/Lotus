<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$aid=$con->real_escape_string($_POST['admin_id']);
$cust_id=$con->real_escape_string($_POST['cust_id']);
$pid=$con->real_escape_string($_POST['p_id']);
$set_id=$con->real_escape_string($_POST['set_id']);
// $color=$con->real_escape_string($_POST['color']);
$qty=$con->real_escape_string($_POST['qty']);
// $tax=$con->real_escape_string($_POST['tax']);
// $price=$con->real_escape_string($_POST['price']);
// $packing=$con->real_escape_string($_POST['packing']);
$chk=mysqli_query($con,"SELECT * FROM `set_details` WHERE set_id='$set_id'");
$row=mysqli_fetch_assoc($chk);
$size=$row['size'];
$color=$row['color'];
$packing=$row['qty'];
$prod=mysqli_query($con,"SELECT * FROM `product` WHERE id='$pid'");
$run=mysqli_fetch_assoc($prod);
$tax=$run['tax'];
$price=$run['sale_price'];
$chk=mysqli_query($con,"SELECT * FROM `add_cart` WHERE cid='$cust_id' and pid='$pid'");
if(mysqli_num_rows($chk)>0)
{
 $json = array(
        "status"=>false,
      // "details"=>$count,
        "msg"=>"Already In Cart"
    );
}else{
$query = mysqli_query($con,"INSERT INTO `add_cart`(`aid`, `cid`, `pid`, `size`, `color`, `qty`, `tax`, `price`, `packing`,`date`, `status`) VALUES ('$aid','$cust_id','$pid','$size','$color','$qty','$tax','$price','$packing','$dj','A')");

// $count = mysqli_num_rows($query);

if($query)
{
  $json = array(
      "status"=>true,
      // "details"=>$count,
      "msg"=>"Added"
  );

} 
}
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>