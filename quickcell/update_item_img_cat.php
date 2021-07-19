<?php
include('include/db.php');
$main_cat_img = $_FILES['main']['name'];
$sub_cat_img = $_FILES['sub']['name'];
$sub_cat=$_POST['sub_cat'];
$main_cat=$_POST['main_cat'];

$upload_location = "images/category/";
$chk=mysqli_query($con,"SELECT * FROM `category` WHERE title='$main_cat' and (aid='$admin_id' or aid='0') and parent_id='0'");
$row=mysqli_fetch_assoc($chk);
if(mysqli_num_rows($chk)>0)
{
  $par_id=$row['id'];
$chk2=mysqli_query($con,"SELECT * FROM `category` WHERE title='$sub_cat' and (aid='$admin_id') and parent_id='$par_id'");
if(mysqli_num_rows($chk2)>0)
{
  goto end;
}
  else
  {
  $sub_cat_img = $nam."_".$_FILES['sub']['name'];

   // Get extension
   $ext = pathinfo($sub_cat_img, PATHINFO_EXTENSION);

   // Valid image extension
   $valid_ext = array("png","jpeg","jpg");

   // Check extension
   if(in_array($ext, $valid_ext)){


//      // File path
     $path = $upload_location.$sub_cat_img;

     // Upload file
     if(move_uploaded_file($_FILES['sub']['tmp_name'],$path)){
      $parent_id=$row['id'];
      $insert=mysqli_query($con,"INSERT INTO `category`(`aid`, `title`, `img`, `date`, `parent_id`, `status`, `remark`) VALUES ('$admin_id','$sub_cat','$path','$dj','$parent_id','A','')");
     }
   }
   if($insert)
   {
    echo $row['id'];
   }
   elseif($_FILES['sub']['name']!='')
   {
    echo 'a';
   }
   else{
    echo 'b';
   }
}
end: if(mysqli_num_rows($chk2)>0)
{echo 'b';}
}else
{
  $main_cat_img = $nam."_".$_FILES['main']['name'];

   // Get extension
   $ext = pathinfo($main_cat_img, PATHINFO_EXTENSION);

   // Valid image extension
   $valid_ext = array("png","jpeg","jpg");

   // Check extension
   if(in_array($ext, $valid_ext)){

//      // File path
     $path = $upload_location.$main_cat_img;

     // Upload file
     if(move_uploaded_file($_FILES['main']['tmp_name'],$path)){
      // $parent_id=$row['id'];
      $insert=mysqli_query($con,"INSERT INTO `category`(`aid`, `title`, `img`, `date`, `parent_id`, `status`, `remark`) VALUES ('$admin_id','$main_cat','$path','$dj','0','A','')");
      $lid=mysqli_insert_id($con);
     }
   }
if($sub_cat!="")
{
  $sub_cat_img = $nam."_".$_FILES['sub']['name'];

   // Get extension
   $ext = pathinfo($sub_cat_img, PATHINFO_EXTENSION);

   // Valid image extension
   $valid_ext = array("png","jpeg","jpg");

   // Check extension
   if(in_array($ext, $valid_ext)){


//      // File path
     $path = $upload_location.$sub_cat_img;

     // Upload file
     if(move_uploaded_file($_FILES['sub']['tmp_name'],$path)){
      // $parent_id=$row['id'];
      $insert=mysqli_query($con,"INSERT INTO `category`(`aid`, `title`, `img`, `date`, `parent_id`, `status`, `remark`) VALUES ('$admin_id','$sub_cat','$path','$dj','$lid','A','')");
     }
   }
 }
   if($insert)
   {
    echo $lid;
   }else
   {
    echo 'a';
   }
}

?>