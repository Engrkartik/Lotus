<?php
include('include/db.php');
$type=$_POST['type'];
$set_id=$_POST['set_id'];
$prev_color=json_decode($_POST['prev_color']);
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
			echo '<div class="row" style="margin-left:10px;">
<div class="col-md-12">
			
	        <div id="show_clr">
			<div class="row">
			<div class="col-md-12">
			<label class="btn btn-success"  onclick="add_row(\'\')"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Color</label>
			</div>
			</div>
			<div class="row" id="new_color_row" style="display: none;">
			<div class="col-md-6">
			<label>Color Name</label>
			<input type="text" class="form-control" id="new_color" list="color_list">
			<p id="color_error" style="color: red"></p>
			</div>
			<datalist id="color_list">';
			$query=mysqli_query($con,"SELECT * FROM `color` WHERE (aid='$admin_id' or aid='0') ORDER BY `id` DESC ");
			while ($row3=mysqli_fetch_assoc($query)) {
			echo '<option style="cursor: pointer;">'.$row3['c_name'].'</option>
			';}

			echo '</datalist>
			<div class="col-md-6"><br>
			<input type="button" class="btn btn-success" onclick="save_color(\'show_clr\');add_row(\'none\')" value="Save">
			<input type="button" class="btn btn-secondary"onclick="add_row(\'none\')" value="Cancel">
			</div>
			</div>
			<div class="row">
			<div class="col-md-12">
			<label class="GFG target">OPTION 1&nbsp;&nbsp;<input type="radio" name="chk" onchange="disable_option(\'options2\');"></label>
			</div><br>
			'; 
			$color_2=mysqli_query($con,"SELECT * FROM `color` WHERE (aid='$admin_id' or aid='0') and color_type='2' order by `date` desc");

			while($run=mysqli_fetch_assoc($color_2))
			{
			$c_name=$run['c_name'];
			$chk_q=mysqli_query($con,"SELECT color FROM `set_details_whole` WHERE set_id='$set_id' and color='$c_name' and aid='$admin_id'");
			// $chk_r=mysqli_fetch_assoc($chk_q);
			echo '<div class="col-md-4 target">
			<label class="GFG"><input type="radio" value="'.$run['c_name'].'" name="clr[]" onchange="disable_option(\'options2\')" class="options1"';if($color==$run['c_name']){echo "checked='checked'";}else{"disabled='disabled'";} echo '/>&nbsp;'.str_replace('_', ' ',$run['c_name']).'</label></div>';}
			$color_2=mysqli_query($con,"SELECT * FROM `color` WHERE (aid='$admin_id' or aid='0') and color_type='1' order by c_name asc");
			$sn++;

			echo '<br><div class="col-md-12">

			<label class="GFG target">OPTION 2&nbsp;&nbsp;<input type="radio" name="chk" onchange="disable_option(\'options1\')"></label> </div><br>
			';
			while($run=mysqli_fetch_assoc($color_2))
			{
			$c_name=$run['c_name'];
			$chk_q=mysqli_query($con,"SELECT color FROM `set_details_whole` WHERE set_id='$set_id' and color='$c_name' and aid='$admin_id'");
			// $chk_r=mysqli_fetch_assoc($chk_q);
			echo '<div class="col-md-3 target">
			<label class="GFG"><input type="checkbox" id="option2" value="'.$run['c_name'].'" name="clr[]" onchange="disable_option(\'options1\');count_color_size(\'clr[]\',\'min_color\');" class="options2"';for($i=0;$i<sizeof($prev_color);$i++){if(($color==$run['c_name']) || (mysqli_num_rows($chk_q)>0) || ($prev_color[$i]==$run['c_name'])){echo "checked='checked'";}else{"disabled='disabled'";}} echo ' />&nbsp;'.str_replace('_',' ',$run['c_name']).'</label></div>
			';}
			echo '</div>

			</div>
			</div>
			</div>';
		}else
		{
			echo mysqli_error($con);
		}
	}
}elseif($type=='color2')
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
			echo '<div class="row" style="margin-left:10px;">
