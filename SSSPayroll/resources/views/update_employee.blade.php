@extends('include.header')

@section('content')
<style type="text/css">
    .input-container input {
    border: none;
    box-sizing: border-box;
    outline: 0;
    padding: .75rem;
    position: relative;
    width: 100%;
}

input[type="date"]::-webkit-calendar-picker-indicator {
    background: transparent;
    bottom: 0;
    color: transparent;
    cursor: pointer;
    height: auto;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    width: auto;
}
</style>
@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif
@foreach($emp as $key=>$value)
<form action="{{url('update_emp/'.$value->id)}}" method="POST">
    @csrf
  <div class="container">
    <h2>Update Employee</h2>
    <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
            <label for="name"><b>Employee Code</b></label>

            <input type="text" class="form-control" placeholder="Enter Employee Code" name="emp_code" id="emp_code" value="{{$value->emp_code}}" readonly>   

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="name"><b>Employee Name</b></label>
            <input type="text" class="form-control" placeholder="Enter Employee Name" name="emp_name" id="emp_name" value="{{$value->emp_name}}" required>                
            </div>
        </div>
         <div class="row">
            <div class="col-md-12">
            <label for="joinin_dt"><b>Joining Date</b></label>
            <input type="date" class="form-control" name="joining_dt" max="{{date('Y-m-d')}}" value="{{$value->joining_date}}" required>                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="dob"><b>Date Of Birth</b></label>
            <input type="date" class="form-control" name="dob" max="{{date('Y-m-d')}}" value="{{$value->dob}}" >                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="city"><b>Branch</b></label>
                <select class="form-control" name="branch" required>
                <option value="0" >Select Branch</option>
               @foreach($branch as $key1=>$value1)
              
                <option @if($value1->id == $value->bid){{'selected="selected"'}} @endif value="{{$value1->id}}" >{{$value1->name}}</option>
              
                @endforeach
            </select>
         </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <!-- <label for="city"><b>Designation</b>&nbsp;&nbsp;<i class="fa fa-plus-circle" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal"></i></label> -->
            <label for="city"><b>Designation</b>&nbsp;&nbsp;</label>

                <select class="form-control" name="desig" >
                <option value="" >Select Designation</option>
               @foreach($desg as $key=>$value1)
                <option value="{{$value1->name}}" @if($value1->name == $value->designation){{'selected="selected"'}} @endif>{{$value1->name}}</option>
                @endforeach
            </select>
         </div>
        </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <!-- <form action="javascript:;" onsubmit="add_desg()" method="POST"> -->
    <!-- @csrf -->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Designation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <label for="name">Designation Name</label>
                <input class="form-control" type="text" name="desg_name" id="desg" placeholder="Designation Name">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="add_desg()">Save changes</button>
      </div>
    </div>
  </div>
<!-- </form> -->
</div>
        <div class="row">
            <div class="col-md-12">
            <label for="state"><b>Department</b></label>
            <select class="form-control" name="dept" >
                <option value="">Select Department</option>
                @foreach($dept as $key=>$value1)
                <option value="{{$value1->name}}" @if($value1->name == $value->department){{'selected="selected"'}} @endif>{{$value1->name}}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="gender"><b>Gender</b></label>
                <select class="form-control" name="gender" >
                <option value="">Select Gender</option>
                <option value='M' @if($value->gender=='M'){{'selected="selected"'}} @endif>Male</option>
                <option value='F' @if($value->gender=='F'){{'selected="selected"'}} @endif>Female</option>
                <option value='T' @if($value->gender=='T'){{'selected="selected"'}} @endif>Transgender</option>
            </select>
         </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="gender"><b>Marital Status</b></label>
                <select class="form-control" name="marital_st" >
                <option value="">Select Marital Status</option>
                <option value='M' @if($value->marital_status=='M'){{'selected="selected"'}} @endif >Married</option>
                <option value='U' @if($value->marital_status=='U'){{'selected="selected"'}}@endif>Un-Married</option>
                <option value='D' @if($value->marital_status=='D'){{'selected="selected"'}}@endif>Divorced</option>
                <option value='W' @if($value->marital_status=='W'){{'selected="selected"'}}@endif>Widow</option>
            </select>
         </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="email"><b>Email- ID<i> (Primary)</i></b></label>
            <input type="email" class="form-control" placeholder="Enter Email" name="email_p" id="email" value="{{$value->email_p}}" >                
            </div>
        </div>
         <div class="row">
            <div class="col-md-12">
            <label for="email"><b>Email- ID<i> (Secondary)</i></b></label>
            <input type="email" class="form-control" placeholder="Enter Email" name="username" id="email" value="{{$value->username}}" >                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="pwd"><b>Password</b></label>
            <input type="text" class="form-control" placeholder="Enter Password" name="pwd" id="pwd" value="{{$value->password}}" >                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="tel"><b>Phone Number</b></label>
            <input type="number" onkeydown="javascript: return event.keyCode === 8 ||event.keyCode === 46 ? true : !isNaN(Number(event.key))"  class="form-control" placeholder="Enter Phone Number" name="ph_number" id="ph_number" value="{{$value->phone_number}}" >
            </div>
        </div>
         <div class="row">
            <div class="col-md-12">
            <label for="pan_no"><b>PAN NO</b></label>
            <input type="text" class="form-control" placeholder="Enter PAN No" name="pan_no" value="{{$value->pan_no}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="aadhar_no"><b>AADHAR NO</b></label>
            <input type="text" class="form-control" placeholder="Enter AADHAR No" name="aadhar_no" value="{{$value->aadhar_no}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="address"><b>Current Address</b></label>
            <textarea type="text" class="form-control" placeholder="Enter Current Address" name="current_add" value="{{$value->current_add}}" rows="2" id="current_add">{{$value->current_add}}</textarea>
            </div>
        </div>
         <div class="row">
            <div class="col-md-12">
            <input type="checkbox" onclick="copy();"><label for="same">&nbsp;&nbsp;Permanent Address Same as Current Address</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="address"><b>Permanent Address</b></label>
            <textarea type="text" class="form-control" placeholder="Enter Permanent Address" name="permanent_add" value="{{$value->permanent_add}}" id="permanent_add" rows="2">{{$value->permanent_add}}</textarea>
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
        
    </div>
  </div>

  
</form>
@endforeach
<script type="text/javascript">
     function copy()
    {
        document.getElementById('permanent_add').value=document.getElementById('current_add').value;
    }
</script>
@endsection
