<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
$cust_id=$con->real_escape_string($_POST['cust_id']);
$type=$con->real_escape_string($_POST['type']);
if($type=="f")
{
$query = mysqli_query($con,"SELECT product_order.*,product.*,prod_img.img_url,product.feature,product.new  FROM `product_order` LEFT JOIN product ON product.id=product_order.pid LEFT JOIN prod_img on prod_img.img_id=product.img WHERE product.aid='$admin_id' and product.feature='Y'");
while($run = mysqli_fetch_assoc($query)){
    $data[] =$run;

}
}elseif($type=="n")
{
$query = mysqli_query($con,"SELECT product_order.*,product.*,prod_img.img_url,product.feature,product.new  FROM `product_order` LEFT JOIN product ON product.id=product_order.pid LEFT JOIN prod_img on prod_img.img_id=product.img WHERE product.aid='$admin_id' and product.new='Y'");
while($run = mysqli_fetch_assoc($query)){
    $data[] =$run;

}
}elseif($type=="l")
{
$query=mysqli_query($con,"SELECT design_no,product.*,prod_img.img_url FROM `detail_order` LEFT JOIN product on product.item_name=detail_order.design_no LEFT JOIN prod_img on prod_img.img_id=product.img WHERE cid='$cust_id' AND detail_order.aid='$admin_id' order BY detail_order.id desc LIMIT 10");
while($run = mysqli_fetch_assoc($query)){
    $data[] =$run;

}
// $query4=mysqli_query($con,"SELECT category.* FROM `category` WHERE aid='$admin_id'");
 }
$count = mysqli_num_rows($query);


if($count>0)
{
  $json = array(
      "status"=>true,
      "details"=>$data,
      "msg"=>"Success"
  );

} else{
    $json = array(
        "status"=>false,
        "Feature"=>$data,
        "msg"=>"No Data"
    );

 }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>