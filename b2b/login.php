
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Suha - Multipurpose Ecommerce Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Quickcell B2B Module</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap">
    <!-- Favicon-->
    <link rel="icon" href="img/icons/icon-72x72.png">
    <!-- Apple Touch Icon-->
    <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">
    <!-- CSS Libraries-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/default/lineicons.min.css">
    <!-- Stylesheet-->
    <link rel="stylesheet" href="style.css">
    <!-- Web App Manifest-->
    <link rel="manifest" href="manifest.json">
  </head>
  <body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="img/core-img/ssslogo.png" alt="">
            <!-- Register Form-->
            <div class="register-form mt-5 px-4">
              
                <div class="form-group text-start mb-4"><span>Mobile Number</span>
                  <label for="login-form-username"><i class="lni lni-user"></i></label>
                  <input class="form-control" id="mobile_no" type="text" name="login-form-username" placeholder="Enter Mobile No.">
                </div>
                <div class="form-group text-start mb-4"><span>OTP</span>
                  <label for="login-form-password"><i class="lni lni-lock"></i></label>
                  <input class="form-control" id="g_otp" type="password"  name="login-form-password" placeholder="Enter OTP">
                </div>
                <button class="btn btn-lg w-100" type="submit" style="background-color: #fff;" id="login-form-submit" onclick="submit()">Log In</button>
              
            </div>
            <!-- Login Meta-->
              <p class="mb-0">Didn't have an account?<a class="ms-1" href="register.php">Register Now</a></p>
            </div>
            <!-- View As Guest-->
            <div class="view-as-guest mt-3"><a class="btn" href="home.php">View as Guest</a></div>
          </div>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/default/jquery.passwordstrength.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jarallax.min.js"></script>
    <script src="js/jarallax-video.min.js"></script>
    <script src="js/default/dark-mode-switch.js"></script>
    <script src="js/default/active.js"></script>
    <script src="js/pwa.js"></script>
    <script>
 /*--       var invalidd=document.getElementById('errorr');

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
                    
                    window.location.href="home.php";
                }else if(res==0){
                // alert(res);
                window.location.href="register.php";
                    
                }else if(res==2)
                {
                    invalidd.style.display='';
                }
                
            }
        });

    }   --*/
</script>
  </body>
</html>