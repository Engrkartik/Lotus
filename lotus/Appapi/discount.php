<?php
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");
$today=date('Y-m-d');

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
$admin_id=$con->real_escape_string($_POST['admin_id']);
$cat_id=$con->real_escape_string($_POST['cat_id']);
$cust_id=$con->real_escape_string($_POST['cust_id']);

$type=$_POST['type'];
$price_min=$_POST['price_min'];
$price_max=$_POST['price_max'];
$brand=$_POST['brand'];
$cat_id=$_POST['cat_id'];
// $discount=$_POST['discount'];
$size=$_POST['size'];
$color=$_POST['color'];
$fabric=$_POST['fabric'];
$pattern=$_POST['pattern'];
$ocassion=$_POST['oc'];
$sleeve=$_POST['sleeve'];
$asc_desc=$_POST['sort'];
$prev=0;
$data=[];
$orderby="ORDER BY product.sale_price - disc";
$orderby .= $asc_desc=='HTL'?'desc':'asc';
$cat_arr1=json_decode($cat_id);
$discc=mysqli_query($con,"SELECT * FROM discount where aid='$admin_id' and discount.from_dt<='$today' and discount.to_dt>='$today' group by disc_id");
while($roww=mysqli_fetch_assoc($discc))
{
  $discount[]=$roww;
}
$disc_arr=json_decode($discount);
foreach($disc_arr as $value10)
{
$disc_id=$value10->disc_id;
  foreach($cat_arr1 as $value9)
  {
    $cat_id=$value9->id;
  $query=mysqli_query($con,"SELECT product.*,(SELECT disc FROM discount where aid='$admin_id' and pid=product.id and discount.from_dt<='$today' and discount.to_dt>='$today') as disc,(SELECT disc_type FROM discount where aid='$admin_id' and pid=product.id and discount.from_dt<='$today' and discount.to_dt>='$today') as disc_type,prod_img.img_url,category.title as cat_title  FROM `product` LEFT JOIN category ON category.id=product.cat_id LEFT JOIN prod_img on prod_img.img_id=product.img WHERE product.id IN (SELECT pid FROM discount where aid='$admin_id' and discount.from_dt<='$today' and discount.to_dt>='$today' and disc_id='$disc_id') and product.aid='$admin_id' and product.status='A' and product.cat_id='$cat_id' AND product.avail_qty>0 and product.sale_price>='$price_min' GROUP BY product.id $orderby");
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
$set_id=$run['set_id'];$color_r=[];$size_r='';$qty=0;
  // $pid=$row['pid'];

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
if($prev==$pid)
{

}else
{
    $data[]=array("id"=>$run['id'],
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
                  "in_cart"=>$in_cart,
                  "quey"=>"SELECT product.*,(SELECT disc FROM discount where aid='$admin_id' and pid=product.id and discount.from_dt<='$today' and discount.to_dt>='$today') as disc,(SELECT disc_type FROM discount where aid='$admin_id' and pid=product.id and discount.from_dt<='$today' and discount.to_dt>='$today') as disc_type,prod_img.img_url,category.title as cat_title  FROM `product` LEFT JOIN category ON category.id=product.cat_id LEFT JOIN prod_img on prod_img.img_id=product.img LEFT JOIN set_details ON set_details.set_id=product.set_id LEFT JOIN prod_attribute ON prod_attribute.att_id=product.att_id WHERE product.id IN (SELECT pid FROM discount where aid='$admin_id' and discount.from_dt<='$today' and discount.to_dt>='$today') AND product.aid='$admin_id' and product.status='A' AND product.avail_qty>0  GROUP BY product.id $orderby"

              );
    $prev=$pid;
  }
  }
 
 
}
}


if(empty($data))
{
   $json = array(
      "status"=>false,
      "details"=>$data,
      "msg"=>"No Record"
  );

}else{
  $json = array(
      "status"=>true,
      "details"=>$data,
      "msg"=>"Success"
  );
}
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>