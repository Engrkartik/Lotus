<?php
include('include/db.php');
$countfiles = count($_FILES['files']['name']);
$img_id=$_POST['iid'];
$pid=$_POST['pid'];
if(empty($img_id)){

$count=mysqli_query($con,"SELECT * FROM `prod_img` order by img_id DESC LIMIT 1");
// $rows=mysqli_num_rows($count)+1;
$fetch=mysqli_fetch_assoc($count);
$row = $fetch['img_id'];
$rows = $row+1;
  // Upload directory
$upload_location = "images/item/";

// To store uploaded files path
$files_arr = array();
// $count=mysqli_query($con,"SELECT * FROM `prod_img` group by img_id");
// $rows=mysqli_num_rows($count)+1;
// Loop all files
for($index = 0;$index < $countfiles;$index++){

   // File name
  $nam=time();
   $filename = $nam."_".$_FILES['files']['name'][$index];

   // Get extension
   $ext = pathinfo($filename, PATHINFO_EXTENSION);

   // Valid image extension
   $valid_ext = array("png","jpeg","jpg");

   // Check extension
   if(in_array($ext, $valid_ext)){

     // File path
     $path = $upload_location.$filename;

     // Upload file
     if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){

    $insert=mysqli_query($con,"INSERT INTO `prod_img`(`img_id`, `img_url`, `date`, `aid`) VALUES ('$rows','$path','$dj','$admin_id')");
    if($insert)
    {
    $uppro=mysqli_query($con,"UPDATE `product` SET `img`= '$rows' WHERE id='$pid'");
  }
     }
   }
}
echo $rows;
}
else{
// Upload directory
$upload_location = "images/item/";

// To store uploaded files path
$files_arr = array();
// $count=mysqli_query($con,"SELECT * FROM `prod_img` group by img_id");
// $rows=mysqli_num_rows($count)+1;
// Loop all files
for($index = 0;$index < $countfiles;$index++){

   // File name
	$nam=time();
   $filename = $nam."_".$_FILES['files']['name'][$index];

   // Get extension
   $ext = pathinfo($filename, PATHINFO_EXTENSION);

   // Valid image extension
   $valid_ext = array("png","jpeg","jpg");

   // Check extension
   if(in_array($ext, $valid_ext)){

     // File path
     $path = $upload_location.$filename;

     // Upload file
     if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){

		$insert=mysqli_query($con,"INSERT INTO `prod_img`(`img_id`, `img_url`, `date`, `aid`) VALUES ('$img_id','$path','$dj','$admin_id')");
     }
   }
 }
echo $img_id;
}


// echo json_encode($files_arr);
// die;
?>