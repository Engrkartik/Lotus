<?php
include('include/db.php');
$query=mysqli_query($con,"SELECT title FROM `category` WHERE parent_id='0' and aid='$admin_id'");
while ($row=mysqli_fetch_assoc($query)) {
	$data[]=$row['title'];
}
echo json_encode($data);
?>