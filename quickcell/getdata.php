<?php
include('include/db.php');
$pid=$_POST['newid'];
$admin_id=$_POST['admin'];
// $data=array();
$djj='2020-09-23';
if($_POST['type']=="get")
{
$chk=mysqli_query($con,"SELECT disc FROM `discount` WHERE pid='$pid' and aid='$admin_id' and from_dt<='$djj' and to_dt>='$djj'");
$run=mysqli_fetch_assoc($chk);
$data= $run['disc'];

echo $data;
}
elseif($_POST['type']=="att")
{
	$cat_idd=$_POST['cat_id'];
	$chk_cat=mysqli_query($con,"SELECT * FROM `category` WHERE aid='0'");
	
	while ($row_cat=mysqli_fetch_assoc($chk_cat)) {
		if(strtoupper(substr($row_cat['title'],0,1))==$cat_idd)
		{
			$cat_id=$row_cat['id'];
		}
	}
	$att_idd=$_POST['att_id'];
	$att=mysqli_query($con,"SELECT * FROM `attributes` WHERE cat_id='$cat_id' and att_id='0' and (aid='$admin_id' or aid='0')");
	while($row=mysqli_fetch_assoc($att))
	{
		$att_id=$row['id'];
		echo '<div class="col-md-12"><div class="row" style="width: 100%">
		<div class="col-md-12">
		<label name="sub_cat[]" value='.str_replace('_', ' ',$row["att_name"]).'>'.str_replace('_', ' ',$row["att_name"]).'</label></div></div>
		<div class="row" style="margin_left:25px;"><br>';
	$att2=mysqli_query($con,"SELECT * FROM `attributes` WHERE cat_id='$cat_id' and att_id='$att_id' and (aid='$admin_id' or aid='0') ORDER by att_name asc");
	while($row2=mysqli_fetch_assoc($att2))
	{
		$aa=$row2["att_name"];
		$ss=$row["att_name"];
			$sub_catt=mysqli_query($con,"SELECT prod_attribute.* FROM `prod_attribute` WHERE prod_attribute.att_id='$att_idd' and prod_attribute.aid='$admin_id' and prod_attribute.attribute='$aa' and prod_attribute.sub_cat='$ss'");

		echo '<div class="col-md-6">
			<label class="GFG">
			<input type="checkbox" class="my_categories" id="att" name="att[]" onclick="temp_att_arr();" value="'.$row2["att_name"].'~'.$row["att_name"].'~'.$row2["id"].'"';if(mysqli_num_rows($sub_catt)>0){ echo "checked='chekced'";} echo '>&nbsp;'.str_replace('_', ' ',$row2["att_name"]).'&nbsp;
			</label></div>';
	}
		echo '</div></div>';
	// 	$att_id=$row['id'];
	// 	echo '<table>
	// 	<thead><tr style="width:100%">
	// 	<label name="sub_cat[]" value='.$row["att_name"].'>'.$row["att_name"].'</label>
	// 	</tr></thead><br>
	// 	<tbody>';
	// $att2=mysqli_query($con,"SELECT * FROM `attributes` WHERE cat_id='$cat_id' and att_id='$att_id'");
	// while($row2=mysqli_fetch_assoc($att2))
	// {
	// 	echo '<td><tr>
	// 		<label class="GFG">
	// 		<input type="checkbox" id="att" name="att[]" value='.strval($row2["att_name"]).'~'.$row["att_name"].'~'.$row2["id"].'>&nbsp;'.$row2["att_name"].'&nbsp;</label>
	// 		</td></tr>';
	// }
	// 	echo '</tbody></table>';

}
}
// echo "string";
if($_POST['type']=="modal"){

	$id = $_POST['id'];

	$query = mysqli_query($con,"SELECT * FROM `feedback` where id = '$id'");
	$fetch = mysqli_fetch_assoc($query);
	$msg = $fetch['msg'];
	$rating = $fetch['rating'];
	echo $msg;
	// echo $rating;
}
?>