<div class="col-md-12">
			
	        <div id="new_color_print">
			<div class="row">
			<div class="col-md-12">
			<label class="btn btn-success"  onclick="add_row(\'\')"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Color</label>
			</div>
			</div>
			<div class="row" id="new_color_row" style="display: none;">
			<div class="col-md-6">
			<label>Color Name</label>
			<input type="text" class="form-control" id="new_color" list="color_list">
			<p id="color_error" style="color: red"></p>
			</div>
			<datalist id="color_list">';
			$query=mysqli_query($con,"SELECT * FROM `color` WHERE (aid='$admin_id' or aid='0') ORDER BY `id` DESC ");
			while ($row3=mysqli_fetch_assoc($query)) {
			echo '<option style="cursor: pointer;">'.$row3['c_name'].'</option>
			';}

			echo '</datalist>
			<div class="col-md-6"><br>
			<input type="button" class="btn btn-success" onclick="save_color2('.$set_id.');add_row(\'none\')" value="Save">
			<input type="button" class="btn btn-secondary"onclick="add_row(\'none\')" value="Cancel">
			</div>
			</div>
			<div class="row">
			<div class="col-md-12">
			<label class="GFG target">OPTION 1&nbsp;&nbsp;<input type="radio" name="chk" onchange="disable_option(\'options2\');count_color_size(\'clr'.$set_id.'[]\',\'min_color_'.$set_id.'\');"></label>
			</div><br>
			'; 
			$color_2=mysqli_query($con,"SELECT * FROM `color` WHERE (aid='$admin_id' or aid='0') and color_type='2' order by `date` desc");

			while($run=mysqli_fetch_assoc($color_2))
			{
			$c_name=$run['c_name'];
			$chk_q=mysqli_query($con,"SELECT color FROM `set_details_whole` WHERE set_id='$set_id' and color='$c_name' and aid='$admin_id'");
			// $chk_r=mysqli_fetch_assoc($chk_q);
			echo '<div class="col-md-4 target">
			<label class="GFG"><input type="radio" value="'.$run['c_name'].'" name="clr'.$set_id.'[]" onchange="disable_option(\'options2\');count_color_size(\'clr'.$set_id.'[]\',\'min_color_'.$set_id.'\');" class="options1"';for($i=0;$i<sizeof($prev_color);$i++){if((mysqli_num_rows($chk_q)>0) or ($color==$run['c_name']) or ($prev_color[$i]==$run['c_name'])){echo "checked='checked'";}else{"disabled='disabled'";}} echo '/>&nbsp;'.str_replace('_', ' ',$run['c_name']).'</label></div>';}
			$color_2=mysqli_query($con,"SELECT * FROM `color` WHERE (aid='$admin_id' or aid='0') and color_type='1' order by c_name asc");
			$sn++;

			echo '<br><div class="col-md-12">

			<label class="GFG target">OPTION 2&nbsp;&nbsp;<input type="radio" name="chk" onchange="disable_option(\'options1\');count_color_size(\'clr'.$set_id.'[]\',\'min_color_'.$set_id.'\');"></label> </div><br>
			';
			while($run=mysqli_fetch_assoc($color_2))
			{
			$c_name=$run['c_name'];
			$chk_q=mysqli_query($con,"SELECT color FROM `set_details_whole` WHERE set_id='$set_id' and color='$c_name' and aid='$admin_id'");
			// $chk_r=mysqli_fetch_assoc($chk_q);
			echo '<div class="col-md-3 target">
			<label class="GFG"><input type="checkbox" id="option2" value="'.$run['c_name'].'" name="clr'.$set_id.'[]" onchange="disable_option(\'options1\');count_color_size(\'clr'.$set_id.'[]\',\'min_color_'.$set_id.'\');" class="options2"';for($i=0;$i<sizeof($prev_color);$i++){if(($color==$run['c_name']) || (mysqli_fetch_assoc($chk_q)>0) || ($prev_color[$i]==$run['c_name'])) {echo "checked='checked'";}else{"disabled='disabled'";}} echo ' />&nbsp;'.str_replace('_',' ',$run['c_name']).'</label></div>
			';}
			echo '</div>

			</div>
			</div>
			</div>';
		}else
		{
			echo mysqli_error($con);
		}
	}
}
?>