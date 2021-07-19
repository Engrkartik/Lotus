<?php
include ('include/db.php');
if($_POST['type']=="add")
{
$item1=explode('~', $_POST['item']);
$item=$item1[5];
$cat_id=$_POST['cat_id']; 
$discount=$_POST['discount']; 
$gst=$_POST['gst']; 
$gst_type=$_POST['gst_type']; 
$wsp=$_POST['wsp']; 
$dscrpt=$_POST['dscrpt']; 
$brand=$_POST['brand']; 
$admin=$_POST['admin'];
$size=$_POST['size'];
$color=$_POST['color'];
$att=$_POST['att'];
$img_id=$_POST['img_id'];
$qty=$_POST['qty'];
$set_qty=$_POST['set_qty'];
$title=$_POST['title'];
$mrp=$_POST['mrp'];

// echo $admin;
$color_array=json_decode($color);
$size_array=json_decode($size);
$att_array=json_decode($att);
$set_qty_array=json_decode($set_qty);

$checkval = mysqli_query($con,"SELECT * FROM `product` WHERE `item_name`= '$item' and status = 'A'");
$countrow = mysqli_num_rows($checkval);
if($countrow<1){

$insert=mysqli_query($con,"INSERT INTO `product`(`aid`,`title`, `item_name`, `cat_id`, `sale_price`,`mrp`, `discount`, `tax`, `avail_qty`,`img`,`date`,`desc`,`brand`, `status`, `remark`) VALUES ('$admin','$title','$item','$cat_id','$wsp','$mrp','$discount','$gst','$qty','$img_id','$dj','$dscrpt','$brand','A','')");
$lid=mysqli_insert_id($con);
if($insert)
{
// $sid=mysqli_query($con,"SELECT * FROM `set_details` WHERE aid='$admin' order by id desc limit 1");
$sid=mysqli_query($con,"SELECT * FROM `set_details` WHERE aid='$admin' ORDER BY set_id DESC LIMIT 1");
$run=mysqli_fetch_assoc($sid);
// $set_id=mysqli_num_rows($sid)+1;
$set_id1=$run['set_id'];
$set_id = $set_id1+1;

for ($i=0; $i <sizeof($color_array) ; $i++) { 
	$color=$color_array[$i];
	$size=$size_array[0];
	$set_qty=$set_qty_array[$i];
	$set = mysqli_query($con,"INSERT INTO `set_details`(`aid`, `set_id`, `pid`, `color`, `size`,`qty`, `date`, `status`) VALUES ('$admin','$set_id','$lid','$color','$size','$set_qty','$dj','A')");

	$update=mysqli_query($con,"UPDATE `product` SET `set_id`='$set_id' WHERE id='$lid'");
}
$chk_cat=mysqli_query($con,"SELECT * FROM `prod_attribute` order by id desc LIMIT 1");
	$row=mysqli_fetch_assoc($chk_cat);
	$att_row=$row['att_id']+1;
for ($i=0; $i <sizeof($att_array) ; $i++) { 
	$att=$att_array[$i];
	$att_id=explode('~',$att);
	$att_id2=$att_id[2];
	$sub_cat=mysqli_query($con,"SELECT A.id as Id,A.att_name AS Attribute,B.id as Sub_id,B.att_name As Sub_Cat,category.title as cat_name FROM `attributes` AS A,attributes AS B LEFT JOIN category ON category.id=B.cat_id WHERE A.att_id=B.id AND A.id='$att_id2' AND category.aid='$admin'");
	$row=mysqli_fetch_assoc($sub_cat);
	
	$cat_name=$row["cat_name"];
	$sub_cat=$row["Sub_Cat"];
	$attribute=$row["Attribute"];
	$insert_att=mysqli_query($con,"INSERT INTO `prod_attribute`(`aid`,`att_id`,`cat_id`, `sub_cat`, `attribute`, `status`, `date`) VALUES ('$admin','$att_row','$cat_name','$sub_cat','$attribute','A','$dj')");
	$update=mysqli_query($con,"UPDATE `product` SET `att_id`='$att_row' WHERE id='$lid'");


}
}
if($set)
{
	echo "Success";

}
else{
	echo mysqli_error($con);
}
}
else{
	echo "Product is already added";
}
}
elseif($_POST['type']=="Del"){

$pid=$_POST['pid'];
$up=mysqli_query($con,"UPDATE `product` SET `status`='R' WHERE id='$pid'");
if(!$up)
{
echo mysqli_error($con);
}else
{
echo $pid;
}
}
elseif($_POST['type']=="act"){

$pid=$_POST['pid'];
$status=$_POST['status'];

$up=mysqli_query($con,"UPDATE `product` SET `status`='$status' WHERE id='$pid'");
if(!$up)
{
echo mysqli_error($con);
}else
{
echo $pid;
}
}elseif($_POST['type']=="update")
{
$item=$_POST['item'];
$cat_id=$_POST['cat_id']; 
$discount=$_POST['discount']; 
$gst=$_POST['gst']; 
$gst_type=$_POST['gst_type']; 
$wsp=$_POST['wsp']; 
$dscrpt=$_POST['dscrpt']; 
$brand=$_POST['brand']; 
$admin=$_POST['admin'];
$size=$_POST['size'];
$color=$_POST['color'];
$att=$_POST['att'];
$img_id=$_POST['img_id'];
$qty=$_POST['qty'];
$set_qty=$_POST['set_qty'];
$set_id=$_POST['set_id'];
$att_id=$_POST['att_id'];
$lid=$_POST['pid'];
$title=$_POST['title'];

// echo $admin;
$color_array=json_decode($color);
$size_array=json_decode($size);
$att_array=json_decode($att);
$set_qty_array=json_decode($set_qty);
$insert=mysqli_query($con,"UPDATE `product` SET `item_name`='$item',`cat_id`='$cat_id',`sale_price`='$wsp',`discount`='$discount',`tax`='$gst',`avail_qty`='$qty',`img`='$img_id',`date`='$dj',`desc`='$dscrpt',`brand`='$brand' WHERE item_name='$item' AND aid='$admin'");

if($insert)
{
$del=mysqli_query($con,"DELETE FROM `set_details` WHERE set_id='$set_id'");

$sid=mysqli_query($con,"SELECT * FROM `set_details` WHERE aid='$admin' order by id desc limit 1");
$run=mysqli_fetch_assoc($sid);
$set_id=$run['set_id']+1;
for ($i=0; $i <sizeof($color_array) ; $i++) { 
	$color=$color_array[$i];
	$size=$size_array[0];
	$set_qty=$set_qty_array[$i];
	$set=mysqli_query($con,"INSERT INTO `set_details`(`aid`, `set_id`, `pid`, `color`, `size`,`qty`, `date`, `status`) VALUES ('$admin','$set_id','$lid','$color','$size','$set_qty','$dj','A')");

	$update=mysqli_query($con,"UPDATE `product` SET `set_id`='$set_id' WHERE item_name='$item'");
}
$del2=mysqli_query($con,"DELETE FROM `prod_attribute` WHERE att_id='$att_id'");

$chk_cat=mysqli_query($con,"SELECT * FROM `prod_attribute` order by id desc LIMIT 1");
	$row=mysqli_fetch_assoc($chk_cat);
	$att_row=$row['att_id']+1;
for ($i=0; $i <sizeof($att_array) ; $i++) { 
	$att=$att_array[$i];
	$att_id=explode('~',$att);
	$att_id2=$att_id[2];
	$sub_cat=mysqli_query($con,"SELECT A.id as Id,A.att_name AS Attribute,B.id as Sub_id,B.att_name As Sub_Cat,category.title as cat_name FROM `attributes` AS A,attributes AS B LEFT JOIN category ON category.id=B.cat_id WHERE A.att_id=B.id AND A.id='$att_id2' AND category.aid='$admin'");
	$row=mysqli_fetch_assoc($sub_cat);
	
	$cat_name=$row["cat_name"];
	$sub_cat=$row["Sub_Cat"];
	$attribute=$row["Attribute"];
	$insert_att=mysqli_query($con,"INSERT INTO `prod_attribute`(`aid`,`att_id`,`cat_id`, `sub_cat`, `attribute`, `status`, `date`) VALUES ('$admin','$att_row','$cat_name','$sub_cat','$attribute','A','$dj')");
	$update=mysqli_query($con,"UPDATE `product` SET `att_id`='$att_row' WHERE id='$lid'");


}
}
if($insert)
{
	echo "Success";

}
else{
	echo mysqli_error($con);
}
}elseif($_POST['type']=="img_del")
{
	$img_url=$_POST['img_url'];
	$chk=mysqli_query($con,"SELECT * FROM `prod_img` WHERE img_url='$img_url'");
	$run=mysqli_fetch_assoc($chk);
	$img_id=$run['img_id'];
	$coo=mysqli_query($con,"DELETE FROM `prod_img` WHERE img_url='$img_url'");
	$query=mysqli_query($con,"SELECT * FROM `prod_img` WHERE img_id='$img_id'");
	if(mysqli_num_rows($query)<1)
	{
		$q_run=mysqli_query($con,"UPDATE `product` SET `img`='' WHERE img='$img_id'");
	}
	if($coo)
		{unlink($_POST['img_url']);
	echo "Removed";
}
}
?>