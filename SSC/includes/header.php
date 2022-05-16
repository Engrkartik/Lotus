<?php

  if($_SESSION['id']==session_id())
  {
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Welcome To SSC</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- CORE CSS-->
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->    
  <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
   
     <style type="text/css">
  .input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  .input-field label.active{
      width:100%;
  }
  .left-alert input[type=text] + label:after, 
  .left-alert input[type=password] + label:after, 
  .left-alert input[type=email] + label:after, 
  .left-alert input[type=url] + label:after, 
  .left-alert input[type=time] + label:after,
  .left-alert input[type=date] + label:after, 
  .left-alert input[type=datetime-local] + label:after, 
  .left-alert input[type=tel] + label:after, 
  .left-alert input[type=number] + label:after, 
  .left-alert input[type=search] + label:after, 
  .left-alert textarea.materialize-textarea + label:after{
      left:0px;
  }
  .right-alert input[type=text] + label:after, 
  .right-alert input[type=password] + label:after, 
  .right-alert input[type=email] + label:after, 
  .right-alert input[type=url] + label:after, 
  .right-alert input[type=time] + label:after,
  .right-alert input[type=date] + label:after, 
  .right-alert input[type=datetime-local] + label:after, 
  .right-alert input[type=tel] + label:after, 
  .right-alert input[type=number] + label:after, 
  .right-alert input[type=search] + label:after, 
  .right-alert textarea.materialize-textarea + label:after{
      right:70px;
  }
  .column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row1 {margin: 0 -5px;}

/* Clear floats after the columns */
.row1:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card1 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2) inset;
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
  height: 300px;
  margin-bottom: 10px;
  border:1px solid rgb(49 119 150 / 76%);
  /*border-color: rgba(0, 0, 0, 0.2);*/
  border-radius: 20px;
}
.card1:hover {
  box-shadow: -3px 18px 20px 0px #337ab7db;
}
/*li a:hover {
  background-color: #a82128c4 !important;
}*/
.tooltip1 {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip1 .tooltiptext1 {
  visibility: hidden;
  width: 120px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -60px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip1 .tooltiptext1::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip1:hover .tooltiptext1 {
  visibility: visible;
  opacity: 1;
}
td,th{
  text-align: center;
}
  .page-footer{
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    #content{
        overflow: auto;
    }
/*///////////////////////////////////////new popup/////////////////////////////////////////////////////////////*/
/* Popup container - can be anything you want */
.popup {
  position: relative;
  display: inline-block;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* The actual popup */
.popup .popuptext {
  visibility: hidden;
  width: 160px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;} 
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
/*////////////////////////////////////////////end popup/////////////////////////////////////////////////////////*/
  </style> 
</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="index.php" class="brand-logo darken-1"><img src="images/materialize-logo.png" alt="logo"></a> <span class="logo-text">Logo</span></h1></li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
      <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                </div>
         <!-- <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="routers/logout.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                    </ul>
                </div> -->
                <div class="col col s8 m8 l8">
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $name;?></a>
                    <p class="user-roal"><?php echo $role;?></p>
                </div>
            </div>
            </li>
            <?php if($_SESSION['role']=='Administrator')
            {?>
            <li class="bold active"><a href="admin-page.php" class="waves-effect waves-cyan"><i class="fa fa-archive
"></i> Food Menu</a>
            </li>
             <li class="bold"><a href="branch.php" class="waves-effect waves-cyan"><i class="fa fa-cogs"></i> Branch</a>
            </li>
             <li class="bold"><a href="category.php" class="waves-effect waves-cyan"><i class="fa fa-list-alt
"></i> Category</a>
            </li>
            <li class="bold"><a href="waiters.php" class="waves-effect waves-cyan"><i class="fa fa-users
"></i> Waiter's</a>
            </li>
            <li class="bold"><a href="chef.php" class="waves-effect waves-cyan"><i class="fa fa-cutlery
"></i> Chef</a>
            </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a href="all-orders.php?status=Delivered" class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Orders</a>
                            <div class="collapsible-body">
                                <ul>
                <!-- <li><a href="all-orders.php">All Orders</a> -->
                                </li>
                               <!--  <li><a href="all-orders.php?status=Pending">Pending</a></li>
                                <li><a href="all-orders.php?status=Preparing">Preparing</a></li>
                                <li><a href="all-orders.php?status=Cooked">Cooked</a></li>
                                <li><a href="all-orders.php?status=Delivered">Delivered</a></li>
                                <li><a href="all-orders.php?status=Cancelled by Customer">Cancelled by Customer</a></li>
                 -->
                                <!-- <li><a href="#">Pending</a></li>
                                <li><a href="#">Preparing</a></li>
                                <li><a href="#">Cooked</a></li>
                                <li><a href="#">Delivered</a></li>
                                <li><a href="#">Cancelled by Customer</a></li> -->
                
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                 <!-- <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-question-answer"></i> Tickets</a>
                            <div class="collapsible-body">
                                <ul>
                <li><a href="all-tickets.php">All Tickets</a>
                                </li>
                <?php
                  $sql = mysqli_query($con, "SELECT DISTINCT status FROM tickets;");
                  while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="all-tickets.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
                  }
                  ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>  -->    
            <li class="bold"><a href="users.php" class="waves-effect waves-cyan"><i class="mdi-social-person"></i> Users</a>
            <li class="bold"><a href="table.php" class="waves-effect waves-cyan"><i class="fa fa-sitemap"></i>Tables</a>

            </li>  
           <?php }elseif($_SESSION['role']=='Chef')
           {?>
            <li class="bold active"><a href="index.php" class="waves-effect waves-cyan"><i class="fa fa-desktop"></i> Dashboard</a>
            <!-- <li class="bold"><a href="#" class="waves-effect waves-cyan"><i class="mdi-social-person"></i> Edit Details</a> -->
             <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Orders</a>
                            <div class="collapsible-body">
                                <ul>
                               <!--  <li><a href="all-orders_chef.php">All Orders</a>
                                </li> -->
                                <li><a href="all-orders_chef.php?status=Pending">Pending</a></li>
                                <li><a href="all-orders_chef.php?status=Preparing">Preparing</a></li>
                                <li><a href="all-orders_chef.php?status=Cooked">Cooked</a></li>
                                <!-- <li><a href="all-orders_chef.php?status=Delivered">Delivered</a></li> -->
                                <!-- <li><a href="all-orders_chef.php?status=Cancelled by Customer">Cancelled by Customer</a></li> -->
                
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            <?php }
            elseif($_SESSION['role']=='Cashier')
           {?>
            <li class="bold active"><a href="bills.php" class="waves-effect waves-cyan"><i class="fa fa-desktop"></i> Dashboard</a>
            <!-- <li class="bold"><a href="#" class="waves-effect waves-cyan"><i class="mdi-social-person"></i> Edit Details</a> -->
             <!-- <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Orders</a>
                            <div class="collapsible-body">
                                <ul>
                                <li><a href="all-orders.php">All Orders</a>
                                </li>
                                <li><a href="all-orders.php?status=Pending">Pending</a></li>
                                <li><a href="all-orders.php?status=Preparing">Preparing</a></li>
                                <li><a href="all-orders.php?status=Cooked">Cooked</a></li>
                                <li><a href="all-orders.php?status=Delivered">Delivered</a></li>
                                <li><a href="all-orders.php?status=Cancelled by Customer">Cancelled by Customer</a></li>
                
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li> -->
            <?php }?> 
            <li class="bold"><a href="routers/logout.php" class="waves-effect waves-cyan"><i class="fa fa-sign-out"></i> Logout</a>

        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>

        <script type="text/javascript">
           function del(id,type) {
      // var type='user';
      var r=confirm("Are you sure..!!!");
      if(r==true)
      {
      $.ajax({
        type:'POST',
        url:'routers/delete.php',
        data:{'type':type,'id':id},
        success:function(res) {
          // if(res==1)
            // alert(res);
          // {
            window.location.href='./'+res+'.php';
          // }else{
          // }
        }
      });
    }
    }
        </script>
      <!-- END LEFT SIDEBAR NAV-->
      <?php } else{
        echo '<script type="text/javascript">document.getElementById("loader-wrapper").style.display="none"</script>';
        header('location:login.php');}?>