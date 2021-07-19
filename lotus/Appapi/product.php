<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
$cat_id=$con->real_escape_string($_POST['cat_id']);
$user = $con->real_escape_string($_POST['user_id']);
// $query = mysqli_query($con,"SELECT product.*,prod_img.img_url,category.title  FROM `product` LEFT JOIN category ON category.id=product.cat_id LEFT JOIN prod_img on prod_img.img_id=product.img WHERE product.aid='$admin_id' and product.status='A' and product.cat_id='$cat_id' AND product.avail_qty>0 GROUP BY product.id");
$query = mysqli_query($con,"SELECT product.*,prod_img.img_url,category.title as cat_title,company_reg.OWNER_NAME FROM `product` LEFT JOIN category ON category.id=product.cat_id LEFT JOIN prod_img on prod_img.img_id=product.img LEFT JOIN company_reg on company_reg.aid = product.aid WHERE product.aid='$admin_id' and product.status='A' and product.cat_id='$cat_id' AND product.avail_qty>0 GROUP BY product.id");

$count = mysqli_num_rows($query);

while($run = mysqli_fetch_assoc($query)){
  // $data[]=$run;
$img_id=$run['img'];
$img_query=mysqli_query($con,"SELECT img_url FROM `prod_img` WHERE `img_id` = '$img_id'");
$img = [];
while($row=mysqli_fetch_assoc($img_query))
{
  $img[]=$row;
}
// $cid=$run['cid'];
$pid=$run['id'];

$m_query=mysqli_query($con,"SELECT * FROM `wishlist` WHERE wishlist.pid='$pid' and wishlist.cid='$user'");
if(mysqli_num_rows($m_query)>0)
{
  $wishlist="Yes";
}else
{
  $wishlist="No";
}
    $data[]=array("id"=>$run['id'],
                "aid"=>$run['aid'],
                "title"=>$run['cat_title'],
                "item_name"=>$run['title'],
                "sale_price"=>$run['sale_price'],
                "discount"=>$run['discount'],
                "tax"=>$run['tax'],
                "avail_qty"=>$run['avail_qty'],
                "img"=>$img,
                "feature"=>$run['feature'],
                "nnew"=>$run['new'],
                "date"=>$run['date'],
                 "desc"=>$run['desc'],
                 "brand"=>$run['brand'],
                 "set_id"=>$run['set_id'],
                 "att_id"=>$run['att_id'],
                 "status"=>$run['status'],
                 "remark"=>$run['remark'],
                 "wishlist"=>$wishlist,
                 "owner"=>$run['OWNER_NAME'],

              );


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