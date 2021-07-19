<?php
include('include/db.php');
$set_id=$_POST['set_id'];
$val=$_POST['val'];
$min_color="min_color_".$set_id;
$error="_".$set_id;
echo '<div class="row" style="margin-left:10px;">
<div class="col-md-12">
			<div class="row" style="margin-top:5px;">
	          
	        </div>
	        <div class="row"> 
	        <div id="input-outer" class="col-md-11">
	 		 <input type="search" class="form-control" onkeyup="myFunction(this.value)" id="Search" placeholder="Search for color..." data-clear-btn="true">
			  <div id="clear1">
			    X
			  </div>
			</div>
			</div>
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
			<label class="GFG target">OPTION 1&nbsp;&nbsp;<input type="radio" name="chk" onchange="disable_option(\'option2\');"></label>
			</div><br>
			'; 
			$color_2=mysqli_query($con,"SELECT * FROM `color` WHERE (aid='$admin_id' or aid='0') and color_type='2' order by `date` desc");

			while($run=mysqli_fetch_assoc($color_2))
			{
			$c_name=$run['c_name'];
			$chk_q=mysqli_query($con,"SELECT color FROM `set_details_whole` WHERE set_id='$set_id' and color='$c_name' and aid='$admin_id'");
			// $chk_r=mysqli_fetch_assoc($chk_q);
			echo '<div class="col-md-4 target">
			<label class="GFG"><input type="radio" onclick="temp_clr_arr();" value="'.$run['c_name'].'" name="clr[]" onchange="disable_option(\'option2\')" class="option1"';if(mysqli_num_rows($chk_q)>0){echo "checked='checked'";} echo '/>&nbsp;'.str_replace('_', ' ',$run['c_name']).'</label></div>';}
			$color_2=mysqli_query($con,"SELECT * FROM `color` WHERE (aid='$admin_id' or aid='0') and color_type='1' order by c_name asc");
			$sn++;

			echo '<br><div class="col-md-12">

			<label class="GFG target">OPTION 2&nbsp;&nbsp;<input type="radio" name="chk" onchange="disable_option(\'option1\')"></label> </div><br>
			<label id="new_color_print"></label><br>';
			while($run=mysqli_fetch_assoc($color_2))
			{
			$c_name=$run['c_name'];
			$chk_q=mysqli_query($con,"SELECT color FROM `set_details_whole` WHERE set_id='$set_id' and color='$c_name' and aid='$admin_id'");
			// $chk_r=mysqli_fetch_assoc($chk_q);
			echo '<div class="col-md-3 target">
			<label class="GFG"><input type="checkbox" id="option2" onclick="temp_clr_arr();" value="'.$run['c_name'].'" name="clr[]" onchange="disable_option(\'option1\');" class="option2"';if(mysqli_num_rows($chk_q)>0){echo "checked='checked'";} echo ' />&nbsp;'.str_replace('_',' ',$run['c_name']).'</label></div>
			';}
			echo '</div>

			</div>
			</div></div>';
			

?>