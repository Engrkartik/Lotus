<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
$cust_id=$con->real_escape_string($_POST['cust_id']);
$query = mysqli_query($con,"SELECT product_order.*,product.item_name,product.sale_price,product.feature as prod_feature,product.new as prod_new_arrival,product.set_id,product.att_id,product.desc  FROM `product_order` LEFT JOIN product ON product.id=product_order.pid WHERE product.aid='$admin_id' and product.feature='Y' and product_order.feature!='0' order by product.id desc");
$query2 = mysqli_query($con,"SELECT product_order.*,product.item_name,product.sale_price,product.feature as prod_feature,product.new as prod_new_arrival,product.set_id,product.att_id,product.desc  FROM `product_order` LEFT JOIN product ON product.id=product_order.pid WHERE product.aid='$admin_id' and product.new='Y' and product_order.new!='0' order by product.id desc");
$query3=mysqli_query($con,"SELECT design_no,product.* FROM `detail_order` LEFT JOIN product on product.id=detail_order.design_no WHERE cid='$cust_id' AND detail_order.aid='$admin_id' order BY detail_order.id desc LIMIT 10");
$query4=mysqli_query($con,"SELECT category.* FROM `category` WHERE aid='$admin_id'");
 

while($run = mysqli_fetch_assoc($query)){
  $img_arr=[];
  // $color=[];
  $pid=$run['pid'];
  $img=mysqli_query($con,"SELECT * FROM `prod_img` LEFT JOIN product ON product.img=prod_img.img_id WHERE product.id='$pid'");
  while ($row=mysqli_fetch_assoc($img)) {
    $img_arr[] = array('img_url' =>$row['img_url'],'img_id'=>$row['img_id']);
        $thubmail=$row['img_url'];

  }

$pid=$run['pid'];
$set_id=$run['set_id'];
  // $pid=$row['pid'];

  $chk2=mysqli_query($con,"SELECT * FROM set_details WHERE set_details.set_id='$set_id' and set_details.pid='$pid'");
  while($row1=mysqli_fetch_assoc($chk2))
  {
  $color[]=$row1['color'];
  $size=$row1['size'];
}
$m_query=mysqli_query($con,"SELECT * FROM `wishlist` WHERE wishlist.pid='$pid' and wishlist.cid='$cust_id'");
if(mysqli_num_rows($m_query)>0)
{
  $wishlist="Yes";
}else
{
  $wishlist="No";
}
    $data[] =array("id"=>$run['id'],
                  "pid"=>$run['pid'],
                  "feature_order"=>$run['feature'],
                  "new_arrival_order"=>$run['new'],
                  "date"=>$run['date'],
                  "status"=>$run['status'],
                  "item_name"=>$run['item_name'],
                  "sale_price"=>$run['sale_price'],
                  "prod_feature"=>$run['prod_feature'],
                  "prod_new_arrival"=>$run['prod_new_arrival'],
                  "set_id"=>$run['set_id'],
                  "img"=>$img_arr,
                  "wishlist"=>$wishlist,
                  "thum_mail"=>$thubmail,
                  "att_id"=>$run['att_id'],
                  "description"=>$run['desc'],
                  "color"=>$color,
                  "size"=>$size);

} 

