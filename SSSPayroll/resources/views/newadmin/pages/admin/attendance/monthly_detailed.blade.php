@extends('newadmin.layouts.default')
@section('content')
    <!-- Page Wrapper -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header not">
						<div class="row align-items-center">
							<div class="col">
				<h3 class="page-title">Monthly Detailed Attendance</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Attendance</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<i class="fa fa-close text-danger">Absent</i>&nbsp;&nbsp;
				<i class="fa fa-check text-success">Present</i>&nbsp;&nbsp;
				<i class="fa fa-universal-access text-info">Leave</i>&nbsp;&nbsp;
				<i class="fa fa-clock-o text-warning">Not Check In/Out</i>&nbsp;&nbsp;
				<i class="fa fa-dot-circle-o text-purple">Week-Off</i>&nbsp;&nbsp;
				<i class="fa fa-calendar-times-o text-holiday">Holiday</i>
				<i class="fa fa-circle-o-notch text-duty">Not On-Duty</i>
			</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Search Filter -->
			<div class="row filter-row not">
				
				<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<label class="focus-label">Branch Name</label>

							<select class="form-control floating"  id="branch">
								<option value='00' selected="" disabled="">-----------</option>
								<option value='all' @if(request()->bid=='all') selected="selected" @endif>All Branch</option>
							
							</select>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<label class="focus-label">Designation</label>

							<select class="form-control floating"  id="desg">
								<option value='00' selected="" disabled="">-----------</option>
							
							</select>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<label class="focus-label">Department</label>

							<select class="form-control floating"  id="dept">
								<option value='00' selected="" disabled="">-----------</option>
							
							</select>
						</div>
					</div>
					<!-- <div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<input type="text" class="form-control floating" oninput="myFunction(this.value,'myTable');">
							<label class="focus-label">Employee Name</label>
						</div>
					</div> -->
					<div class="col-sm-6 col-md-3"> 
						<div class="form-group form-focus select-focus">
							<input type="month" class="form-control floating"  id="mon_yr" 
							@if(request()->val!='null' && request()->val!='') value="{{request()->val}}" @else value="{{date('Y-m')}}" @endif>
							<label class="focus-label">Filter Month Year</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-2 not">  
						<button class="btn btn-success btn-block" onclick="filter_data()"><i class="fa fa-filter" aria-hidden="true"></i>&nbsp;&nbsp;Filter</button>  
					</div>     
			</div>
			<br>
                    <div class="row filter-row not">
                  
						<div class="col-sm-6 col-md-6">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" oninput="searchTable()" id="myInput">
								<label class="focus-label">Search For Employee Name</label>
							</div>
						</div>
						  <div class="col-sm-6 col-md-6">  
							<div class="col-auto float-right ml-auto">
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-white" onclick="download_table_as_csv('myTable');">Excel</button>
                        <button class="btn btn-white" id="create_pdf">PDF</button>
                        <button class="btn btn-white" id="printPageButton" onclick="window.print();"><i class="fa fa-print fa-lg"></i> Print</button>
                    </div>
                   </div>
						</div>
                    </div>
					<!-- /Search Filter -->
					
                    <div class="row">
                        <div class="col-lg-12">
                        	<div class="printing">
							<div class="table-responsive">
								<table class="table table-striped custom-table table-nowrap mb-0">
									<thead>
										<tr>
											<th>Employee</th>
											@php
                    						if((request()->val!='null') || (request()->val!=''))
											{
                    						$d=cal_days_in_month(CAL_GREGORIAN,date('m',strtotime(request()->val)),date('Y',strtotime(request()->val)));
                    						}else
                    						{
                    						$d=cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));
                    						}
											for($i=1;$i<=$d;$i++)
											{
											@endphp
											<th>{{$i}}</th>
											@php
											}
											@endphp
										</tr>
									</thead>
									<tbody id="myTable">
										@foreach()
										<tr>
											<td>
												<h2 class="table-avatar">
													<a class="avatar avatar-xs" href="https://dreamguys.co.in/smarthr/light/profile.html"><img alt="" src="https://dreamguys.co.in/smarthr/light/assets/img/profiles/avatar-09.jpg"></a>
													<a href="https://dreamguys.co.in/smarthr/light/profile.html">{{$value->emp_name}}</a>
												</h2>
											</td>
											@php
											$x=1;
											$d=0;
											if((request()->val!='null') && (request()->val!=''))
											{
                    						$d=cal_days_in_month(CAL_GREGORIAN,date('m',strtotime(request()->val)),date('Y',strtotime(request()->val)));
											$mon=date('m',strtotime(request()->val));
											$yr=date('Y',strtotime(request()->val));
                    						}else
                    						{
                    						$d=cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));
											$mon=date('m');
											$yr=date('Y');	
                    						}
											$e_id=$value->id;
											for($i=1;$i<=$d;$i++)
											{
												$date=date('Y-m-d',strtotime($yr.'-'.$mon.'-'.$i));
												
												$dj=date('d-M-Y',strtotime($date));
												$resp=App\Http\Controllers\Newadmin\Attendance1::att_report1($e_id,$date);
											@endphp

											<td>
												@if ($resp[1]=='A')
													<i class="{{$resp[0]}}"></i>
												@else
												
												<a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info_{{$value->id}}_{{$i}}">
													<i class="{{$resp[0]}}"></i>
												</a>
												@endif
											</td>
											
										<div class="modal custom-modal fade" id="attendance_info_{{$value->id}}_{{$i}}" role="dialog">
											<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Attendance Info</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<div class="row">
															<div class="col-md-6">
																<div class="card punch-status">
																	<div class="card-body">
																		@php
																		$resp_in=App\Http\Controllers\Newadmin\Attendance1::activity($e_id,$date,'ASC','IN');
																		// echo "App\Http\Controllers\Newadmin\Attendance1::activity($e_id,$date,'ASC','IN')";
																		$resp_out=App\Http\Controllers\Newadmin\Attendance1::activity($e_id,$date,'DESC','OUT');
																		@endphp
																		<h5 class="card-title">Timesheet <small class="text-muted">{{date('d-M-Y',strtotime($date))}}</small></h5>
																		<div class="punch-det">
																			<h6>Punch In at</h6>
																			<p>{{date('D',strtotime($date))}},
																			@foreach ($resp_in[0] as $key => $value)
																			{{date('d-M-Y h:i:s A',strtotime($value->punch_time))}}
																			@endforeach
																			</p>
																		</div>
																		<div class="punch-info">
																			<div class="punch-hours">
																				<span>
																				@php
																				$in_time=0;
																				$out_time=0;
																				$diff=0;

																				foreach ($resp_in[0] as $key => $value){
																					$in_time = explode(':',date('H:i:s',strtotime($value->punch_time)));
																					$in_time= round(($in_time[0]*60) + ($in_time[1]) + ($in_time[2]/60),0);
																				}
																				foreach ($resp_out[0] as $key => $value){
																					$out_time = explode(':',date('H:i:s',strtotime($value->punch_time)));
																					$out_time= round(($out_time[0]*60) + ($out_time[1]) + ($out_time[2]/60),0);
																				}
																				$diff=$out_time - $in_time;
																				// echo $out_time.'-'.$in_time;
																				@endphp	
																				{{floor($diff / 60).':'.($diff -   floor($diff / 60) * 60)}} hrs
																				</span>
																			</div>
																		</div>
																		<div class="punch-det">
																			<h6>Punch Out at</h6>
																			<p>{{date('D',strtotime($date))}}, 																			
																				@foreach ($resp_out[0] as $key => $value)
																				{{date('d-M-Y h:i:s A',strtotime($value->punch_time))}}
																			@endforeach
																		</div>
																		<div class="statistics">
																			<div class="row">
																				<div class="col-md-6 col-6 text-center">
																					<div class="stats-box">
																						<p>Break</p>
																						<h6>{{$resp_in[1]}} hr</h6>
																					</div>
																				</div>
																				<div class="col-md-6 col-6 text-center">
																					<div class="stats-box">
																						<p>Overtime</p>
																						<h6>{{$resp_in[3]}} hr</h6>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="card recent-activity">
																	<div class="card-body">
																		<h5 class="card-title">Activity</h5>
																		<ul class="res-activity-list">
																			@foreach ($resp_in[2] as $item => $data) 
																			
																			<li>
																				<p class="mb-0">Punch {{$data->punch_type}} at</p>
																				<p class="res-activity-time">
																					<i class="fa fa-clock-o"></i>
																					{{date('h:i:s A',strtotime($data->punch_time))}}
																				</p>
																			</li>
																			
																			@endforeach
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										@php
											}
											@endphp
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
                        </div>
                    </div>
                </div>
				<!-- /Page Content -->
				
			
            <!-- Page Wrapper -->
