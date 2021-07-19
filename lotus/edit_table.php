<?php
include('include/db.php');
if($_POST['type']=="att")
{
	$cat_id=$_POST['cat_id'];
	$att=mysqli_query($con,"SELECT * FROM `attributes` WHERE cat_id='$cat_id' and att_id='0'");
	while($row=mysqli_fetch_assoc($att))
	{
		$att_id=$row['id'];
		echo '<div class="row">
		<div class="col-sm-12">
		<label name="sub_cat[]" value='.$row["att_name"].'>'.$row["att_name"].'<label></div><div class="row">';
	$att2=mysqli_query($con,"SELECT * FROM `attributes` WHERE cat_id='$cat_id' and att_id='$att_id'");
	while($row2=mysqli_fetch_assoc($att2))
	{
		echo '<div class="col-sm-6">&nbsp;&nbsp;

			<input type="checkbox" name="att[]" value='.strval($row2["att_name"]).'~'.$row["att_name"].'~'.$row2["id"].'>'.$row2["att_name"].'
		</div>';
	}
		echo '</div></div>';

}
}
?>