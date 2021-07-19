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

<body class="crm_body_bg" style="background :white;">
    <!-- <div class="container-fluid">
        <div class="row mt-5 px-3">
            <div class="col-12">
                <div class="otp-wrapper">
                    <div class="background-shape"></div>
                    <div class="registerstart">
                        <div class="registerhead">
                            <img class="big-logo mb-4" style="display: block;"
                                src="{{ asset('public/img/b2clogo.png') }}" alt="">
                            <div class="login-title">
                                <h2 class="text-left mt-3 login-titletag" style="padding-left: 0px;">Setup Your Store /
                                    Register
                                </h2>
                                <p id="login-p">Fill some basic details to create your store.</p>
                                <div class="register-terms mt-3">
                                    <p id="login-p">Please have the following ready before you begin.</p>
                                    <ul class=" a px-3 mt-3">
                                        <li>Your bank account details for recieving payments.</li>
                                        <li>Tax(GST/PAN) details of your business.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="registerform">
                    <form role="form">
                        <div class="row setup-content" id="step-1">
                            <div class="col-xs-12">
                                <div class="col-md-12">
                                    <h3> Step 1</h3>
                                    <div class="form-group">
                                        <label class="control-label">First Name</label>
                                        <input maxlength="100" type="text" required="required" class="form-control"
                                            placeholder="Enter First Name" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Last Name</label>
                                        <input maxlength="100" type="text" required="required" class="form-control"
                                            placeholder="Enter Last Name" />
                                    </div>
                                    <button class="btn btn-primary nextBtn btn-lg pull-right"
                                        type="button">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-2">
                            <div class="col-xs-12">
                                <div class="col-md-12">
                                    <h3> Step 2</h3>
                                    <div class="form-group">
                                        <label class="control-label">Company Name</label>
                                        <input maxlength="200" type="text" required="required" class="form-control"
                                            placeholder="Enter Company Name" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Company Address</label>
                                        <input maxlength="200" type="text" required="required" class="form-control"
                                            placeholder="Enter Company Address" />
                                    </div>
                                    <button class="btn btn-default prevBtn btn-lg pull-left" type="button">Prev</button>
                                    <button class="btn btn-primary nextBtn btn-lg pull-right"
                                        type="button">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-3">
                            <div class="col-xs-12">
                                <div class="col-md-12">
                                    <h3> Step 3</h3>
                                    <div class="form-group">
                                        <label class="control-label">Skills</label>
                                        <input maxlength="200" type="text" required="required" class="form-control"
                                            placeholder="Enter skill or skills" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Comment</label>
                                        <textarea class="form-control" placeholder="Enter Comment"></textarea>
                                    </div>
                                    <button class="btn btn-default prevBtn btn-lg pull-left" type="button">Prev</button>
                                    <button class="btn btn-primary nextBtn btn-lg pull-right"
                                        type="button">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-4">
                            <div class="col-xs-12">
                                <div class="col-md-12">
                                    <h3> Step 4</h3>
                                    <button class="btn btn-default prevBtn btn-lg pull-left" type="button">Prev</button>
                                    <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div> -->

    <div class="container-fluid">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>Step 1</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Step 2</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p>Step 3</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                    <p>Step 4</p>
                </div>
            </div>
        </div>

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="otp-wrapper">
                        <div class="background-shape"></div>
                        <div class="registerstart">
                            <div class="registerhead">
                                <img class="big-logo mb-4" style="display: block;"
                                    src="{{ asset('public/img/b2clogo.png') }}" alt="">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form role="form">
            <div class="row setup-content ml-2" id="step-1">
                <div class="col-xs-12">
                    <div class="col-md-12">

                        <div class="login-title">
                            <h2 class="text-left mt-3 login-titletag" style="padding-left: 0px;">Setup Your Store /
                                Register
                            </h2>
                            <p id="login-p">Fill some basic details to create your store.</p>
                            <div class="register-terms mt-3">
                                <p id="login-p">Please have the following ready before you begin.</p>
                                <ul class=" a px-3 mt-3">
                                    <li>Your bank account details for recieving payments.</li>
                                    <li>Tax(GST/PAN) details of your business.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="step1 mt-4">
                            <div class="form-group form-inline">
                                <label class="control-label">First Name</label>
                                <input maxlength="100" type="text" required="required" class="form-control"
                                    placeholder="Enter First Name" />
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label">Last Name</label>
                                <input maxlength="100" type="text" required="required" class="form-control"
                                    placeholder="Enter Last Name" />
                            </div>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-2">
                <div class="col-xs-12">
                    <div class="col-md-12">

                        <div class="login-title">
                            <h2 class="text-left mt-3 login-titletag" style="padding-left: 0px;">Setup Your Store /
                                Register
                            </h2>
                            <p id="login-p">Fill some basic details to create your store.</p>
                        </div>


                        <div class="form-group">
                            <label class="control-label">Company Name</label>
                            <input maxlength="200" type="text" required="required" class="form-control"
                                placeholder="Enter Company Name" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Company Address</label>
                            <input maxlength="200" type="text" required="required" class="form-control"
                                placeholder="Enter Company Address" />
                        </div>
                        <button class="btn btn-default prevBtn btn-lg pull-left" type="button">Prev</button>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-3">
                <div class="col-xs-12">
                    <div class="col-md-12">

                        <div class="login-title">
                            <h2 class="text-left mt-3 login-titletag" style="padding-left: 0px;">Shipment Setup
                            </h2>
                            <p id="login-p">Select how you want to ship your products.</p>
                            <div class="register-terms mt-3">
                                <p id="login-p">Ypur Pin Code ________ is eligible for Shiprocket and Self Shipment.</p>
                                <!-- <ul class=" a px-3 mt-3">
                                        <li>Your bank account details for recieving payments.</li>
                                        <li>Tax(GST/PAN) details of your business.</li>
                                    </ul> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Skills</label>
                            <input maxlength="200" type="text" required="required" class="form-control"
                                placeholder="Enter skill or skills" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Comment</label>
                            <textarea class="form-control" placeholder="Enter Comment"></textarea>
                        </div>
                        <button class="btn btn-default prevBtn btn-lg pull-left" type="button">Prev</button>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-4">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <div class="login-title">
                            <h2 class="text-left mt-3 login-titletag" style="padding-left: 0px;">Store Weblink
                            </h2>
                            <p id="login-p">Your store will be live to this link.</p>
                            <!-- <div class="register-terms mt-3">
                                    <p id="login-p">Please have the following ready before you begin.</p>
                                    <ul class=" a px-3 mt-3">
                                        <li>Your bank account details for recieving payments.</li>
                                        <li>Tax(GST/PAN) details of your business.</li>
                                    </ul>
                                </div> -->
                        </div>
                        <button class="btn btn-default prevBtn btn-lg pull-left" type="button">Prev</button>
                        <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
                    </div>
                </div>
            </div>
        </form>
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

    <script>
        $(document).ready(function () {

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn'),
                allPrevBtn = $('.prevBtn');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function () {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent()
                    .next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url']"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });

            allPrevBtn.click(function () {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent()
                    .prev().children("a");

                $(".form-group").removeClass("has-error");
                prevStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-primary').trigger('click');
        });
    </script>

</body>

</html> <!--  -->

</body>

</html>