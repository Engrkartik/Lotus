@extends('newadmin.layouts.default')
@section('content')

<!-- Page Content -->
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-12 offset-md-12">
        <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Location</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://34.72.9.224/SSSPayroll/home">Dashboard</a></li>
                    <li class="breadcrumb-item active">Location</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row filter-row" style="padding-top: 16px;">
        <div class="col-sm-6 col-md-6">  
            <div class="form-group form-focus">
                <h4>Create Location</h4>
            </div>
        </div>
   <div class="col-auto float-right ml-auto">
       <button form="companyLocation" class="btn btn-info map w-100" style="margin-left: 19px;" type="submit">Save</button>
    </div>
    </div>
            <form id="companyLocation" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label> Company Name <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" required="required" placeholder="Lotus" disabled="disable">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Location Name <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter Location Name">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Location Type <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                        <option value="">Select</option>
                        <option value="head">Headoffice</option>
                        <option value="branch">Branch</option>
                    </select>
                    </div>
                </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Location Code <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="L0001" disabled="disable">
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="email" placeholder="Enter Email Id" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Phone <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter Phone Number" required="required">
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Address</label>
                    </div>
                    </div>
                    <div class="col-sm-10">
                    <div class="form-group">
                    <textarea class="form-control" placeholder="Enter Address"></textarea>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>State</label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control">
                    <option>Select State</option>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>City</label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control">
                    <option>Select City</option>
                    </select>
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
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
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Contact Person</label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control">
                    <option>Select </option>
                    </select>
                    </div>
                   </div>
                </div>
            </form>
            <br>
    <div class="row filter-row" style="padding-top: 16px;">
        <div class="col-sm-6 col-md-6">  
            <div class="form-group form-focus">
                <h4>List of Locations</h4>
            </div>
        </div>
    </div>
     <!-- Company List Starts-->
    <div id="companyGroup" class="tabcontent">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Company Name</th>
                                <th>Location Name</th>
                                <th>Location Type</th>
                                <th>Contact Person</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <tr>
                                <td>1</td>
                                <td>Lotus</td>
                                <td>Gandhinagar</td>
                                <td>Head Office</td>
                                <td>Priya</td>
                                <td>sss@gmail.com</td>
                                <td>9876543210</td>
                                <td>Delhi</td>
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
                                <td>Lotus</td>
                                <td>Noida</td>
                                <td>Branch</td>
                                <td>Priyam</td>
                                <td>lotus@gmail.com</td>
                                <td>9876543210</td>
                                <td>Noida</td>
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