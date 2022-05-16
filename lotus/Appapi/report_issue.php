<?php
include('db.php');
$aid=$_POST['admin_id'];
$cid=$_POST['cust_id'];
$issue=$_POST['issue'];
$issue_type=$_POST['issue_type'];
$photo=$_REQUEST['files'];
$json_array=json_decode($issue_type);

    $IDproofImage = $cid."_".uniqid()."_id.png";
    $base1 = $photo;
    $binary1 = base64_decode($base1);
    header('Content-Type: bitmap; charset=utf-8');
    $file1 = fopen('../images/issues/' . $IDproofImage, 'wb');
    $path='images/issues/'.$IDproofImage;
    fwrite($file1, $binary1);
    fclose($file1);
$chk=mysqli_query($con,"SELECT * FROM `report_issue` WHERE c_id='$cid' and aid='$admin_id' order by id desc limit 1");
$row=mysqli_fetch_assoc($chk);
$img_id=$row['img_id']+1;
$img_insert=mysqli_query($con,"INSERT INTO `issue_img`(`aid`, `cid`, `img_id`, `img_url`, `date`) VALUES ('$admin_id','$cid','$img_id','$path','$dj')");
if($img_insert)
{
foreach ($json_array as  $value) {
  $issue_type=$value->type;
  $issue_type_msg[]=$issue_type;
$query=mysqli_query($con,"INSERT INTO `report_issue`(`aid`, `c_id`, `issue`, `issue_type`,`img_id`, `date`, `status`) VALUES ('$aid','$cid','$issue','$issue_type','$img_id','$dj','A')");
}
if($query)
{
    require ('../phpmailer/PHPMailerAutoload.php');
    // // echo $email;
        $comp=mysqli_query($con,"SELECT * FROM `company_reg` WHERE `id` = '$cid' ORDER BY `id` ASC");
        $comp_r=mysqli_fetch_assoc($comp);
        $mail = new PHPMailer();
        
        //$mail->SMTPDebug = 1;    
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com"; // Your Domain Name
         
        $mail->SMTPAuth = true;
        $mail->Port = 465;
        $mail->Username = "shikharcreation19@gmail.com"; // Your Email IDfleet.lumanauto@gmail.com
        $mail->Password = "gryfbqwfijyiirla"; // Password of your email idLuman@123
        $mail->SMTPSecure = "ssl";
        // $mail->AddAttachment('../images/issues/'.$IDproofImage);
        $mail->AddAttachment('../images/issues/'.$IDproofImage,'Image.png');
        $mail->From = "shikharcreation19@gmail.com";
        $mail->FromName = "SYBER Team";
        $mail->AddAddress ("info@ssssybertech.com"); // On which email id you want to get the message
        $mail->AddCC ("raizadaalka@gmail.com"); // On which email id you want to get the message
        // $mail->AddCC ("");
        
        $mail->IsHTML(true);
         
        $mail->Subject = "Report an issue From :-".$comp_r['FIRM_NAME']; // This is your subject
         
        
        $mail->Body = "Hello SSS Sybertech,<br>
        WOW LOTUS is facing an issue in the following departments<br>"
        .json_encode($issue_type_msg)."<br>Other Remark : ".$issue;      


        // $attachment = base64_encode(file_get_contents('mail.html'));
              
        $mail->send();
        $chk='1';
}
}

if($chk=='1')
{
     
	 $json = array(
      "status"=>true,
      "msg"=>"Success"
  );
    
}
    else{
    $json = array(
        "status" => false,
        "msg" =>"Error"
    );
    }
    header('Content-Type: application/json');
    echo json_encode($json);
    exit;
?>