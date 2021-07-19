<?php
include '../includes/connect.php';
if($_SERVER['REQUEST_METHOD']=='GET')
{
$o_id=$_GET['order_id'];
$st=$_GET['status'];
if($st=='Yes')
{
$query=mysqli_query($con,"SELECT table_no FROM `orders` WHERE order_id='$o_id'");
$row=mysqli_fetch_assoc($query);
$table_id=$row['table_no'];
$check=mysqli_query($con,"SELECT * FROM `tables` WHERE id='$table_id'");
$row1=mysqli_fetch_assoc($check);
if(mysqli_num_rows($check)>0)
{
    $t_id=$row1['id'];
    $m_query=mysqli_query($con,"UPDATE `tables` SET `status`='empty' WHERE id='$t_id'");
}
}
if($m_query)
{
    echo "Success";
}else {
    echo mysqli_error($con);
}
// echo $st."".$o_id;
}
// echo "SELECT * FROM `tables` WHERE id='$table_id'";
?>