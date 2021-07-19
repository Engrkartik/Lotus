<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="asset/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="asset/css/style.css" type="text/css" />
	<link rel="stylesheet" href="asset/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="asset/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="asset/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="asset/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="asset/css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
	<!-- Document Title
	============================================= -->
	<title>Shop | Canvas</title>
<?php
include('include/db.php');


?>
</head>
<style type="text/css">
	.responsive {
  width: 50%;
  /*height: 50%;*/
  height: auto;
  border-radius: 50%;
  border: 3px solid grey;

}
</style>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="full-header">
			<div id="header-wrap">
				<div class="container">
					<div class="header-row">

						<!-- Logo
						============================================= -->
						<div id="logo">
							<a href="index" class="standard-logo" data-dark-logo="asset/images/logo-dark.png"><img src="asset/images/logo.png" alt="Canvas Logo"></a>
							<a href="index" class="retina-logo" data-dark-logo="asset/images/logo-dark@2x.png"><img src="asset/images/logo@2x.png" alt="Canvas Logo"></a>
						</div><!-- #logo end -->

						<div class="header-misc">

							<!-- Top Search
							============================================= -->
							<div id="top-search" class="header-misc-icon">
								<a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
							</div><!-- #top-search end -->

							<!-- Top Cart
							============================================= -->
							<div id="top-cart" class="header-misc-icon d-none d-sm-block">
								<?php
								$chk=mysqli_query($con,"SELECT * FROM add_to_cart where `admin_id`='$admin_id'");
								$cart=mysqli_num_rows($chk);
								?>
								<a href="cart" id="top-cart-trigger"><i class="icon-line-bag"></i><span class="top-cart-number"><?php echo $cart;?></span></a>
								
							</div><!-- #top-cart end -->

						</div>

						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu">

							<ul class="menu-container">
								
								<li class="menu-item">
									<a class="menu-link" href="index"><div>Shop</div></a>
									<ul class="sub-menu-container">
									
										<li id="list" class="menu-item">
											<a  class="menu-link" href="cart"><div>Cart</div></a>
										</li>
										<li class="menu-item">
											<a class="menu-link" href="checkout"><div>Checkout</div></a>
										</li>
									</ul>
								</li>
								
							</ul>

						</nav><!-- #primary-menu end -->

						<form class="top-search-form" action="search.html" method="get">
							<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
						</form>

					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->
