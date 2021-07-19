
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Quickcell B2C Module</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap">
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('img/core-img/ssslogo.png') }}">
    <!-- Apple Touch Icon-->
    <link rel="apple-touch-icon" href="{{ asset('img/core-img/ssslogo.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/core-img/ssslogo.png') }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('img/core-img/ssslogo.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/core-img/ssslogo.png') }}">
    <!-- CSS Libraries-->
    <link rel="stylesheet" href="{{ asset('css/css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/css/ecommerce.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/accordion.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/modal.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/css/default/lineicons.min.css') }}">
    
    <!-- Stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Web App Manifest-->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
  </head>
  <body>
    <!-- Preloader-->
 <!--    <div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div> -->
    <!-- Header Area-->
    <div class="header-area" id="headerArea">

      <div class="container h-100 d-flex align-items-center justify-content-between">
        <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
        <!-- Logo Wrapper-->
        <div class="logo-wrapper">
          <a href="home"><img src="{{ asset('img/core-img/ssslogo.png') }}" alt="" style="height: 35px;"></a>
        </div>
        <!-- Search Form-->
        <div class="top-search-form">
          <form action="" method="">
           <input class="form-control" id="searchBar" type="search" placeholder="Search your keyword">
             <!--  <button id="search"><i class="fa fa-search"></i></button> -->
          </form>
           </div>
        <div class="back-button">
         <i class="fa fa-bell"></i>
         </div>
        
      </div>
    </div>
    <!-- Sidenav Black Overlay-->
    <div class="sidenav-black-overlay"></div>
    <!-- Side Nav Wrapper-->
    <div class="suha-sidenav-wrapper" id="sidenavWrapper">
      <!-- Sidenav Profile-->
      <!-- <div class="sidenav-profile">
        <div class="user-profile"><img src="img/bg-img/9.jpg" alt=""></div>
        <div class="user-info">
          <h6 class="user-name mb-0">Customer Name</h6>
          </div>
      </div>--> 
      <!-- Sidenav Nav-->
      <a href="edit-profile">
        <div class="sidenav-profile">
        <div class="user-profile"><img src="img/bg-img/group.png" alt=""></div>
        <div class="user-info">
          <h6 class="user-name mb-0">Name</h6>
       
        </div>
      </div>
      </a>
     <ul class="sidenav-nav ps-0">
      
         <li><a href="faqs">FAQ s</a></li>
        <li><a href="help">Help & Support</a></li>
        <li><a href="contact">Contact</a></li>
        <li><a href="about-us">About Us</a></li>
         <li><a href="#">Terms of Use</a></li>
          <li><a href="#">Privacy Policy</a></li>
                  
      </ul>
    <!-- <a class="btn btn-lg btn-success" href="login" id="sidebarbtn"><i class="lni lni-power-switch" style="padding-right: 9px;"></i>Sign In</a> -->
    <a class="btn btn-lg btn-danger" href="/quickWebsite/b2c/public/logout" id="sidebarbtn"><i class="lni lni-power-switch" style="padding-right: 9px;"></i>Sign Out</a>
       
        <!-- <li><a href="feedback"><i class="lni lni-comments"></i>Feedback Us</a></li> -->
         <!-- <li><a class="btn btn-warning" href="login"><i class="lni lni-power-switch"></i>Sign In</a></li> -->

      <!-- </ul> -->
      <!-- Go Back Button-->
      <!-- <div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-left"></i></div> -->
    </div>
    <script type="text/javascript">

      function profile(){
        // console.log('hello');
          // var id=document.getElementById('hide').value;
            $.ajax({
               type:'POST',
               url:'/quickWebsite/b2c/public/profile1',
               data: {},
              //  beforeSend: function (request) {
              //     return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
              // },
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              // data:'_token = <?php echo csrf_token() ?>',
               success:function(result) {
                  $("#sidenavWrapper").html(result);

                  // console.log(val1);
                  console.log(result);
               }
            });
      }

     
    </script>