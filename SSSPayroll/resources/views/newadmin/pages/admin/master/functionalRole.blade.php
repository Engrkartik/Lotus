@extends('newadmin.layouts.default')
@section('content')
    <!-- Page Wrapper -->
<div class="content container-fluid">
        
            <!-- Page Header -->
    <div class="page-header not">
        <div class="row align-items-center">
        <div class="col-sm-8">
            <h3 class="page-title">Functional Roles Master</h3>
            <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">User Management> Functional Role Master</li>
        </ul>
    </div>
    <div class="col-auto float-right ml-auto">
       <a href=" " data-toggle="modal" data-target="#faq" style="text-decoration: underline;"><h3 style="margin-left: 19px;">FAQ'S</h3></a>
    </div>
    </div>
    </div>
				
          <div class="row filter-row" style="padding-top: 16px;"> 
        <div class="col-sm-6 col-md-6">  
            <div class="form-group form-focus">
           <h4>Create Functional Role</h4> 
            </div>
        </div>
   <div class="col-auto float-right ml-auto">
       <button form="roles" class="btn btn-info map w-100" style="margin-left: 19px;" type="submit">Save</button>
    </div>
    </div>
    <form id="roles" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label> Company <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="">Select </option>
                    <option value="SSS">SSS </option>
                    <option value="lotus">Lotus </option>
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
                    <option value="HR">HR </option>
                    <option value="IT">IT </option>
                    <option value="Admin">Admin </option>
                    </select>
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Mapped to Role<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="">Select </option>
                    <option value="manager">Manager </option>
                    <option value="admin">Admin </option>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Applies To<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="">Select </option>
                    <option value="kra">KRA </option>
                    <option value="kpi">KPI </option>
                    <option value="both">Both KRA & KPI </option>
                    <option value="none">None </option>
                    </select>
                    </div>
                    </div>
                </div>	
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>F.Role Name<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" required="required" placeholder="Enter F. Role Name">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Role Status<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="">Select </option>
                    <option value="active">Active </option>
                    <option value="inactive">Inactive </option>
                    <option value="permanent">Permanent </option>
                    <option value="temporary">Temporary/Revokable</option>
                    </select>
                    </div>
                    </div>
                </div>	
            </form>	
<br>
<br>
 <!-- Company List Starts-->
 <div id="roleTable" class="tabcontent" style="display:block;">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>F.Role Name</th>
                                <th>Company</th>
                                <th>Department</th>
                                <th>Mapped To Role</th>
                                <th>Applies To</th>
                                <th>Status</th>
                                <th>Date Of Creation</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <tr>
                                <td>1</td>
                                <td>Coding in .Net</td>
                                <td>Sybertech</td>
                                <td>Software</td>
                                <td>Employee</td>
                                <td>Both KRA & KPI</td>
                                <td>Active</td>
                                <td>10-oct-2021</td>
                            </tr>
                             <tr>
                             <td>2</td>
                             <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            </tr>
                            <tr>
                            <td>3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
<div class="modal custom-modal fade" id="faq" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <h4>Functional Role Name – field limit 50, Alpha Numeric with ‘.’.</h4>
               <br>
               <h4>Note: Department and Map to Role will have a dropdown with “MULTIPLE SELECT” option in Dropdown.<br> i.e., A functional role can be for multiple roles and departments.
                   And Temporary role can be revocable and should come with from and to date.<br> Calendar. No back date.</h4>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>

</div>

@stop