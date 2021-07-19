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
                <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
                    <!-- <img class="big-logo px-4 d-flex" src="img/core-img/logo-white.png" alt=""> -->
                    <img class="big-logo px-4 " src="img/core-img/b2clogo.png" alt="">

                    <div class="login-title">
                        <h2 class="text-left px-4 mt-3">Login</h2>
                        <p>Enter your mobile number to login your account.</p>
                    </div>

                    <!-- Register Form-->
                    <div class="register-form mt-5 px-4">
                        <form action="home.html" method="">
                            <!-- <div class="form-group text-start mb-4"><span>Username</span>
                                <label for="username"><i class="lni lni-user"></i></label>
                                <input class="form-control" id="username" type="text" placeholder="info@example.com">
                            </div> -->
                              <div class="form-group">
                                    <label for="">Mobile Number</label>
                                    <input class="form-control" type="text" placeholder="Mobile Number"
                                        name="mobilenum" value="" id="mobilenum">
                              </div>
                        
                            <div class="form-group text-start mb-4"><span>Password</span>
                                <label for="password"><i class="lni lni-lock"></i></label>
                                <input class="form-control" id="password" type="password"
                                    placeholder="********************">
                                <div class="password-meter-wrapper progress" style="display: none;">
                                    <div id="password-progress" class="progress-bar" role="progressbar"
                                        aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width:1%;"></div>
                                </div>
                                <div id="password-score" class="password-score" style="display: none;"></div>
                                <div id="password-recommendation" class="password-recommendation"></div><input
                                    type="hidden" id="password-strength-score" value="0">
                            </div>
                            <button class="btn btn-success btn-lg w-100" type="submit">Log In</button>
                        </form>
                    </div>
                    <!-- Login Meta-->
                    <!-- <div class="login-meta-data"><a class="forgot-password d-block mt-3 mb-1"
                            href="forget-password.html">Forgot Password?</a>
                        <p class="mb-0">Didn't have an account?<a class="ms-1" href="register.html">Register Now</a></p>
                    </div> -->
                    <!-- View As Guest-->
                    <div class="view-as-guest mt-3"><a class="btn" href="home.html">View as Guest</a></div>
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



</body>

</html> <!--  -->

</body>

</html>