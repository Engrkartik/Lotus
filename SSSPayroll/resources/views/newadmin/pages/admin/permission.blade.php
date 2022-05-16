@extends('newadmin.layouts.default')
@section('content')
    <!-- Page Wrapper -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header not">
						<div class="row align-items-center">
							<div class="col">
				<h3 class="page-title">Roles And Permissions</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Attendance</li>
				</ul>
			</div>
			
			</div>
		</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
							<a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add_role"><i class="fa fa-plus"></i> Add Roles</a>
							<div class="roles-menu">
								<ul>
									<li class="active">
										<a href="javascript:void(0);">Administrator
											<span class="role-action">
												<span class="action-circle large" data-toggle="modal" data-target="#edit_role">
													<i class="material-icons">edit</i>
												</span>
												<span class="action-circle large delete-btn" data-toggle="modal" data-target="#delete_role">
													<i class="material-icons">delete</i>
												</span>
											</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">CEO
											<span class="role-action">
												<span class="action-circle large" data-toggle="modal" data-target="#edit_role">
													<i class="material-icons">edit</i>
												</span>
												<span class="action-circle large delete-btn" data-toggle="modal" data-target="#delete_role">
													<i class="material-icons">delete</i>
												</span>
											</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">Manager
											<span class="role-action">
												<span class="action-circle large" data-toggle="modal" data-target="#edit_role">
													<i class="material-icons">edit</i>
												</span>
												<span class="action-circle large delete-btn" data-toggle="modal" data-target="#delete_role">
													<i class="material-icons">delete</i>
												</span>
											</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">Team Leader
											<span class="role-action">
												<span class="action-circle large" data-toggle="modal" data-target="#edit_role">
													<i class="material-icons">edit</i>
												</span>
												<span class="action-circle large delete-btn" data-toggle="modal" data-target="#delete_role">
													<i class="material-icons">delete</i>
												</span>
											</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">Accountant
											<span class="role-action">
												<span class="action-circle large" data-toggle="modal" data-target="#edit_role">
													<i class="material-icons">edit</i>
												</span>
												<span class="action-circle large delete-btn" data-toggle="modal" data-target="#delete_role">
													<i class="material-icons">delete</i>
												</span>
											</span>
										</a>
									</li>
									
									<li>
										<a href="javascript:void(0);">HR
											<span class="role-action">
												<span class="action-circle large" data-toggle="modal" data-target="#edit_role">
													<i class="material-icons">edit</i>
												</span>
												<span class="action-circle large delete-btn" data-toggle="modal" data-target="#delete_role">
													<i class="material-icons">delete</i>
												</span>
											</span>
										</a>
									</li>
									
								</ul>
							</div>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
							<h6 class="card-title m-b-20">Module Access</h6>
							<div class="m-b-30">
								<div class="form-group">
							<select class="modules form-control"  id="module" size="5" multiple="multiple" style="width:100%;">
								<option value='leaves'>Leaves</option>
								<option value='attendance'>Attendance</option>
								<option value='holiday'>Holidays</option>
								<option value='reports'>Reports</option>
								<option value='employee'>Employee</option>
								<option value='payroll'>Payroll</option>
							
							</select>
						</div>
						
							</div>      	
							<div class="table-responsive">
								<table class="table table-striped custom-table">
									<thead>
										<tr>
											<th class="text-center" colspan="5">Records Permissions</th>
										</tr>
										<tr>
											<th class="text-center">Roles</th>
											<th class="text-center">View</th>
											<th class="text-center">Edit</th>
											<th class="text-center">Add</th>
											<th class="text-center">Delete</th>
											<!-- <th class="text-center">Import</th>
											<th class="text-center">Export</th> -->
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Director</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											
										</tr>
										<tr>
											<td>CEO</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											
										</tr>
										<tr>
											<td>Team Leader</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											
										</tr>
										<tr>
											<td>Manager</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!-- modals -->
				<div id="delete_role" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Delete </h4>
							
						</div>
						<form>
							<div class="modal-body card-box">
								<p>Are you sure want to delete this?</p>
								<div class="m-t-20 text-left">
									<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
									<button type="submit" class="btn btn-danger">Delete</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div id="add_role" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Add Role</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label>Role Name <span class="text-danger">*</span></label>
									<input class="form-control" type="text">
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Create Role</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div id="edit_role" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					
					<div class="modal-content modal-md">
						<div class="modal-header">

							<h4 class="modal-title">Edit Role</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label>Role Name <span class="text-danger">*</span></label>
									<input class="form-control" value="Team Leader" type="text">
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Save & Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
						
					</div>


					
                   
                </div>
				<!-- /Page Content -->
				
			
            <!-- Page Wrapper -->

            @stop