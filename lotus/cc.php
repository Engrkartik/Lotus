<?php
$serverName = "103.21.58.193"; 
$connectionInfo = array( "Database"=>"A100", "UID"=>"A100", "PWD"=>"Logic111@");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if($conn){
    echo "true";
}else{
    echo "false";
}

?>