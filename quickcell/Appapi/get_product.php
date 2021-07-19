<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
$cat_id=$con->real_escape_string($_POST['cat_id']);
$query = mysqli_query($con,"SELECT product.*,prod_img.img_url,category.title  FROM `product` LEFT JOIN category ON category.id=product.cat_id LEFT JOIN prod_img on prod_img.img_id=product.img WHERE product.aid='$admin_id' and product.status!='R' GROUP BY product.id");

$count = mysqli_num_rows($query);

while($run = mysqli_fetch_assoc($query)){
    $data[] =$run;

}
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
      "details"=>$data,
        "msg"=>"No Data"
    );

 }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>