<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H=>i=>s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
$order_id=$con->real_escape_string($_POST['order_id']);
$cust_id=$con->real_escape_string($_POST['cust_id']);

$query = mysqli_query($con,"SELECT * FROM `detail_order` LEFT JOIN product ON product.id=detail_order.design_no WHERE detail_order.order_id='$order_id' and detail_order.aid='$admin_id' and detail_order.cid='$cust_id'");

$count = mysqli_num_rows($query);

while($run = mysqli_fetch_assoc($query)){
  $set_id=$run['set_id'];
$set=mysqli_query($con,"SELECT size,color,qty FROM `set_details` WHERE set_id='$set_id'");
$color=[];
$size=0;
$qty=0;
while($row=mysqli_fetch_assoc($set))
  {
    $size=$row['size'];
    $color[]=$row['color'];
    $qty=$row['qty'];
  }
    $data[] = array( "id"=> $run['id'],
            "aid"=> $run['aid'],
            "cid"=> $run['cid'],
            "order_id"=> $run['order_id'],
            "design_no"=> $run['design_no'],
            "set_id"=> $run['set_id'],
            "packing"=> $run['packing'],
            "qty"=> $run['qty'],
            "price"=> $run['price'],
            "discount"=>$run['discount'],
            "tax"=> $run['tax'],
            "amount"=> $run['amount'],
            "date"=> $run['date'],
            "status"=> $run['status'],
            "remark"=> $run['remark'],
            "title"=>$run['title'],
            "item_name"=> $run['item_name'],
            "cat_id"=> $run['cat_id'],
            "sale_price"=> $run['sale_price'],
            "mrp"=> ($run['mrp']==null)?'0':$run['mrp'],
            "avail_qty"=>$run['avail_qty'],
            "img"=> $run['img'],
            "feature"=> $run['feature'],
            "top"=> $run['top'],
            "nnew"=> $run['new'],
            "desc"=> $run['desc'],
            "brand"=> $run['brand'],
            "att_id"=> $run['att_id'],
            "size"=>$size,
            "color"=>$color,
            "set_qty"=>$qty);

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
    header('Content-Type=> application/json');
    echo json_encode($json);
}
?>