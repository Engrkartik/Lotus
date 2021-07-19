<?php
include('include/db.php');
$type=$_POST['type'];
$color=str_replace(' ','_',$_POST['color']);
if($type=='color')
{
	$chk=mysqli_query($con,"SELECT * FROM `color` WHERE c_name='$color' and aid='$admin_id'");
	if(mysqli_num_rows($chk)>0)
	{
		echo 0;
	}
	else
	{
		$insert=mysqli_query($con,"INSERT INTO `color`(`aid`, `color_type`, `c_name`, `status`, `date`) VALUES ('$admin_id','1','$color','A','$dj')");
		if($insert)
		{
			echo  '<label class="GFG" style="margin-left:15px;margin-right:300px;"><input type="checkbox" id="option2" value="'.$color.'" name="clr[]" onchange="disable_option(option1)" class="option2" checked="checked"/>&nbsp;'.str_replace('_',' ',$color).'</label>';
		}else
		{
			echo mysqli_error($con);
		}
	}
}
?>