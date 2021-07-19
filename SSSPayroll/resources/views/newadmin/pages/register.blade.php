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

            <div class="container">

                <!-- Account Logo -->
                <div class="account-logo">
                    <a href="index.html"><img src="{{asset('public/imgnew/logo.png')}}" alt="SSS Syber Pvt. Ltd."
                            style="width:205px; height:75px;"></a>
                </div>
                <!-- /Account Logo -->

                <div class="account-box" style="width: 600px;">
                    <div class="account-wrapper" >
                        <h3 class="account-title" style="margin-bottom: 20px;">Registration</h3>

                        <!-- Account Form -->
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Company Name<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder="Company Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Email Id</label>
                                        <input class="form-control" type="email" placeholder="Email Id">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Password <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Phone Number <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Address</label>
                                        <input class="form-control" type="text" placeholder="Address">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">State</label>
                                        <input class="form-control" type="text" placeholder="State">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">City<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Pincode<span class="text-danger">*</span></label>
                                        <div class="cal-icon"><input class="form-control datetimepicker"
                                                placeholder="Pincode" type="text"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group text-center">
                                    <div class="row">
										<div class="col-6">
											<a href="javascript:void(0);" class="btn btn-primary login-btn">Register</a>
										</div>
										<div class="col-6">
											<button type="reset" class="btn btn-primary cancel-btn" style="width: 250px;">Clear</button>
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
    </div>
    <!-- /Main Wrapper -->


    <div class="sidebar-overlay" data-reff="#sidebar"></div>
    <script type="text/javascript" src=" {{ asset('public/jsnew/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/jsnew/bootstrap.min.js') }} "></script>
    <script type="text/javascript" src="{{ asset('public/jsnew/app.js') }} "></script>
    <script type="text/javascript" src="{{ asset('public/jsnew/custom.js') }} "></script>
</body>

<!-- Mirrored from dreamguys.co.in/preadmin/hr/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Jan 2021 10:12:42 GMT -->

</html>