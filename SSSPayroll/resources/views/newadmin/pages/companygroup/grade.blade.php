@extends('newadmin.layouts.default')
@section('content')

<!-- Page Content -->
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-12 offset-md-12">
        <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Grade</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://34.72.9.224/SSSPayroll/home">Dashboard</a></li>
                    <li class="breadcrumb-item active">Grade</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row filter-row" style="padding-top: 16px;">
        <div class="col-sm-6 col-md-6">  
            <div class="form-group form-focus">
                <h4>Create Grade</h4>
            </div>
        </div>
   <div class="col-auto float-right ml-auto">
       <button form="grade" class="btn btn-info map w-100" style="margin-left: 19px;" type="submit">Save</button>
    </div>
    </div>
            <form id="grade" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-2" id="labelCol">
                    <div class="form-group">
                        <label> Designation Name <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                        <option value="">Select Designation Name</option>
                        <option value="PM">Project Manager</option>
                    </select>
                    </div>
                </div>
                    <div class="col-sm-2" id="labelCol" style="text-align:center;">
                    <div class="form-group">
                    <label>Grade <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input type="text" class="form-control" name="grade name" placeholder="Create New or Type and Search" required="required">
                    </div>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-2" id="labelCol" style="text-align:center;">
                <div class="form-group">
                <label>Status</label>
                </div>
                </div>
                <div class="col-sm-4">
                <div class="form-group">
                <select class="form-control">
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
                </div>
                </div>
                </div>
            </form>

     <div class="row filter-row" style="padding-top: 16px;">
        <div class="col-sm-6 col-md-6">  
            <div class="form-group form-focus">
                <h4>List of Grades</h4>
            </div>
        </div>
    </div>
     <div id="gradeTable" class="tabcontent">
        <div class="row">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Designation Name</th>
                                <th>Grade</th>
                                <th>Status</th>
                                <th>Action</th>   
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <tr>
                                <td>1</td>
                                <td>Director</td>
                                <td>G001</td>
                                <td><select class="form-control" onchange="change_st('4','employee',this.value);">
										<option value="A">Active</option>
										<option value="D" selected="&quot;selected&quot;">Inactive</option>
									</select></td>
                                <td style="text-align: center;">
                                    <a href="" class="action-icon"><i class="fa fa-pencil"></i></a>
                                     <a href="" class="action-icon trash"><i class="fa fa-trash-o m-r-5"></i></a>
                                </td>
                            </tr>
                             <tr>
                                <td>2</td>
                                <td>Sales Manager</td>
                                <td>G002</td>
                                <td><select class="form-control" onchange="change_st('4','employee',this.value);">
										<option value="A">Active</option>
										<option value="D" selected="&quot;selected&quot;">Inactive</option>
									</select></td>
                                <td style="text-align: center;">
                                    <a href="" class="action-icon"><i class="fa fa-pencil"></i></a>
                                     <a href="" class="action-icon trash"><i class="fa fa-trash-o m-r-5"></i></a>
                                </td>
                            </tr>
                             <tr>
                                <td>3</td>
                                <td>HR Manager</td>
                                <td>G003</td>
                                <td><select class="form-control" onchange="change_st('4','employee',this.value);">
										<option value="A">Active</option>
										<option value="D" selected="&quot;selected&quot;">Inactive</option>
									</select></td>
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

        </div>
    </div>
</div>
<!-- /Page Content -->
@stop