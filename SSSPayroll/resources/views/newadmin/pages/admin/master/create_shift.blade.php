@extends('newadmin.layouts.default')
@section('content')

<!-- Page Content -->
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-12 offset-md-12">
        <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Shift</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://34.72.9.224/SSSPayroll/home">Dashboard</a></li>
                    <li class="breadcrumb-item active">Create Shift</li>
                </ul>
            </div>
        </div>
    </div>
   
    <div class="row filter-row" style="padding-top: 16px;"> 
        <div class="col-sm-6 col-md-6">  
            <div class="form-group form-focus">
           <h4>Create Shift</h4> 
            </div>
        </div>
   <div class="col-auto float-right ml-auto">
       <button form="company" class="btn btn-info map w-100" style="margin-left: 19px;" type="submit">Save</button>
    </div>
    </div>
            <form id="company" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label> Company Group</label>
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
                    <input class="form-control" type="text" required="required" placeholder="Lotus" disabled="disable">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Location<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="">Select </option>
                    <option value="delhi">Delhi </option>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Department<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="">Select </option>
                    <option value="admin">Admin</option>
                    </select>
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Shift Name <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter Shift Name" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Shift Type <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="fixed">Fixed</option>
                    <option value="flexible">Flexible</option>
                    </select>
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Shift Code<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" required="required" placeholder="S0001" disabled="disable">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Night Shift</label>
                    </div>
                    </div>
                    <div class="col-sm-1" id="labelCol1">
                    <div class="form-group">
                    <input type="checkbox" id="1" name="1">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>OT</label>
                    </div>
                    </div>
                    <div class="col-sm-1" id="labelCol1">
                    <div class="form-group">
                    <input type="checkbox" id="1" name="1">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Punch In Time <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input type="time" name="inTime" class="form-control" value="13:50" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Punch Out Time <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input type="time" name="outTime" class="form-control" value="13:50" required="required">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Working Hours <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input type="time" name="workingHours" class="form-control" value="13:50" disabled  required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Half Day Min. Hours <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input type="time" name="halfTime" class="form-control" value="13:50" required="required">
                    </div>
                   </div>
                </div>

            </form>
            <br>

       <div class="row filter-row" style="padding-top: 16px;"> 
        <div class="col-sm-6 col-md-6">  
            <div class="form-group form-focus">
           <h4>Week Off's</h4> 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2" id="labelCol1">
        <div class="form-group">
        <label>Week Off Type<span class="text-danger">*</span></label>
        </div>
        </div>
        <div class="col-sm-4">
        <div class="form-group">
        <select class="form-control" required="required" id="shiftCount">
        <option value="fullDay">Full Day </option>
        <option value="fullHalf">Both Full And Half Day </option>
        </select>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
    <div class="table-responsive" id="weeks">
        <table class="table table-hover table-border">
            <thead style="transition: top 0.3s ease 0s !important; left: 570px;" class="TB_fxd">
                <tr style="height: 50px;">
                    <th>
                        <div>
                            <h6>Week off's<span class="text-danger">*</span></h6>
                        </div>
                    </th>
                    <th>
                        <div>
                            <h6>Monday</h6>
                        </div>
                    </th>                                   
                    <th>
                        <h6>Tuesday</h6>
                        </th>
                    <th>
                    <h6>Wednesday</h6>
                        </th>
    
                    <th>
                    <h6>Thursday</h6>
                        </th>
   
                    <th>
                    <h6>Friday</h6>
                        </th>
    
                    <th>
                    <h6>Saturday</h6>
                        </th>
   
                    <th>
                    <h6>Sunday</h6>
                        </th>
                    </tr>
            </thead>
            <tbody>
            <tr>
                <td>Week 1</td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" onclick="" data-toggle="modal" data-target="#add_halfDay"></td>
            </tr>
            <tr>
                <td>Week 2</td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
            </tr>
            <tr>
                <td>Week 3</td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
            </tr>
            <tr>
                <td>Week 4</td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
            </tr>
            <tr>
                <td>Week 5</td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
