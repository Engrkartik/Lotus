<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");
$today=date('Y-m-d');
if($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
$cust_id=$con->real_escape_string($_POST['cust_id']);


$chk=mysqli_query($con,"SELECT product.id,product.aid,product.title,product.item_name,product.cat_id,product.sale_price,(SELECT disc FROM discount where aid='$admin_id' and pid=product.id and discount.from_dt<='$today' and discount.to_dt>='$today') as disc,(SELECT disc_type FROM discount where aid='$admin_id' and pid=product.id and discount.from_dt<='$today' and discount.to_dt>='$today') as disc_type,product.tax,if(product.avail_qty>0,product.avail_qty,'Out Of Stock') as avail_qty,product.img,product.feature,product.top,product.new,product.date,product.desc,product.brand,product.set_id,product.att_id,product.status,product.remark, add_cart.id AS idd,add_cart.cid,add_cart.pid,add_cart.size,add_cart.color,add_cart.qty,add_cart.price,add_cart.packing,prod_img.img_id,prod_img.img_url FROM `add_cart` LEFT JOIN product ON product.id=add_cart.pid LEFT JOIN prod_img ON prod_img.img_id=product.img WHERE add_cart.cid='$cust_id' AND product.aid='$admin_id' GROUP BY add_cart.pid order by add_cart.id desc");
while ($row=mysqli_fetch_assoc($chk)) {
 
  $set=$row['set_id'];
  $color=[];
  $size=[];
  $packing=0;
  $colorr=mysqli_query($con,"SELECT color,size FROM `set_details` WHERE set_id='$set'");

  while($color_r=mysqli_fetch_assoc($colorr)) {
    

    $color[]=str_replace('_', ' ',$color_r['color']);
    $packing=$packing+1;
   $size=$color_r['size'];


  }
  $data1[] = array(
  "id" => $row['idd'],
  "aid" => $row['aid'],
  "cid" => $row['cid'],
  "pid" => $row['pid'],
  "size" => $row['size'],
  "color" => $row['color'],
  "qty" => $row['qty'],
  "tax" => $row['tax'],
  "price" => $row['sale_price'],
  "packing" => $row['packing']*$packing,
  "stock" => $row['stock'],
  "img" => $row['img'],
  "date" => $row['date'],
  "status" => $row['status'],
  "remark" => $row['remark'],
  "title" => $row['title'],
  "item_name" => $row['item_name'],
  "cat_id" => $row['cat_id'],
  "sale_price" => $row['sale_price'],
  "discount"=>($row['disc_type']=='A'?($row['disc']):($row['sale_price']*$row['disc'])),
  "avail_qty" => $row['avail_qty'],
  "feature" => $row['feature'],
  "top" => $row['top'],
  "neW" => $row['new'],
  "desc" => $row['desc'],
  "brand" => $row['brand'],
  "set_id" => $row['set_id'],
  "att_id" => $row['att_id '],
  "img_id" => $row['img_id'],
  "img_url" => $row['img_url'],     
    "colordetails" => $color,
 "sizedetails" => $size);

  //  $data[]=array("product"=>array("item"=>$row,
  //   "color"=>$color,
  //   "size"=>$size));
}

if(mysqli_num_rows($chk)>0)
{
 $json = array(
        "status"=>true,
      "details"=>$data1,
        "msg"=>"Cart Item"
    );
}else{
  $json = array(
        "status"=>false,
      "details"=>$data1,
        "msg"=>"Cart Empty"
    );
}
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>