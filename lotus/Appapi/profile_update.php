<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
$cust_id=$con->real_escape_string($_POST['cust_id']);
$email=$con->real_escape_string($_POST['email']);
$address=$con->real_escape_string($_POST['address']);
$atlmob_no=$con->real_escape_string($_POST['altmob_no']);
$photo=$_REQUEST['files'];
if($photo!='NA')
{
  $IDproofImage = $cust_id."_".uniqid()."_id.png";
    $base1 = $photo;
    $binary1 = base64_decode($base1);
    header('Content-Type: bitmap; charset=utf-8');
    $file1 = fopen('../images/' . $IDproofImage, 'wb');
    $path='images/'.$IDproofImage;
    fwrite($file1, $binary1);
    fclose($file1);
    $query = mysqli_query($con,"UPDATE `company_reg` SET `ADDRESS`='$address',`ALT_NO`='$atlmob_no',`EMAIL_ID`='$email',`image`='$path' WHERE aid='$admin_id' and id='$cust_id'");
   
     }
   else
{
$query = mysqli_query($con,"UPDATE `company_reg` SET `ADDRESS`='$address',`ALT_NO`='$atlmob_no',`EMAIL_ID`='$email' WHERE aid='$admin_id' and id='$cust_id'");

}
if($query)
{
$main_query = mysqli_query($con,"SELECT * FROM `company_reg` WHERE company_reg.aid='$admin_id' and id='$cust_id'");
$main_query2 = mysqli_query($con,"SELECT * FROM `company_reg` WHERE company_reg.aid='$admin_id' and id='$cust_id'");
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
      }else{
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
}

if(mysqli_num_rows($main_query)>0)
{
  $json = array(
      "status"=>true,
      "details"=>$data,
      "msg"=>"Success"
  );

} else{
    $json = array(
        "status"=>false,
      "details"=>$data,
        "msg"=>"No Data"
    );

 }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>