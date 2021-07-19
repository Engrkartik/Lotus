 <?php 
/*include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$pid=$con->real_escape_string($_POST['p_id']);
$set_id=$con->real_escape_string($_POST['set_id']);
// $pid=$con->real_escape_string($_POST['p_id']);
$chk=mysqli_query($con,"SELECT product.id as pid,product.aid,product.title,product.item_name,product.cat_id,product.sale_price,product.discount,product.tax,product.avail_qty,product.img,product.feature,product.top,product.new as nnew,product.date,product.desc,product.brand,product.set_id,product.att_id,product.status,product.remark from  product where product.id='$pid'");
while($row=mysqli_fetch_assoc($chk)) {
	// $data[]=$row;
  $set_id=$row['set_id'];
  $pid=$row['pid'];

  $chk2=mysqli_query($con,"SELECT * FROM set_details WHERE set_details.set_id='$set_id' and set_details.pid='$pid'");
  while($row2=mysqli_fetch_assoc($chk2))
  {
  $color[]=$row2['color'];
  $size=$row2['size'];
  $color_arr[]=array("color_name"=>$row2['color'],
                    "size_name"=>$row2['size']);
  $id=$row2['id'];
  $aid=$row2['aid'];
  $set_id=$row2['set_id'];
              $pid=$row2['pid'];
              $qty=$row2['qty'];
              $date=$row2['date'];
              $set_status=$row2['status'];
}
$data[]=array("id"=>$id,
              "aid"=>$aid,
              "set_id"=>$set_id,
              "pid"=>$pid,
              "color"=>$color,
              "size"=>$size,
              "color_arr"=>$color_arr,
              "qty"=>$qty,
              "date"=>$date,
              "set_status"=>$set_status,
              "title"=>$row['title'],
              "item_name"=>$row['item_name'],
              "cat_id"=>$row['cat_id'],
              "sale_price"=>$row['sale_price'],
              "discount"=>$row['discount'],
              "tax"=>$row['tax'],
              "avail_qty"=>$row['avail_qty'],
              "img"=>$row['img'],
              "Feture"=>$row['feature'],
              "nnew"=>$row['nnew'],
              "prod_date"=>$row['date'],
              "prod_status"=>$row['status']);
}
if(is_null($data))
	{
	 $json = array(
      "status"=>false,
      "details_set"=>$data,

      "msg"=>"Set detail is empty"
  );
	}
	else
{

  $json = array(
      "status"=>true,
      "details_set"=>$data,
      "msg"=>"Success"
  );

}
    header('Content-Type: application/json');
    echo json_encode($json);
}*/
?> 

<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$set_id=$con->real_escape_string($_POST['set_id']);
$admin_id=$con->real_escape_string($_POST['admin_id']);

 $color_arr=[];

  $chk2=mysqli_query($con,"SELECT * FROM set_details WHERE set_details.set_id='$set_id' and set_details.aid='$admin_id'");
  while($row2=mysqli_fetch_assoc($chk2))
  {
 
  $color_arr[]=array("color_name"=>str_replace('_',' ',$row2['color']),
                    "size_name"=>$row2['size']);
 
}


if(is_null($color_arr))
  {
   $json = array(
      "status"=>false,
      "details_set"=>$color_arr,
      "msg"=>"Set detail is empty"
  );
  }
  else
{

  $json = array(
      "status"=>true,
      "details_set"=>$color_arr,
      "msg"=>"Success"
  );

}
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>