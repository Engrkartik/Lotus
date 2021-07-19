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
// $brand=sizeof(json_decode($brand1));
$size=$_POST['size'];
$color=$_POST['color'];
$fabric=$_POST['fabric'];
$pattern=$_POST['pattern'];
$ocassion=$_POST['oc'];
$sleeve=$_POST['sleeve'];
$asc_desc=$_POST['sort'];
$prev=0;
if($asc_desc=='HTL')
{
  $orderby='ORDER BY product.sale_price DESC';
}elseif($asc_desc=='LTH')
{
  $orderby='ORDER BY product.sale_price ASC';

}else{
  $orderby='ORDER BY product.id DESC';

}



if(($price_min<1) and ($price_max<1) and ($brand=="") and ($size=="") and ($color=="") and ($fabric=="") and ($pattern=="") and ($ocassion=="") and ($sleeve=="") and ($type==""))
{

     $query=mysqli_query($con,"SELECT product.*,(SELECT disc FROM discount where aid='$admin_id' and pid=product.id and discount.from_dt<='$today' and discount.to_dt>='$today') as disc,(SELECT disc_type FROM discount where aid='$admin_id' and pid=product.id and discount.from_dt<='$today' and discount.to_dt>='$today') as disc_type,prod_img.img_url,category.title as cat_title  FROM `product` LEFT JOIN category ON category.id=product.cat_id LEFT JOIN prod_img on prod_img.img_id=product.img LEFT JOIN set_details ON set_details.set_id=product.set_id LEFT JOIN prod_attribute ON prod_attribute.att_id=product.att_id WHERE product.aid='$admin_id' and product.status='A' and product.cat_id='$cat_id' AND product.avail_qty>0  GROUP BY product.id $orderby");
while($run=mysqli_fetch_assoc($query))
{
  $img_id=$run['img'];
$img_query=mysqli_query($con,"SELECT img_url FROM `prod_img` WHERE `img_id` = '$img_id'");
$img = [];
while($row2=mysqli_fetch_assoc($img_query))
{
  $img[]=$row2;
}
$pid=$run['id'];
$set_id=$run['set_id'];
$color_r=[];
$size_r=0;
$qty=0;
 $chk2=mysqli_query($con,"SELECT * FROM set_details WHERE set_details.set_id='$set_id' and set_details.pid='$pid'");
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
}$m_query2=mysqli_query($con,"SELECT * FROM `add_cart` WHERE add_cart.pid='$pid' and add_cart.cid='$cust_id' and add_cart.aid='$admin_id'");
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
                  "in_cart"=>$in_cart

              );
    $prev=$pid;
  }
}
}








if(is_null($data))
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