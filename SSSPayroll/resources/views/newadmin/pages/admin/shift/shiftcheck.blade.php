@extends('newadmin.layouts.default')
@section('content')

<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Leave Settings</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Leave Settings</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i
                        class="fa fa-plus"></i> Add Employee</a>
                <div class="view-icons tab">
                    <button onclick="openCity(event, 'employeegrid')" class="tablinks grid-view btn btn-link"><i
                            class="fa fa-th"></i></button>
                    <button onclick="openCity(event, 'employeelist')" class="tablinks list-view btn btn-link active"><i
                            class="fa fa-bars"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">


        </div>
    </div>
    <!-- /ADD LEAVE TYPE -->


</div>
</div>

</div>
<!-- /Page Content -->

<!-- Add Employee Modal -->
<div id="add_employee" class="modal custom-modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/add_employee')}}" method="POST">
                    @csrf
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Employee Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="Enter Employee Name"
                                    name="emp_name" id="emp_name" required="">
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">Employee Code </label>
								<input class="form-control" type="text" placeholder="Enter Employee Code"
									name="emp_code" id="emp_code" value="SSS_1" readonly="">
							</div>
						</div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender <span class="text-danger">*</span></label>
                                <select class="select" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                    <option value="T">Transgender</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Marital Status </label>
                                <select class="select" name="marital_st">
                                    <option value="">Select Marital Status</option>
                                    <option value="M">Married</option>
                                    <option value="U">Un-Married</option>
                                    <option value="D">Divorced</option>
                                    <option value="W">Widow</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Date Of Birth <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="dob" required="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="joining_dt" onkeypress="return false;"
                                    required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Branch <span class="text-danger">*</span></label>
                                <select class="branches form-control" size="10" multiple="multiple" name="branches[]"
                                    style="width:100%;" placeholder="Select Branches">
                                    <option value="">Select All</option>
                                    <option  value="">Select All</option>
                                    <option  value="">Select All</option>
                                    <option value="">Select All</option>



                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Department <span class="text-danger">*</span></label>
                                <select class="departments form-control" size="10" multiple="multiple" name="departments[]"
                                    style="width:100%;" placeholder="Select departments">
                                    <option value="as">Select All</option>
                                    <option  value="sq">Select All</option>
                                    <option  value="few">Select All</option>
                                    <option value="ss">Select All</option>



                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Designation <span class="text-danger">*</span></label>
                                <select class="designation form-control" size="10" multiple="multiple"
                                    name="designation[]" style="width:100%;" placeholder="Select designation">
                                    <option value="">Select All</option>
                                    <option  value="">Select All</option>
                                    <option  value="">Select All</option>
                                    <option value="">Select All</option>



                                </select>
                            </div>
                        </div>
                   
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Email</label>
                                <input class="form-control" type="email" placeholder="Enter Email" name="email_p"
                                    id="email">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Phone Number </label>
                                <input class="form-control" type="text" name="phone_no" maxlength="10" minlength="10"
                                    placeholder="Enter Phone Number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">PAN Number </label>
                                <input class="form-control" type="text" placeholder="Enter PAN No" name="pan_no"
                                    maxlength="10" minlength="10">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Aadhar Number </label>
                                <input class="form-control" type="text" placeholder="Enter AADHAR No" name="aadhar_no"
                                    maxlength="12" minlength="12">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Current Address </label>
                                <textarea type="text" class="form-control" placeholder="Enter Current Address"
                                    name="current_add" id="current_add" rows="2"></textarea><br>
                                <input type="checkbox" onclick="copy();">&nbsp;&nbsp; Permanent Address Same as Current
                                Address

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Permanent Address </label>
                                <textarea type="text" class="form-control" placeholder="Enter Permanent Address"
                                    name="permanent_add" id="permanent_add" rows="2"></textarea>
                                <!-- An element to toggle between password visibility -->
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Username </label>
                                <input class="form-control" type="text" placeholder="Enter Username" name="username">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <input class="form-control" type="password" placeholder="Enter Password" name="pwd"
                                    id="pwd">
                                <!-- An element to toggle between password visibility -->
                                <input type="checkbox" onclick="myFunction()">Show Password
                            </div>
                        </div>

                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Employee Modal -->

<!-- Edit Custom Policy Modal -->
<div id="edit_custom_policy" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Custom Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Policy Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="LOP">
                    </div>
                    <div class="form-group">
                        <label>Days <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="4">
                    </div>
                    <div class="form-group leave-duallist">
                        <label>Add employee</label>
                        <div class="row">
                            <div class="col-lg-5 col-sm-5">
                                <select name="edit_customleave_from" id="edit_customleave_select" class="form-control"
                                    size="5" multiple="multiple">
                                    <option value="1">Bernardo Galaviz </option>
                                    <option value="2">Jeffrey Warden</option>
                                    <option value="2">John Doe</option>
                                    <option value="2">John Smith</option>
                                    <option value="3">Mike Litorus</option>
                                </select>
                            </div>
                            <div class="multiselect-controls col-lg-2 col-sm-2">
                                <button type="button" id="edit_customleave_select_rightAll"
                                    class="btn btn-block btn-white"><i class="fa fa-forward"></i></button>
                                <button type="button" id="edit_customleave_select_rightSelected"
                                    class="btn btn-block btn-white"><i class="fa fa-chevron-right"></i></button>
                                <button type="button" id="edit_customleave_select_leftSelected"
                                    class="btn btn-block btn-white"><i class="fa fa-chevron-left"></i></button>
                                <button type="button" id="edit_customleave_select_leftAll"
                                    class="btn btn-block btn-white"><i class="fa fa-backward"></i></button>
                            </div>
                            <div class="col-lg-5 col-sm-5">
                                <select name="customleave_to" id="edit_customleave_select_to" class="form-control"
                                    size="8" multiple="multiple"></select>
                            </div>
                        </div>
                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Custom Policy Modal -->

<!-- Delete Custom Policy Modal -->
<div class="modal custom-modal fade" id="delete_custom_policy" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Custom Policy</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0);" data-dismiss="modal"
                                class="btn btn-primary cancel-btn">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Custom Policy Modal -->

</div>

@stop