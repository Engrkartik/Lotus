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
    <div class="otp-wrapper d-flex justify-content-center align-items-center otp-container">
        <div class="background-shape"></div>

        <div class="card py-4 px-3 loginotp-card">
            <div>
                <img class="big-logo mb-4" style="display: block;"
                    src="{{ asset('public/img/b2clogo.png') }}" alt="">
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
                    <h2 class="text-left mt-3 login-titletag" style="padding-left: 0px;">OTP Verification</h2>
                    <p id="login-p">Enter the OTP recieved on your {{ session('mobile')??'' }}.</p>
                    <a class="font-weight-bold cursor b2c-span" href="{{ url('') }}">Change Number</a>
                </div>
            </div>
            <form action="{{ url('verify-otp/'.session('mobile')) }}" class="otpform" method="POST">
                @csrf
                <div class="d-flex flex-row mt-5 loginotp">
                    <input type="text" class="form-control" name="a" id="a"  data-next="b" autofocus="" minlength="1" maxlength="1">
                    <input type="text" class="form-control" name="b" id="b"  data-next="c" data-previous="a" minlength="1" maxlength="1">
                    <input type="text" class="form-control" name="c" id="c"  data-next="d" data-previous="b" minlength="1" maxlength="1">
                    <input type="text" class="form-control" name="d" id="d"  data-previous="c" minlength="1" maxlength="1">
                </div>
                <button class=" addnew-hover color-9 mt-5" id="login-button" name="form_submit" value="submit"
                    type="submit">Verify OTP<i class="fas fa-arrow-right"
                        style="padding-right:10px; margin-left: 22px;"></i></button>
            </form>
            <div class="text-center mt-5"><span class="d-block mobile-text">Didn't recieved OTP?</span><span
                    class="font-weight-bold cursor b2c-span">Resend OTP</span></div>
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

        $('.otpform').find('input').each(function() {
	$(this).attr('maxlength', 1);
	$(this).on('keyup', function(e) {
		var parent = $($(this).parent());
		
		if(e.keyCode === 8 || e.keyCode === 37) {
			var prev = parent.find('input#' + $(this).data('previous'));
			
			if(prev.length) {
				$(prev).select();
			}
		} else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
			var next = parent.find('input#' + $(this).data('next'));
			
			if(next.length) {
				$(next).select();
			} else {
				// if(parent.data('autosubmit')) {
				// 	parent.submit();
				}
			}
		}
	});
});
        </script>

      


</body>

</html> <!--  -->

</body>

</html>