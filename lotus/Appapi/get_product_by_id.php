<?php
include('db.php');
$admin_id=$_POST['admin_id'];
$pid=$_POST['pid'];
$cust_id=$_POST['cust_id'];
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");
$today=date('Y-m-d');
$query=mysqli_query($con,"SELECT product.*,(SELECT disc FROM discount where aid='$admin_id' and pid=product.id and discount.from_dt<='$today' and discount.to_dt>='$today') as disc,(SELECT disc_type FROM discount where aid='$admin_id' and pid=product.id and discount.from_dt<='$today' and discount.to_dt>='$today') as disc_type,prod_img.img_url,category.title as cat_title  FROM `product` LEFT JOIN category ON category.id=product.cat_id LEFT JOIN prod_img on prod_img.img_id=product.img LEFT JOIN set_details ON set_details.set_id=product.set_id LEFT JOIN prod_attribute ON prod_attribute.att_id=product.att_id WHERE product.aid='$admin_id' and product.status='A' and product.id='$pid'");
while($run=mysqli_fetch_assoc($query))
{
  $img_id=$run['img'];
$img_query=mysqli_query($con,"SELECT img_url FROM `prod_img` WHERE `img_id` = '$img_id' and aid='$admin_id'");
$img = [];
while($row2=mysqli_fetch_assoc($img_query))
{
  $img[]=$row2;
}
$pid=$run['id'];
$set_id=$run['set_id'];
$color_r=[];
$size_r='';
$qty=0;
 $chk2=mysqli_query($con,"SELECT * FROM set_details WHERE set_details.set_id='$set_id' and set_details.pid='$pid' and aid='$admin_id'");
  while($row=mysqli_fetch_assoc($chk2))
  {
  $color_r[]=str_replace('_',' ',$row['color']);
  $size_r=$row['size'];
  $qty=$qty+$row['qty'];
  }
  $m_query=mysqli_query($con,"SELECT * FROM `wishlist` WHERE wishlist.pid='$pid' and wishlist.cid='$cust_id' and wishlist.aid='$admin_id'");
if(mysqli_num_rows($m_query)>0)
{
  $wishlist="Yes";
}else
{
  $wishlist="No";
}
$m_query2=mysqli_query($con,"SELECT * FROM `add_cart` WHERE add_cart.pid='$pid' and add_cart.cid='$cust_id' and add_cart.aid='$admin_id'");
if(mysqli_num_rows($m_query2)>0)
{
  $in_cart="Yes";
}else
{
  $in_cart="No";
}
    $data=array("id"=>$run['id'],
                "aid"=>$run['aid'],
                "title"=>$run['cat_title'],
                "item_name"=>$run['title'],
                "sale_price"=>$run['sale_price'],
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
                  "set_qty"=>$qty,
                  "mrp"=>($run['mrp']==null)?'0':$run['mrp'],
                  "in_cart"=>$in_cart

              );
  }

if($query)
{
	 $json = array(
      "status"=>true,
      "details"=>$data,
      "msg"=>"Success"
  );
    
}
    else{
    $json = array(
        "status" => false,
      "details"=>$data,
        "msg" =>mysqli_error($con)
    );
    }
    header('Content-Type: application/json');
    echo json_encode($json);

?>