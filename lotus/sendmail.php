<?php

// echo'<script>alert("hello");</script>';

date_default_timezone_set('Asia/Kolkata');

$dj= date("Y-m-d");
$msg = $_POST["msg"];
// if ($dj)
//   {

    require ('phpmailer/PHPMailerAutoload.php');
    // // echo $email;
              
        $mail = new PHPMailer();
        
        $mail->SMTPDebug = 1;    
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com"; // Your Domain Name
         
        $mail->SMTPAuth = true;
        $mail->Port = 465;
        $mail->Username = "shikharcreation19@gmail.com"; // Your Email IDfleet.lumanauto@gmail.com
        $mail->Password = "gryfbqwfijyiirla"; // Password of your email idLuman@123
        $mail->SMTPSecure = "ssl";

        $mail->From = "shikharcreation19@gmail.com";
        $mail->FromName = "SYBER Team";
        $mail->AddAddress ("info@ssssybertech.com"); // On which email id you want to get the message
        // $mail->AddCC ("production@lumanauto.com");
        
        
        $mail->IsHTML(true);
         
        $mail->Subject = "Wow Lotus"; // This is your subject
         
        
        $mail->Body = $msg;      

        

        // $attachment = base64_encode(file_get_contents('mail.html'));
              
        $mail->send();
// }
  echo 0;

?>