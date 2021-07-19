<?php
include('include/db.php');
if($_POST['type']=="update"){
// $priority=$_POST['priority'];
$slider=$_POST['slider'];
$admin=$_POST['admin'];
$loc=$_POST['loc'];

$insert=mysqli_query($con,"INSERT INTO `banner`(`aid`, `title`, `img`, `date`, `status`, `remark`) VALUES ('$admin','$slider','$loc','$dj','A','')");
if($insert)
{
  echo "Success";
}else{
  echo mysqli_error($con);
}
}
else{
$countfiles = count($_FILES['files']['name']);

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

		echo $path;
     }
   }

}

}
if($_POST['type']=="delete"){
    $id = $_POST['id'];
    $update = mysqli_query($con,"UPDATE `banner` SET `status`='R' where id = '$id'");
    if($update){
      echo 0;
    }
    else{
      echo 1;
    }

}
if($_POST['type']=="bannerdel"){
    $disc_id = $_POST['id'];
    $update = mysqli_query($con,"UPDATE `discount` SET `ap`= 'D' WHERE `disc_id` = '$disc_id'");
    if($update){
      echo 0;
    }
    else{
      echo 1;
    }

}
if($_POST['type']=="delete1"){
    $id = $_POST['id'];
    $update = mysqli_query($con,"UPDATE `banner` SET `status`='R' where id = '$id'");
    $disupdate = mysqli_query($con,"UPDATE `discount` SET `ap`= 'D' WHERE ap = 'A'");
    if($update){
      echo 0;
    }
    else{
      echo 1;
    }

}
// echo $rows;

// echo json_encode($files_arr);
// die;
?>