<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$aid=$con->real_escape_string($_POST['admin_id']);
$cust_id=$con->real_escape_string($_POST['cust_id']);
$pid=$con->real_escape_string($_POST['p_id']);
$set_id=$con->real_escape_string($_POST['set_id']);
$qty=$con->real_escape_string($_POST['qty']);

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
 $final= mysqli_query($con,"DELETE FROM `wishlist` WHERE cid='$cust_id' and aid='$admin_id' and pid='$pid'");

 // $json = array(
 //        "status"=>false,
 //      // "details"=>$count,
 //        "msg"=>"Already In Cart"
 //    );
}else{
$query = mysqli_query($con,"INSERT INTO `add_cart`(`aid`, `cid`, `pid`, `size`, `color`, `qty`, `tax`, `price`, `packing`,`date`, `status`) VALUES ('$aid','$cust_id','$pid','$size','$color','$qty','$tax','$price','$packing','$dj','A')");
if($query)
{
 $final= mysqli_query($con,"DELETE FROM `wishlist` WHERE cid='$cust_id' and aid='$admin_id' and pid='$pid'");
}
// $count = mysqli_num_rows($query);
}
if($final)
{
  $json = array(
      "status"=>true,
      // "details"=>$count,
      "msg"=>"Remove From wishlist"
  );

} 
else
{
  $json=array("status"=>false,
              "msg"=>"No Record");
}
// }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>