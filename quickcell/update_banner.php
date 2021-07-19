<?php

include('include/db.php');
if($_POST['type']=="att")
{
$chk=$_POST['chk'];
$new_att=json_decode($chk);
$length_att= sizeof($new_att);
$loc=$_POST['loc'];
$admin=$_POST['admin'];
$slider=$_POST['slider'];
// $cat_id=$_POST['cat_id'];
$n = 0;
if($loc=="err"){

	for ($i=0; $i <$length_att ; $i++) { 
			
		$query = mysqli_query($con,"UPDATE `discount` SET `ap`= 'A' WHERE disc_id = '$new_att[$i]' and aid='$admin'");
		
	}
	echo 1;
}
else{
	for ($i=0; $i <$length_att ; $i++) { 
			
		$query = mysqli_query($con,"UPDATE `discount` SET `ap`= 'A' WHERE disc_id = '$new_att[$i]' and aid='$admin'");
		
	}

	$get = mysqli_query($con,"SELECT * FROM `banner` WHERE title = 'Discount Banner' and status = 'A' and aid='$admin'");
	$countget = mysqli_num_rows($get);
	$find = mysqli_fetch_array($get);
	$idi = $find['id'];

	if($countget<1){
		$insert=mysqli_query($con,"INSERT INTO `banner`(`aid`, `title`, `img`, `date`, `status`, `remark`) VALUES ('$admin','$slider','$loc','$dj','A','2')");
		if($insert)
		{
		  echo 1;
		}else{
		  echo mysqli_error($con);
		}
	}
	else{
		$update = mysqli_query($con,"UPDATE `banner` SET `img`='$loc',`date`='$dj' WHERE id = '$idi' and aid='$admin'");
		if($update){
			echo 1;
		}
		else{
			echo mysqli_error($con);
		}
	}
}
}
else{
$countfiles = count($_FILES['file1']['name']);

// Upload directory
$upload_location = "images/banner/";

// To store uploaded files path
// // $files_arr = array();
// $count=mysqli_query($con,"SELECT * FROM `prod_img` group by img_id");
// $rows=mysqli_num_rows($count)+1;
// Loop all files
for($index = 0;$index < $countfiles;$index++){

   // File name
	$nam=time();
   $filename = $nam."_".$_FILES['file1']['name'][$index];

   // Get extension
   $ext = pathinfo($filename, PATHINFO_EXTENSION);

   // Valid image extension
   $valid_ext = array("png","jpeg","jpg");

   // Check extension
   if(in_array($ext, $valid_ext)){

     // File path
     $path = $upload_location.$filename;

     // Upload file
     if(move_uploaded_file($_FILES['file1']['tmp_name'][$index],$path)){

		echo $path;
     }
   }

}

}
?>