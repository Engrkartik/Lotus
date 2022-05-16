<?php 
include '../includes/connect.php';
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$bid = mysqli_real_escape_string($con,$_POST['bid']);
$table_no = mysqli_real_escape_string($con,$_POST['table_no']);

$query = mysqli_query($con,"SELECT * FROM `category` WHERE status='A' and bid='$bid'");
while ($row=mysqli_fetch_assoc($query)) {
    
    $item=[];
    $cat=$row['id'];
    $query1=mysqli_query($con,"SELECT items.*,category.name as cat_name FROM `items` left join category on category.id=items.category WHERE category='$cat' and items.status='A'");
    while ($row1=mysqli_fetch_assoc($query1)) {
        // $item[]=$row1['name'];
        $item[] = array(
            'itemname'=>$row1['name'],
            'itemprice'=>$row1['price'],
            'itemid'=>$row1['id'],
            'itemcat'=>$row1['category'],
            'cat_name'=>$row1['cat_name'],
            'piece' =>$row1['piece'],
            'qty'=>'0',
            'table_no'=>$table_no,
            'remark'=>''
        );
    }

    $JSON[]=array('cat'=>$row['name'],
                  'item'=>$item);
}
if(mysqli_num_rows($query)>0)
{
    $json = array(
        "status" => true,
        "menu" => $JSON,
    );
 }else{

    $json = array(
        "status" => false,
        "menu" => $JSON,
    );
 } 
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>