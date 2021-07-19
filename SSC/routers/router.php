<?php
include '../includes/connect.php';
$success=false;

$mobile = mysqli_real_escape_string($con,$_POST['username']);
$password = mysqli_real_escape_string($con,$_POST['password']);

$result = mysqli_query($con, "SELECT * FROM users WHERE username='$mobile' AND password='$password' AND status='A'");
while($row = mysqli_fetch_array($result))
{
	$success = true;
	$username = $row['id'];
	$name = $row['name'];
	$role= $row['role'];
	$branch = $row['branch'];
}
if($role == 'Administrator' and $branch = 'null')
{	
	session_start();
	$_SESSION['id']=session_id();
	$_SESSION['username'] = $username;
	$_SESSION['role'] = $role;
	$_SESSION['name'] = $name;

	header("location: ../admin-page.php");
}
elseif ($role == 'Cashier') {
	session_start();
	$_SESSION['id']=session_id();
	$_SESSION['username'] = $username;
	$_SESSION['role'] = $role;
	$_SESSION['name'] = $name;
	$_SESSION['branch'] = $branch;

	header("location: ../bills.php");
}
elseif($role == 'Chef')
{
	// $result = mysqli_query($con, "SELECT * FROM chef WHERE phone_number='$username' AND password='$password' AND status='A';");
	// while($row = mysqli_fetch_array($result))
	// {
	// $success = true;
	// $username = $row['id'];
	// $name = $row['name'];
	// $role= 'chef';
	// }
	// if($success == true)
	// {
		session_start();
		$_SESSION['id']=session_id();
		$_SESSION['username'] = $username;
		$_SESSION['role'] = $role;
		$_SESSION['name'] = $name;			
		header("location: ../index.php");
	}
	else
	{
		header("location: ../login.php");
	}

?>
