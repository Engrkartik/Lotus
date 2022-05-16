<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="dist/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="dist/css/style1.css" type="text/css" />
	<link rel="stylesheet" href="dist/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="dist/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="dist/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="dist/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="dist/css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<?php
	// if($_SERVER['PHP_SELF']==
	$url=$_SERVER['REQUEST_URI'];
	$split=explode("/",$url);
	?>
	<title>Login | <?php echo strtoupper($split[1]);?></title>

</head>
<style>
body {
  /*background-image: url('dist/img/1.jpg');*/
  background-repeat: no-repeat;
  background-size: cover;
}
.card-body{
	border-radius: 25px;
}
</style>
<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap py-0">

				<div class="section p-0 m-0 h-100 position-absolute"></div>

				<div class="section bg-transparent min-vh-100 p-0 m-0">
					<div class="vertical-middle">
						<div class="container-fluid py-5 mx-auto">
						
							<div class="card mx-auto rounded-0 border-0" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<!-- <div class="col-md-2"></div> -->
												<div class="col-md-12" style="height: 70%;">
												<?php
												if($split[1]=='lotus')
												{
												?>
													<img src="dist/img/wow_lotus2.png" style="width: 100%;height: 100%;">
													<?php }else{?>
													<img src="dist/img/sss syber-1 (2).png" style="width: 100%;height: 100%;">
														<?php }?>
												</div>
												<!-- <div class="col-md-2"></div> -->

											</div>
											<div class="row" style="margin-top: 6px;">
												<div class="card-body" style="padding: 40px;background-color: #d82782b5;box-shadow: 0 0 5px 5px #d827828f;">
									<!-- <form id="login-form1" class="mb-0" action="#" method="post"> -->
										<h3>Login to your Account</h3>
										

										<div class="row">
											<div class="col-12 form-group">
												<label for="login-form-username">Mobile Number:</label>
												<input type="number" id="mobile_no" name="login-form-username" value="" class="form-control not-dark" />
											</div>

										<div class="col-12 form-group" id="g_otp" style="display: ;">
												<button class="btn btn-success" type="button" onclick="otp()">Generate OTP</button>
											</div>
											<div class="col-12 form-group" id="otp" style="display: none;">
												<label for="login-form-password">OTP:</label>
												<input type="password" id="i_otp" name="login-form-password" value="" class="form-control not-dark" />
											</div>

											<div class="col-12 form-group" id="submit" style="display:none;">
												<button class="btn btn-success" id="login-form-submit" name="login-form-submit" type="button" onclick="submit()" style="float: right;" value="login">Submit</button>
												<!-- <a href="#" class="float-right">Forgot Password?</a> -->
											</div>
										</div>
									<!-- </form> -->

						
						</div>
											</div>
										</div>
									</div>
								</div>
								
					</div>
				</div>

			</div>
		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="js/jquery.js"></script>
	<script src="js/plugins.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>
<script type="text/javascript">
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
				if(res==1)
				{
				g_otp.style.display='none';
				otp.style.display='';
				submit.style.display='';
				}
				else{alert(res);}
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
					window.location.href="order.php";
				}else{
				alert(res);
				}
				
			}
		});

	}
	
	
</script>
</body>
</html>