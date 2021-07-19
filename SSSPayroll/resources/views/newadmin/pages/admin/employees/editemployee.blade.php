@extends('newadmin.layouts.default')
@section('content')

<!-- Page Content -->
<div class="content container-fluid">
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
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Edit Employees</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Employee</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">

            <!-- ADD SHIFT -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Employee</h4>
                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                        <li class="nav-item"><a class="nav-link step disabled active" href="#" data-toggle="tab">STEP 1</a></li>
                        <li class="nav-item"><a class="nav-link step disabled " href="#" data-toggle="tab">STEP 2</a></li>
                        <li class="nav-item"><a class="nav-link step disabled" href="#" data-toggle="tab">STEP 3</a></li>
                         <li class="nav-item"><a class="nav-link step disabled" href="#" data-toggle="tab">STEP 4</a></li>
                       
                    </ul>
                    <form id="regForm" action="{{url('/update_emp/'.request()->id)}}" method="POST">
                        @csrf
                        <div class="tab-content">
                            @foreach ($emp as $item=>$value)
                                
                            <!-- Circles which indicates the steps of the form: -->
                            <!-- <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                            </div> -->
                                 <div class="tab-pane show active" id="solid-rounded-justified-tab1">
                                <h1 class="mb-4">Edit Personal Details</h1>
                                <div class="row">
                                    <div class="col-sm-12">
                            <div class="profile-img-wrap edit-img">
                                <img class="inline-block" src="{{asset('public/imgnew/user.jpg')}}" alt="user">
                                <div class="fileupload btn">
                                    <span class="btn-text">add</span>
                                    <input class="upload" type="file">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Employee Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="Enter Employee Name"
                                    name="emp_name" id="emp_name" value="{{$value->emp_name}}" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender <span class="text-danger">*</span></label>
                                <select class="select" name="gender" required>
                                    <option value="" selected="" >Select Gender</option>
                                    <option value="M" @if ($value->gender=='M') selected='selected' @endif>Male</option>
                                    <option value="F" @if ($value->gender=='F') selected='selected' @endif>Female</option>
                                    <option value="T" @if ($value->gender=='T') selected='selected' @endif>Transgender</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Marital Status </label>
                                <select class="select" name="marital_st">
                                    <option value="">Select Marital Status</option>
                                    <option value="M" @if ($value->marital_status=='M') selected='selected' @endif>Married</option>
                                    <option value="U" @if ($value->marital_status=='U') selected='selected' @endif>Un-Married</option>
                                    <option value="D" @if ($value->marital_status=='D') selected='selected' @endif>Divorced</option>
                                    <option value="W" @if ($value->marital_status=='W') selected='selected' @endif>Widow</option>
                                </select>
                            </div>
                        </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Date Of Birth <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="dob" value="{{$value->dob}}" required="">
                            </div>
                        </div>
                           
                            </div>
                            <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Email</label>
                                <input class="form-control" type="email" placeholder="Enter Email" name="email_p"
                                    id="email" value="{{$value->email_p}}">
                            </div>
                        </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Phone Number </label>
                                <input class="form-control" type="text" name="ph_number" maxlength="10" minlength="10"
                                    placeholder="Enter Phone Number" value="{{$value->phone_number}}">
                            </div>
                        </div>
                           
                            </div>
                                <div class="row">
                                  <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Alternate Phone Number </label>
                                <input class="form-control" type="text" name="alt_phone_no" maxlength="10" minlength="10"
                                    placeholder="Enter Phone Number" value="{{$value->alt_phone_number}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">PAN Number </label>
                                <input class="form-control" type="text" placeholder="Enter PAN No" name="pan_no"
                                    maxlength="10" minlength="10" value="{{$value->pan_no}}">
                            </div>
                        </div>                           
                            </div>
                                <div class="row">
                                    <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Aadhar Number </label>
                                <input class="form-control" type="text" placeholder="Enter AADHAR No" name="aadhar_no"
                                    maxlength="12" minlength="12" value="{{$value->aadhar_no}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Current Address </label>
                                <textarea type="text" class="form-control" placeholder="Enter Current Address"
                                    name="current_add" id="current_add" rows="2">{{$value->current_add}}</textarea><br>
                                   
                            </div>
                        </div>
                         </div>
                            <div class="row">
                                <div class="col-sm-6">
                             <div class="form-group">
                                <label class="col-form-label">Permanent Address </label>
                                <textarea type="text" class="form-control" placeholder="Enter Permanent Address"
                                    name="permanent_add" id="permanent_add" rows="2"> {{$value->permanent_add}}</textarea>
                                         <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="same_add" onclick="copy();">
                                        <label class="custom-control-label" for="same_add">Permanent Address Same as Current Address</label>
                                    </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Username </label>
                                <input class="form-control" type="text" placeholder="Enter Username" name="username" value="{{$value->username}}">
                            </div>
                        </div>
                     <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <input class="form-control" type="password" placeholder="Enter Password" name="pwd"
                                    id="pwd" value="{{$value->password}}">
                               Show Password
                                <input type="checkbox" onclick="myFunction()">
                            </div>
                        </div>
                        </div>
                    </div>

                            <div class="tab-pane" id="solid-rounded-justified-tab2">
                                <h1 class="mb-4">Edit Professional Details</h1>
                                <div class="row">
                                    <div class="col-sm-6">
                                  <label>Designation <span class="text-danger">*</span></label>
                                <select class="select" name="desig" required>
                                    <option value="">Select Designation</option>
                                    @foreach ($dept as $item=>$data)
                                    <option value="{{$data->id}}" @if ($data->id==$value->dept_id) selected="selected" @endif> {{$data->name}}</option>                                        
                                    @endforeach
                                 

                                </select>
                                        </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                           <label>Department <span class="text-danger">*</span></label>
                                <select class="select" name="dept" required>
                                    <option value="">Select Department</option>
                                    @foreach ($dept as $item=>$data)
                                    <option value="{{$data->id}}" @if ($data->id==$value->dept_id) selected="selected" @endif>{{$data->name}} ( {{$data->b_name}} )</option>                                        
                                    @endforeach
                                   
                                </select>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                <div class="col-md-6">
                            <div class="form-group">
                                <label>Branch <span class="text-danger">*</span></label>
                                <select class="select" name="branch" required>
                                    <option value="">Select Branch</option>
                                    @foreach ($branch as $item=>$data)
                                    <option value="{{$data->id}}" @if ($data->id==$value->bid) selected="selected" @endif>{{$data->name}}</option>                                        
                                    @endforeach
                                  
                                </select>
                                    </div>
                                </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Reporting Manager <span class="text-danger">*</span></label>
                                   <select class="select" name="report_to" required>
                                        <option value="">Select Employee</option>
                                        @foreach ($emp_report as $item=>$data)
                                        <option value="{{$data->id}}" @if ($data->id==$value->reporting_manager) selected="selected" @endif>{{$data->emp_name}}</option>                                        
                                        @endforeach    
    
                                    </select>
                                        </div>
                                    </div>
                                 
                                </div>
                                <div class="row">
                                       <div class="col-sm-6">
                                        <div class="form-group">
                                           <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="joining_dt" onkeypress="return false;"
                                    required="" value="{{$value->joining_date}}">
                                        </div>
                                    </div>
                                            <div class="col-sm-6">
                                        <div class="form-group">
                                           <label class="col-form-label">Probation Confirmation Date <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="probation_dt" onkeypress="return false;"
                                    required="" value="{{$value->probation_dt}}">
                                        </div>
                                    </div>
                              </div>
                              <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                           <label class="col-form-label">Confirmation Date <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="cnfrm_dt" onkeypress="return false;"
                                    required="" value="{{$value->confirmation_dt}}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">CTC <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="ctc" required="" value="{{$value->CTC}}">
                                        </div>
                                    </div>
                                    
                                </div>
                                   <div class="row">
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                           <label class="col-form-label">Working Plan <span class="text-danger">*</span></label>
                                  <select class="select" name="working_plan" required>
                                    <option value="">Select Working Plan</option>
                                    @foreach ($working_day as $item=>$data)
                                        <option value="{{$data->id}}" @if ($data->id==$value->working_plan)
                                            selected="selected"
                                        @endif>{{$data->name}}</option>
                                    @endforeach
                                   
                                </select>
                                        </div>
                                    </div>
                                     
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="solid-rounded-justified-tab3">
                                <h1 class="mb-4">Edit Banking Details</h1>
                           <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Bank Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Bank Name" name="bank_name" value="{{$value->bank_name}}" required="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Account Holder Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Account Holder Name"
                                        name="account_holder_name" required="" value="{{$value->emp_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Account Number <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" placeholder="Enter Account Number"
                                        name="account_no" value="{{$value->account_no}}" required="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">IFSC Code <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter IFSC Code"
                                        name="ifsc_code" value="{{$value->ifsc_code}}" required="">
                                </div>
                            </div>
                             </div>

                            </div>
                       <div class="tab-pane" id="solid-rounded-justified-tab4">
                                <h1 class="mb-4">Add PF/ESI/PT</h1>
                                <div class="row">
                                    <div class="col-sm-6">
                                   <label class="col-form-label">PF Enabled</label>
                                    
                                <div class="leave-inline-form" style="align-items: center;display: flex;min-height: 44px;margin-right: 45%;">
                                    <div class="form-check form-check-inline" style="display: contents;">
                                        
                                            <input class="form-check-input" type="radio"
                                                name="pf_status" id="pf_yes" value="Yes" @if ($value->pf_enabled=='Yes') checked="checked" @endif>
                                                <label class="form-check-label" for="pf_yes" style="margin-right: 14%;font-size: 14px;">  Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="display: contents;">
                                      
                                            <input class="form-check-input" type="radio"
                                                name="pf_status" id="pf_no" value="No" @if ($value->pf_enabled=='No') checked="checked" @endif>
                                                <label class="form-check-label" for="pf_no" style="margin-right: 14%;font-size: 14px;"> No</label>
                                    </div>
                                </div>
                                </div>
                                   <div class="col-sm-6">
                                   <label class="col-form-label">Employee PF Number <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" placeholder="Enter PF Number"
                                        name="pf_num" required="" value="{{$value->pf_number}}">
                                </div>

                                </div>
                                 <div class="row">
                                    <div class="col-sm-6">
                                   <label class="col-form-label">Employer PF Enabled</label>
                                        <div class="leave-inline-form" style="align-items: center;display: flex;min-height: 44px;margin-right: 45%;">
                                            <div class="form-check form-check-inline" style="display: contents;">
                                                <input class="form-check-input" type="radio" name="emppf_status" id="emppf_yes" value="yes" @if ($value->emp_pf_enabled=='Yes') checked="checked" @endif>
                                            <label class="form-check-label" for="emppf_yes" style="margin-right: 14%;font-size: 14px;">  Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline" style="display: contents;">
                                             <input class="form-check-input" type="radio" name="emppf_status" id="emppf_no" value="No" @if ($value->emp_pf_enabled=='No') checked="checked" @endif>
                                               <label class="form-check-label" for="emppf_no" style="margin-right: 14%;font-size: 14px;"> No</label>
                                            </div>
                                        </div>
                                </div>
                                   <div class="col-sm-6">
                                   <label class="col-form-label">Employee UAN Number <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" placeholder="Enter UAN Number"
                                        name="uan_num" required="" value="{{$value->uan_number}}">
                                </div>

                                </div>
                                      <div class="row">
                                    <div class="col-sm-6">
                                   <label class="col-form-label">ESI Enabled</label>
                                    
                                        <div class="leave-inline-form" style="align-items: center;display: flex;min-height: 44px;margin-right: 45%;">
                                            <div class="form-check form-check-inline" style="display: contents;">
                                             <input class="form-check-input" type="radio" name="esi_status" id="esi_yes" value="Yes" @if ($value->esi_enabled=='Yes') checked="checked" @endif>
                                                 <label class="form-check-label" for="esi_yes" style="margin-right: 14%;font-size: 14px;">  Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline" style="display: contents;">
                                               <input class="form-check-input" type="radio" name="esi_status" id="esi_no" value="No" @if ($value->esi_enabled=='No') checked="checked" @endif>
                                                  <label class="form-check-label" for="esi_no" style="margin-right: 14%;font-size: 14px;"> No</label>
                                            </div>
                                        </div>
                                </div>
                                   <div class="col-sm-6">
                                   <label class="col-form-label">ESI Number <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" placeholder="Enter ESI Number"
                                        name="esi_num" required="" value="{{$value->esi_number}}">
                                </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                   <label class="col-form-label">Professional Tax Enabled</label>
                                    
                                        <div class="leave-inline-form" style="align-items: center;display: flex;min-height: 44px;margin-right: 45%;">
                                            <div class="form-check form-check-inline" style="display: contents;">
                                             <input class="form-check-input" type="radio" name="tax_status" id="tax_yes" value="Yes" @if ($value->p_tax_enabled=='Yes') checked="checked" @endif>
                                                 <label class="form-check-label" for="tax_yes" style="margin-right: 14%;font-size: 14px;">  Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline" style="display: contents;">
                                               <input class="form-check-input" type="radio" name="tax_status" id="tax_no" value="No" @if ($value->p_tax_enabled=='No') checked="checked" @endif>
                                                  <label class="form-check-label" for="tax_no" style="margin-right: 14%;font-size: 14px;"> No</label>
                                            </div>
                                        </div>
                                </div>

                                </div>
                            </div>
                            @endforeach
                            </div>

                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                </div>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /ADD LEAVE TYPE -->


</div>

<!-- /Page Content -->


<script>
function copy() {
        document.getElementById('permanent_add').value = document.getElementById('current_add').value;
    }
</script>



<!-- /Page Wrapper -->
@stop

