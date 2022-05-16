<?php 
include '../includes/connect.php';
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$wid = mysqli_real_escape_string($con,$_POST['wid']);
// $bid = mysqli_real_escape_string($con,$_POST['bid']);

$findwid = mysqli_query($con,"SELECT * FROM `users` WHERE role = 'Waiter' AND id = '$wid'");
$getwid = mysqli_fetch_assoc($findwid);
$bid = $getwid['branch'];
    
$getPend = mysqli_query($con,"SELECT * FROM `tables` WHERE branch = '$bid'");
            
    $JSON = array();
    while ($rw = mysqli_fetch_assoc($getPend)) {
    
    	$tab = $rw['id'];
    	$gettable = mysqli_query($con,"SELECT * FROM `save_to_later` WHERE table_no = '$tab' AND status != 'delete'");
    	$counttable = mysqli_num_rows($gettable);
    	if($counttable>0){
	        
	        $JSON[] = array(

    	    	"id" => $rw['id'],
        		"table_no" => $rw['tables_no'],
        		"sitting" => $rw['sitting'],
        		"branch" => $rw['branch'],
        		"created_on" => $rw['created_on'],
        		"status" => $rw['status'],
        		"save_to_later" => "yes",
        	);
	    }
	    else{
	    	$JSON[] = array(

    	    	"id" => $rw['id'],
        		"table_no" => $rw['tables_no'],
        		"sitting" => $rw['sitting'],
        		"branch" => $rw['branch'],
        		"created_on" => $rw['created_on'],
        		"status" => $rw['status'],
        		"save_to_later" => "no",
        	);	
	    }
        // print_r($JSON);
    }
if(mysqli_num_rows($getPend)>0)
{
    $json = array(
        "status" => true,
        "tablelist" => $JSON,
    );
 } else{

    $json = array(
        "status" => false,
        "tablelist" => $JSON,
    );
 }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>