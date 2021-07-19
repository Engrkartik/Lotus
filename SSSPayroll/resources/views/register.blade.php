@extends('include.layout')

@section('content')
<form action="createsubmit" method="POST" class="myform">
    @csrf
  <div class="container">
    <h2>Register</h2>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
            <label for="name"><b>Company Name</b></label>
            <input type="text" class="form-control" placeholder="Enter Company Name" name="c_name" id="c_name" required>                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="email"><b>Email- ID</b></label>
            <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email" required>                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="pwd"><b>Password</b></label>
            <input type="pwd" class="form-control" placeholder="Enter Password" name="pwd" id="pwd" required>                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="tel"><b>Phone Number</b></label>
            <input type="number" class="form-control" placeholder="Enter Phone Number" name="ph_number" id="ph_number" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="address"><b>Address</b></label>
            <textarea type="text" class="form-control" placeholder="Enter Address" name="address" id="address" rows="2"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="state"><b>State</b></label>
            <input type="text" class="form-control" placeholder="Enter State" name="state" id="state">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="city"><b>City</b></label>
            <input type="text" class="form-control" placeholder="Enter City" name="city" id="city">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="pin_code"><b>Pin Code</b></label>
            <input type="number" class="form-control" placeholder="Enter Pin-Code" name="pin_code" id="pin_code">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
            <label class="col-md-1"></label>
            <button type="submit" class="btn btn-primary col-md-5">Submit</button>
            <!-- <label class="col-md-1"></label> -->
            <button type="reset" class="btn btn-secondary col-md-5">Clear</button>
            </div>
        </div>
        <div class="row">
            <div class="container signin col-md-12" style="align-items: center;">
            <p>Already have an account? <a href="login">Sign in</a>.</p>
          </div>
        </div>
    </div>
  </div>

  
</form>
@endsection
