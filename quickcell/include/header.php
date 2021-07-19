<?php 
session_start();
if(time() - $_SESSION['timestamp'] > 900) { //subtract new timestamp from the old one
    
    unset($_SESSION['r_id'], $_SESSION['timestamp']);
    header("Location:login.php"); //redirect to index.php
    // exit;
} else {
    $_SESSION['timestamp'] = time(); //set new timestamp
include('include/db.php');
$admin_id=$_SESSION['admin_id'];
$query=mysqli_query($con,"SELECT * FROM `admin` WHERE id='$admin_id'");
$row=mysqli_fetch_assoc($query);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?php echo $row['firm_name'];?> | Dashboard </title>
 

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="dist/css/style2.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light"  style="background-color: #343a40; padding: 11px;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color: #fff;"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" id="strip">
        <a href="index.php" class="nav-link" style="color: #fff;">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" id="strip">
        <a href="#" class="nav-link" style="color: #fff;">Contact</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <button class="back_btn" onclick="goBack()" style="margin-right: 10px;vertical-align:middle"><span>Back</span></button>
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="margin-right: 10px;"><i class="fa fa-cog"></i>
</button>
           
    </ul>       
  </nav>
  <!-- /.navbar -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #ccc;">
        <h3 class="modal-title" id="exampleModalCenterTitle"><label> SETTINGS</label></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <a href="profile_update.php" type="button" class="btn btn-info">Profile Update</a>
          </div>
          <div class="col-md-6">
            <a href="registration_form_validation.php" type="button" class="btn btn-info">Registration Form</a>
          </div>
        </div><br>
       	<div class="row"> 
       		<div class="col-md-6">
       			<label>Shipping Price</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" data-toggle="toggle" id="Shipping" onchange="show_shipping()" <?php if($row['shipping']=='on'){echo "checked='checked'";}?> >

       		</div>
       	</div><br>
       	<div class="row" id="shipping_opt" style="display: none;">
       		<div class="col-md-12">
       			<?php
       			$up=mysqli_query($con,"SELECT * FROM `shipping` ORDER BY id DESC LIMIT 1");
       			$rows=mysqli_fetch_assoc($up);
       			?>
       			<label class="GFG"><input type="radio" name="chk[]" onclick="show_min_max('','none')" id="price_acc_order" value="price_acc_order" <?php if($rows['shipping_type']=='PRICE ACCORDING TO ORDER PRICE'){echo "checked='checked'";}?> >&nbsp;PRICE ACCORDING TO ORDER PRICE</label>&nbsp;&nbsp;
       			<div class="row" id="min_max" style="display: none;">
       				<div class="col-md-6">
       					<label class="col-md-6 ">Min<input type="number" class=" form-control" id="min"  value="<?=$row['min']?>"></label>
       					<label class="col-md-6 ">Max<input type="number" class="form-control" id="max"  value="<?=$row['max']?>"></label>
       				</div>
       			</div>
       			<label class="GFG"><input type="radio" name="chk[]" onclick="show_min_max('none','none')" id="free_ship" value="FREE SHIPPING" <?php if($rows['shipping_type']=='FREE SHIPPING'){echo "checked='checked'";}?> >&nbsp;FREE SHIPPING</label>&nbsp;&nbsp;
       			<label class="GFG"><input type="radio" name="chk[]" onclick="show_min_max('none','')" id="fixed" value="fixed_shipping" <?php if($rows['shipping_type']=='FIXED PRICE'){echo "checked='checked'";}?> >&nbsp;FIXED SHIPPING</label>
       			<div class="row" id="fixed_shipping" style="display: none;">
       				<div class="col-md-6">
       					<label>Shipping<input type="number" class=" form-control" id="price" value="<?=$row['amount']?>"></label>
       				</div>
       			</div>
       		</div>
       	</div><br>
       		<div class="row"> 
       		<div class="col-md-6">
       			<label>Payment Details</label>&nbsp;&nbsp;&nbsp;<input type="checkbox" data-toggle="toggle" id="Payment" <?php if($row['payment_det']=='on'){echo "checked='checked'";}?>>

       		</div>
       	</div><br>
        
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: red;">Close</button>
        <button type="button" class="btn btn-primary" onclick="setting()" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link" style="padding: 12px;">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $row['firm_name'];?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="margin-top: 60px;">
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
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <?php 

             // if($row['business_type']=="R"){
          ?> 
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
              <!-- <li class="nav-item">
                <a href="add_prod.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Product</p>
                </a>
              </li> -->
              
            </ul>
          </li>
        <?php //} else if($row['business_type']=="W"){ ?>
         <!-- <li class="nav-item has-treeview">
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
          </li> -->
          <?php // } ?>  
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
            <a href="analysis.php" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
               Analysis
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
  <div class="content-wrapper" style="background:url('dist/img/map1.jpg'); ">
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
        sessionStorage.clear();
  window.history.back();
}
window.onload=show_shipping();
function show_shipping() {
	// alert("Hello");
	if($("#Shipping").is(":checked"))
	{
	document.getElementById('shipping_opt').style.display='';
	}else
	{
	document.getElementById('shipping_opt').style.display='none';
	}
}
function show_min_max(str,str2) {
	document.getElementById('min_max').style.display=str;
	document.getElementById('fixed_shipping').style.display=str2;
}
function setting() {
	var Shipping,Payment,result,ship_type;
	var Ship=document.getElementById('Shipping');
	var Pay=document.getElementById('Payment');
	if(document.getElementById('price_acc_order').checked)
	{
		result=(document.getElementById('min').value)+'~'+(document.getElementById('max').value);
		ship_type='price';

	}else if(document.getElementById('free_ship').checked)
	{
		result=document.getElementById('free_ship').value;
		ship_type='free';

	}else if(document.getElementById('fixed').checked)
	{
		result=document.getElementById('price').value;
		ship_type='fixed';

	}
	var type="setting";
	if(Ship.checked)
	{
		Shipping='on';
	}else
	{
		Shipping='off';
	}
	if(Pay.checked)
	{
		Payment='on';
	}else
	{
		Payment='off';
	}
	// alert(result);
	$.ajax({
		type:'POST',
		url:'setting.php',
		data:{'Payment':Payment,'Shipping':Shipping,'type':type,'result':result,'ship_type':ship_type},
		success:function(res) {
			alert(res);
		}
	});
}
    </script>