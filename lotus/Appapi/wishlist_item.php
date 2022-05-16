<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");
$today=date('Y-m-d');
if($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
$cust_id=$con->real_escape_string($_POST['cust_id']);
$query=mysqli_query($con,"SELECT product.*,(SELECT disc FROM discount where aid='$admin_id' and pid=product.id and discount.from_dt<='$today' and discount.to_dt>='$today') as disc,(SELECT disc_type FROM discount where aid='$admin_id' and pid=product.id and discount.from_dt<='$today' and discount.to_dt>='$today') as disc_type,prod_img.img_url,category.title as cat_title,wishlist.id as wid  FROM `product` LEFT JOIN category ON category.id=product.cat_id LEFT JOIN prod_img on prod_img.img_id=product.img LEFT JOIN wishlist ON wishlist.pid=product.id WHERE product.id IN (SELECT pid FROM wishlist where aid='$admin_id' and cid='$cust_id') and product.aid='$admin_id' and wishlist.cid='$cust_id' and product.status='A' AND product.avail_qty>0 GROUP BY product.id order by wishlist.id desc");
while ($run=mysqli_fetch_assoc($query)) {
   $img_id=$run['img'];
$img_query=mysqli_query($con,"SELECT img_url FROM `prod_img` WHERE `img_id` = '$img_id' and aid='$admin_id'");
$img = [];
while($row2=mysqli_fetch_assoc($img_query))
{
  $img[]=$row2;
}
// $cid=$run['cid'];
$pid=$run['id'];
$set_id=$run['set_id'];
  // $pid=$row['pid'];

  $chk2=mysqli_query($con,"SELECT * FROM set_details WHERE set_details.set_id='$set_id' and set_details.pid='$pid' and aid='$admin_id'");
  while($row=mysqli_fetch_assoc($chk2))
  {
  $color_r=[];
  $color_r[]=$row['color'];
  $size_r=$row['size'];
  $qty=$row['qty'];
}
$m_query=mysqli_query($con,"SELECT * FROM `wishlist` WHERE wishlist.pid='$pid' and wishlist.cid='$cust_id' and aid='$admin_id'");
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
                "sale_price"=>round($run['sale_price'],0),
                "discount"=>($run['disc_type']=='A'?($run['disc']):($run['sale_price']*$run['disc'])),
                "tax"=>$run['tax'],
                "avail_qty"=>round($run['avail_qty'],0),
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
                  "color"=>$color_r,
                 "size"=>$size_r,
                 "set_qty"=>$qty,"mrp"=>round(($run['mrp']==null)?'0':$run['mrp'],0),
                 "wid"=>$run['wid']

              );
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