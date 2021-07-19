<?php 
include '../includes/connect.php';
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$bid = mysqli_real_escape_string($con,$_POST['bid']);
$table_no = mysqli_real_escape_string($con,$_POST['table_no']);

// $query = mysqli_query($con,"SELECT * FROM `save_to_later` WHERE table_no = '$table_no' AND bid = '$bid'");
// while ($row=mysqli_fetch_assoc($query)) {
    
//     $item=[];
//     $cat=$row['id'];
    $query1=mysqli_query($con,"SELECT save_to_later.id,save_to_later.bid,save_to_later.waiter_id,save_to_later.item_id,save_to_later.cat_id as item_cat_id,save_to_later.qty as item_qty,save_to_later.price as item_price,save_to_later.table_no,save_to_later.net_amt,save_to_later.gst_amt,save_to_later.date,save_to_later.status,save_to_later.remark as item_remark,items.name as item_name ,category.name as item_cat_name FROM `save_to_later` left join category on category.id=save_to_later.cat_id LEFT JOIN items ON items.id = save_to_later.item_id WHERE save_to_later.bid='$bid' and save_to_later.table_no='$table_no'");

    while ($row1=mysqli_fetch_assoc($query1)) {
        // $item[]=$row1['name'];
        $item[] = $row1;
        $waiter_id = $row1['waiter_id'];
        // $item[] = array(
        //     'itemname'=>$row1['name'],
        //     'itemprice'=>$row1['price'],
        //     'itemid'=>$row1['id'],
        //     'itemcat'=>$row1['category'],
        //     'cat_name'=>$row1['cat_name'],
        //     'qty'=>'0',
        //     'remark'=>''
        // );
    }

    // $JSON[]=array('cat'=>$row['name'],
    //               'item'=>$item);
// }
if(mysqli_num_rows($query1)>0)
{
    $json = array(
        "status" => true,
        "table_no"=>$table_no,
        "waiter_id"=>$waiter_id,
        "hold" => $item
    );
 }else{

    $json = array(
        "status" => false,
        "hold" => $item,
    );
 } 
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>