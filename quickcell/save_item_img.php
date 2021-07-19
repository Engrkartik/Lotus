<?php
include('include/db.php');
$countfiles = count($_FILES['files']['name']);
$img_type=$_POST['img_type'];
// Upload directory
$upload_location = "images/item/";

// To store uploaded files path
$files_arr = array();
// $count=mysqli_query($con,"SELECT * FROM `prod_img` group by img_id");
$count=mysqli_query($con,"SELECT * FROM `prod_img` WHERE aid = '$admin_id' order by img_id DESC LIMIT 1");
// $rows=mysqli_num_rows($count)+1;
if($img_type==1)
{
$fetch=mysqli_fetch_assoc($count);
$row = $fetch['img_id'];
$rows = $row+1;
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
     }
   }

}
$prod=mysqli_query($con,"INSERT INTO `product`(`aid`,`img`,`date`,`status`) VALUES('$admin_id','$rows','$date','D')");
}elseif($img_type==2)
{
 
for($index = 0;$index < $countfiles;$index++){
$count=mysqli_query($con,"SELECT * FROM `prod_img` WHERE aid = '$admin_id' order by img_id DESC LIMIT 1");
 $fetch=mysqli_fetch_assoc($count);
$row = $fetch['img_id'];
$rows = $row+1;
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
$prod=mysqli_query($con,"INSERT INTO `product`(`aid`,`img`,`date`,`status`) VALUES('$admin_id','$rows','$date','D')");
    
     }
   }

}
}
// Loop all files

// if($insert){
// echo $rows;
// }
// else{
//   echo "";
// }
if($prod)
{
echo 1;
}else{
  echo mysqli_error($con);
}
// echo json_encode($files_arr);
// die;
?>