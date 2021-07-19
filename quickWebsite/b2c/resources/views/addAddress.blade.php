@extends('layouts.addAddressLayout')
@section('content')

<style>
.register-form span{
  padding-left: 0px;
}
</style>
  
  <div class="page-content-wrapper">
      <div class="container">
         <div class="row justify-content-center">
      <!-- User Meta Data-->
      <div class="col-12" style="text-align: left;">
      <!--  <div class="card cart-amount-area">
            <div class="card-body d-flex align-items-center justify-content-between">
              <h5 style="padding-left: 28px;margin-top: 42px;"></h5>
            </div>
          </div> -->
          <br>
          <!-- <form action="updateProfile" method="post"> -->
          <h5>Default Address</h5>
            <div class="register-form px-4 pt-4 bg-white" id="editProfile" style="height: 92%;">
            <!--    <h5 class="mb-6">Fill your Details</h5> -->
              <form action=" " method="post" id="editAddress">

                <div class="row mb-4">
                  <div class="col-sm-6" id="leftregg">
                     <label for="name"></label>
                     <span class="required">Name</span>
                 
                  </div>
                  <div class="col-sm" id="rightregg">
                    <input class="form-control" name="name" type="text" required="required" value="Priya Saraogi" style="color: #00A79D; font-weight: bold;" required="required">
                  </div>
                  
                </div>
                     <div class="row mb-4">
                  <div class="col-sm-6" id="leftregg">
                    <label for="address"></label>
                     <span class="required">Address</span>
                  
                  </div>
                  <div class="col-sm" id="rightregg">
                    <textarea  class="form-control" type="text" name="address" value="Office No : 914, 9th Floor I-Thum Tower-A, Sector 62, Noida, Uttar Pradesh" required="required">Office No : 914, 9th Floor I-Thum Tower-A, Sector 62, Noida, Uttar Pradesh</textarea>
                  </div>
                  
                </div>
                     <div class="row mb-4">
                  <div class="col-sm-6" id="leftregg">
                    <label for="landmark"></label>
                     <span>Landmark</span>
                  
                  </div>
                  <div class="col-sm" id="rightregg">
                  <input class="form-control" name="landmark" type="text" value="">
                  </div>
                  
                </div>
                    <div class="row mb-4">
                  <div class="col-sm-6" id="leftregg">
                    <label for="state"></label>
                     <span class="required">State</span>
                  </div>
                  <div class="col-sm" id="rightregg">
                    <select class="form-control" name="state" value="" required="required">
                      <option>Delhi</option>
                    </select>
                  </div>
                  
                </div>

                <div class="row mb-4">
                  <div class="col-sm-6" id="leftregg">
                    <label for="city"></label>
                     <span class="required">City</span>
                  </div>
                  <div class="col-sm" id="rightregg">
                <select class="form-control" name="city" value="" required="required">
                      <option>Delhi</option>

                    </select>
                  </div>
                </div>

                   <div class="row mb-4">
                  <div class="col-sm-6" id="leftregg">
                    <label for="pin"></label>
                     <span class="required">Pin Code</span>
                  </div>
                  <div class="col-sm" id="rightregg">
                  <input class="form-control" name="pin" type="text" value="201309" id="pinCode"  maxlength="6" minlength="6" onfocus="pinValidation()" required="required">
                  </div>  
                </div>

                 <div class="row mb-4">
                  <div class="col-sm-6" id="leftregg">
                    <label for="phone"></label>
                     <span class="required">Mobile</span>
                  
                  </div>
                  <div class="col-sm" id="rightregg">
                   <input class="input-mobile form-control" id="mobile" name="mobile" type="tel" value="8860283929" maxlength="10" minlength="10" style="color: #00A79D; font-weight: bold;" required="required">
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-sm-6" id="leftregg">
                    <label for="type"></label>
                     <span class="required">Add. Type</span>
                  
                  </div>
                  <div class="col-sm" id="rightregg" style="margin-top: 13px;padding-left: 17px;" required="required">
                    <input class="form-check-input" id="Home" type="radio" name="type">
                    <label class="form-check-label" id="type" for="Home">Home</label>
                    <input class="form-check-input" id="Office" type="radio" name="type">
                    <label class="form-check-label" for="Office" id="type">Office</label>
                    <input class="form-check-input" id="other" type="radio" name="type">
                    <label class="form-check-label" for="other" id="type">Other</label>
                  </div>
                  
                </div>
              
              </form>
            </div>
          </div>
        </div>
        <!-- row end-->
        <br>
      <p>Saved Address</p>
                 
        <div class="profile-wrapper-area pb-3">

          <div class="card bg-white">
             
            <div class="card-body d-flex align-items-center">

              <div class="row" style="width: 100%;">
                <div class="col-10">
                  <input class="form-check-input" id="radiobtn1" type="radio" name="address" style="position: absolute;">
             <label for="radiobtn1" id="addressRadio">
              <div class="user-info">
                <p class="mb-0"><strong style="color: #00A79D;">Priya Saraogi</strong></p>
                <p class="mb-0">Office No : 914, 9th Floor I-Thum Tower-A, Sector 62, Noida, Uttar Pradesh</p>
                <p>Mobile: <strong style="color: #00A79D;">8860283929</strong></p>
                <div id="checkboxDefault">
                 <input type="checkbox" id="make" name="make" value="default">
                <label for="make" id="defaultLabel"> Make Default</label>
              </div>
              </div>
               </label>
              <div id="buttons">
              <a href="#editAddress"><i class="lni lni-pencil"></i></a>
              <a><i class="lni lni-trash" style="color:red;"></i></a>
            </div>
            </div>
            <div class="col-2">
             <ul class="donate-now">
              <li>
                <input type="radio" id="default" name="address" />
                <label for="default">Default</label>
              </li> 
            </ul>
            </div>
            </div>

            </div>
         
          </div>          
        </div>
        <!-- profile area div end-->

        <div class="profile-wrapper-area pb-3">
          <div class="card bg-white">
             
            <div class="card-body d-flex align-items-center">
              <div class="row" style="width: 100%;">
                <div class="col-10">
                  <input class="form-check-input" id="radiobtn2" type="radio" name="address" style="position: absolute;">
             <label for="radiobtn2" id="addressRadio">
              <div class="user-info">
                <p class="mb-0"><strong style="color: #00A79D;">Priyam Saraogi</strong></p>
                <p class="mb-0">Office No : 914, 9th Floor I-Thum Tower-A, Sector 62, Noida, Uttar Pradesh</p>
                <p>Mobile: <strong style="color: #00A79D;">8860283929</strong></p>
               <div id="checkboxDefault">
                <input type="checkbox" id="make" name="make" value="default">
                <label for="make" id="defaultLabel"> Make Default</label>
              </div>
              </div>
               </label>
               <div id="buttons">
              <a href="#editAddress"><i class="lni lni-pencil"></i></a>
              <a><i class="lni lni-trash" style="color:red;"></i></a>
            </div>
            </div>
            <div class="col-2">
             <ul class="donate-now">
              <li>
                <input type="radio" id="home" name="address" />
                <label for="home">Home</label>
              </li> 
            </ul>
            </div>
            </div>
            </div>
          </div>          
        </div>
        <!-- div end-->

      </div>
    </div>


<script>

  var pincode = document.getElementById('pinCode').value;
   function pinValidation(pincode) {
  //called when key is pressed in textbox
  $("#pinCode").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
  
               return false;
    }
   })
 }
 </script>

@stop