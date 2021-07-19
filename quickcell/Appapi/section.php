<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
$cust_id=$con->real_escape_string($_POST['cust_id']);

$query = mysqli_query($con,"SELECT product_order.*,product.item_name,product.sale_price,prod_img.img_url,product.feature,product.new  FROM `product_order` LEFT JOIN product ON product.id=product_order.pid LEFT JOIN prod_img on prod_img.img_id=product.img WHERE product.aid='$admin_id' and product.feature='Y'");
$query2 = mysqli_query($con,"SELECT product_order.*,product.item_name,product.sale_price,prod_img.img_url,product.feature,product.new  FROM `product_order` LEFT JOIN product ON product.id=product_order.pid LEFT JOIN prod_img on prod_img.img_id=product.img WHERE product.aid='$admin_id' and product.new='Y'");
$query3=mysqli_query($con,"SELECT design_no,product.*,prod_img.img_url FROM `detail_order` LEFT JOIN product on product.id=detail_order.design_no LEFT JOIN prod_img on prod_img.img_id=product.img WHERE cid='$cust_id' AND detail_order.aid='$admin_id' order BY detail_order.id desc LIMIT 10");
$query4=mysqli_query($con,"SELECT category.* FROM `category` WHERE aid='$admin_id'");
 
$count = mysqli_num_rows($query4);

while($run = mysqli_fetch_assoc($query)){
    $data[] =$run;

}
while($run2 = mysqli_fetch_assoc($query2)){
    $data2[] =$run2;

}
while($run3 = mysqli_fetch_assoc($query3)){
    $data3[] =$run3;

}
while($run4 = mysqli_fetch_assoc($query4)){
    $data4[] =$run4;

}
if(empty($cust_id)){
  $data3=[];
 }

if($count>0)
{
  $json = array(
      "status"=>true,
      "Feature"=>$data,
      "NewArrival"=>$data2,
      "category"=>$data4,
      "RecentOrder"=>$data3,
      "msg"=>"Success"
  );

} else{
    $json = array(
        "status"=>false,
        "Feature"=>$data,
        "NewArrival"=>$data2,
      "category"=>$data4,
        "RecentOrder"=>$data3,
        "msg"=>"No Data"
    );

 }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>