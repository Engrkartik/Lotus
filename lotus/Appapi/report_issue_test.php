<?php
include('db.php');
$aid=$_POST['admin_id'];
$cid=$_POST['cust_id'];
$issue=$_POST['issue'];
$issue_type=$_POST['issue_type'];
$json_array=json_decode($issue_type); 
$targetDir = "../images/issues/"; 
$chk=mysqli_query($con,"SELECT * FROM `report_issue` WHERE aid='$aid' order by img_id desc limit 1");
$row=mysqli_fetch_assoc($chk);
$img_id=$row['img_id']+1;
$insertValuesSQL=[];
if(isset($_FILES['files']))
{
        foreach($_FILES['files']['name'] as $key=>$val){ 
          $fileName = basename($_FILES['files']['name'][$key]); 
          $targetFilePath = $targetDir . $fileName; 
          $path='images/issues/'.$_FILES["files"]["name"][$key];
              if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                  array_push($insertValuesSQL,$targetFilePath);
                $img_insert=mysqli_query($con,"INSERT INTO `issue_img`(`aid`, `cid`, `img_id`, `img_url`, `date`) VALUES ('$aid','$cid','$img_id','$path','$dj')");
              }else{ 
                  $errorUpload .= $_FILES['files']['name'][$key].' | '; 
              } 
            }
            if(sizeof($insertValuesSQL)==sizeof($_FILES['files']['name']))
            {
              $issue_type_msg=array();
              foreach ($json_array as  $value) 
              {
                array_push($issue_type_msg,$value->type);
                // $issue_type_msg[]=$issue_type;
              }
              $issue_type_msg=json_encode($issue_type_msg);
              $query=mysqli_query($con,"INSERT INTO `report_issue`(`aid`, `c_id`, `issue`, `issue_type`,`img_id`, `date`, `status`) VALUES ('$aid','$cid','$issue','$issue_type_msg','$img_id','$dj','A')");
            }
if (sizeof($insertValuesSQL)==sizeof($_FILES['files']['name'])) {
  $json = array(
    "status"=>true,
    "msg"=>"Success"
);
} else {
  $json = array(
    "status"=>false,
    "msg"=>"Error"
);
}
}else {
  $img_id=0;
  $issue_type_msg=array();
  foreach ($json_array as  $value) 
  {
    array_push($issue_type_msg,$value->type);
  }
  $issue_type_msg=json_encode($issue_type_msg);
  $query=mysqli_query($con,"INSERT INTO `report_issue`(`aid`, `c_id`, `issue`, `issue_type`,`img_id`, `date`, `status`) VALUES ('$aid','$cid','$issue','$issue_type_msg','$img_id','$dj','A')");
  if($query)
  {
    $json = array(
    "status"=>true,
    "msg"=>"Success"
);
} else {
  $json = array(
    "status"=>false,
    "msg"=>"Error"
);
}
}
header('Content-Type: application/json');
echo json_encode($json);


?>