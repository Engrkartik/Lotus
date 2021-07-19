<?php
include('include/db.php');

$type=$_POST['type'];


if($type=="Address")
{
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$address1=$_POST['address'];
$address2=$_POST['address2'];
$address=$address1." ".$address2;
$city=$_POST['city'];
$state=$_POST['state'];
$pin=$_POST['pin'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$admin_id=$_POST['admin_id'];

$insert=mysqli_query($con,"INSERT INTO `billing_address`( `admin_id`, `first_name`, `last_name`, `address`, `city`, `state`, `pin_code`, `email`, `contact_no`, `status`, `date`) VALUES ('$admin_id','$f_name','$l_name','$address','$city','$state','$pin','$email','$phone','A','$dj')");
echo mysqli_error($con);
}elseif($type=='order')
{
$admin_id=$_POST['admin_id'];
$mydata1=$_POST['mydata'];
$address=$_POST['address'];
$payment=$_POST['payment'];
$chk=mysqli_query($con,"SELECT * FROM `product_order` WHERE admin_id='$admin_id'");
$order_id='VCH/20-21/'.$admin_id.'/'.(mysqli_num_rows($chk)+1);
$someArray = json_decode($mydata1);
// echo $mydata;
// $pro=array();
foreach($someArray as $data) {
$pro_id=$data->pro_id;
$qty=$data->qty;
$amount=$data->amount;
$insert=mysqli_query($con,"INSERT INTO `product_order`(`admin_id`,`order_id`, `pro_id`, `size`, `color`, `qty`, `amt`, `address_id`, `payment_mode`, `date`, `status`, `remarks`) VALUES ('$admin_id','$order_id','$pro_id','size','color','$qty','$amount','$address','$payment','$dj','A','')");
// $pro=$pro+1;
$del=mysqli_query($con,"DELETE FROM `add_to_cart` WHERE admin_id='$admin_id' and pro_id='$pro_id'");
}
echo mysqli_error($con);


}
?>