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
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">Employee</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Employee</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<!-- <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i
						class="fa fa-plus"></i> Add Employee</a> -->
						<a href="{{url('add_employees')}}" class="btn add-btn" style="margin-left: 19px;"><i class="fa fa-plus"></i> Add Employee</a>
						<a href="" class="btn btn-success"><i class="fa fa-file-excel-o"></i> upload excel</a>
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

	<!-- Search Filter -->
	<div class="row filter-row">
		<div class="col-sm-6 col-md-3">
			<div class="form-group form-focus">
				<input type="text" class="form-control floating" id="myInput" oninput="searchTable()">
				<label class="focus-label">Search</label>
			</div>
		</div>
		<!-- <div class="col-sm-6 col-md-3">
			<div class="form-group form-focus">
				<input type="text" class="form-control floating">
				<label class="focus-label">Employee Name</label>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="form-group form-focus select-focus">
				<select class="select floating">
					<option value="00">Select Designation</option>
					@foreach($desg as $key =>$value)
					<option value="{{$value->name}}">{{$value->name}}</option>
					@endforeach
				</select>
				<label class="focus-label">Designation</label>
			</div>
		</div> -->
		<div class="col-sm-6 col-md-3">
			<a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-filter" aria-hidden="true"></i>&nbsp;&nbsp;Joining Date</a>
<div id="myModal" class="modal custom-modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Joining Date Filter</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('/emp_filter')}}" method="POST">
					@csrf
					<div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-md-6">
									<label>From Date</label>
									<input type="date" name="from_dt" class="form-control" required="">
								</div>
								<div class="col-md-6">
									<label>To Date</label>
									<input type="date" name="to_dt" class="form-control" required="">
								</div>
							</div>
						</div>
					</div>

					<div class="submit-section">
						<button class="btn btn-primary submit-btn">Submit</button>
						<button class="btn btn-secondary submit-btn" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
		</div>
		<div>
			<button style="margin-bottom: 10px" class="btn btn-info map" data-url="{{ url('/emp_map') }}" id="assignbtn">Bulk Assign</button>
		</div>
	</div>
	<div id="myModal1" class="modal custom-modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Select Employee</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="myBody">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">Close</span>
				</button>
				<button type="button" class="btn btn-primary" onclick="save_reporting()" >
					<span aria-hidden="true">Submit</span>
				</button>
			</div>
		</div>
	</div>
