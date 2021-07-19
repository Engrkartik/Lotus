
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
    <!--range slider CSS -->
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
        <div class="back-button"><a href="javascript:history.back()">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg></a></div>
        <!-- Logo Wrapper-->
        <div class="page-heading">
          <h4 class="mb-0">All Products</h4>
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
    <div class="suha-sidenav-wrapper filter-nav" id="sidenavWrapper">
          <div class="filter-title">
          <h5>Filter</h5>
        </div>
      <div class="catagory-sidebar-area">
        <div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-left"></i></div>
  
        <div class="apply-filter-btn"><a class="btn btn-success" href="">Apply</a></div>
        <!-- barnds-->
         <div class="widget color">
          <a class="widget-title accordion">Brands <!-- (<small class="counter"></small>) --></a>
          <div class="widget-desc panel">
             <div class="form-check">
              <input class="form-check-input brands" id="selectAll" type="checkbox" onclick="selectAll()">
              <label class="form-check-label font-weight-bold" for="selectAll">Select All</label>
            </div>
            <!-- Single Checkbox-->
            <div class="form-check">
              <input class="form-check-input brands" id="zara" type="checkbox" name="brands[]">
              <label class="form-check-label font-weight-bold" for="zara">Zara</label>
            </div>
            <!-- Single Checkbox-->
            <div class="form-check">
              <input class="form-check-input brands" id="Gucci" type="checkbox" name="brands[]">
              <label class="form-check-label font-weight-bold" for="Gucci">Gucci</label>
            </div>
            <!-- Single Checkbox-->
            <div class="form-check">
              <input class="form-check-input brands" id="Addidas" type="checkbox" name="brands[]">
              <label class="form-check-label font-weight-bold" for="Addidas">Addidas</label>
            </div>
            <!-- Single Checkbox-->
            <div class="form-check">
              <input class="form-check-input brands" id="Nike" type="checkbox" name="brands[]">
              <label class="form-check-label font-weight-bold" for="Nike">Nike</label>
            </div>
            <!-- Single Checkbox-->
            <div class="form-check">
              <input class="form-check-input brands" id="Denim" type="checkbox" name="brands[]">
              <label class="form-check-label font-weight-bold" for="Denim">Denim</label>
            </div>
          </div>
        </div>
      
        <!-- Color-->
        <div class="widget color">
          <a class="widget-title accordion">Color</a>
          <div class="widget-desc panel">
            <div class="form-check">
              <input class="form-check-input" id="selectAllcolor" type="checkbox" onclick="selectAllcolor()">
              <label class="form-check-label font-weight-bold" for="selectAllcolor">Select All</label>
            </div>
            <!-- Single Checkbox-->
            <div class="form-check">
              <input class="form-check-input color" id="Purple" type="checkbox">
              <label class="form-check-label font-weight-bold" for="Purple">Purple</label>
            </div>
            <!-- Single Checkbox-->
            <div class="form-check">
              <input class="form-check-input color" id="Black" type="checkbox">
              <label class="form-check-label font-weight-bold" for="Black">Black</label>
            </div>
            <!-- Single Checkbox-->
            <div class="form-check">
              <input class="form-check-input color" id="White" type="checkbox">
              <label class="form-check-label font-weight-bold" for="White">White</label>
            </div>
            <!-- Single Checkbox-->
            <div class="form-check">
              <input class="form-check-input color" id="Red" type="checkbox">
              <label class="form-check-label font-weight-bold" for="Red">Red</label>
            </div>
            <!-- Single Checkbox-->
            <div class="form-check">
              <input class="form-check-input color" id="Pink" type="checkbox">
              <label class="form-check-label font-weight-bold" for="Pink">Pink</label>
            </div>
          </div>
        </div>
        <!-- Size-->
        <div class="widget size">
       <a class="widget-title accordion">Size</a>
          <div class="widget-desc panel">
             <div class="form-check">
              <input class="form-check-input" id="selectAllsize" type="checkbox" onclick="selectAllsize()">
              <label class="form-check-label font-weight-bold" for="selectAllsize">Select All</label>
            </div>
            <!-- Single Checkbox-->
            <div class="form-check">
              <input class="form-check-input size" id="XtraLarge" type="checkbox">
              <label class="form-check-label font-weight-bold" for="XtraLarge">Xtra Large</label>
            </div>
            <!-- Single Checkbox-->
            <div class="form-check">
              <input class="form-check-input size" id="Large" type="checkbox">
              <label class="form-check-label font-weight-bold" for="Large">Large</label>
            </div>
            <!-- Single Checkbox-->
            <div class="form-check">
              <input class="form-check-input size" id="medium" type="checkbox">
              <label class="form-check-label font-weight-bold" for="medium">Medium</label>
            </div>
            <!-- Single Checkbox-->
            <div class="form-check">
              <input class="form-check-input size" id="Small" type="checkbox">
              <label class="form-check-label font-weight-bold" for="Small">Small</label>
            </div>
            <!-- Single Checkbox-->
            <div class="form-check">
              <input class="form-check-input size" id="ExtraSmall" type="checkbox">
              <label class="form-check-label font-weight-bold" for="ExtraSmall">Extra Small</label>
            </div>
          </div>
        </div>
        <!-- Ratings-->
        <div class="widget ratings">
         <a class="widget-title accordion">Price</a>
          <div class="widget-desc panel">
         <div class="card-body">

         <input type="range" class="custom-range" min="0" max="1000" value="200" name="" id="myRange">
             <div class="row">
             <div class="col-md-6"> 
              <span>Min</span> 
              <input class="form-control" type="number" placeholder="500"> 
            </div>
             <div class="col-md-6"> 
              <label>Max</label>
             <input class="form-control" type="number" placeholder="5000">
              </div>
             </div>
             </div>
         </div>
          </div>
        </div>
   
        <!-- Apply Filter-->
        
      </div>
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

      var acc = document.getElementsByClassName("accordion");
      var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

function selectAll() {
        var blnChecked = document.getElementById("selectAll").checked;
        var check_invoices = document.getElementsByClassName("brands");
        var intLength = check_invoices.length;
        for(var i = 0; i < intLength; i++) {
            var check_invoice = check_invoices[i];
            check_invoice.checked = blnChecked;
        }
    }
    function selectAllcolor() {
        var blnChecked = document.getElementById("selectAllcolor").checked;
        var check_invoices = document.getElementsByClassName("color");
        var intLength = check_invoices.length;
        for(var i = 0; i < intLength; i++) {
            var check_invoice = check_invoices[i];
            check_invoice.checked = blnChecked;
        }
    }

   function selectAllsize() {
        var blnChecked = document.getElementById("selectAllsize").checked;
        var check_invoices = document.getElementsByClassName("size");
        var intLength = check_invoices.length;
        for(var i = 0; i < intLength; i++) {
            var check_invoice = check_invoices[i];
            check_invoice.checked = blnChecked;
        }
    }


    var $brandcheckboxes = $('.brands input[type="checkbox"]');
        
    $brandcheckboxes.change(function(){
        var countCheckedCheckboxes = $brandcheckboxes.filter(':checked').length;
        $('.counter').text(countCheckedCheckboxes);
    });

$( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 500,
      max: 10000,
      values: [ 500, 5000 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  } );
    </script>