@extends('layouts.profile_layout')
@section('content')

<!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
         @foreach($user as $key=>$value)
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-6" style="text-align: left;">
           <div class="card user-info-card bg-white">
            <div class="card-body p-4 d-flex align-items-center">
              <div class="user-profile me-3"><img src="img/bg-img/group.png" alt="">
                <div class="change-user-thumb">
                  <form>
                    <input class="form-control-file" type="file">
                    <button onclick="img()"><i class="lni lni-pencil"></i></button>
                  </form>
                </div>
              </div>
              <div class="user-info">
                <p class="mb-0">{{$value->mobile}}</p>
              </div>
            </div>
          </div>
            <!-- Register Form-->
            <div class="register-form mt-3 px-4">
            <!--    <h5 class="mb-6">Fill your Details</h5> -->
              <form action="save_registeration" method="post">
                @csrf
                 

                <div class="row mb-4">
                  <div class="col-sm-6" id="leftreg">
                     <label for="username"><i class="lni lni-user"></i></label>
                     <span class="required">Name</span>
                 
                  </div>
                  <div class="col-sm" id="rightreg">
                    <input class="form-control" id="username" name="username" type="text" value="{{$value->name}}" required="required">
                  </div>
                  
                </div>
                 <div class="row mb-4">
                  <div class="col-sm-6" id="leftreg">
                     <label for="email"><i class="lni lni-envelope"></i></label>
                     <span>Email</span>
                 
                  </div>
                  <div class="col-sm" id="rightreg">
                   <input class="form-control" id="email" type="email" name="email" placeholder="Enter Email Id" value="{{$value->email}}" pattern="([-!#-'*+/-9=?A-Z^-~]+(\.[-!#-'*+/-9=?A-Z^-~]+)*|([]!#-[^-~ \t]|(\\[\t -~]))+)@[0-9A-Za-z]([0-9A-Za-z-]{0,61}[0-9A-Za-z])?(\.[0-9A-Za-z]([0-9A-Za-z-]{0,61}[0-9A-Za-z])?)+">
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
                       <div class="row mb-4">
                  <div class="col-sm-6" id="leftreg">
                    <label for="address"><i class="lni lni-map-marker"></i></label>
                     <span>Address</span>
                  
                  </div>
                  <div class="col-sm" id="rightreg">
                 <textarea class="form-control" id="address" placeholder="Enter Your Address" value="{{$value->address}}"></textarea>
                  </div>
                  
                </div>
                   <div class="row mb-4">
                  <div class="col-sm-6" id="leftreg">
                    <label for="landmark"><i class="lni lni-map"></i></label>
                     <span>Landmark</span>
                  
                  </div>
                  <div class="col-sm" id="rightreg">
                   <input class="form-control" id="Landmark" name="landmark" type="text" placeholder="Enter Landmark">
                  </div>
                  
                </div>
                   <div class="row mb-4">
                  <div class="col-sm-6" id="leftreg">
                    <label for="state"><i class="lni lni-map-marker"></i></label>
                     <span>State</span>
                  
                  </div>
                  <div class="col-sm" id="rightreg">
                    <select class="form-control" id="state">
                      <option>Delhi</option>
                    </select>
                  </div> 
                </div>

                  <div class="row mb-4">
                  <div class="col-sm-6" id="leftreg">
                    <label for="city"><i class="lni lni-map-marker"></i></label>
                     <span>City</span>
                  
                  </div>
                  <div class="col-sm" id="rightreg">
                    <select class="form-control" id="city">
                      <option>Delhi</option>
                    </select>
                  </div> 
                </div>

                  <div class="row mb-4">
                  <div class="col-sm-6" id="leftreg">
                    <label for="pin"><i class="lni lni-pin"></i></label>
                     <span>Pin</span>
                  
                  </div>
                  <div class="col-sm" id="rightreg">
                   <input class="form-control" id="pin" name="pin" type="text" placeholder="Input Pin Code" maxlength="6" minlength="6" onfocus="pinValidation()">
                  </div>
                  
                </div>          
        
             <!--   <button class="btn btn-success btn-lg w-100" type="submit">Submit</button> -->
              </form>
            </div>
            <!-- Login Meta-->
          <!--   <div class="login-meta-data">
              <p class="mt-3 mb-0">Already have an account?<a class="ms-1" href="login">Sign In</a></p>
            </div> -->
          </div>
        </div>
           @endforeach
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

   var pinCode = document.getElementById('pin').value;
   function pinValidation(pinCode) {
  //called when key is pressed in textbox
  $("#pin").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
  
               return false;
    }
   })
 }

    function img() {
        // body...a
        alert("hola");
      }

 </script>

    @stop
    