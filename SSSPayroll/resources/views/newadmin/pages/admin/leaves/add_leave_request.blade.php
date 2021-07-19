@extends('newadmin.layouts.default')
@section('content')

<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Leave Request</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Leave Request</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">

            <!-- ADD LEAVE TYPE -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Leave Request</h4>
                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified"
                        style="border: 1px solid lightgrey;box-shadow: 1px 1px 6px #e3e1e1;">
                        <li class="nav-item"><a class="nav-link step disabled active" href="#" data-toggle="tab">STEP
                                1</a></li>
                        <li class="nav-item"><a class="nav-link step disabled" href="#" data-toggle="tab">STEP 2</a>
                        </li>
                        
                    </ul>
                    <form id="regForm" action="{{url('empleaverequest-view')}}" method="POST"
                        style="border: 1px solid lightgrey;box-shadow: 1px 1px 6px #e3e1e1;">
                        
                        <div class="tab-content">

                            <div class="tab-pane show active" id="solid-rounded-justified-tab1" style="margin: 10px;">
                                <h1 class="mb-4">Add Leave Request Details</h1>
                                <div class="row">
                                 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Date of Request</label>
                                             <input class="form-control" type="date" name="request_date">
                                        </div>
                                    </div>
                                       <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Employee Name <span class="text-danger">*</span></label>
                                            <!-- <input class="form-control" placeholder="Employee Name" type="text"
                                                name="empname"> -->
                                                <select class="employee form-control"
                                                name="employee[]" style="width:100%;"
                                                placeholder="Select Employee">
                                                
                                                <option value="name">Name</option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Leave Type</label>
                                            <select class="select form-control" name="type" required>
                                                <option value="unpaid">Unpaid</option>
                                                <option value="paid">Paid</option>
                                                <option value="casual">Casual</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                    <label class="col-form-label">Reason for Leave</label>
                                    <br>
                                     <textarea placeholder="reason for leave..." class="form-control"></textarea>
                                    </div>
                                </div>
                                </div>

                            </div>

                            <div class="tab-pane" id="solid-rounded-justified-tab2" style="margin: 10px;">
                                <h1 class="mb-4">Add Leave Request Details</h1>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                        	  <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                    <label class="col-form-label">Start Date</label>
                                                     <input class="form-control" type="date" name="start_date" id="strt_date" onchange="cal()">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                    <label class="col-form-label">End Date</label>
                                                    <input class="form-control" type="date" name="end_date" id="end_date" onchange="cal()">
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                    <label class="col-form-label">No. of days</label>
                                                   
                                                     <input class="form-control" style="border-top: 0;border-left: 0;border-right: 0;text-align: center;" type="text" id="request_days" name="request_days" required="" readonly="">
                                                    </div>
                                                </div>
                                                      <div class="col-lg-4">
                                                 <div class="form-group">
                                                 	 <label class="col-form-label">Leave Balance</label>
                                                   
                                                     <input class="form-control" style="border-top: 0;border-left: 0;border-right: 0;text-align: center;" type="text" id="leave_bal" name="leave_bal" required="" disabled="">
                                          
			                                        </div>
                                                </div>
                                                   <div class="col-lg-4">
                                                 <div class="form-group">
                                                     <label class="col-form-label">Duration</label>
                                                   
                                                    <select class="select form-control" name="duration" required>
                                                        <option value="1st half">1st half</option>
                                                        <option value="2nd half">2nd half</option>
                                                        <option value="full day">full day</option>
                                                        
                                                    </select>
                                          
                                                    </div>
                                                </div>
                                            </div>
                                           
                                       </div>
                                    </div>
                                  
                                </div>
                            </div>
                      
                            <div style="overflow:auto;margin:10px;">
                                <div style="float:right;">
                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /ADD LEAVE TYPE -->


</div>

<script type="text/javascript">
    function make_editable(id, input, select) {
        console.log($('#' + id).is(":checked"));
        if (($('#' + id).is(":checked")) == true) {
            document.getElementById(input).disabled = false;
            document.getElementById(select).disabled = false;
        } else {
            document.getElementById(input).disabled = true;
            document.getElementById(select).disabled = true;
        }
    }

             function GetDays(){
                var dropdt = new Date(document.getElementById("end_date").value);
                var pickdt = new Date(document.getElementById("strt_date").value);
                return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("end_date")){
            document.getElementById("request_days").value=GetDays();
        }  
    }
</script>
<!-- /Page Wrapper -->
@stop