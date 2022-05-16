<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");
$dj1 = date("Y-m-d");

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
  $mobile=$con->real_escape_string($_POST['mobile']);
  $type=$con->real_escape_string($_POST['type']);
  if ($type=='demo') 
  {
          if($mobile=='9354689860' || $mobile=='7290042960')
          {
            $otp='1234';
          }
          else
          {
            $otp=mt_rand(1000,9999);
          }
          $chk=mysqli_query($con,"SELECT * FROM `otp` WHERE MOBILE_NO='$mobile'");
          if(mysqli_num_rows($chk)>0)
          {
            $ins=mysqli_query($con,"UPDATE `otp` SET `OTP`='$otp',`GENERATED_ON`='$dj' WHERE MOBILE_NO='$mobile'");
          }else
          {
            $ins=mysqli_query($con,"INSERT INTO `otp`(`MOBILE_NO`, `OTP`, `GENERATED_ON`) VALUES ('$mobile','$otp','$dj')");
          }
          $query = mysqli_query($con,"SELECT * FROM `company_reg` WHERE CONTACT_NO='$mobile' AND STATUS!='R' and aid='2'");
          $run = mysqli_fetch_assoc($query);
          if(mysqli_num_rows($query)>0 && $run['STATUS']=='D')
          {
            $json = array(
              "status"=>false,
              "otp"=>$otp,
              "msg"=>"User In-Active"
          );
          }else
          {
          if($ins) {
            if($mobile=='9354689860' || $mobile=='7290042960')
            {
              $json = array(
                "status"=>true,
                "otp"=>$otp,
                "msg"=>"Success"
            );
            }
            else 
            {
              $sms="Your one time password is $otp, OTP will be expire after 10 minutes. Do not share this code with anyone.\nTeam Shikhar Creation";
              $sms=urlencode($sms);
              $stringUrl = "http://mobicomm.dove-sms.com/mobicomm/submitsms.jsp?user=SSSWEB&key=ee8e045d46XX&mobile=$mobile&message=$sms&senderid=SLOTUS&accusage=6&entityid=1201159195401169497&tempid=1207162399163619133";
                
                  $json = array(
                    "status"=>file_get_contents($stringUrl)?true:false,
                    "otp"=>$otp,
                    "msg"=>file_get_contents($stringUrl)?"Success":"SMS Error"
                );
                
            }
          }else {
            $json = array(
              "status" => false,
              "msg" =>"OTP Insertion Error"
          );
          }
        }
      
  } else 
  {
    if($mobile=='9873028262' || $mobile=='7290042960')
    {
      $otp='1234';
    }
    else
    {
      $otp=mt_rand(1000,9999);
    }
    // $chk=mysqli_query($con,"SELECT * FROM `otp` WHERE MOBILE_NO='$mobile'");
    // if(mysqli_num_rows($chk)>0)
    // {
    //   $ins=mysqli_query($con,"UPDATE `otp` SET `OTP`='$otp',`GENERATED_ON`='$dj' WHERE MOBILE_NO='$mobile'");
    // }else
    // {
    //   $ins=mysqli_query($con,"INSERT INTO `otp`(`MOBILE_NO`, `OTP`, `GENERATED_ON`) VALUES ('$mobile','$otp','$dj')");
    // }
    // $query = mysqli_query($con,"SELECT * FROM `company_reg` WHERE CONTACT_NO='$mobile' AND STATUS!='R' and aid='1'");
    // $run = mysqli_fetch_assoc($query);
    // if(mysqli_num_rows($query)>0 && $run['STATUS']=='D')
    // {
    //   $json = array(
    //     "status"=>false,
    //     "otp"=>$otp,
    //     "msg"=>"User In-Active"
    // );
    // }else
    // {
    //   if($ins) {
    //     if($mobile=='9873028262' || $mobile=='7290042960')
    //     {
    //       $json = array(
    //         "status"=>true,
    //         "otp"=>$otp,
    //         "msg"=>"Success"
    //     );
    //     }
    //     else 
    //     {
          $sms="Your one time password is $otp, OTP will be expire after 10 minutes. Do not share this code with anyone.\nTeam Shikhar Creation";
          $sms=urlencode($sms);
          $stringUrl = "http://mobicomm.dove-sms.com/mobicomm/submitsms.jsp?user=SSSWEB&key=ee8e045d46XX&mobile=$mobile&message=$sms&senderid=SLOTUS&accusage=6&entityid=1201159195401169497&tempid=1207162399163619133";
            
              $json = array(
                "status"=>file_get_contents($stringUrl)?true:false,
                "otp"=>$otp,
                "msg"=>file_get_contents($stringUrl)?"Success":"SMS Error"
            );
            
    //     }
    //   }else {
    //     $json = array(
    //       "status" => false,
    //       "msg" =>"OTP Insertion Error"
    //   );
    //   }
    // }
  }
  
  header('Content-Type: application/json');
  echo json_encode($json);

}
?>