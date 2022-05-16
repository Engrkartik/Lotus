@extends('newadmin.layouts.default')
@section('content')
    <!-- Page Wrapper -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header not">
						<div class="row align-items-center">
							<div class="col">
				<h3 class="page-title">Attendance</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Attendance</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<i class="fa fa-close text-danger">Absent</i>&nbsp;&nbsp;
				<i class="fa fa-check text-success">Present</i>&nbsp;&nbsp;
				<i class="fa fa-universal-access text-info">Leave</i>&nbsp;&nbsp;
				<i class="fa fa-clock-o text-warning">Not Check Out</i>&nbsp;&nbsp;
				<i class="fa fa-dot-circle-o text-purple">Week-Off</i>&nbsp;&nbsp;
				
			</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Search Filter -->
			<div class="row filter-row">
				
				<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<label class="focus-label">Branch Name</label>

							<select class="form-control floating"  id="branch">
								<option value='00' selected="" disabled="">-----------</option>
								<option value='01'>All Branch</option>
							@foreach($branch as $key=>$value)
							<option value='{{$value->id}}' @if(request()->bid==$value->id) selected="selected" @endif>{{$value->name}}</option>

							@endforeach
							</select>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">		
							<label class="focus-label">Designation</label>

							<select class="form-control floating"  id="desg">
								<option value='00' selected="" disabled="">-----------</option>
							@foreach($desg as $key=>$value)
							<option value='{{$value->name}}' @if(request()->desg==$value->name) selected="selected" @endif>{{$value->name}}</option>

							@endforeach
							</select>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<label class="focus-label">Department</label>

							<select class="form-control floating"  id="dept">
								<option value='00' selected="" disabled="">-----------</option>
							@foreach($dept as $key=>$value)
							<option value='{{$value->name}}' @if(request()->dept==$value->name) selected="selected" @endif>{{$value->name}}</option>

							@endforeach
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
							@if(request()->val!='null') value="{{request()->val}}" @endif>
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
								<table class="table table-striped custom-table table-nowrap mb-0" id="myTable">
									<thead>
										<tr>
											<th>Employee</th>
											@php
                    						if((request()->val!='null') && (request()->val!=''))
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
										@foreach($emp as $key=>$value)
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
                    						}else
                    						{
                    						$d=cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));
                    						}
											$e_id=$value->id;
											$Sunday=1;
											for($i=1;$i<=$d;$i++)
											{

												$style='';
												$modal='';
												$min=0;
												$in_min=0;
												$out_min=0;
												$resp_i=0;
												$resp_o=0;
												if((request()->val!='null') && (request()->val!=''))
												{
	                    							$mon=date('m',strtotime(request()->val));
													$yr=date('Y',strtotime(request()->val));
	                    						}else
	                    						{
	                    							$mon=date('m');
													$yr=date('Y');
	                    						
	                    						}
												
												$date=$yr.'-'.$mon.'-'.$i;
												$dj=date('d-M-Y',strtotime($date));
												$weekk=date('l', strtotime($date));
												
													$weeks1= $value->week1;	
													$j=0;
													$c_arr=0;
													if(($weekk=='Monday') && ($i!='1'))
													{
															$Sunday+=1;
													
													}
													if($value->addon_week=='all')
													{
														if($value->addon_day=='First_day')
														{
															if($i=='1')
															{
																$style='fa fa-dot-circle-o text-purple';
																$modal='pointer-events:none;';
																$j=0;
															}else
														{
														$weeks=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
														$token = explode(',',$weeks);
														$c_arr= count($token);
														$j=0;
														goto query;
														}
														}elseif ($value->addon_day=='Last_day') 
														{
															if($i==$d)
															{
																$style='fa fa-dot-circle-o text-purple';
																$modal='pointer-events:none;';
																$j=0;
															}else
														{
														$weeks=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
														$token = explode(',',$weeks);
														$c_arr= count($token);
														$j=0;
														goto query;
														}
														}elseif ($value->addon_day==$weekk) 
														{
															
																$style='fa fa-dot-circle-o text-purple';
																$modal='pointer-events:none;';
																$j=0;
															
														}
														else
														{
															$weeks=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
															$token = explode(',',$weeks);
															$c_arr= count($token);
															$j=0;
															goto query;
														}
													}elseif ($value->addon_week=='Week_1') {
														if($value->addon_day=='First_day')
														{ 
															if($i=='1')
															{
																$style='fa fa-dot-circle-o text-purple';
																$modal='pointer-events:none;';
																$j=0;
															}
															else
															{
															$weeks=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
															$token = explode(',',$weeks);
															$c_arr= count($token);
															$j=0;
															goto query;
															}
														}elseif ($value->addon_day=='Last_day') 
														{
															$weeksT=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
															$tokenT = explode(',',$weeksT);
															$c_arrT= count($tokenT)-1;
															// echo $tokenT[$c_arrT]."/".$weekk."/".$Sunday;
															if(($Sunday=='1') && ($tokenT[$c_arrT]==$weekk))
															{
																$style='fa fa-dot-circle-o text-purple';
																$modal='pointer-events:none;';
																$j=0;
															}else
														{
														$weeks=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
														$token = explode(',',$weeks);
														$c_arr= count($token);
														$j=0;
														goto query;
														}
														}elseif (($Sunday=='1') && ($value->addon_day==$weekk)) 
														{
															
																$style='fa fa-dot-circle-o text-purple';
																$modal='pointer-events:none;';
																$j=0;
															
														}
														else
														{
															$weeks=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
															$token = explode(',',$weeks);
															$c_arr= count($token);
															$j=0;
															goto query;
														}
													}elseif ($value->addon_week=='Week_2') {
														if($value->addon_day=='First_day')
														{ 
															if(($Sunday=='2') && ($weekk=='Monday'))
															{
																$style='fa fa-dot-circle-o text-purple';
																$modal='pointer-events:none;';
																$j=0;
															}
															else
															{
															$weeks=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
															$token = explode(',',$weeks);
															$c_arr= count($token);
															$j=0;
															goto query;
															}
														}elseif ($value->addon_day=='Last_day') 
														{
															$weeksT=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
															$tokenT = explode(',',$weeksT);
															$c_arrT= count($tokenT)-1;
															if(($Sunday=='2') && ($tokenT[$c_arrT]==$weekk))
															{
																$style='fa fa-dot-circle-o text-purple';
																$modal='pointer-events:none;';
																$j=0;
															}else
														{
														$weeks=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
														$token = explode(',',$weeks);
														$c_arr= count($token);
														$j=0;
														goto query;
														}
														}elseif ((Sunday=='2') && ($value->addon_day==$weekk)) 
														{
															
																$style='fa fa-dot-circle-o text-purple';
																$modal='pointer-events:none;';
																$j=0;
															
														}
														else
														{
															$weeks=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
															$token = explode(',',$weeks);
															$c_arr= count($token);
															$j=0;
															goto query;
														}
													}elseif ($value->addon_week=='Week_3') {
														if($value->addon_day=='First_day')
														{ 
															if(($Sunday=='3') && ($weekk=='Monday'))
															{
																$style='fa fa-dot-circle-o text-purple';
																$modal='pointer-events:none;';
																$j=0;
															}
															else
															{
															$weeks=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
															$token = explode(',',$weeks);
															$c_arr= count($token);
															$j=0;
															goto query;
															}
														}elseif ($value->addon_day=='Last_day') 
														{
															$weeksT=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
															$tokenT = explode(',',$weeksT);
															$c_arrT= count($tokenT)-1;
															if(($Sunday=='3') && ($tokenT[$c_arrT]==$weekk))
															{
																$style='fa fa-dot-circle-o text-purple';
																$modal='pointer-events:none;';
																$j=0;
															}else
														{
														$weeks=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
														$token = explode(',',$weeks);
														$c_arr= count($token);
														$j=0;
														goto query;
														}
														}elseif (($Sunday=='3') &&($value->addon_day==$weekk)) 
														{
															
																$style='fa fa-dot-circle-o text-purple';
																$modal='pointer-events:none;';
																$j=0;
															
														}
														else
														{
															$weeks=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
															$token = explode(',',$weeks);
															$c_arr= count($token);
															$j=0;
															goto query;
														}
													}elseif ($value->addon_week=='Week_4') {
														if($value->addon_day=='First_day')
														{ 
															if(($Sunday=='4') && ($weekk=='Monday'))
															{
																$style='fa fa-dot-circle-o text-purple';
																$modal='pointer-events:none;';
																$j=0;
															}
															else
															{
															$weeks=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
															$token = explode(',',$weeks);
															$c_arr= count($token);
															$j=0;
															goto query;
															}
														}elseif ($value->addon_day=='Last_day') 
														{
															$weeksT=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
															$tokenT = explode(',',$weeksT);
															$c_arrT= count($tokenT)-1;
															if(($Sunday=='4') && ($tokenT[$c_arrT]==$weekk))
															{
																$style='fa fa-dot-circle-o text-purple';
																$modal='pointer-events:none;';
																$j=0;
															}else
														{
														$weeks=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
														$token = explode(',',$weeks);
														$c_arr= count($token);
														$j=0;
														goto query;
														}
														}elseif (($Sunday=='4') && ($value->addon_day==$weekk)) 
														{
															
																$style='fa fa-dot-circle-o text-purple';
																$modal='pointer-events:none;';
																$j=0;
															
														}
														else
														{
															$weeks=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
															$token = explode(',',$weeks);
															$c_arr= count($token);
															$j=0;
															goto query;
														}
													}
													else
													 {
														$weeks=str_replace(']','',str_replace('"','',str_replace('[','',$weeks1)));
														$token = explode(',',$weeks);
														$c_arr= count($token);
														$j=0;
														goto query;
													}
													query:while ($j < $c_arr)
														{
															if($token[$j]==$weekk)
															{
																$resp_in=App\Http\Controllers\Newadmin\Attendance1::att_report1($e_id,$date,'ASC','IN');
																$resp_out=App\Http\Controllers\Newadmin\Attendance1::att_report1($e_id,$date,'DESC','OUT');
																$resp_leave=App\Http\Controllers\Newadmin\Attendance1::att_report1($e_id,$date,'DESC','L');
																
																if(($resp_in[1]=="IN") && ($resp_out[1]=="OUT"))
																{
																	$style='fa fa-check text-success';
																	$resp_i=date('h:i:s A',strtotime($resp_in[0]));
																	$resp_o=date('h:i:s A',strtotime($resp_out[0]));
																	$modal='';
																	$time1 = date('H:i:s',strtotime($resp_in[0]));
																	$time = explode(':', $time1);
																	$in_min=(($time[0]*60) + ($time[1]) + ($time[2]/60));
																	$time2 = date('H:i:s',strtotime($resp_out[0]));
																	$time1 = explode(':', $time2);
																	$out_min=(($time1[0]*60) + ($time1[1]) + ($time1[2]/60));
																	if($out_min > $in_min)
																		{
																			$min=($out_min - $in_min);
																			$hours = floor($min / 60);
																			$minutes = ($min % 60);
																			$min=$hours.':'.$minutes.' hrs';
																		}
																		else
																		{
																			$min=($in_min - $out_min);
																			$hours = floor($min / 60);
																			$minutes = ($min % 60);
																			$min=$hours.':'.round($minutes,2).' hrs';
																		}
																}
																elseif($resp_leave[1]=="L")
																{
																	$style='fa fa-universal-access text-info';
																	$modal='pointer-events:none;';
																}
																elseif(($resp_in[1]=="IN") && ($resp_out[1]=="W"))
																{
																	$style='fa fa-clock-o text-warning';
																	$resp_i=date('h:i:s A',strtotime($resp_in[0]));
																	$resp_o='__________';
																	$modal='';
																	$time1 = date('H:i:s',strtotime($resp_i));
																	$time = explode(':', $time1);
																	$in_min=(($time[0]*60) + ($time[1]) + ($time[2]/60));
																	$min=$in_min;
																	$hours = floor($min / 60);
																	$minutes = ($min % 60);
																	$min=$hours.':'.round($minutes,2).' hrs';
																}elseif(($resp_in[1]=="W") && ($resp_out[1]=="OUT"))
																{
																	$style='fa fa-clock-o text-warning';
																	$resp_o=date('h:i:s A',strtotime($resp_out[0]));
																	$resp_i='__________';
																	$modal='';
																	$time1 = date('H:i:s',strtotime($resp_o));
																	$time = explode(':', $time1);
																	$in_min=(($time[0]*60) + ($time[1]) + ($time[2]/60));
																	$min=$in_min;
																	$hours = floor($min / 60);
																	$minutes = ($min % 60);
																	$min=$hours.':'.round($minutes,2).' hrs';
																}elseif (($resp_in[1]=='W') && ($resp_out[1]=='W') && ($resp_leave[1]=='W')) {
																	$style='fa fa-close text-danger';
																	$modal='pointer-events:none;';
																	$min='';
																}
																break;
															}
															else
																{
																	
																	$style='fa fa-dot-circle-o text-purple';
																	$modal='pointer-events:none;';
																	
																}
																	
																	$j++;
												
														}
												
														
											
											@endphp

											<td>

											<a data-toggle="modal" data-target="#attendance_info_{{$value->id}}_{{$i}}" style="{{$modal}}">
												
												<i class="{{$style}}"></i></a>
												<!-- Attendance Modal -->
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
												<h5 class="card-title">Timesheet <small class="text-muted">{{$dj}}</small></h5>
												<div class="punch-det">
													<h6>Punch In at</h6>
													<p>{{$weekk}}, {{$dj}}, {{$resp_i}}</p>
												</div>
												<div class="punch-info">
													<div class="punch-hours">
														<span>{{$min}}</span>
													</div>
												</div>
												<div class="punch-det">
													<h6>Punch Out at</h6>
													<p>{{$weekk}}, {{$dj}}, {{$resp_o}}</p>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="card recent-activity">
											<div class="card-body">
												<h5 class="card-title">Activity</h5>
												<ul class="res-activity-list">
													@php
													
													$res=App\Http\Controllers\Newadmin\Attendance1::att_report($e_id,$date,'ASC');
													$resp=json_decode($res);
													foreach($resp as $key1=>$value1)
													{
													@endphp
													<li>
														<p class="mb-0">Punch at</p>
														<p class="res-activity-time">
															<i class="fa fa-clock-o"></i>
															{{date('h:i:s A',strtotime($value1->punch))}}
														</p>
													</li>
													@php
													}
													@endphp
													
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
															</td>

				<!-- /Attendance Modal -->
			
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
		if(bid=='01')
		{
			window.location.href='http://34.72.9.224/SSSPayroll/attendance/';
		}else
		{
		$.ajax({
			type:"POST",
			url:'{{route('filter')}}',
			data:{'bid':bid,'yr_mon':mon_yr,'dept':dept,'desg':desg,'_token':token},
			success:function(data) {
				// alert(data.status);
				if(data.status==true)
				{
				window.location.href='http://34.72.9.224/SSSPayroll/attendance_f/'+data.bid+'/'+data.mon;
				}else{
				alert('This branch has '+data.bid+' employee..!!!');

				}
				// body...
				}
			});
		}
	}
	   
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