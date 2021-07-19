<?php
include '../includes/connect.php';
foreach ($_POST as $key => $value)
	{
		// echo $key."*".$value." /";

		if(preg_match("/[0-9]+_name/",$key)){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE category SET name = '$value' WHERE id = '$key'";
			$con->query($sql);
		}
		if(preg_match("/[0-9]+_bname/",$key)){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql= "UPDATE category SET bid = '$value' WHERE id = '$key'";
			$con->query($sql);
		}
		if(preg_match("/[0-9]+_hide/",$key)){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql= "UPDATE category SET status = '$value' WHERE id = '$key'";
			$con->query($sql);
		}
		
	}
	if(empty(mysqli_error($con)))
		{
			header("location: ../category.php");

		}else{
		echo mysqli_error($con);	
		}
?>