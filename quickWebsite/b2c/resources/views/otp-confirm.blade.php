@extends('layouts.default')
@section('content')
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
            <div class="text-start px-4">
              <form  action="{{'chk_otp'}}" method="post" name="form_name" id="form_id" class="form_class">
                @csrf
              <h5 class="mb-1 text-white">Verify Phone Number</h5>
              <input type="text" name="mobile" id="mobile" value="{{$mobile}}" hidden="">
              <p class="mb-4 text-white">Enter the OTP code sent to<strong class="ms-1">+91-{{$mobile}}</strong></p>
            </div>
           
             <!-- OTP Verify Form-->
            <div class="otp-verify-form mt-5 px-4">
              <!-- <form action="home" method=""> -->
                <div class="d-flex justify-content-between mb-5" style="margin-left: 32px;">
                  <input class="" name="otp" id="partitioned" type="text" value="" placeholder=" " maxlength="4">
                  
                </div>
                <button class="btn btn-warning btn-lg w-100"  name="submit_tag" id="btn_tag" onclick="submit_by_tag()" type="submit">Verify &amp; Proceed</button>
              <!-- </form> -->
            </div>
            </form>
            <!-- Term & Privacy Info-->
            <div class="login-meta-data px-4">
              <p class="mt-3 mb-0">Don't received the OTP?<span class="otp-sec ms-1 text-white" id="resendOTP"></span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function submit_by_tag() {
        var mobile = document.getElementById("mobile").value;
        var otp = document.getElementById("partitioned").value;
        // alert(otp);
        $.ajax({
          type:'POST',
          url:'/quickWebsite/b2c/public/chk_otp',
          data:{'mobile':mobile,'otp':otp},
          headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  // data:'_token = <?php echo csrf_token() ?>',
                   success:function(result) {
                      // $("#new").html(result);
                      if(result=="success"){
                        // alert("success");
                        // window.history.back();
                        // window.location.href = "http://34.72.9.224/quickWebsite/b2c/public/profile";
                      }else{
                        alert("OTP did not match");
                      }
                      console.log(result);
                   }
        });

      }
    </script>
    @stop