<script type="text/javascript">
	function filter_data() {
		var bid=document.getElementById('branch').value;
		var dept=document.getElementById('dept').value;
		var desg=document.getElementById('desg').value;
		var mon_yr=document.getElementById('mon_yr').value;
		var token='{{csrf_token()}}';
		// var bid=bid;
		console.log(mon_yr);
		// if(bid=='01')
		// {
		// 	window.location.href='http://34.72.9.224/SSSPayroll/attendance/';
		// }else
		// {
		// $.ajax({
		// 	type:"POST",
		// 	url:'{{route('filter')}}',
		// 	data:{'bid':bid,'yr_mon':mon_yr,'dept':dept,'desg':desg,'_token':token},
		// 	success:function(data) {
		// 		// alert(data.status);
		// 		if(data.status==true)
		// 		{
				window.location.href='http://34.72.9.224/SSSPayroll/monthly-detailed_f/'+bid+'/'+mon_yr+'/'+dept+'/'+desg;
				// }else{
				// alert('This branch has '+data.bid+' employee..!!!');

				// }
				// body...
				// }
			// });
		}
	// }
	   
	    function download_table_as_csv(table_id, separator = ',') {
    // Select rows from table_id
    var rows = document.querySelectorAll('table#' + table_id + ' tr');
    // Construct csv
    var csv = [];
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll('td, th');
        for (var j = 0; j < cols.length; j++) {
            // Clean innertext to remove multiple spaces and jumpline (break csv)
            var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ')
            // Escape double-quote with double-double-quote (see https://stackoverflow.com/questions/17808511/properly-escape-a-double-quote-in-csv)
            data = data.replace(/"/g, '""');
            // Push escaped string
            row.push('"' + data + '"');
        }
        csv.push(row.join(separator));
    }
    var csv_string = csv.join('\n');
    // Download it
    var filename = 'attendance_report' + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
     
</script>
            @stop