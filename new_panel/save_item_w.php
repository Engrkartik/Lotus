<?php
include ('include/db.php');
if($_POST['type']=="add_w")
{
	$item=$_POST['item'];
	$pid=$_POST['pid'];
	$cat_id=$_POST['cat_id']; 
	$sub_cat=$_POST['sub_cat']; 
	$discount=$_POST['discount']; 
	$gst=$_POST['gst']; 
	$gst_type=$_POST['gst_type']; 
	$dscrpt=$_POST['dscrpt']; 
	$brand=$_POST['brand']; 
	$admin=$_POST['admin'];
	$att=$_POST['att'];
	$img_id=$_POST['img_id'];
	$title=$_POST['title'];
	// $att=$_POST['att'];
	$auto_reduce_val='on';
	$att_array=json_decode($att);
	$chkk=mysqli_query($con,"SELECT att_id FROM product WHERE id='$pid'");
	$c_row=mysqli_fetch_assoc($chkk);
	$att_id=$c_row['att_id'];
	if($att_id==0)
	{
		$att_id=$att_id+1;
	}
	
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
			$min_amt=mysqli_query($con,"SELECT MIN(wsp) as min,mrp FROM `set_details_whole` WHERE pid='$pid'");
			$row2=mysqli_fetch_assoc($min_amt);
			$wsp=$row2['min'];
			$mrp=$row2['mrp'];
		$insert=mysqli_query($con,"UPDATE `product` SET `title`='$title',`item_name`='$item',`cat_id`='$cat_id',`sub_cat`='$sub_cat',`sale_price`='$wsp',`mrp`='$mrp',`tax`='$gst',`gst_type`='$gst_type',`img`='$img_id',`date`='$dj',`descrpt`='$dscrpt',`brand`='$brand',`auto_reduce_qty`='$auto_reduce_val' WHERE id='$pid' AND aid='$admin'");
	    	$insert_disc=mysqli_query($con,"UPDATE `discount` SET `pid`='$pid' WHERE disc_id='$discount' and pid IS NULL");
		}
    }
    else
    {
	    
	    $check1 = mysqli_query($con,"SELECT * FROM discount WHERE ((from_dt <= '$from_dt' AND to_dt >= '$from_dt') OR (from_dt <= '$to_dt' AND to_dt >= '$to_dt')) and pid = '$pid' and disc_id!='$discount'");
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
			$min_amt=mysqli_query($con,"SELECT MIN(wsp) as min,mrp FROM `set_details_whole` WHERE pid='$pid'");
			$row2=mysqli_fetch_assoc($min_amt);
			$wsp=$row2['min'];
			$mrp=$row2['mrp'];
		$insert=mysqli_query($con,"UPDATE `product` SET `title`='$title',`item_name`='$item',`cat_id`='$cat_id',`sub_cat`='$sub_cat',`sale_price`='$wsp',`mrp`='$mrp',`tax`='$gst',`gst_type`='$gst_type',`img`='$img_id',`date`='$dj',`descrpt`='$dscrpt',`brand`='$brand',`auto_reduce_qty`='$auto_reduce_val' WHERE id='$pid' AND aid='$admin'");
		$check2 = mysqli_query($con,"SELECT * FROM discount WHERE ((from_dt <= '$from_dt' AND to_dt >= '$from_dt') OR (from_dt <= '$to_dt' AND to_dt >= '$to_dt')) and pid = '$pid' and disc_id='$discount'");
		if(mysqli_num_rows($check2)>0)
		{
		}else
		{
	    	$insert_disc=mysqli_query($con,"INSERT INTO `discount`(`disc_id`, `aid`, `pid`, `disc_name`, `disc_type`, `disc`, `from_dt`, `to_dt`, `status`, `created_on`) VALUES ('$discount','$admin_id','$pid','$disc_name','$disc_type','$disc','$from_dt','$to_dt','A','$dj')");
		}
		}
    }


	if($insert)
	{

		$del2=mysqli_query($con,"DELETE FROM `prod_attribute` WHERE att_id='$att_id'");

		// $chk_cat=mysqli_query($con,"SELECT * FROM `prod_attribute` order by id desc LIMIT 1");
		// 	$row=mysqli_fetch_assoc($chk_cat);
		// 	$att_row=$row['att_id']+1;
		for ($i=0; $i <sizeof($att_array) ; $i++) { 
			$attt=$att_array[$i];
			$att_idd=explode('~',$attt);
			$att_id2=$att_idd[2];
			$sub_catt=mysqli_query($con,"SELECT A.id as Id,A.att_name AS Attribute,B.id as Sub_id,B.att_name As Sub_Cat,category.title as cat_name FROM `attributes` AS A,attributes AS B LEFT JOIN category ON category.id=B.cat_id WHERE A.att_id=B.id AND A.id='$att_id2' AND category.aid='$admin'");
			$row=mysqli_fetch_assoc($sub_catt);
			
			$cat_name=$row["cat_name"];
			$sub_cat1=$row["Sub_Cat"];
			$attribute=$row["Attribute"];
			$insert_att=mysqli_query($con,"INSERT INTO `prod_attribute`(`aid`,`att_id`,`cat_id`, `sub_cat`, `attribute`, `status`, `date`) VALUES ('$admin','$att_id','$cat_name','$sub_cat1','$attribute','A','$dj')");
			$data[]=mysqli_error($con);

		}
		if($insert_att)
		{
			$update2=mysqli_query($con,"UPDATE `product` SET `att_id`='$att_id' WHERE id='$pid'");
		}
	}
if($insert_att)
{
echo 1;
}
else
{
echo 0;
}

a1:if($count>0){
	echo $item_d;
}
}
?>