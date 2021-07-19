@extends('newadmin.layouts.default')
@section('content')
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
    <!-- Page Wrapper -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">Leave Confrigration</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Leave</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave_type"><i
						class="fa fa-plus"></i> Add Leave Type</a>&nbsp;&nbsp;
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i
						class="fa fa-plus"></i> Add Leave</a>
				
			</div>
		</div>
	</div>
					<!-- /Page Header -->
					
					<!-- Search Filter -->
				<div class="row filter-row">
                    <div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus">
								<label class="btn btn-primary"></label>
							</div>
						</div>
						     
                    </div>
                  
					<!-- /Search Filter -->

                    <div class="row">
                        <div class="col-lg-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table table-nowrap mb-0" id="myTable">
									<thead>
										
									</thead>
									<tbody id="myTable">
									</tbody>
								</table>
							</div>
                        </div>
                    </div>
                </div>
				<!-- /Page Content -->
				
			
            <!-- Page Wrapper -->

            @stop