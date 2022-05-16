<?php
include '../includes/connect.php';
foreach ($_POST as $key => $value)
	{
		// echo $key."*".$value." ";

		if(preg_match("/[0-9]+_name/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE branch SET name = '$value' WHERE id = '$key'";
			$con->query($sql);
			}
		}
		if(preg_match("/[0-9]+_location/",$key)){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql= "UPDATE branch SET location = '$value' WHERE id = '$key'";
			$con->query($sql);
		}
		if(preg_match("/[0-9]+_fromtime/",$key)){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE branch SET from_time = '$value' WHERE id = '$key'";
			$con->query($sql);
		}
		if(preg_match("/[0-9]+_totime/",$key)){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE branch SET to_time = '$value' WHERE id = '$key'";
			$con->query($sql);
		}
		if(preg_match("/[0-9]+_stdate/",$key)){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE branch SET start_date = '$value' WHERE id = '$key'";
			$con->query($sql);
		}
		if(preg_match("/[0-9]+_totaltable/",$key)){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE branch SET no_of_tables = '$value' WHERE id = '$key'";
			$con->query($sql);
		}
		if(preg_match("/[0-9]+_totalwaiter/",$key)){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE branch SET no_of_waiters = '$value' WHERE id = '$key'";
			$con->query($sql);
		}
		if(preg_match("/[0-9]+_totalchef/",$key)){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE branch SET no_of_chef = '$value' WHERE id = '$key'";
			$con->query($sql);
		}
		if(preg_match("/[0-9]+_hide/",$key)){
			if($_POST[$key] == 1){
			$key = strtok($key, '_');
			$sql = "UPDATE branch SET status = 'A' WHERE id = '$key'";
			$con->query($sql);
			} else{
			$key = strtok($key, '_');
			$sql = "UPDATE branch SET status = 'D' WHERE id = '$key'";
			$con->query($sql);			
			}
		}

	}
	if(empty(mysqli_error($con)))
		{
			header("location: ../branch.php");

		}else{
		echo mysqli_error($con);	
		}
?>