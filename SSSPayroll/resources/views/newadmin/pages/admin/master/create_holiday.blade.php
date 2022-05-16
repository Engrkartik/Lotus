@extends('newadmin.layouts.default')
@section('content')

<!-- Page Content -->
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-12 offset-md-12">
        <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Leave And Holidays</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://34.72.9.224/SSSPayroll/home">Dashboard</a></li>
                    <li class="breadcrumb-item active">Holiday</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row filter-row" style="padding-top: 16px;">
        <div class="col-sm-6 col-md-6">  
            <div class="form-group form-focus">
                <h4>Create Holiday</h4>
            </div>
        </div>
   <div class="col-auto float-right ml-auto">
       <button form="holiday" class="btn btn-info map w-100" style="margin-left: 19px;" type="submit">Save</button>
    </div>
    </div>
            <form id="holiday" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label> Company Group<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" required="required" placeholder="Lotus" disabled="disable">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Company <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" require disabled>
                    <option value="">Lotus </option>
                    </select>
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Holiday Name<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" required="required" placeholder="Leave Bonus">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Holiday From<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="date" required="required" min="2000-01-01" max="2099-12-31" value="2021-10-20">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Holiday To<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="date" required="required" min="2000-01-01" max="2099-12-31" value="2021-10-20">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>If Present <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required" >
                    <option value="2Day">Pay 2 Day salary</option>
                    <option value="1Day">Pay 1 Day Salary</option>
                    <option value="1leave">1 Day Salary + Leave</option>
                    <option value="2Leave">2 Day Salary + Leave</option>
                    <option value="noBenefit">No Benefit</option>
                    </select>
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Applicable To<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required" id="employee">
                    <option value="all">All Employees</option>
                    <option value="selectEmployee">Select Employees</option>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Status</label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    </select>
                    </div>
                   </div>
                </div>
                <div  id="groupEmployees" style="display:none;">
                <h5>Group Employees – selection in 1 is Mandatory </h5>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Religion</label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control">
                    <option value="">select Religion </option>
                    <option value="hindu">Hindu</option>
                    <option value="muslim">Muslim</option>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Location</label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control">
                    <option value="">select Location </option>
                    <option value="noida">Noida</option>
                    <option value="delhi">Delhi</option>
                    </select>
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Department</label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control">
                    <option value="">select Department </option>
                    <option value="admin">Admin</option>
                    <option value="hr">HR</option>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>State</label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control">
                    <option value="">select State </option>
                    <option value="delhi">Delhi</option>
                    <option value="up">Up</option>
                    </select>
                    </div>
                   </div>
                </div>
            </div>
               </div>

            </form>
    </div>
</div>
<!-- /Page Content -->


<script>  
$(document).ready(function(){
    $('#employee').on('change', function() {
      if ( this.value == 'selectEmployee')
      {
        $("#groupEmployees").show();
      }
      else
      {
        $("#groupEmployees").hide();
      }
    });
});
</script>
@stop