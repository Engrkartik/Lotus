<?php
include ('include/db.php');
if($_POST['type']=="add")
{
$item=$_POST['item'];
$pid=$_POST['pid'];
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
$auto_reduce_val=$_POST['auto_reduce_val'];
$min_set_order=$_POST['min_set_order'];

// echo $admin;
$color_array=json_decode($color);
$size_array=json_decode($size);
$att_array=json_decode($att);
$set_qty_array=json_decode($set_qty);
// mysqli_query($con,"DELETE FROM `product` WHERE id='$pid'");
$checkval = mysqli_query($con,"SELECT * FROM `product` WHERE `id`= '$pid' and status = 'A'");
$countrow = mysqli_num_rows($checkval);
if($countrow<1){

$insert=mysqli_query($con,"INSERT INTO `product`(`aid`,`title`, `item_name`, `cat_id`, `sale_price`,`mrp`, `discount`, `tax`, `avail_qty`,`img`,`date`,`descrpt`,`brand`,`auto_reduce_qty`, `status`, `remark`) VALUES ('$admin','$title','$item','$cat_id','$wsp','$mrp','$discount','$gst','$qty','$img_id','$dj','$dscrpt','$brand','$auto_reduce_val','A','')");
// $lid=mysqli_insert_id($con);
if($insert)
{
// $sid=mysqli_query($con,"SELECT * FROM `set_details` WHERE aid='$admin' order by id desc limit 1");
$sid=mysqli_query($con,"SELECT * FROM `set_details` WHERE aid='$admin' ORDER BY set_id DESC LIMIT 1");
$run=mysqli_fetch_assoc($sid);
// $set_id=mysqli_num_rows($sid)+1;
$set_id1=$run['set_id'];
$set_id = $set_id1+1;

for ($j=0; $j <sizeof($size_array) ; $j++) { 
for ($i=0; $i <sizeof($color_array) ; $i++) { 
	$color=$color_array[$i];
	$size=$size_array[$j];
	$set_qty=$set_qty_array[$i];
	$set = mysqli_query($con,"INSERT INTO `set_details`(`aid`, `set_id`, `pid`, `color`, `size`,`qty`,`min_set_order`, `date`, `status`) VALUES ('$admin','$set_id','$pid','$color','$size','$set_qty','$min_set_order','$dj','A')");
}
}
	$update=mysqli_query($con,"UPDATE `product` SET `set_id`='$set_id' WHERE id='$pid'");

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
	$update=mysqli_query($con,"UPDATE `product` SET `att_id`='$att_row' WHERE id='$pid'");


}
}
if($insert_att)
{
	echo 1;

}
else{
	echo mysqli_error($con);
}
}
else{
	$set_id=$_POST['set_id'];
	$att_id=$_POST['att_id'];
    $chk=mysqli_query($con,"SELECT * FROM `discount` WHERE aid='$admin_id' and disc_id='$discount' and `pid` IS NULL");
    $chk2=mysqli_query($con,"SELECT * FROM `discount` WHERE aid='$admin_id' and disc_id='$discount'");
    $rows=mysqli_fetch_assoc($chk2);
    $disc_name=$rows['disc_name'];
    $disc_type=$rows['disc_type'];
    $disc=$rows['disc'];
    $from_dt=$rows['from_dt'];
    $to_dt=$rows['to_dt'];

    if(mysqli_num_rows($chk)>0)
    {
    	$check1 = mysqli_query($con,"SELECT * FROM discount WHERE ((from_dt <= '$from_dt' AND to_dt >= '$from_dt') OR (from_dt <= '$to_dt' AND to_dt >= '$to_dt')) and pid = '$pid'");
	$count_chk = mysqli_num_rows($check1);
	$count=$count+$count_chk;
	if($count>0)
	{
		$find_data = mysqli_query($con,"SELECT * FROM product WHERE id = '$pid'");
		$getD = mysqli_fetch_assoc($find_data);
		$item_name= $getD['item_name'];
		$item_d=$item_name;
		goto a1;
	}
	if($count==0)
	{
	$insert=mysqli_query($con,"UPDATE `product` SET `title`='$title',`item_name`='$item',`cat_id`='$cat_id',`sale_price`='$wsp',`mrp`='$mrp',`tax`='$gst',`gst_type`='$gst_type',`avail_qty`='$qty',`img`='$img_id',`date`='$dj',`descrpt`='$dscrpt',`brand`='$brand',`auto_reduce_qty`='$auto_reduce_val' WHERE id='$pid' AND aid='$admin'");
    	$insert_disc=mysqli_query($con,"UPDATE `discount` SET `pid`='$pid' WHERE disc_id='$discount' and pid IS NULL");
	}
    }
    else
    {
    
    $check1 = mysqli_query($con,"SELECT * FROM discount WHERE ((from_dt <= '$from_dt' AND to_dt >= '$from_dt') OR (from_dt <= '$to_dt' AND to_dt >= '$to_dt')) and pid = '$pid'");
	$count_chk = mysqli_num_rows($check1);
	$count=$count+$count_chk;
	if($count>0)
	{
		$find_data = mysqli_query($con,"SELECT * FROM product WHERE id = '$pid'");
		$getD = mysqli_fetch_assoc($find_data);
		$item_name= $getD['item_name'];
		$item_d=$item_name;
		goto a1;
	}
	if($count==0)
	{
	$insert=mysqli_query($con,"UPDATE `product` SET `title`='$title',`item_name`='$item',`cat_id`='$cat_id',`sale_price`='$wsp',`mrp`='$mrp',`tax`='$gst',`gst_type`='$gst_type',`avail_qty`='$qty',`img`='$img_id',`date`='$dj',`descrpt`='$dscrpt',`brand`='$brand',`auto_reduce_qty`='$auto_reduce_val' WHERE id='$pid' AND aid='$admin'");

    	$insert_disc=mysqli_query($con,"INSERT INTO `discount`(`disc_id`, `aid`, `pid`, `disc_name`, `disc_type`, `disc`, `from_dt`, `to_dt`, `status`, `created_on`) VALUES ('$discount','$admin_id','$pid','$disc_name','$disc_type','$disc','$from_dt','$to_dt','A','$dj')");
	}
    }


if($insert)
{
$del=mysqli_query($con,"DELETE FROM `set_details` WHERE set_id='$set_id'");

$sid=mysqli_query($con,"SELECT * FROM `set_details` WHERE aid='$admin' order by id desc limit 1");
$run=mysqli_fetch_assoc($sid);
$set_id=$run['set_id']+1;
$qty_set=0;
for ($j=0; $j <sizeof($size_array) ; $j++) { 
for ($i=0; $i <sizeof($color_array) ; $i++) { 
	$color=$color_array[$i];
	$size=$size_array[$j];
	$set_qty=$set_qty_array[$qty_set];
	$set = mysqli_query($con,"INSERT INTO `set_details`(`aid`, `set_id`, `pid`, `color`, `size`,`qty`,`min_set_order`, `date`, `status`) VALUES ('$admin','$set_id','$pid','$color','$size','$set_qty','$min_set_order','$dj','A')");
	$qty_set++;
}
}
if($set)
{
	$update=mysqli_query($con,"UPDATE `product` SET `set_id`='$set_id' WHERE id='$pid'");
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
	$data[]=mysqli_error($con);

}
if($insert_att)
{
	$update2=mysqli_query($con,"UPDATE `product` SET `att_id`='$att_row' WHERE id='$pid'");
}
}
if($set && $insert_att)
{
echo 1;
}
else
{
echo 0;
}
}
a1:if($count>0){
	echo $item_d;
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
// $lid=$_POST['pid'];
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
	$set=mysqli_query($con,"INSERT INTO `set_details`(`aid`, `set_id`, `pid`, `color`, `size`,`qty`, `date`, `status`) VALUES ('$admin','$set_id','$pid','$color','$size','$set_qty','$dj','A')");

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
	$update=mysqli_query($con,"UPDATE `product` SET `att_id`='$att_row' WHERE id='$pid'");


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