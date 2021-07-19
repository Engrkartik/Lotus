@extends('layouts.default3')
@section('content')

<!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-6" style="text-align: left;">
            <img class="big-logo" src="img/core-img/ssslogo.png" alt="" style="padding-left: 26px;">
            <h5 class="mb-4 mt-5" style="padding-left: 26px;">Fill Your Details</h5>
            <!-- Register Form-->
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}<a href="login"> click here</a>
                </div>
            @endif
            <div class="register-form mt-5 px-4">
            <!--    <h5 class="mb-6">Fill your Details</h5> -->
              <form action="save_registeration" method="post">
                @csrf
                <div class="row mb-4">
                  <div class="col-sm-6" id="leftreg">
                     <label for="username"><i class="lni lni-user"></i></label>
                     <span class="required">Name</span>
                 
                  </div>
                  <div class="col-sm" id="rightreg">
                    <input class="form-control" id="username" name="username" type="text" placeholder="Enter Name" required="required">
                  </div>
                  
                </div>
                 <div class="row mb-4">
                  <div class="col-sm-6" id="leftreg">
                     <label for="email"><i class="lni lni-envelope"></i></label>
                     <span>Email</span>
                 
                  </div>
                  <div class="col-sm" id="rightreg">
                   <input class="form-control" id="email" type="email" name="email" placeholder="Enter Email Id" pattern="([-!#-'*+/-9=?A-Z^-~]+(\.[-!#-'*+/-9=?A-Z^-~]+)*|([]!#-[^-~ \t]|(\\[\t -~]))+)@[0-9A-Za-z]([0-9A-Za-z-]{0,61}[0-9A-Za-z])?(\.[0-9A-Za-z]([0-9A-Za-z-]{0,61}[0-9A-Za-z])?)+">
                  </div>
                  
                </div>
                 <div class="row mb-4">
                  <div class="col-sm-6" id="leftreg">
                    <label for="gender"><i class="fa fa-transgender-alt"></i></label>
                     <span>Gender</span>
                  
                  </div>
                  <div class="col-sm" id="rightreg" style="margin-top: 13px;padding-left: 17px;">
                    <input class="form-check-input" id="male" type="radio" name="gender" value="M">
                    <label class="form-check-label" id="genders" for="male">M</label>
                    <input class="form-check-input" id="female" type="radio" name="gender" value="F">
                    <label class="form-check-label" for="female" id="genders">F</label>
                    <input class="form-check-input" id="other" type="radio" name="gender" value="O">
                    <label class="form-check-label" for="other" id="genders">Other</label>
                  </div>
                  
                </div>
                 <div class="row mb-4">
                  <div class="col-sm-6" id="leftreg">
                    <label for="phone"><i class="lni lni-phone"></i></label>
                     <span>Alt no.</span>
                  
                  </div>
                  <div class="col-sm" id="rightreg">
                   <input class="input-mobile form-control" id="phone" name="phone" type="tel" placeholder="Alternate Mobile No" maxlength="10" minlength="10" onfocus="mobileValidation()">
                  </div>
                  
                </div>
               
            <!--     <div class="form-group text-start mb-4">
                  <span>Name</span>
                  <label for="username"><i class="lni lni-user"></i></label>
                  <input class="form-control" id="username" name="username" type="text" placeholder="Enter Name" required="required">
                </div> 
                <div class="form-group text-start mb-4"><span>Alternate Mobile No.</span>
                  <label for="phone"><i class="lni lni-phone"></i></label>
                  <input class="input-mobile form-control" id="phone" name="phone" type="tel" placeholder="Enter Mobile Number" maxlength="10" minlength="10">
                </div>
                <div class="form-group text-start mb-4"><span>Email</span>
                  <label for="email"><i class="lni lni-envelope"></i></label>
                  <input class="form-control" id="email" type="email" name="email" placeholder="Enter Email Id">
                </div>
                 <div class="form-group text-start mb-4"><span>Gender</span>
                <input class="form-check-input" id="male" type="radio" name="gender">
				  <label class="form-check-label" for="male" style="position: initial;">Male</label>
				  <input class="form-check-input" id="female" type="radio" name="gender">
				  <label class="form-check-label" for="female" style="position: initial;">Female</label>
				</div> -->
        
               <button class="btn btn-success btn-lg w-100" type="submit">Submit</button>
              </form>
            </div>
            <!-- Login Meta-->
          <!--   <div class="login-meta-data">
              <p class="mt-3 mb-0">Already have an account?<a class="ms-1" href="login">Sign In</a></p>
            </div> -->
          </div>
        </div>
      </div>
    </div>
 <script>

  var phone = document.getElementById('phone').value;
   function mobileValidation(phone) {
  //called when key is pressed in textbox
  $("#phone").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
  
               return false;
    }
   })
 }
 </script>

    @stop
    