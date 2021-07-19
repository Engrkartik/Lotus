<?php 
SESSION_START();
if(time() - $_SESSION['timestamp'] > 900) { //subtract new timestamp from the old one
    
    unset($_SESSION['r_id'], $_SESSION['timestamp']);
    header("Location:login.php"); //redirect to index.php
    // exit;
} else {
    $_SESSION['timestamp'] = time(); //set new timestamp
include('include/db.php');
// $admin_id=$_SESSION['admin_id'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>WOW LOTUS | HOME </title>
  <link rel = "icon" href ="http://34.72.9.224/lotus/<?=$_SESSION['logo_url']?>" type = "image/x-icon"> 
 <style type="text/css">
   /* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}
.card{
  margin-left: 10px;
}
.card-title{
  font-size:2.1rem !important;
}
.card-header{
	background-color: #E34D8A !important;
  /*position: fixed;*/
}
.GFG { 
            background-color: white; 
            /*border: 2px solid black; */
            color: black; 
            /*padding: 5px 10px; */
            /*text-align: center; */
            /*display: inline-block; */
            font-size: 11.5px; 
            /*margin: 10px 10px; */
            cursor: pointer; 
        } 
        input[type="date"]::-webkit-calendar-picker-indicator {
    background: transparent;
    bottom: 0;
    color: transparent;
    cursor: pointer;
    height: auto;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    width: auto;
}
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(images/Preloader_2.gif) center no-repeat #fff;
}
#myimg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal1 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content1 {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption1 {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content1, #caption1 {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close1 {
  position: absolute;
  top: 50px;
  right: 80px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close1:hover,
.close1:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
 </style>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     <!--  <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Dashboard</a>
      </li> -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="contact_us.php" class="nav-link">Contact Us</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a  href="javascript:;" class="nav-link" onclick="goBack()" id="back" style="display: ">Back</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
   <!--  <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
   <!--  <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul> -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="order.php" class="brand-link">
      <img src="<?=$_SESSION['logo_url']?>" alt="AdminLTE Logo" style="width: 100%;height: 3%;" class="form-control">
      <!-- <span class="brand-text font-weight-light">WOW LOTUS</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="margin-top: 160px;">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">ADMIN</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item has-treeview">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
          </li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Products
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
            	<li class="nav-item">
                <a href="show_prod.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="add_product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Product</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="cust.php" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
           Customer's Details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           
          </li>
          <li class="nav-item has-treeview">
            <a href="order.php" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Order's
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="feature.php" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
           Sections
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="banner.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
           Banner
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           
          </li>
           <li class="nav-item">
            <a href="disc_show.php" class="nav-link">
              <i class="nav-icon fas fa fa-compass"></i>
              <p>
           Discount
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           
          </li>
          <li class="nav-item has-treeview">
            <a href="show_cat.php" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
           Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="feedback.php" class="nav-link">
              <i class="nav-icon fas fa fa-comments"></i>
              <p>
                Feedback
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="report_issue.php" class="nav-link">
              <i class="nav-icon fas fa fa-comments"></i>
              <p>
               Issues Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           
          </li>

          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa fa-exclamation-circle"></i>
              <p>
               Logout
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0 text-dark">Dashboard</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <script type="text/javascript">
    	function goBack() {
  window.history.back();
}
    </script>