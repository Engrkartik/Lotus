<?php
include('include/db.php');
$type=$_POST['type'];

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$name=$first_name." ".$last_name;
$mob_no=$_POST['mob_no'];
$email_id=$_POST['email_id'];
$firm_name=$_POST['firm_name'];
$address=$_POST['address'];
$state=$_POST['state'];
$city=$_POST['city'];
$pin_code=$_POST['pin_code'];
$gst_type=$_POST['gst_type'];
$gst_no=$_POST['gst_no'];
$bus_type=$_POST['bus_type'];
$admin=$_POST['admin'];
$country=$_POST['country'];
$district=$_POST['district'];
$alt_no=$_POST['alt_no'];
$img=$_POST['img'];
if($type=="Add")
{
$chk=mysqli_query($con,"SELECT * FROM `company_reg` where CONTACT_NO='$mob_no'");
// echo mysqli_num_rows($chk);
// }
if((mysqli_num_rows($chk))>0)
{
	echo "Duplicate Record.!";
}
// }
else
{
  
    // $check = mysqli_query($con,"UPDATE `banner` SET `img`='$img1' where `id` = '$id' ");  // executing 
$inset=mysqli_query($con,"INSERT INTO `company_reg`(`aid`, `OWNER_NAME`, `FIRM_NAME`, `BUSINESS`, `ADDRESS`, `COUNTRY`, `STATE`,`DISTRICT`, `CITY`, `PIN_CODE`, `CONTACT_NO`, `ALT_NO`, `EMAIL_ID`, `GST_TYPE`, `GSTIN_NO`,`image`,`STATUS`, `DATE`, `REMARK`) VALUES('$admin','$name','$firm_name','$bus_type','$address','$country','$state','$district','$city','$pin_code','$mob_no','$alt_no','$email_id','$gst_type','$gst_no','$img','A','$dj','')");
if($inset)
{
	echo "User Register.";
}
else {
	echo mysqli_error($con);
}
}
}else
{
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