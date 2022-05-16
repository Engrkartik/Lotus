@extends('newadmin.layouts.default')
@section('content')

<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Add Outdoor Manual Entry</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Outdoor Manual Entry</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">

            <!-- APPLY LEAVE TYPE -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Outdoor Manual Entry</h4>
                  <!--   <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified"
                        style="border: 1px solid lightgrey;box-shadow: 1px 1px 6px #e3e1e1;">
                        <li class="nav-item"><a class="nav-link step disabled active" href="#" data-toggle="tab">STEP
                                1</a></li>
                        
                        
                    </ul> -->
                    <form id="regForm" action="{{url('manual-leave')}}" method="POST"
                        style="border: 1px solid lightgrey;box-shadow: 1px 1px 6px #e3e1e1;">
                        
                        <div class="tab-content">

                            <div class="tab-pane show active" id="solid-rounded-justified-tab1" style="margin: 10px;">
                                <h1 class="mb-4">Add Outdoor Manual Entry</h1>
                                    <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Select Employee</label>
                                                 <select class="select form-control" name="employee" placeholder="Select Employee"  required="required">
                                               <option value="Alka">Alka</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                    <label class="col-form-label">Outdoor Type</label>
                                    <select class="select form-control" name="type" required>
                                       <option>Official</option>
                                       <option>Personal</option>
                                       <option>Out Of Station</option>
                                                
                                    </select>
                                    </div>
                                </div>
                                </div>
                                     <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label class="col-form-label">From Date</label>
                                         <input class="form-control" type="date" name="to_date" id="from_date" onchange="cal()" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label class="col-form-label">To Date</label>
                                        <input class="form-control" type="date" name="to_date" id="to_date" onchange="cal()" required="required">
                                        </div>
                                    </div>
                                 
                                </div>
                                <div class="row">
                                  
                                      <div class="col-lg-6">
                                     <div class="form-group">
                                         <label class="col-form-label">Begin Time</label>
                                       <input class="form-control" style="border-top: 0;border-left: 0;border-right: 0;text-align: center;" type="time" id="begin_time" name="begin_time">
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                    <div class="form-group">
                                     <label class="col-form-label">End Time</label>
                                       <input class="form-control" style="border-top: 0;border-left: 0;border-right: 0;text-align: center;" type="time" id="end_time" name="end_time">
                                    </div>
                                    </div>
                                    
                                </div>
                                      <div class="row">
                                  
                                      <div class="col-lg-6">
                                     <div class="form-group">
                                         <label class="col-form-label">Remarks</label>
                                       <textarea id="remarks" placeholder="Add Remarks Here..." class="form-control"></textarea>
                                     </div>
                                    </div>
                                
                                    
                                </div>
                                 </div>

                          <!--   <div class="tab-pane" id="solid-rounded-justified-tab2" style="margin: 10px;">
                                <h1 class="mb-4">Apply For Leaves</h1>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="row">
                                 
                                            
                                           
                                           <div class="col-lg-6">
                                           <div class="form-group">
                                            <label class="col-form-label">Report To</label>
                                            <select class="select form-control" name="manager" required>
                                                <option value="manager1">manager1</option>
                                                <option value="manager2">manager2</option>
 
                                            </select>
                                            </div>
                                            </div>
                                         </div>
                                            <div class="row">
                                                
                                                  <div class="col-lg-4">
                                                 <div class="form-group">
                                                     <label class="col-form-label">Status</label>
                                                   <br>
                                                     <span class="badge bg-inverse-danger" style="font-size:29px;">Pending</span>

                                          
                                                    </div>
                                                </div>
                                                 
                                                     <div class="col-lg-4">
                                                 <div class="form-group">
                                                     <label class="col-form-label">Leaves Balance</label>
                                                   <input class="form-control" style="border-top: 0;border-left: 0;border-right: 0;text-align: center;" type="text" id="leave_bal" name="leave_bal" required="" readonly="">
                                          
                                                    </div>
                                                </div>
                                            </div>
                                           
                                       </div>
                                    </div>
                                  
                                </div>
                            </div> -->
                      
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
    <!-- /APPLY LEAVE TYPE -->


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
                var dropdt = new Date(document.getElementById("to_date").value);
                var pickdt = new Date(document.getElementById("from_date").value);
                return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("to_date")){
            document.getElementById("request_days").value=GetDays();
        }  
    }
</script>
<!-- /Page Wrapper -->
@stop