while($run2 = mysqli_fetch_assoc($query2)){
    $pid=$run2['pid'];
  $img_arr2=[];
  // $color2=[];

  $img2=mysqli_query($con,"SELECT * FROM `prod_img` LEFT JOIN product ON product.img=prod_img.img_id WHERE product.id='$pid'");
  while ($row2=mysqli_fetch_assoc($img2)) {
    $img_arr2[] = array('img_url' =>$row2['img_url'],'img_id'=>$row2['img_id']);
        $thubmail2=$row2['img_url'];

  }
  $pid=$run2['pid'];
$set_id=$run2['set_id'];
  // $pid=$row['pid'];

  $chk2=mysqli_query($con,"SELECT * FROM set_details WHERE set_details.set_id='$set_id' and set_details.pid='$pid'");
  while($row4=mysqli_fetch_assoc($chk2))
  {
  $color2[]=$row4['color'];
  $size2=$row4['size'];
}
$m_query=mysqli_query($con,"SELECT * FROM `wishlist` WHERE wishlist.pid='$pid' and wishlist.cid='$cust_id'");
if(mysqli_num_rows($m_query)>0)
{
  $wishlist="Yes";
}else
{
  $wishlist="No";
}
    $data2[] =array("id"=>$run2['id'],
                  "pid"=>$run2['pid'],
                  "feature_order"=>$run2['feature'],
                  "new_arrival_order"=>$run2['new'],
                  "date"=>$run2['date'],
                  "status"=>$run2['status'],
                  "item_name"=>$run2['item_name'],
                  "sale_price"=>$run2['sale_price'],
                  "prod_feature"=>$run2['prod_feature'],
                  "prod_new_arrival"=>$run2['prod_new_arrival'],
                  "set_id"=>$run2['set_id'],
                  "img"=>$img_arr2,
                  "wishlist"=>$wishlist,
                  "thum_mail"=>$thubmail2,
                  "att_id"=>$run2['att_id'],
                  "description"=>$run2['desc'],
                  "color"=>$color2,
                  "size"=>$size2);

}

while($run3 = mysqli_fetch_assoc($query3)){
   $pid=$run3['id'];
  $img_arr3=[];
  // $color3=[];
  $img3=mysqli_query($con,"SELECT * FROM `prod_img` LEFT JOIN product ON product.img=prod_img.img_id WHERE product.id='$pid'");
  while ($row3=mysqli_fetch_assoc($img3)) {
    $img_arr3[] = array('img_url' =>$row3['img_url'],'img_id'=>$row3['img_id']);
    $thubmail3=$row3['img_url'];
  }
  $pid=$run3['pid'];
$set_id=$run3['set_id'];
  // $pid=$row['pid'];

  $chk2=mysqli_query($con,"SELECT * FROM set_details WHERE set_details.set_id='$set_id' and set_details.pid='$pid'");
  while($row5=mysqli_fetch_assoc($chk2))
  {
  $color3[]=$row5['color'];
  $size3=$row5['size'];
}
$m_query=mysqli_query($con,"SELECT * FROM `wishlist` WHERE wishlist.pid='$pid' and wishlist.cid='$cust_id'");
if(mysqli_num_rows($m_query)>0)
{
  $wishlist="Yes";
}else
{
  $wishlist="No";
}
    $data3[] =array("design_no"=>$run3['design_no'],
                  "id"=>$run3['id'],
                  "aid"=>$run3['aid'],
                  "title"=>$run3['title'],
                  "item_name"=>$run3['item_name'],
                  "cat_id"=>$run3['cat_id'],
                  "sale_price"=>$run3['sale_price'],
                  "discount"=>$run3['discount'],
                  "tax"=>$run3['tax'],
                  "avail_qty"=>$run3['avail_qty'],
                  "feature"=>$run3['feature'],
                  "new_arrival"=>$run3['new'],
                  "date"=>$run3['date'],
                  "desc"=>$run3['desc'],
                  "brand"=>$run3['brand'],
                  "desc"=>$run3['desc'],
                  "set_id"=>$run3['set_id'],
                  "att_id"=>$run3['att_id'],
                  "status"=>$run3['status'],
                  "remark"=>$run3['remark'],
                  "img"=>$img_arr3,
                  "wishlist"=>$wishlist,
                  "thum_mail"=>$thubmail3,
                  "att_id"=>$run3['att_id'],
                  "description"=>$run3['desc'],
                  "color"=>$color3,
                  "size"=>$size3);


}


while($run4 = mysqli_fetch_assoc($query4))
{
    $data4[] =array("id"=>$run4['id'],
                  "aid"=>$run4['aid'],
                  "title"=>$run4['title'],
                  "img"=>$run4['img'],
                  "date"=>$run4['date'],
                  "status"=>$run4['status'],
                  "parent_id"=>$run4['parent_id'],
                  "remark"=>$run4['remark'],
                  "thum_mail"=>"");


}



  $json = array(
      "status"=>true,
      "Feature"=>$data,
      "NewArrival"=>$data2,
      "category"=>$data4,
      "RecentOrder"=>$data3,
      "msg"=>"Success"
    );

    header('Content-Type: application/json');
    echo json_encode($json);
}
?>