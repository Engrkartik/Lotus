@extends('newadmin.layouts.default')
@section('content')
    <!-- Page Wrapper -->
<div class="content container-fluid">
        
            <!-- Page Header -->
    <div class="page-header not">
        <div class="row align-items-center">
        <div class="col-sm-8">
            <h3 class="page-title">User Administration</h3>
            <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">User Management> User Administration</li>
        </ul>
    </div>
    <div class="col-auto float-right ml-auto">
       <a href="" data-toggle="modal" data-target="#faq" style="text-decoration: underline;"><h3 style="margin-left: 19px;">FAQ'S</h3></a>
    </div>

    </div>
    </div>
				
          <div class="row filter-row" style="padding-top: 16px;"> 
        <div class="col-sm-6 col-md-6">  
            <div class="form-group form-focus">
           <h4>Assign Roles to Employees</h4> 
            </div>
        </div>
   <div class="col-auto float-right ml-auto">
       <button form="roles" class="btn btn-info map w-100" style="margin-left: 19px;" type="submit">Save</button>
    </div>
    </div>
    <br>
 <!-- Company List Starts-->
 <div id="roleTable" class="tabcontent" style="display:block;">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Employee Name</th>
                                <th>Employee ID</th>
                                <th style="text-align: center;">User/Employee</th>
                                <th style="text-align: center;">Manager</th>
                                <th style="text-align: center;">Management</th>
                                <th style="text-align: center;">Admin</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <tr>
                                <td>SSS Sybertech</td>
                                <td>Alka</td>
                                <td>SSS002</td>
                                <td><input type="checkbox" id="1" name="1"></td>
                                <td><input type="checkbox" id="1" name="1"></td>
                                <td><input type="checkbox" id="1" name="1"></td>
                                <td><input type="checkbox" id="1" name="1"></td>
                               
                            </tr>
                             <tr>
                             <td>SSS Sybertech</td>
                                <td>Priya</td>
                                <td>SSS001</td>
                                <td><input type="checkbox" id="1" name="1"></td>
                                <td><input type="checkbox" id="1" name="1"></td>
                                <td><input type="checkbox" id="1" name="1"></td>
                                <td><input type="checkbox" id="1" name="1"></td>
                            </tr>
                            <tr>
                            <td>SSS Sybertech</td>
                                <td>Priyam</td>
                                <td>SSS004</td>
                                <td><input type="checkbox" id="1" name="1"></td>
                                <td><input type="checkbox" id="1" name="1"></td>
                                <td><input type="checkbox" id="1" name="1"></td>
                                <td><input type="checkbox" id="1" name="1"></td>
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
               <h4>Note: default any employee created in the system will fall under User/Employee.<br> This can be edited by admin from the Role type in Employee Master or from here in bulk.
                   Functional Roles will be assigned based on these roles and Designation and Department in a Company.</h4>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>

</div>

@stop