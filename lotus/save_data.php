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
$img=$_POST['image'];
if($type=='up'){
	$c_id=$_POST['c_id'];
	$inset=mysqli_query($con,"UPDATE `company_reg` SET `aid`='$admin',`OWNER_NAME`='$name',`FIRM_NAME`='$firm_name',`BUSINESS`='$bus_type',`ADDRESS`='$address',`COUNTRY`='$country',`STATE`='$state',`DISTRICT`='$district',`CITY`='$city',`PIN_CODE`='$pin_code',`CONTACT_NO`='$mob_no',`ALT_NO`='$alt_no',`EMAIL_ID`='$email_id',`GST_TYPE`='$gst_type',`GSTIN_NO`='$gst_no',`image`='$img',`DATE`='$dj' WHERE id='$c_id'");
if($inset)
{
	echo "User Register.";
}
else {
	echo mysqli_error($con);
}
}
elseif($type=="Update")
{
	$do=$_POST['do'];
	$c_id=$_POST['c_id'];
	$upd=mysqli_query($con,"UPDATE `company_reg` SET `STATUS`='$do' WHERE `id`='$c_id'");
}
elseif($type=="Del")
{
	$c_id=$_POST['c_id'];
	$upd=mysqli_query($con,"UPDATE `company_reg` SET `STATUS`='R' WHERE `id`='$c_id'");
}elseif($type=="dist")
{
	$state=$_POST['state'];
	$chk=mysqli_query($con,"SELECT district FROM `districts` where state='$state' ORDER BY district ASC");
	echo '<select clas="form_control">
	<option value="00">Select District</option>';
      while($row=mysqli_fetch_assoc($chk)) {
        
      
     
     echo '<option value="'.$row["district"].'">'.$row["district"].'</option>';
    }
    echo '</select>';
}elseif($type=="Order"){
	$do=$_POST['do'];
	$o_id=$_POST['o_id'];
	$up=mysqli_query($con,"UPDATE `manage_order` SET `status`='$do' WHERE id='$o_id'");
	echo "Success";
}
?>