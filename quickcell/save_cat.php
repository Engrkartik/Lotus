<?php
include('include/db.php');
$type=$_POST['type'];
if($type=="cat")
{
	$loc= $_POST['loc'];
	$admin=$_POST['admin'];
	$cat_name=$_POST['cat_name'];
	$insert=mysqli_query($con,"INSERT INTO `category`(`aid`, `title`, `img`, `date`, `parent_id`, `status`, `remark`) VALUES ('$admin','$cat_name','$loc','$dj','0','A','')");
	if($insert)
	{
		echo "Success";
	}else{
		echo mysqli_error($con);
	}
}elseif($type=="up_cat")
{
	// $loc= $_POST['loc'];
	$admin=$_POST['admin'];
	$cat_name=$_POST['cat_name'];
	$id=$_POST['id'];
	$sub_cat=json_decode($_POST['sub_cat']);
	// if($loc!='0')
	// {
	// $insert=mysqli_query($con,"UPDATE `category` SET `title`='$cat_name',`img`='$loc',`date`='$dj' WHERE `id`='$id'");
	// }else{
	$insert=mysqli_query($con,"UPDATE `category` SET `title`='$cat_name',`date`='$dj' WHERE `id`='$id'");
	for ($i=0; $i < sizeof($sub_cat); $i++) { 
		$split=explode('~',$sub_cat[$i]);
		$sub_cat_v=$split[0];
		$sub_cat_id=$split[1];
	$insert2=mysqli_query($con,"UPDATE `category` SET `title`='$sub_cat_v',`date`='$dj' WHERE `id`='$sub_cat_id'");
		echo "UPDATE `category` SET `title`='$sub_cat_v',`date`='$dj' WHERE `id`='$sub_cat_id'";
	}
	// }
	if($insert and $insert2)
	{
		echo "Success";
	}else{
		echo mysqli_error($con);
	}
}elseif($type=="sub"){
	$main_cat=$_POST['main_cat'];
	$sub_cat=$_POST['sub_cat'];
	$admin=$_POST['admin'];
	$loc=$_POST['loc'];

	$insert=mysqli_query($con,"INSERT INTO `category`(`aid`, `title`, `img`, `date`, `parent_id`, `status`, `remark`) VALUES ('$admin','$sub_cat','$loc','$dj','$main_cat','A','')");
	if($insert)
	{
		echo "Success";
	}else{
		echo mysqli_error($con);
	}

}elseif($type=="del")
{
	$admin=$_POST['admin'];
	$id=$_POST['id'];
	$update=mysqli_query($con,"UPDATE `category` SET `status`='R' WHERE id='$id'");
}
else{
		$filename = $_FILES['file']['name'];
		$id=$_POST['id'];
/* Location */
$nam=time();
$location = "images/".$nam."_".$filename;
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

/* Valid Extensions */
$valid_extensions = array("jpg","jpeg","png");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions)) {
   $uploadOk = 0;
}

if($uploadOk == 0){
   echo 0;
}else{
   /* Upload file */
   move_uploaded_file($_FILES['file']['tmp_name'],$location);
      $up=mysqli_query($con,"UPDATE `category` SET `img`='$location' WHERE id='$id'");
   if($up){
   	echo $location;
   }else{
      echo mysqli_error($con);
   }
}
}
?>