<br>
<div class="row filter-row" style="padding-top: 16px;">
        <div class="col-sm-6 col-md-6">  
            <div class="form-group form-focus">
                <h4>Create Shift >> Shift Rules</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background-color:#f1f1f1;">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified"
                        style="border: 1px solid lightgrey;box-shadow: 1px 1px 6px #e3e1e1;">
                        <li class="nav-item"><a class="nav-link step disabled active" href="#" data-toggle="tab">Grace Time</a></li>
                        <li class="nav-item"><a class="nav-link step disabled" href="#" data-toggle="tab">Breaks</a></li>
                        <li class="nav-item"><a class="nav-link step disabled" href="#" data-toggle="tab">OT</a></li>
                        <li class="nav-item"><a class="nav-link step disabled" href="#" data-toggle="tab">Half Day</a></li>
                        <li class="nav-item"><a class="nav-link step disabled" href="#" data-toggle="tab">1/4th Day</a></li>
                    </ul>
                    <form id="regForm" action="" method="POST" style="background-color:#f1f1f1;width:100%;">
                        @csrf
                        <div class="tab-content">

                            <div class="tab-pane show active" id="solid-rounded-justified-tab1">
                             <div class="row">
                                <div class="col-sm-3">
                                <div class="form-group">
                                <label>Allowed Grace In Time <span class="text-danger">*</span></label>
                                </div>
                                </div>
                                <div class="col-sm-3">
                                <div class="form-group">
                                <select class="form-control" required="required">
                                <option value="">Select No. of Instances </option>
                                <option value="1">1 </option>
                                <option value="2">2 </option>
                                <option value="3">3 </option>
                                <option value="4">4 </option>
                                <option value="5">5 </option>
                                <option value="6">6 </option>
                                </select>
                                </div>
                                </div>
                                <div class="col-sm-2" style="text-align:center;">
                                <div class="form-group">
                                <label>Grace In Time <span class="text-danger">*</span></label>
                                </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="form-group">
                                <input type="time" name="graceIn" class="form-control" value="13:52" required="required">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                <div class="form-group">
                                <label>Allowed Grace Out Time <span class="text-danger">*</span></label>
                                </div>
                                </div>
                                <div class="col-sm-3">
                                <div class="form-group">
                                <select class="form-control" required="required">
                                <option value="">Select No. of Instances </option>
                                <option value="1">1 </option>
                                <option value="2">2 </option>
                                <option value="3">3 </option>
                                <option value="4">4 </option>
                                <option value="5">5 </option>
                                <option value="6">6 </option>
                                </select>
                                </div>
                                </div>
                                <div class="col-sm-2" style="text-align:center;">
                                <div class="form-group">
                                <label>Grace Out Time <span class="text-danger">*</span></label>
                                </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="form-group">
                                <input type="time" name="graceOut" class="form-control" value="13:51" required="required">
                                </div>
                              </div>
                            </div>
                           <div class="row">
                                <div class="col-sm-3">
                                <div class="form-group">
                                <label>Allowed 1/4th Time <span class="text-danger">*</span></label>
                                </div>
                                </div>
                                <div class="col-sm-3">
                                <div class="form-group">
                                <select class="form-control" required="required">
                                <option value="">Select No. of Instances </option>
                                <option value="1">1 </option>
                                <option value="2">2 </option>
                                <option value="3">3 </option>
                                <option value="4">4 </option>
                                <option value="5">5 </option>
                                <option value="6">6 </option>
                                </select>
                                </div>
                                </div>
                                <div class="col-sm-2" style="text-align:center;">
                                <div class="form-group">
                                <label>Time For 1/4th<span class="text-danger">*</span></label>
                                </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="form-group">
                                <input type="time" name="quarter" class="form-control" value="13:40" required="required">
                                </div>
                              </div>
                            </div>
                        </div>

                         <div class="tab-pane" id="solid-rounded-justified-tab2">
                             <div class="row">
                                <div class="col-sm-2">
                                <div class="form-group">
                                <label>Buffer In Lunch Time</label>
                                <input style="width:39%;" type="checkbox" id="1" name="1">
                                </div>
                                </div>
                               
                                <div class="col-sm-2">
                                <div class="form-group">
                                <input type="time" name="graceOut" class="form-control" value="13:51">
                                </div>
                                </div>
                                <div class="col-sm-2">
                                <div class="form-group">
                                <label>Buffer In Other Breaks</label>
                                <input style="width:39%;" type="checkbox" id="1" name="1">
                                </div>
                              </div>
                             
                                <div class="col-sm-2">
                                <div class="form-group">
                                <input type="time" name="graceOut" class="form-control" value="13:51">
                                </div>
                                </div>
                                <div class="col-sm-1">
                                <div class="form-group">
                                <label>If Exceeds <span class="text-danger">*</span></label>
                                </div>
                              </div>
                              <div class="col-sm-3">
                                <div class="form-group">
                                <select class="form-control" required="required">
                                <option value="">Adjust From Other Breaks </option>
                                <option value="1">1 </option>
                                </select>
                                </div>
                                </div>
                                <div class="col-sm-3">
                                <div class="form-group">
                                <label>If Total Time Exceeds & is less than Set Half Day Hours<span class="text-danger">*</span></label>
                                </div>
                                </div>
                                <div class="col-sm-2">
                                <div class="form-group">
                                <select class="form-control" required="required">
                                <option value="2">Mark Half Day </option>
                                <option value="1">Mark Full Day</option>
                                </select>
                                </div>
                                </div>
                                <div class="col-sm-3">
                                <div class="form-group">
                                <label>If Total Time Exceeds & is more than Set Half Day Hours <span class="text-danger">*</span></label>
                                </div>
                                </div>
                                <div class="col-sm-2">
                                <div class="form-group">
                                <select class="form-control" required="required">
                                <option value="2">Mark Absent</option>
                                <option value="1">option2</option>
                                </select>
                                </div>
                                </div>
                                 
                             </div>  
                         </div>
                            <div class="tab-pane" id="solid-rounded-justified-tab2">
                             <div class="row">
                                <div class="col-sm-2">
                                <div class="form-group">
                                <label>Min. Hours for Eligibility </label>
                                <input style="width:23%;" type="checkbox" id="1" name="1">
                                </div>
                                </div>
                               
                                <div class="col-sm-1">
                                <div class="form-group">
                                <input type="time" name="graceOut" class="form-control" value="13:51">
                                </div>
                                </div>
                                <div class="col-sm-1">
                                <div class="form-group">
                                <label>Max. Hours </label>
                                <input style="width:27%;" type="checkbox" id="1" name="1">
                                </div>
                              </div>
                             
                                <div class="col-sm-1">
                                <div class="form-group">
                                <input type="time" name="graceOut" class="form-control" value="13:51">
                                </div>
                                </div>
                                <div class="col-sm-2">
                                <div class="form-group">
                                <label>Consider Breaks</label>
                                <input style="width:39%;" type="checkbox" id="1" name="1">
                                </div>
                              </div>
                              <div class="col-sm-2">
                                <div class="form-group">
                                <label>Set Break Intervals<span class="text-danger">*</span></label>
                                </div>
                              </div>
                              <div class="col-sm-1">
                                <div class="form-group">
                                <input type="time" name="graceOut" class="form-control" value="13:51">
                                </div>
                                </div>
                             </div>
                            <div class="row">
                              <div class="col-sm-1">
                                <div class="form-group">
                                <label>Break Duration<span class="text-danger">*</span></label>
                                </div>
                              </div>
                              <div class="col-sm-1">
                                <div class="form-group">
                                <input type="time" name="graceOut" class="form-control" value="13:51" required="required">
                                </div>
                                </div>
                                <div class="col-sm-3">
                                <div class="form-group">
                                <label>If Total Time Exceeds & is less than Set Half Day Hours<span class="text-danger">*</span></label>
                                </div>
                                </div>
                                <div class="col-sm-2">
                                <div class="form-group">
                                <select class="form-control" required="required">
                                <option value="2">Do Not Consider OT</option>
                                <option value="1">Option 2</option>
                                </select>
                                </div>
                                </div>
                                <div class="col-sm-3">
                                <div class="form-group">
                                <label>If Total Time Exceeds & is more than Set Half Day Hours <span class="text-danger">*</span></label>
                                </div>
                                </div>
                                <div class="col-sm-2">
                                <div class="form-group">
                                <select class="form-control" required="required">
                                <option value="2">Do Not Consider OT</option>
                                <option value="1">option 2</option>
                                </select>
                                </div>
                                </div>
                                 
                             </div>  
                            </div>

                            <div class="tab-pane" id="solid-rounded-justified-tab2">
                             <div class="row">
                                <div class="col-sm-2">
                                <div class="form-group">
                                <label>Min. Hours for Eligibility<span class="text-danger">*</span></label>
                                <input style="width:23%;" type="checkbox" id="1" name="1">
                                </div>
                                </div>
                               
                                <div class="col-sm-1">
                                <div class="form-group">
                                <input type="time" name="graceOut" class="form-control" value="13:51">
                                </div>
                                </div>
                                <div class="col-sm-2">
                                <div class="form-group">
                                <label>Consider Breaks</label>
                                <input style="width:27%;" type="checkbox" id="1" name="1">
                                </div>
                              </div>
                                <div class="col-sm-3">
                                <div class="form-group">
                                <label>Consider Lunch Break<span class="text-danger">*</span></label>
                                <input style="width:39%;" type="checkbox" id="1" name="1">
                                </div>
                                </div>
                                <div class="col-sm-2">
                                <div class="form-group">
                                <label>Consider Short Break<span class="text-danger">*</span></label>
                                <input style="width:39%;" type="checkbox" id="1" name="1">
                                </div>
                              </div>
                             </div>
                            <div class="row">
                                <div class="col-sm-3">
                                <div class="form-group">
                                <label>If Total Time less than Set Half Day Hours <span class="text-danger">*</span></label>
                                </div>
                                </div>
                                <div class="col-sm-2">
                                <div class="form-group">
                                <select class="form-control" required="required">
                                <option value="2">Mark Absent</option>
                                <option value="1">Option 2</option>
                                </select>
                                </div>
                                </div>
                                <div class="col-sm-1">
                                <div class="form-group">
                                <input style="width:39%;" type="checkbox" id="1" name="1">
                                </div>
                              </div>
                                <div class="col-sm-2">
                                <div class="form-group">
                                <label>Rectification Allowed</label>
                                <input style="width:39%;" type="checkbox" id="1" name="1">
                                </div>
                                </div>
                                <div class="col-sm-2">
                                <div class="form-group">
                                <label>Short Leave Allowed</label>
                                <input style="width:39%;" type="checkbox" id="1" name="1">
                                </div>
                                </div>
                             </div>
                            </div>
                            
                            <div class="tab-pane" id="solid-rounded-justified-tab2">
                            <div class="row">
                                <div class="col-sm-2">
                                <div class="form-group">
                                <label>Min. Hours(+)<span class="text-danger">*</span></label>
                                <input style="width:23%;" type="checkbox" id="1" name="1">
                                </div>
                                </div>
                                <div class="col-sm-1">
                                <div class="form-group">
                                <input type="time" name="graceOut" class="form-control" value="13:51">
                                </div>
                                </div>
                                <div class="col-sm-2">
                                <div class="form-group">
                                <label>Consider Breaks</label>
                                <input style="width:27%;" type="checkbox" id="1" name="1">
                                </div>
                              </div>
                                <div class="col-sm-1">
                                <div class="form-group">
                                <label>Consider Lunch Break<span class="text-danger">*</span></label>
                                </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="form-group">
                                <select class="form-control" required="required">
                                <option value="2">If total time is 3/4th Login hours</option>
                                <option value="1">Option 2</option>
                                </select>
                                </div>
                                </div>
                                <div class="col-sm-2">
                                <div class="form-group">
                                <label>Consider Short Break<span class="text-danger">*</span></label>
                                <input style="width:39%;" type="checkbox" id="1" name="1">
                                </div>
                              </div>
                             </div>
                            <div class="row">
                                <div class="col-sm-3">
                                <div class="form-group">
                                <label>Ratio Total Time to Set Half Day Hours <span class="text-danger">*</span></label>
                                </div>
                                </div>
                                <div class="col-sm-2">
                                <div class="form-group">
                                <select class="form-control" required="required">
                                <option value="2">Mark ¾ Present</option>
                                <option value="1">Option 2</option>
                                </select>
                                </div>
                                </div>
                                <div class="col-sm-3">
                                <div class="form-group">
                                <label>Only when either Punch In or Punch out Criteria is fulfilled.</label>
                                </div>
                                </div>
                                <div class="col-sm-2">
                                <div class="form-group">
                                <label>Rectification Allowed</label>
                                <input style="width:39%;" type="checkbox" id="1" name="1">
                                </div>
                                </div>
                                <div class="col-sm-2">
                                <div class="form-group">
                                <label>Short Leave Allowed</label>
                                <input style="width:39%;" type="checkbox" id="1" name="1">
                                </div>
                                </div>
                             </div>
                            </div>
                            <div style="overflow:auto;margin:10px;">
                                <div style="float:right;">
                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <br>

    <div class="row filter-row" style="padding-top: 16px;">
        <div class="col-sm-6 col-md-6">  
            <div class="form-group form-focus">
                <h4>List of Shifts</h4>
            </div>
        </div>
    </div>
     <!-- Company List Starts-->
    <div id="companyTable" class="tabcontent" style="display:block;">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Shift Name</th>
                                <th>Shift Type</th>
                                <th>In Time</th>
                                <th>In Time From</th>
                                <th>In Time Till</th>
                                <th>Out Time</th>
                                <th>Working Hours</th>
                                <th>Half Day</th>
                                <th>OT Applicable</th>
                                <th>OT Shift To Emp Report</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <tr>
                                <td>1</td>
                                <td>General</td>
                                <td>Fixed</td>
                                <td>09:30</td>
                                <td>-</td>
                                <td>-</td>
                                <td>09:30</td>
                                <td>09:30</td>
                                <td>04:30</td>
                                <td>No</td>
                                <td><a href="">View </a></td>
                                <td style="text-align: center;">
                                    <a href="" class="action-icon"><i class="fa fa-pencil"></i></a>
                                     <a href="" class="action-icon trash"><i class="fa fa-trash-o m-r-5"></i></a>
                                </td>
                            </tr>
                             <tr>
                             <td>2</td>
                                <td>Morning</td>
                                <td>Fixed</td>
                                <td>07:00</td>
                                <td>-</td>
                                <td>-</td>
                                <td>07:00</td>
                                <td>07:00</td>
                                <td>04:30</td>
                                <td>Yes</td>
                                <td><a href="">View </a></td>
                                <td style="text-align: center;">
                                    <a href="" class="action-icon"><i class="fa fa-pencil"></i></a>
                                     <a href="" class="action-icon trash"><i class="fa fa-trash-o m-r-5"></i></a>
                                </td>
                            </tr>
                            <tr>
                              <td>3</td>
                                <td>UK</td>
                                <td>Flexible</td>
                                <td>-</td>
                                <td>11:00</td>
                                <td>14:00</td>
                                <td>-</td>
                                <td>-</td>
                                <td>04:15</td>
                                <td>No</td>
                                <td><a href="">View </a></td>
                                <td style="text-align: center;">
                                    <a href="" class="action-icon"><i class="fa fa-pencil"></i></a>
                                     <a href="" class="action-icon trash"><i class="fa fa-trash-o m-r-5"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Company List End -->
    <!-- Add half day/full day Modal -->
<div class="modal custom-modal fade" id="add_halfDay" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choose Week Off Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                    <button class="btn btn-primary">Half day</button>
                    <button class="btn btn-primary">Full day</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>
<!-- /Page Content -->
<script>  
$(document).ready(function(){
    $('#shiftCount').on('change', function() {
      if ( this.value == 'fullHalf')
      {
        $("#fullDay").show();
      }
      else
      {
        $("#fullDay").hide();
      }
    });
});
</script>

@stop