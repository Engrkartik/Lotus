<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Quickcell B2C Admin Panel</title>

    <link rel="icon" href="http://34.72.9.224/quickWebsite/b2c_admin/img/mini_logo.png  " type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://34.72.9.224/quickWebsite/b2c_admin/public/css/bootstrap.min.css" />
    <!-- themefy CSS -->
    <link rel="stylesheet"
        href="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/themefy_icon/themify-icons.css " />
    <!-- select2 CSS -->
    <link rel="stylesheet"
        href="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/niceselect/css/nice-select.css " />
    <!-- owl carousel CSS -->
    <link rel="stylesheet"
        href="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/owl_carousel/css/owl.carousel.css " />
    <!-- gijgo css -->
    <link rel="stylesheet" href="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/gijgo/gijgo.min.css " />
    <!-- font awesome CSS -->
    <link rel="stylesheet"
        href="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/font_awesome/css/all.min.css " />
    <link rel="stylesheet" href="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/tagsinput/tagsinput.css " />

    <!-- date picker -->
    <link rel="stylesheet"
        href="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/datepicker/date-picker.css " />

    <link rel="stylesheet"
        href="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/vectormap-home/vectormap-2.0.2.css " />

    <!-- scrollabe  -->
    <link rel="stylesheet" href="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/scroll/scrollable.css  " />
    <!-- datatable CSS -->
    <link rel="stylesheet"
        href="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/datatable/css/jquery.dataTables.min.css  " />
    <link rel="stylesheet"
        href="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/datatable/css/responsive.dataTables.min.css  " />
    <link rel="stylesheet"
        href="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/datatable/css/buttons.dataTables.min.css " />
    <!-- text editor css -->
    <link rel="stylesheet"
        href="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/text_editor/summernote-bs4.css  " />
    <!-- morris css -->
    <link rel="stylesheet" href="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/morris/morris.css ">
    <!-- metarial icon css -->
    <link rel="stylesheet"
        href="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/material_icon/material-icons.css  " />

    <!-- menu css  -->
    <link rel="stylesheet" href="http://34.72.9.224/quickWebsite/b2c_admin/public/css/metisMenu.css  ">
    <!-- style CSS -->
    <link rel="stylesheet" href="http://34.72.9.224/quickWebsite/b2c_admin/public/css/style.css " />
    <link rel="stylesheet" href="http://34.72.9.224/quickWebsite/b2c_admin/public/css/colors/default.css  "
        id="colorSkinCSS">
</head>

<body class="crm_body_bg">

    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
        <!-- Background Shape-->
        <div class="background-shape"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-4">
                    <!-- <img class="big-logo px-4 d-flex" src="img/core-img/logo-white.png" alt=""> -->
                    <img class="big-logo px-4 mb-4" style="display: block;" src="{{ asset('public/img/b2clogo.png') }}"
                        alt="">
                    <div class="login-title">
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
                        <h2 class="text-left px-4 mt-3 login-titletag">Login</h2>
                        <p class="px-4" id="login-p">Enter your mobile number to login your account.</p>
                    </div>

                    <!-- Register Form-->
                    <div class="register-form mt-5 px-4">
                        <form action="{{ url('/gen-otp') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4 pr-0">
                                        <select name="citycode" id="login_city_code"
                                            class="form-control login_city_code">
                                            <option data-countrycode="IN" value="91">(+91)</option>
                                            {{-- <option data-countrycode="AL" value="355">(+355)</option>
                                            <option data-countrycode="DZ" value="213"> (+213)</option>
                                            <option data-countrycode="AS" value="684"> (+684)</option> --}}
                                        </select>
                                    </div>
                                    <div class="col-8">
                                        <label for="" class="input-label">Mobile Number</label>
                                        <input class="form-control login_mobile" type="text" name="login_mobile"
                                            id="login_mobile" placeholder="Enter Mobile No" min="10" max="10">
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-8">
                                        <label for="" class="input-label text-danger">Mobile Number</label>
                                        <input class="form-control login_mobile error-input" type="text" name="login_mobile1"
                                            id="login_mobile1" placeholder="Enter Mobile No" min="10" max="10">
                                    </div>
                                </div>
                                <span id="mobile_no_error" class="text-left error mt-3">This Mobile Number isn't registered with us.<br>
                                        Kindly check the number again or Register.</span>
                                <button class=" addnew-hover color-9 mt-5" id="login-button" name="form_submit"
                                    value="submit" type="submit">Verify Number <i class="fas fa-arrow-right"
                                        style="padding-right:10px; margin-left: 22px;"></i></button>
                        </form>
                    </div>


                    <div class="text-left">
                        <p><a href="#">Not Registered as a Seller yet?</a></p>
                        <!-- <p><a href="#">Terms of service</a></p> -->
                    </div>
                    <div class="text-right">
                        <p><a style="color: #172ab4;text-decoration: underline;" href="#">Register</a></p>
                        <!-- <p><a href="#">Terms of service</a></p> -->
                    </div>
                    <!--.help-text-->


                    <!-- Login Meta-->
                    <!-- <div class="login-meta-data"><a class="forgot-password d-block mt-3 mb-1"
                            href="forget-password.html">Forgot Password?</a>
                        <p class="mb-0">Didn't have an account?<a class="ms-1" href="register.html">Register Now</a></p>
                    </div> -->
                    <!-- View As Guest-->
                    <!-- <div class="view-as-guest mt-3"><a class="btn" href="home.html">View as Guest</a></div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- footer  -->
    <!-- jquery slim -->
    <script src="http://34.72.9.224/quickWebsite/b2c_admin/public/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="http://34.72.9.224/quickWebsite/b2c_admin/public/js/popper.min.js"></script>
    <!-- bootstarp js -->
    <script src="http://34.72.9.224/quickWebsite/b2c_admin/public/js/bootstrap.min.js"></script>
    <!-- sidebar menu  -->
    <script src="http://34.72.9.224/quickWebsite/b2c_admin/public/js/metisMenu.js"></script>

    <!-- responsive table -->
    <script src="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/datatable/js/jquery.dataTables.min.js">
    </script>
    <script src="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/datatable/js/dataTables.responsive.min.js ">
    </script>
    <script src="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/datatable/js/dataTables.buttons.min.js ">
    </script>
    <script src="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/datatable/js/buttons.flash.min.js  "></script>
    <script src="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/datatable/js/jszip.min.js  "></script>
    <script src="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/datatable/js/pdfmake.min.js  "></script>
    <script src="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/datatable/js/vfs_fonts.js  "></script>
    <script src="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/datatable/js/buttons.html5.min.js  "></script>
    <script src="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/datatable/js/buttons.print.min.js  "></script>

    <!-- scrollabe  -->
    <script src="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/scroll/perfect-scrollbar.min.js"></script>
    <script src="http://34.72.9.224/quickWebsite/b2c_admin/public/vendors/scroll/scrollable-custom.js"></script>

    <!-- custom js -->
    <script src="http://34.72.9.224/quickWebsite/b2c_admin/public/js/custom.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".alert").delay(5000).slideUp(300);
        });
    </script>

</body>

</html> <!--  -->

</body>

</html>