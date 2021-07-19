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
				<h3 class="page-title">Leaves Request</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Leave Request</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="{{url('add-leave-request')}}" class="btn add-btn"><i class="fa fa-plus"></i> Add Leaves Request</a>
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
	</div>
	
<!-- 		<div class="col-sm-6 col-md-3">
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
			<button style="margin-bottom: 10px" class="btn btn-info map" data-url="{{ url('/emp_map') }}">Mapped</button>
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
	<-- /Search Filter -->

	<!-- Employee List Starts-->
	<div id="employeelist" class="tabcontent">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table datatable">
						<thead>
							<tr>
								<th>#</th>
								<th>Date Of Request</th>
								<th>Employee Name</th>
								<th>Leave Type</th>
								<th>Reason</th>
								<th>startDate</th>
								<th>EndDate</th>
								<th>No. Of Days</th>
								<th>Duration</th>
								<th>Status</th>
								<th>Leave Balance</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="myTable">
							<tr>
								<td><input type="checkbox" class="sub_chk1" data-id=""></td>
								<td>07-Mar-2021</td>
								<td>John</td>
								<td>Casual Leave</td>
								<td><textarea readonly="readonly">reason for leave</textarea></td>
								<td>12-Mar-2021</td>
								<td>15-Mar-2021</td>
								<td>3 Day(s)</td>
								<td>1st half/full day</td>
								<td>
									<select class="form-control" disabled="disabled">
										<option value="P" selected="selected">Pending</option>
										<option value="A">Approved</option>
										<option value="R">Reject</option>
										
									</select>
								</td>
								<td>20 Day(s)</td>
								<td style="text-align: center;">
									<a href="{{url('edit-leave-request')}}" class="action-icon"><i class="fa fa-pencil"></i></a>
								</td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- Employee List End -->
	<!-- edit leave request modal -->
	<div id="edit_leaverequest" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Leave Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                   
                    <div class="form-group">
                        <label class="col-form-label">Status <span class="text-danger">*</span></label>
                        <select class="select form-control select2-hidden-accessible" name="status" required="" data-select2-id="select2-data-1-t8qe" tabindex="-1" aria-hidden="true">
                            <option value="P" selected="selected" data-select2-id="select2-data-65-8tzy">Pending</option>
                            <option value="A" data-select2-id="select2-data-3-iv2w">Approve</option>
                            <option value="R" data-select2-id="select2-data-66-e42r">Reject</option>
                        </select>
                    </div>
                     <div class="form-group">
                    <label class="col-form-label">Note to employee <span class="text-danger">*</span></label>
                    <textarea class="form-control" placeholder="Note to employee"></textarea>
                    </div>
                   
                    <div class="submit-section">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal"
                                    class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



</div>
<!-- /Page Content -->


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
			alert(res.status);
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
</script>

@stop