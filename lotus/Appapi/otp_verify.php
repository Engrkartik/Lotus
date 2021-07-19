<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$otp=$con->real_escape_string($_POST['otp']);
$mobile=$con->real_escape_string($_POST['mobile']);
$query = mysqli_query($con,"SELECT * FROM `otp` WHERE MOBILE_NO='$mobile' and OTP='$otp'");
$count = mysqli_num_rows($query);

if($count>0)
{
$main_query = mysqli_query($con,"SELECT * FROM `company_reg` WHERE company_reg.CONTACT_NO='$mobile'");
$main_query2 = mysqli_query($con,"SELECT * FROM `company_reg` WHERE company_reg.CONTACT_NO='$mobile'");
$row=mysqli_fetch_assoc($main_query);
  if($row['STATUS']=='A')
  {
    $status="true";
    }
    elseif($row['STATUS']=='P')
      {     
    $status="pending";
    }
    elseif($row['STATUS']=='R')
    {
        $status="remove";
      }elseif($row['STATUS']=='D')
      {
        $status="deactive";
      }
      else{
        $status="false";
        
      }
if(mysqli_num_rows($main_query)>0)
{
while($run = mysqli_fetch_assoc($main_query2)){
    $data =array("ID"=>$run['id'],
                  "AID"=>$run['aid'],
                  "OWNER_NAME"=>$run['OWNER_NAME'],
                  "FIRM_NAME"=>$run['FIRM_NAME'],
                  "BUSINESS"=>$run['BUSINESS'],
                  "ADDRESS"=>$run['ADDRESS'],
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
                  "DATE"=>$run['DATE'],
                  "MOBILE_NO"=>$run['MOBILE_NO'],
                  "IMG"=>$run['image']);

}
}
else{
  $data =array(
    // "ID"=>"",
    //               "AID"=>"",
    //               "OWNER_NAME"=>"",
    //               "FIRM_NAME"=>"",
    //               "BUSINESS"=>"",
    //               "ADDRESS"=>"",
    //               "COUNTRY"=>"",
    //               "STATE"=>"",
    //               "DISTRICT"=>"",
    //               "CITY"=>$run['CITY'],
    //               "PIN_CODE"=>$run['PIN_CODE'],
    //               "CONTACT_NO"=>$run['CONTACT_NO'],
    //               "ALT_NO"=>$run['ALT_NO'],
    //               "EMAIL_ID"=>$run['EMAIL_ID'],
    //               "GST_TYPE"=>$run['GST_TYPE'],
    //               "GSTIN_NO"=>$run['GSTIN_NO'],
    //               "AADHAAR"=>$run['AADHAAR'],
    //               "PAN"=>$run['PAN'],
    //               "STATUS"=>$run['STATUS'],
    //               "DATE"=>$run['DATE'],
                  "MOBILE_NO"=>$mobile);
}

  $json = array(
      "status"=>"true",
      "details"=>$data,
      "Register"=>$status,
      "msg"=>"Success"
  );
    
} else{
    $json = array(
        "status" => "false",
        "details" => $data,
        "Register"=>$status,
        "msg" =>"Invalid OTP"
    );

 }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>