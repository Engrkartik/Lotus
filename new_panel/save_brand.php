<?php
include('include/db.php');
$brand_img= $_FILES['brand_img']['name'];
$brand_title=$_POST['brand_title'];
$upload_location = "images/brand/";
$chk=mysqli_query($con,"SELECT * FROM `brand` WHERE aid='$admin_id' and name='$brand_title'");
$row=mysqli_fetch_assoc($chk);
if(mysqli_num_rows($chk)<1)
{
  $brand_img = $nam."_".$brand_img;

  // Get extension
   $ext = pathinfo($brand_img, PATHINFO_EXTENSION);

   // Valid image extension
   $valid_ext = array("png","jpeg","jpg");

   // Check extension
   if(in_array($ext, $valid_ext)){

//      // File path
     $path = $upload_location.$brand_img;

     // Upload file
     if(move_uploaded_file($_FILES['brand_img']['tmp_name'],$path)){
      $insert=mysqli_query($con,"INSERT INTO `brand`(`aid`, `name`, `img_url`, `status`, `date`, `remark`) VALUES ('$admin_id','$brand_title','$path','A','$dj','')");
     }
   }
   if($insert)
   {
    echo 1;
   }else
   {
    echo mysqli_error($con);
   }
}else
{
  echo 0;
}
     // echo $path;
?>