<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/icon/LOGONEW.png" type="image/x-icon">
    <title>Login| SSS Sybertech</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
        .login { 
  position: absolute;
  top: 33%;
  left: 50%;
  margin: -150px 0 0 -186px;
  width:370px;
  height:auto;
  background-color: #fff;
  padding:38px 24px 53px 19px;
  box-shadow: 7px 16px 62px 23px #232121f5;
}
    </style>
   
    <script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<main>
    <div id="primary" class="blue4 p-t-b-100 height-full responsive-phone" style="background: url(assets/img/bg-01.jpg); background-position: center;background-repeat: no-repeat;background-size: cover;">
        <div class="container">
                 <div class="login">
                    <div class="text-center">
                    <h1>Login to your Account</h1>
                </div>
                    <br>
                    <div class="text-center">
                        <img src="assets/img/basic/login.gif" alt="">
                        <h2 class="mt-2">Welcome</h2>
                        
                    </div>
                    <br>
                    <label>Mobile Number</label>                   
                        <div class="form-group">
                             <input type="text" id="mobile_no" placeholder="Enter Mobile Number" name="login-form-username" pattern="[7-9]{1}[0-9]{9}$"  class="form-control not-dark" required="" />
                           
                        </div>
                        <div class="form-group" id="g_otp" style="display: ;">
                        <button class="btn btn-success" type="button" style="float: right;" onclick="otp()" >Generate OTP</button>
                    </div>
                <!-- </div> -->
            <!-- </form>
            <form action="javascript:;" method="post" onsubmit="submit()">
                <div class="row"> -->
                    <div class="form-group" id="otp" style="display: none;">
                        <label for="login-form-password">OTP:</label>
                        <input type="password" id="i_otp" name="login-form-password" value="" class="form-control not-dark" />
                        <label style="color: red" id="errorr" style="display:none;">Invalid OTP</label>
                    </div>

                    <div class="form-group" id="submit" style="display:none;">
                        <button class="btn btn-success" id="login-form-submit" name="login-form-submit" style="float: right;" type="button" onclick="submit()">Submit</button>
                        <!-- <a href="#" class="float-right">Forgot Password?</a> -->
                    </div>
                  
                </div>
          
        </div>
    </div>

</main>

<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="assets/js/app.js"></script>


<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>
<script>
        var invalidd=document.getElementById('errorr');

    function otp() {
        var g_otp=document.getElementById('g_otp');
        var otp=document.getElementById('otp');
        var submit=document.getElementById('submit');
        var m_no=document.getElementById('mobile_no').value;
        // alert(m_no);
        var type="chk";
        $.ajax({
            type:'POST',
            url:'chk_login.php',
            data:{'m_no':m_no,'type':type},
            success:function(res){
                // alert(res);
                g_otp.style.display='none';
                otp.style.display='';
                submit.style.display='';
                invalidd.style.display='none';
                // otp.focus();

            }
        });

    }
    function submit() {
        var m_no=document.getElementById('mobile_no').value;
        var otp=document.getElementById('i_otp').value;
        var type="l_chk";
        // alert(otp);
        
        $.ajax({
            type:'POST',
            url:'chk_login.php',
            data:{'m_no':m_no,'otp':otp,'type':type},
            success:function(res){
                if(res==1)
                {
                    
                    window.location.href="index.php";
                }else if(res==0){
                // alert(res);
                window.location.href="signup.php";
                    
                }else if(res==2)
                {
                    invalidd.style.display='';
                }
                
            }
        });

    }
</script>
</body>

</html>