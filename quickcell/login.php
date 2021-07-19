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
	<title>Login|SSS Sybertech</title>

</head>
<style>
body {
  background-image: url('dist/img/login.jpg');
  background-repeat: no-repeat;
  background-size: cover;
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
								<div class="card-body" style="padding: 40px;">
									<!-- <form action="javascript:;" method="post" onsubmit="submit()"> -->
										<h3>Login to your Account</h3>

										<div class="row">
											<div class="col-12 form-group">
												<label for="login-form-username">Mobile Number:</label>
												<input type="text" id="mobile_no" name="login-form-username" pattern="[7-9]{1}[0-9]{9}$"  class="form-control not-dark" required="" />
											</div>

										<div class="col-12 form-group" id="g_otp" style="display: ;">
												<button class="btn btn-success" type="button" style="float: right;" onclick="otp()" >Generate OTP</button>
											</div>
										<!-- </div> -->
									<!-- </form>
									<form action="javascript:;" method="post" onsubmit="submit()">
										<div class="row"> -->
											<div class="col-12 form-group" id="otp" style="display: none;">
												<label for="login-form-password">OTP:</label>
												<input type="password" id="i_otp" name="login-form-password" value="" class="form-control not-dark" />
												<label style="color: red" id="errorr" style="display:none;">Invalid OTP</label>
											</div>

											<div class="col-12 form-group" id="submit" style="display:none;">
												<button class="btn btn-success" id="login-form-submit" name="login-form-submit" style="float: right;" type="button" onclick="submit()">Submit</button>
												<!-- <a href="#" class="float-right">Forgot Password?</a> -->
											</div>
										</div>
									<!-- </form> -->

						
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