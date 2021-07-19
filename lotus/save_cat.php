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
	$loc= $_POST['loc'];
	$admin=$_POST['admin'];
	$cat_name=$_POST['cat_name'];
	$id=$_POST['id'];
	if($loc!='0')
	{
	$insert=mysqli_query($con,"UPDATE `category` SET `title`='$cat_name',`img`='$loc',`date`='$dj' WHERE `id`='$id'");
	}else{
	$insert=mysqli_query($con,"UPDATE `category` SET `title`='$cat_name',`date`='$dj' WHERE `id`='$id'");

	}
	if($insert)
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
      
   if($location){
   	echo $location;
   }else{
      echo 0;
   }
}
}
?>