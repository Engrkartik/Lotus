<?php
include('include/db.php');
$new_question=str_replace(' ','_',$_POST['new_question']);
$type=$_POST['type'];
if($type=='add_ques')
{
$insert_col=mysqli_query($con,"ALTER TABLE registration_form ADD $new_question varchar(100)");
$query2=mysqli_query($con,"SELECT * FROM `registration_form` WHERE aid='$admin_id'");
 if(mysqli_num_rows($query2)>0)
 {
$update=mysqli_query($con,"UPDATE `registration_form` SET $new_question='N' WHERE aid='$admin_id'");
 }else
 {
 	$update=mysqli_query($con,"INSERT INTO `registration_form`(`aid`,$new_question) VALUES ('$admin_id','N')");
 }

if($update)
{
	echo 1;
}else
{
	echo mysqli_error($con);
}
}elseif($type=='valid')
{
	$col=$_POST['col'];
	$val=$_POST['val'];
	
	$update=mysqli_query($con,"UPDATE `registration_form` SET $col='$val' WHERE aid='$admin_id'");
if($update)
{
	echo 1;
}
else{echo mysqli_error($con);}
}
?>