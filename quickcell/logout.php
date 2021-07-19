<?php
unset($_SESSION['admin_id']);
session_destroy();
header("Location:http://34.72.9.224/quickcell/login.php");
?>