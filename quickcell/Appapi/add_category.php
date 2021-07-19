<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
$main_cat=$con->real_escape_string($_POST['main_cat']);
$main_cat_img=$_FILES['main_cat_img']['name'];
$sub_cat=$con->real_escape_string($_POST['sub_cat']);
$sub_cat_img=$_FILES['sub_cat_img']['name'];
// $photo=$_REQUEST['main_cat'];
$chk=mysqli_query($con,"SELECT * FROM `category` WHERE title='$main_cat' and aid='$admin_id'");
$run=mysqli_fetch_assoc($chk);
if(mysqli_num_rows($chk)>0)
{
  $pid=$run['id'];
$chk2=mysqli_query($con,"SELECT * FROM `category` WHERE title='$sub_cat' and aid='$admin_id' and parent_id='$pid'");
if(mysqli_num_rows($chk2)>0)
{
   $json = array(
      "status"=>false,
      // "details"=>$data,
      "msg"=>"Duplicate Entries"
  );
}
else{
   if(!empty($sub_cat_img))
{
    $IDproofImage = $admin_id."_".uniqid()."_id.png";
    $base1 = $sub_cat_img;
    $binary1 = base64_decode($base1);
    header('Content-Type: bitmap; charset=utf-8');
    $file1 = fopen('../images/category/' . $IDproofImage, 'wb');
    $path='images/category/'.$IDproofImage;
    fwrite($file1, $binary1);
    fclose($file1);
    $query = mysqli_query($con,"INSERT INTO `category`(`aid`, `title`, `img`, `date`, `parent_id`, `status`, `remark`) VALUES ('$admin_id','$sub_cat','$path','$dj','$pid','A','')");

     $json = array(
      "status"=>true,
      // "details"=>$data,
      "msg"=>"Success"
  );
}else{
   $json = array(
      "status"=>false,
      // "details"=>$data,
      "msg"=>"Error"
  );
} 
}
}else
{
if(!empty($main_cat_img))
{
  $IDproofImage = $admin_id."_".uniqid()."_id.png";
    $base1 = $main_cat_img;
    $binary1 = base64_decode($base1);
    header('Content-Type: bitmap; charset=utf-8');
    $file1 = fopen('../images/category/' . $IDproofImage, 'wb');
    $path='images/category/'.$IDproofImage;
    fwrite($file1, $binary1);
    fclose($file1);
    $query = mysqli_query($con,"INSERT INTO `category`(`aid`, `title`, `img`, `date`, `parent_id`, `status`, `remark`) VALUES ('$admin_id','$main_cat','$path','$dj','0','A','')");
    $parent_id=mysqli_insert_id($con);
 if(!empty($sub_cat_img))
{
  $IDproofImage = $admin_id."_".uniqid()."_id.png";
    $base1 = $sub_cat_img;
    $binary1 = base64_decode($base1);
    header('Content-Type: bitmap; charset=utf-8');
    $file1 = fopen('../images/category/' . $IDproofImage, 'wb');
    $path='images/category/'.$IDproofImage;
    fwrite($file1, $binary1);
    fclose($file1);
    $query = mysqli_query($con,"INSERT INTO `category`(`aid`, `title`, `img`, `date`, `parent_id`, `status`, `remark`) VALUES ('$admin_id','$sub_cat','$path','$dj','$parent_id','A','')");
    
     $json = array(
      "status"=>true,
      // "details"=>$data,
      "msg"=>"Success"
  );
}else{
   $json = array(
      "status"=>false,
      // "details"=>$data,
      "msg"=>"Error"
  );
}  
 $json = array(
      "status"=>true,
      // "details"=>$data,
      "msg"=>"Success"
  );  
}else{
   $json = array(
      "status"=>false,
      // "details"=>$data,
      "msg"=>"Error"
  );
} 
}

 header('Content-Type: application/json');
    echo json_encode($json);
}
?>