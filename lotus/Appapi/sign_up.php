<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$firm_name=$con->real_escape_string($_POST['firm_name']);
$owner_name=$con->real_escape_string($_POST['owner_name']);
$business_type=$con->real_escape_string($_POST['business_type']);
$address=$con->real_escape_string($_POST['address']);
$city=$con->real_escape_string($_POST['city']);
$district=$con->real_escape_string($_POST['district']);
$state=$con->real_escape_string($_POST['state']);
$pin_code=$con->real_escape_string($_POST['pin_code']);
$email=$con->real_escape_string($_POST['email']);
$gst_no=$con->real_escape_string($_POST['gst_no']);
$mobile=$con->real_escape_string($_POST['mobile']);
$alt_mobile=$con->real_escape_string($_POST['alt_mobile']);
$admin_id=$con->real_escape_string($_POST['admin_id']);
// $aadhaar=$con->real_escape_string($_POST['aadhaar']);
// $pan=$con->real_escape_string($_POST['pan']);

if(empty($gst_no))
{
  $gst_type='U';
}else{
  $gst_type='R';
}
$insert=mysqli_query($con,"INSERT INTO `company_reg`(`aid`, `OWNER_NAME`, `FIRM_NAME`, `BUSINESS`, `ADDRESS`, `COUNTRY`, `STATE`, `DISTRICT`, `CITY`, `PIN_CODE`, `CONTACT_NO`, `ALT_NO`, `EMAIL_ID`, `GST_TYPE`, `GSTIN_NO`,`AADHAAR`,`PAN`,`STATUS`, `DATE`, `REMARK`) VALUES ('$admin_id','$owner_name','$firm_name','$business_type','$address','INDIA','$state','$district','$city','$pin_code','$mobile','$alt_mobile','$email','$gst_type','$gst_no','$aadhaar','$pan','P','$dj','')");

if($insert)
{
$chk2=mysqli_query($con,"SELECT * FROM `company_reg` WHERE company_reg.CONTACT_NO='$mobile'");
while($run=mysqli_fetch_assoc($chk2))
{
  $data= array(   "ID"=>$run['id'],
                  "AID"=>$run['aid'],
                  "OWNER_NAME"=>$run['OWNER_NAME'],
                  "FIRM_NAME"=>$run['FIRM_NAME'],
                  "BUSINESS"=>$run['BUSINESS'],
                  "ADDRESS"=>$un['ADDRESS'],
                  "COUNTRY"=>$run['COUNTRY'],
                  "STATE"=>$run['STATE'],
                  "DISTRICT"=>$run['DISTRICT'],
                  "CITY"=>$run['CITY'],
                  "PIN_CODE"=>$run['PIN_CODE'],
                  "CONTACT_NO"=>$run['CONTACT_NO'],
                  "ALT_NO"=>$run['ALT_NO'],
                  "EMAIL_ID"=>$run['EMAIL_ID'],
                  "GST_TYPE"=>$run['GST_TYPE'],
                  "GSTIN_NO"=>$run['GSTIN_NO'],
                  "AADHAAR"=>$run['AADHAAR'],
                  "PAN"=>$run['PAN'],
                  "STATUS"=>$run['STATUS'],
                  "DATE"=>$run['DATE']);
}

  $json = array(
      "status"=>true,
      "details"=>$data,
      "msg"=>"Company Register..!!"
  );
 }

else{   

    $json = array(
        "status" => false,
        "details" =>$data,
        "msg" =>"Error"
    );
  }
 

    header('Content-Type: application/json');
    echo json_encode($json);
}
?>