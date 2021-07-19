
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
        <!-- Back Button-->
        <div class="back-button"><a href="javascript:history.back()">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h4 class="mb-0">Payment</h4>
        </div>
        <div class="back-button">
          
        </div>
        <!-- Filter Option-->
       <!-- <div class="suha-navbar-toggler d-flex justify-content-between flex-wrap" id="suhaNavbarToggler" onclick="profile()"><span></span><span></span><span></span></div> -->
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
      </div>
 -->      <!-- Sidenav Nav-->
      <!-- <ul class="sidenav-nav ps-0"> -->
        <!-- <li><a href="profile"><i class="lni lni-user"></i>My Profile</a></li> -->
      <!--   <li><a href="notifications.php"><i class="lni lni-alarm lni-tada-effect"></i>Notifications<span class="ms-3 badge badge-warning">3</span></a></li> -->
       <!--  <li class="suha-dropdown-menu"><a href="#"><i class="lni lni-cart"></i>Shop Pages</a>
          <ul>
            <li><a href="shop-grid.php">- Shop Grid</a></li>
            <li><a href="shop-list.php">- Shop List</a></li>
            <li><a href="single-product.php">- Product Details</a></li>
            <li><a href="featured-products.php">- Featured Products</a></li>
            <li><a href="flash-sale.php">- Flash Sale</a></li>
          </ul>
        </li>
        <li><a href="pages.php"><i class="lni lni-empty-file"></i>All Pages</a></li>
        <li class="suha-dropdown-menu"><a href="wishlist-grid.php"><i class="lni lni-heart"></i>My Wishlist</a>
          <ul>
            <li><a href="wishlist-grid.php">- Wishlist Grid</a></li>
            <li><a href="wishlist-list.php">- Wishlist List</a></li>
          </ul>
        </li> -->
       
       
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