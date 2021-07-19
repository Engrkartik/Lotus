<!DOCTYPE html>
<html>

<!-- Mirrored from dreamguys.co.in/preadmin/hr/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Jan 2021 10:12:41 GMT -->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/img/logo.png') }}">
	<title>SSS - Payroll Attendance</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/cssnew/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/cssnew/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/cssnew/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/cssnew/edited.css') }}">
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

</head>

<body class="account-page">
	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<div class="account-content">
			@if (session('error'))
			<div class="alert alert-danger">
				{{ session('error') }}
			</div>
		@endif
		@if (session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif
		
			<div class="container">

				<!-- Account Logo -->
				<div class="account-logo">
					<a href="index.html"><img src="{{asset('public/imgnew/logo.png')}}" alt="SSS Syber Pvt. Ltd."
							style="width:205px; height:75px;"></a>
				</div>
				<!-- /Account Logo -->

				<div class="account-box">
					<div class="account-wrapper">
						<h3 class="account-title">Payroll Login</h3>
						<p class="account-subtitle">Access to our dashboard</p>

						<!-- Account Form -->
						<form action="{{url('validate_login')}}" method="POST">
							@csrf
							<div class="form-group">
								<label>Username</label>
								<input class="form-control" type="text" name="username" placeholder="Username">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" type="password" id="pwd" name="password" placeholder="Password">
							</div>
						
							<!-- An element to toggle between password visibility -->
							<div class="form-group">
								<!-- An element to toggle between password visibility -->
								<input type="checkbox" onclick="myFunction()">&nbsp;Show Password
							</div>
							
							<div class="col-sm-12">
								<div class="form-group text-center">
									<div class="row">
										<div class="col-6">
											<button class="btn btn-primary login-btn">Login</button>
										</div>
										<div class="col-6">
											<button type="reset" class="btn btn-primary cancel-btn"
												style="width: 180px;">Clear</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						<!-- /Account Form -->

					</div>
				</div>
			</div>
		</div>
	</div>F
	<!-- /Main Wrapper -->


	<div class="sidebar-overlay" data-reff="#sidebar"></div>
	<script type="text/javascript" src=" {{ asset('public/jsnew/jquery-3.2.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/jsnew/bootstrap.min.js') }} "></script>
	<script type="text/javascript" src="{{ asset('public/jsnew/app.js') }} "></script>
	<script type="text/javascript" src="{{ asset('public/jsnew/custom.js') }} "></script>

</body>

<!-- Mirrored from dreamguys.co.in/preadmin/hr/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Jan 2021 10:12:42 GMT -->

</html>