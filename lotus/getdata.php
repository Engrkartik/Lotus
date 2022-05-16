<?php
include('include/db.php');
$pid=$_POST['newid'];
$admin_id=$_POST['admin'];
$sale_price=$_POST['sale_price'];
// $data=array();
$djj=date('Y-m-d');
if($_POST['type']=="get")
{
$chk=mysqli_query($con,"SELECT disc_type,disc FROM `discount` WHERE pid='$pid' and aid='$admin_id' and from_dt<='$djj' and to_dt>='$djj'");
$run=mysqli_fetch_assoc($chk);
$dis= $run['disc'];
if($run['disc_type']=='P')
{
//   $disc=($sale_price*$dis)." (₹)";
$disc=$dis." (%)";

}else
{
  $disc=$dis." (₹)";
}

echo ($disc>0?$disc:'NA');
}
elseif($_POST['type']=="att")
{
	$cat_id=$_POST['cat_id'];
	$att=mysqli_query($con,"SELECT * FROM `attributes` WHERE cat_id='$cat_id' and att_id='0'");
	while($row=mysqli_fetch_assoc($att))
	{
		$att_id=$row['id'];
		echo '<div class="col-md-12"><div class="row" style="width: 100%">
		<div class="col-md-12">
		<label name="sub_cat[]" value='.str_replace('_', ' ',$row["att_name"]).'>'.str_replace('_', ' ',$row["att_name"]).'</label></div></div>
		<div class="row" style="margin_left:25px;"><br>';
	$att2=mysqli_query($con,"SELECT * FROM `attributes` WHERE cat_id='$cat_id' and att_id='$att_id' ORDER by att_name asc");
	while($row2=mysqli_fetch_assoc($att2))
	{
		echo '<div class="col-md-6">
			<label class="GFG">
			<input type="checkbox" class="my_categories" id="att" name="att[]" value="'.$row2["att_name"].'~'.$row["att_name"].'~'.$row2["id"].'">&nbsp;'.str_replace('_', ' ',$row2["att_name"]).'&nbsp;
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