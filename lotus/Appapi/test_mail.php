<?php 
require ('../phpmailer/PHPMailerAutoload.php');
// // echo $email;

    $mail = new PHPMailer();
    
    //$mail->SMTPDebug = 1;    
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
    $mail->AddCC ("raizadaalka@gmail.com"); // On which email id you want to get the message    
    $mail->IsHTML(true);
    $mail->Subject = "Report an issue From :-"; // This is your subject
     
    
    $mail->Body = "Hello SSS Sybertech,<br>
    WOW LOTUS is facing an issue in the following departments<br>";      
    $mail->send();
    if($mail->send())
    {
        echo 'Message has been sent';
    }else {
        echo $mail->ErrorInfo;
    }
?>