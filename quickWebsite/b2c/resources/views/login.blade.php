@extends('layouts.default3')
@section('content')

<?php
      if(session()->has('urlval'))
      {
        $urlval = Session::get('urlval');
      }else{
        $urlval = '';
      }
      // echo $urlval;
?>
<!-- Login Wrapper Area-->
<div class="login-wrapper d-flex align-items-center justify-content-center text-center">
  <!-- Background Shape-->
  <div class="background-shape"></div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5" style="text-align: left;">
        <img class="big-logo" src="img/core-img/ssslogo.png" alt="">
        <div id="old">
          <h5 class="mb-1 mt-5">Login and Register</h5>
          <h6 class="mb-1 mt-4">Phone Verification</h6>
          <p class="mb-2">We will send you an OTP on this phone number.</p>

          <!-- Register Form-->
          <div class="register-form mt-5 px-4">
            <!-- <form action="chk_otp" method="post"> -->
            <!-- @csrf -->

            <!--  <div class="form-group text-start mb-4"><span>Mobile Number</span>
                  <label for="login-form-username"><i class="lni lni-user"></i></label>
                  <input class="form-control" id="mobile" type="text" name="mobile" maxlength="10" minlength="10" placeholder="Enter Mobile No.">
                </div> -->
            <div class="otp-form mt-5" style="margin-right: 4.5rem;margin-left: -1.5rem;">
              <div class="mb-4 d-flex">
                <select class="form-select" name="" disabled="disabled">
                  <option value="">+91</option>
                </select>
                <input class="form-control ps-3" id="mobile" type="text" name="mobile" maxlength="10" minlength="10"
                  placeholder="Enter phone number" style="height: 50px;" onfocus="mobileValidation()">
              </div>
              <button class="btn btn-success btn-lg w-100" onclick="myotp()" id="login">Send OTP</button>
              <div class="login-meta-data px-0" id="term">
                <p class="mt-3 mb-0">By providing my phone number, I hereby agree the<a class="mx-1" href="#">Term of
                    Use</a>and<a class="mx-1" href="#">Privacy Policy.</a></p>
              </div>
              <!-- <p class="mt-3">Didn't have an account?<a class="mx-1" href="register" style="color: #353232;">Register Now</a></p> -->

            </div>

          </div>
        </div>
        <div class="register-form mt-5 px-4">
          <div id="new" style="display: none">
           
            <h5 class="mb-1" style="margin-left: -1.5rem;">Verify Phone Number</h5>
            <input type="text" name="mobile" id="mobile" value="" hidden="">
            <p class="mb-4" style="margin-left: -1.5rem;">Enter the OTP code sent to <strong class="ms-1">+91-<strong
                  id="fil"></strong></strong></p>
            <div class="otp-form mt-5" style="margin-right: 4.5rem; margin-left: -1.5rem;">
              <div class="mb-4 d-flex">
                <select class="form-select" name="" disabled="disabled">
                  <option value="">+91</option>
                </select>
                <input class="form-control ps-3" id="filled" type="text" name="mobile" maxlength="10" minlength="10"
                   style="height: 50px;" disabled="disabled" value="">
              </div>
            </div>
            <!--    <div class="otp-form mt-5 mx-4">
                  <div class="mb-4 d-flex">
                  <select class="form-select" name="" disabled="disabled">
                   <option value="">+91</option>
                  </select>
                  <input class="form-control ps-0" id="fil" type="text" name="mobile" maxlength="10" minlength="10" value="" style="height: 50px;">
                </div>
              </div> -->
            <div>
              <a href="" onclick="changeNo()" style="color: black;text-decoration: underline;">Change Number</a>
            </div>


            <div class="otp-verify-form mt-4 px-4" style="margin-right: 2.5rem;margin-left: -2.5rem">
              <form action="" method="">
                <div class="d-flex justify-content-between mb-4" id="clear">
                  <input class="form-control" id="codeBox1" type="text" maxlength="1" onkeyup="onKeyUpEvent(1, event)"
                    onfocus="onFocusEvent(1)" oninput="this.value=this.value.replace(/[^0-9]/g,'');" />
                  <input class="form-control" id="codeBox2" type="text" maxlength="1" onkeyup="onKeyUpEvent(2, event)"
                    onfocus="onFocusEvent(2)" oninput="this.value=this.value.replace(/[^0-9]/g,'');" />
                  <input class="form-control" id="codeBox3" type="text" maxlength="1" onkeyup="onKeyUpEvent(3, event)"
                    onfocus="onFocusEvent(3)" oninput="this.value=this.value.replace(/[^0-9]/g,'');" />
                  <input class="form-control" id="codeBox4" type="text" maxlength="1" onkeyup="onKeyUpEvent(4, event)"
                    onfocus="onFocusEvent(4)" oninput="this.value=this.value.replace(/[^0-9]/g,'');" />
                </div>
              </form>
            </div>

            <!-- <button class="btn btn-success btn-lg w-100" onclick="mysubmit()" id="login-form-submit">Submit</button> -->

            <div class="login-meta-data px-4" style="margin-right: 5.5rem;margin-left: -2.5rem;">
              <p class="mt-3 mb-0">OTP not recieved?<span class="otp-sec ms-1" id="resendOTP"></span></p>
            </div>

          </div>
          <!-- </form> -->
        </div>
        <!-- @if(session()->has('message'))
                  {{ session()->get('message') }}
            @endif -->

        <!-- Login Meta-->

      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function myotp() {
    var mobile = document.getElementById('mobile').value;

    // console.log('ehlo');
    $.ajax({
      type: 'POST',
      url: '/quickWebsite/b2c/public/check_login',
      data: {
        'mobile': mobile
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      // data:'_token = <?php echo csrf_token() ?>',
      success: function (result) {
        // $("#new").html(result);
        if (result == "mobile") {
          alert('Mobile not registered')
        } else {
          $('#old').hide();
          $('#new').show();
          $('#fil').html(mobile);
          $('#filled').val(mobile);
          // window.location.href = "http://34.72.9.224/quickWebsite/b2c/public/otp-confirm";
          console.log(result);
          alert(result);
        }
        console.log(result);
        document.getElementById('codeBox1').focus();
      }

    });
  }

  function changeNo() {
    $('#old').show();
    $('#new').hide();
    document.getElementById('clear').value = ''
  }

  function clickEvent(first, last) {
    if (first.value.length) {
      document.getElementById(last).focus();
    }
  }

  var input = document.getElementById("mobile");
  input.addEventListener("keyup", function (event) {
    if (event.keyCode === 13) {
      event.preventDefault();
      document.getElementById("login").click();
    }
  });

  // FOR OTP INSERTION AND DELETION 

  function getCodeBoxElement(index) {
    return document.getElementById('codeBox' + index);
  }

  function onKeyUpEvent(index, event) {
    const eventCode = event.which || event.keyCode;
    if (getCodeBoxElement(index).value.length === 1) {
      if (index !== 4) {
        getCodeBoxElement(index + 1).focus();
      } else {
        getCodeBoxElement(index).blur();
        // Submit code
        console.log('submit code ');
        var mobile = document.getElementById('mobile').value;
        // var otp = document.getElementById('otp').value;
        var one = document.getElementById('codeBox1').value;
        var two = document.getElementById('codeBox2').value;
        var three = document.getElementById('codeBox3').value;
        var four = document.getElementById('codeBox4').value;

        var otp = one + two + three + four;

        var urlvalue = '<?php echo $urlval; ?>';
        // alert(urlvalue);
        // die();

        $.ajax({
          type: 'POST',
          url: '/quickWebsite/b2c/public/chk_otp',
          data: {
            'mobile': mobile,
            'otp': otp
          },
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          // data:'_token = <?php echo csrf_token() ?>',
          success: function (result) {
            // $("#new").html(result);
            if (result == "success") {
              // window.location.reload();
              if(urlvalue==''){
                window.location.href = "http://34.72.9.224/quickWebsite/b2c/public/";
                // window.history.back();
              }
              else{
                window.location.href = urlvalue;
              }
            }else if(result == "register"){
              window.location.href = "http://34.72.9.224/quickWebsite/b2c/public/register";
            }
             else {
              alert("OTP did not match");

            }
            console.log(result);
          }
        });

      }
    }
    if (eventCode === 8 && index !== 1) {
     getCodeBoxElement(index - 1).focus();
      
    }

  }

  function onFocusEvent(index) {
    for (item = 1; item < index; item++) {
      const currentElement = getCodeBoxElement(item);
      if (!currentElement.value) {
        currentElement.focus();
        break;
      }
      currentElement.keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
  
               return false;
    }
   })
    }
  }

  function otpValidation(index) {
  //called when key is pressed in textbox
  $("index").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
  
               return false;
    }
   })
 }

function mobileValidation(mobile) {
  //called when key is pressed in textbox
  $("#mobile").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
  
               return false;
    }
   })
 }


</script>

@stop