</div>
	<!-- /Search Filter -->

	<!-- Employee List Starts-->
	<div id="employeelist" class="tabcontent">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table datatable">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Employee ID</th>
								<th>Joining Date</th>
								<th>Designation</th>
								<th>Department</th>
								<th>Branch</th>
								<th>Reporting Manager</th>
								<th>Status</th>
								<!-- <th>Payslip</th> -->
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="myTable">
							@foreach($emp as $key=>$value)
							<tr>
								<td><input type="checkbox" class="sub_chk1" data-id="{{$value->id}}" style="display:;"></td>
								<td>
									<h2 class="table-avatar">
										 <a href="#" class="avatar"><img alt=""
												src="assets/img/profiles/avatar-02.jpg"></a>
										<a href="#">{{$value->emp_name}}
											<span>{{$value->designation}}</span></a>
									</h2>
								</td>
								<td>{{$value->emp_code}}</td>
								<td>{{date('d-M-Y',strtotime($value->joining_date))}}</td>
								<td>{{$value->designation}}</td>
								<td>{{$value->department}}</td>
								<td>{{$value->b_name}}</td>
								<td>{{$value->report_to}}</td>
								<td>
									@php
									$st='';
									$st1='';
									if($value->status=='A')
									{
									$st='Active';
									$st1='In-Active';
									}
									else
									{
									$st='In-Active';
									$st1='Active';
									}
									@endphp
									<select class="form-control"
										onchange="change_st('{{$value->id}}','employee',this.value);">
										<option value="A" @if($value->status=='A'){{'selected="selected"'}}@endif
											>Active</option>
										<option value="D" @if($value->status=='D'){{'selected="selected"'}}@endif
											>Inactive</option>
									</select>
								</td>
								<!-- <td><a class="btn btn-sm btn-primary" href="salary-view">Generate Slip</a></td> -->

								<td class="text-right">
									<div class="dropdown dropdown-action">
										<a href="{{url('edit_employees/'.$value->id)}}" class="action-icon dropdown-toggle"><i class="fa fa-pencil"></i></a>&nbsp;
										<a  href="#" data-toggle="modal" data-target="#delete_employee_{{$value->id}}">
											<i class="fa fa-trash-o m-r-5"></i></a>
									
									</div>
									<!-- Edit Employee Modal -->

									<!-- /Delete Employee Modal -->
								</td>
							</tr>
						<div id="edit_employee_{{$value->id}}" class="modal custom-modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
							<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Edit Employee</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="{{url('/update_emp/'.$value->id)}}" method="POST">
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
															name="emp_name" id="emp_name" value="{{$value->emp_name}}" required="">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="col-form-label">Employee Code </label>
														<input class="form-control" type="text" placeholder="Enter Employee Code"
															name="emp_code" id="emp_code" value="{{$value->emp_code}}" readonly="">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Gender <span class="text-danger">*</span></label>
														<select class="select" name="gender" required>
															<option value="" @if($value->gender=='null') selected="" @endif>Select Gender</option>
															<option value="M" @if($value->gender=='M') selected="" @endif>Male</option>
															<option value="F" @if($value->gender=='F') selected="" @endif>Female</option>
															<option value="T" @if($value->gender=='T') selected="" @endif>Transgender</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Marital Status </label>
														<select class="select" name="marital_st">
															<option value="" @if($value->marital_status=='null') selected="" @endif>Select Marital Status</option>
															<option value="M" @if($value->marital_status=='M') selected="" @endif>Married</option>
															<option value="U" @if($value->marital_status=='U') selected="" @endif>Un-Married</option>
															<option value="D" @if($value->marital_status=='D') selected="" @endif>Divorced</option>
															<option value="W" @if($value->marital_status=='W') selected="" @endif>Widow</option>
														</select>
													</div>
												</div>

												<div class="col-sm-6">
													<div class="form-group">
														<label class="col-form-label">Date Of Birth <span class="text-danger">*</span></label>
														<input class="form-control" type="date" name="dob" value="{{$value->dob}}" required="">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
														<input class="form-control" type="date" name="joining_dt" value="{{$value->joining_date}}" onkeypress="return false;"
															required="">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Branch <span class="text-danger">*</span></label>
														<select class="select" name="branch" required>
															<option value="">Select Branch</option>
															@foreach($branch as $key =>$values)
															<option value="{{$values->id}}" @if($value->bid==$values->id) selected="" @endif>{{$values->name}}</option>
															@endforeach
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Department <span class="text-danger">*</span></label>
														<select class="select" name="dept" required>
															<option value="">Select Department</option>
															@foreach($dept as $key =>$values)
															<option value="{{$values->id}}" @if($value->dept_id==$values->id) selected="" @endif>{{$values->name}} ({{$value->b_name}})</option>
															@endforeach
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label>Designation <span class="text-danger">*</span></label>
														<select class="select" name="desig" required>
															<option value="">Select Designation</option>
															@foreach($desg as $key=>$values)
															<option value="{{$values->name}}" @if($value->designation==$values->name) selected="" @endif>{{$values->name}}</option>
															@endforeach

														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label>Reporting Manager <span class="text-danger">*</span></label>
														<select class="select" name="report_to" required>
															<option value="">Select Employee</option>
															@foreach($emp as $key=>$values)
															<option value="{{$values->id}}" @if ($values->id==$value->reporting_manager) selected="" @endif>{{$values->emp_name}}</option>
															@endforeach
						
														</select>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="col-form-label">Email</label>
														<input class="form-control" type="email" placeholder="Enter Email" name="email_p" value="{{$value->email_p}}" 
															id="email">
													</div>
												</div>

												<div class="col-sm-6">
													<div class="form-group">
														<label class="col-form-label">Phone Number </label>
														<input class="form-control" type="text" name="phone_no" maxlength="10" minlength="10"
															placeholder="Enter Phone Number" value="{{$value->phone_number}}">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="col-form-label">PAN Number </label>
														<input class="form-control" type="text" placeholder="Enter PAN No" name="pan_no"
															maxlength="10" minlength="10" value="{{$value->pan_no}}">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="col-form-label">Aadhar Number </label>
														<input class="form-control" type="text" placeholder="Enter AADHAR No" name="aadhar_no"
															maxlength="12" minlength="12" value="{{$value->aadhar_no}}">
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group">
														<label class="col-form-label">Current Address </label>
														<textarea type="text" class="form-control" placeholder="Enter Current Address"
															name="current_add" id="current_add" rows="2">{{$value->current_add}}</textarea><br>
														<input type="checkbox" onclick="copy();">&nbsp;&nbsp; Permanent Address Same as Current
														Address

													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group">
														<label class="col-form-label">Permanent Address </label>
														<textarea type="text" class="form-control" placeholder="Enter Permanent Address"
															name="permanent_add" id="permanent_add" rows="2">{{$value->current_add}}</textarea>
														<!-- An element to toggle between password visibility -->
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

						<div id="edit_bank_{{$value->id}}" class="modal custom-modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Edit Employee Bank Detail's</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="{{url('/update_bank/'.$value->id)}}" method="POST">
											@csrf
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<label class="col-form-label">Bank Name <span class="text-danger">*</span></label>
														<input class="form-control" type="text" placeholder="Enter Bank Name"
															name="bank_name" value="{{$value->bank_name}}" required="">
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group">
														<label class="col-form-label">Branch Name <span class="text-danger">*</span></label>
														<input class="form-control" type="text" placeholder="Enter Branch Name"
															name="branch_name" value="{{$value->branch_name}}" required="">
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group">
														<label class="col-form-label">Account Number <span class="text-danger">*</span></label>
														<input class="form-control" type="number" placeholder="Enter Account Number"
															name="account_no" value="{{$value->account_no}}" required="">
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group">
														<label class="col-form-label">IFSC Code <span class="text-danger">*</span></label>
														<input class="form-control" type="text" placeholder="Enter IFSC Code"
															name="ifsc_code" value="{{$value->ifsc_code}}" required="">
													</div>
												</div>
												

											</div>
											<div class="submit-section">
												<button class="btn btn-primary submit-btn">Submit</button>
												<button class="btn btn-secondary submit-btn" data-dismiss="modal">Close</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
									<!-- /Edit Employee Modal -->

									<!-- Delete Employee Modal -->
									<div class="modal custom-modal fade" id="delete_employee_{{$value->id}}"
										role="dialog">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-body">
													<div class="form-header">
														<h3>Delete Employee</h3>
														<p>Are you sure want to delete?</p>
													</div>
													<div class="modal-btn delete-action">
														<div class="row">
															<div class="col-6">
																<a href="{{url('delete1/'.$value->id.'/employee')}}"
																	class="btn btn-primary continue-btn">Delete</a>
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
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- Employee List End -->

	<!-- Employee Grid Starts-->
	<div id="employeegrid" class="tabcontent">
		<div class="row staff-grid-row">
			<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
				<div class="profile-widget">
					<div class="profile-img">
						<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-02.jpg" alt=""></a>
					</div>
					<div class="dropdown profile-action">
						<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
								class="material-icons">more_vert</i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i
									class="fa fa-pencil m-r-5"></i> Edit</a>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i
									class="fa fa-trash-o m-r-5"></i> Delete</a>
						</div>
					</div>
					<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">John Doe</a></h4>
					<div class="small text-muted">Web Designer</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
				<div class="profile-widget">
					<div class="profile-img">
						<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-09.jpg" alt=""></a>
					</div>
					<div class="dropdown profile-action">
						<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
								class="material-icons">more_vert</i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i
									class="fa fa-pencil m-r-5"></i> Edit</a>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i
									class="fa fa-trash-o m-r-5"></i> Delete</a>
						</div>
					</div>
					<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Richard Miles</a></h4>
					<div class="small text-muted">Web Developer</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
				<div class="profile-widget">
					<div class="profile-img">
						<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-10.jpg" alt=""></a>
					</div>
					<div class="dropdown profile-action">
						<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
								class="material-icons">more_vert</i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i
									class="fa fa-pencil m-r-5"></i> Edit</a>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i
									class="fa fa-trash-o m-r-5"></i> Delete</a>
						</div>
					</div>
					<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">John Smith</a></h4>
					<div class="small text-muted">Android Developer</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
				<div class="profile-widget">
					<div class="profile-img">
						<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-05.jpg" alt=""></a>
					</div>
					<div class="dropdown profile-action">
						<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
								class="material-icons">more_vert</i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i
									class="fa fa-pencil m-r-5"></i> Edit</a>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i
									class="fa fa-trash-o m-r-5"></i> Delete</a>
						</div>
					</div>
					<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Mike Litorus</a></h4>
					<div class="small text-muted">IOS Developer</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
				<div class="profile-widget">
					<div class="profile-img">
						<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-11.jpg" alt=""></a>
					</div>
					<div class="dropdown profile-action">
						<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
								class="material-icons">more_vert</i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i
									class="fa fa-pencil m-r-5"></i> Edit</a>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i
									class="fa fa-trash-o m-r-5"></i> Delete</a>
						</div>
					</div>
					<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Wilmer Deluna</a></h4>
					<div class="small text-muted">Team Leader</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
				<div class="profile-widget">
					<div class="profile-img">
						<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-12.jpg" alt=""></a>
					</div>
					<div class="dropdown profile-action">
						<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
								class="material-icons">more_vert</i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i
									class="fa fa-pencil m-r-5"></i> Edit</a>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i
									class="fa fa-trash-o m-r-5"></i> Delete</a>
						</div>
					</div>
					<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Jeffrey Warden</a></h4>
					<div class="small text-muted">Web Developer</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
				<div class="profile-widget">
					<div class="profile-img">
						<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-13.jpg" alt=""></a>
					</div>
					<div class="dropdown profile-action">
						<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
								class="material-icons">more_vert</i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i
									class="fa fa-pencil m-r-5"></i> Edit</a>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i
									class="fa fa-trash-o m-r-5"></i> Delete</a>
						</div>
					</div>
					<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Bernardo Galaviz</a></h4>
					<div class="small text-muted">Web Developer</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
				<div class="profile-widget">
					<div class="profile-img">
						<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-01.jpg" alt=""></a>
					</div>
					<div class="dropdown profile-action">
						<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
								class="material-icons">more_vert</i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i
									class="fa fa-pencil m-r-5"></i> Edit</a>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i
									class="fa fa-trash-o m-r-5"></i> Delete</a>
						</div>
					</div>
					<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Lesley Grauer</a></h4>
					<div class="small text-muted">Team Leader</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
				<div class="profile-widget">
					<div class="profile-img">
						<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-16.jpg" alt=""></a>
					</div>
					<div class="dropdown profile-action">
						<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
								class="material-icons">more_vert</i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i
									class="fa fa-pencil m-r-5"></i> Edit</a>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i
									class="fa fa-trash-o m-r-5"></i> Delete</a>
						</div>
					</div>
					<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Jeffery Lalor</a></h4>
					<div class="small text-muted">Team Leader</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
				<div class="profile-widget">
					<div class="profile-img">
						<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-04.jpg" alt=""></a>
					</div>
					<div class="dropdown profile-action">
						<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
								class="material-icons">more_vert</i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i
									class="fa fa-pencil m-r-5"></i> Edit</a>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i
									class="fa fa-trash-o m-r-5"></i> Delete</a>
						</div>
					</div>
					<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Loren Gatlin</a></h4>
					<div class="small text-muted">Android Developer</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
				<div class="profile-widget">
					<div class="profile-img">
						<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-03.jpg" alt=""></a>
					</div>
					<div class="dropdown profile-action">
						<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
								class="material-icons">more_vert</i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i
									class="fa fa-pencil m-r-5"></i> Edit</a>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i
									class="fa fa-trash-o m-r-5"></i> Delete</a>
						</div>
					</div>
					<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Tarah Shropshire</a></h4>
					<div class="small text-muted">Android Developer</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
				<div class="profile-widget">
					<div class="profile-img">
						<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-08.jpg" alt=""></a>
					</div>
					<div class="dropdown profile-action">
						<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
								class="material-icons">more_vert</i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i
									class="fa fa-pencil m-r-5"></i> Edit</a>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i
									class="fa fa-trash-o m-r-5"></i> Delete</a>
						</div>
					</div>
					<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Catherine Manseau</a></h4>
					<div class="small text-muted">Android Developer</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Employee Grid End -->


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
								<select class="select" name="branch" required>
									<option value="">Select Branch</option>
									@foreach($branch as $key =>$value)
									<option value="{{$value->id}}">{{$value->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Department <span class="text-danger">*</span></label>
								<select class="select" name="dept" required>
									<option value="">Select Department</option>
									@foreach($dept as $key =>$value)
									<option value="{{$value->id}}">{{$value->name}} ({{$value->b_name}})</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Designation <span class="text-danger">*</span></label>
								<select class="select" name="desig" required>
									<option value="">Select Designation</option>
									@foreach($desg as $key=>$value)
									<option value="{{$value->name}}">{{$value->name}}</option>
									@endforeach

								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Reporting Manager <span class="text-danger">*</span></label>
								<select class="select" name="report_to" required>
									<option value="">Select Employee</option>
									@foreach($emp as $key=>$value)
									<option value="{{$value->id}}">{{$value->emp_name}}</option>
									@endforeach

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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
	function copy() {
		document.getElementById('permanent_add').value = document.getElementById('current_add').value;
	}
	var allVals = [];

$(document).ready(function () {

$('.map').on('click', function(e) {

             allVals = [];
            $(".sub_chk1:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

			console.log(allVals);
            if(allVals.length <=0)
            {
                alert("Please select row.");
            }  else {

            	
                // var check = confirm("Are you sure you want to delete these rows?");
                // if(check == true){

                	var join_selected_values = allVals.join(",");
        //         	var url = '{{ route("add_working")}}';
    				var token = "{{ csrf_token()}}";
                    // alert(join_selected_values);
                    $.ajax({
                        // url: $(this).data('url'),
                        url: "{{ url('/emp_map') }}",
                        type: "POST",
                        // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        // data: 'ids='+join_selected_values,
                        data: {"_token": token, 'ids':JSON.stringify(allVals)},
                        success: function (data) {
							// alert(data.data);
                            if (data.status=='true') {
                                $('#myBody').html(data.data);

							    // Display Modal
							    $('#myModal1').modal('show'); 
                            }  else {
                                alert('Whoops Something went wrong!!');
                            }
                        // },
                        // error: function (data) {
                        //     alert(data.data);
                        }
                    });


                  // $.each(allVals, function( index, value ) {
                  //     $('table tr').filter("[data-row-id='" + value + "']").remove();
                  // });
                // }
            }
        });
});

function save_reporting() {
	console.log(allVals);
	var token = "{{ csrf_token()}}";

	$.ajax({
		type:"POST",
		url:"{{ url('/save_report') }}",
		data:{'ids':allVals,'_token':token,'report_to':(document.getElementById('report_to').value)},
		success:function(res)
		{
			// alert(res.status);
			if(res.status=='true')
			{
				window.location.href="{{url('employees-list')}}";
			}else
			{
				alert(res.data);
			}
		}
	});
}


$(document).ready(function(){
 
  $("#assignbtn").click(function(){
    $(".sub_chk1").show();
  });
});
</script>

@stop