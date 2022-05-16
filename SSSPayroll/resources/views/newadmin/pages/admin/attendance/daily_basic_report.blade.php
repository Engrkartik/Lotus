@extends('newadmin.layouts.default')
@section('content')
    <!-- Page Wrapper -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header not">
						<div class="row align-items-center">
							<div class="col">
				<h3 class="page-title">Daily Basic Attendance Report</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Attendance Report</li>
				</ul>
			</div>
		<!-- 	<div class="col-auto float-right ml-auto">
				<i class="fa fa-close text-danger">Absent</i>&nbsp;&nbsp;
				<i class="fa fa-check text-success">Present</i>&nbsp;&nbsp;
				<i class="fa fa-universal-access text-info">Leave</i>&nbsp;&nbsp;
				<i class="fa fa-clock-o text-warning">Not Check In/Out</i>&nbsp;&nbsp;
				<i class="fa fa-dot-circle-o text-purple">Week-Off</i>&nbsp;&nbsp;
				<i class="fa fa-calendar-times-o text-holiday">Holiday</i>
				<i class="fa fa-circle-o-notch text-duty">Not On-Duty</i>
			</div> -->
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
								<option value='01'>All Branch</option>
							
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
							<input type="date" class="form-control floating" id="dates" onclick="currentDate();">
							
							<label class="focus-label">Filter Date</label>
						</div>
					</div>

					<div class="col-sm-6 col-md-2 ">  
						<button class="btn btn-success btn-block" onclick="filter_data()"><i class="fa fa-filter" aria-hidden="true"></i>&nbsp;&nbsp;Filter</button>  
					</div> 
					<div class="col-sm-6 col-md-6 ">  
					  
					</div>
					 <div class="col-sm-6 col-md-4 ">  
					<div class="col-auto float-right ml-auto">
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-white" onclick="download_table_as_csv('myTable');">Excel</button>
                        <button class="btn btn-white" id="create_pdf">PDF</button>
                        <button class="btn btn-white" id="printPageButton" onclick="window.print();"><i class="fa fa-print fa-lg"></i> Print</button>
                    </div>
                </div>
				</div>    
			</div>
			<br>
			<div class="content-print">
			<h3 style="text-align: center;">Daily Basic Attendance Report</h3>
			<h4 style="text-align: center;"><?php echo  date("d/m/Y") ." To ". date("d/m/Y");?></h4>
			
			<h3 style="text-align: right;" id="currentTime">Generated On: <?php echo  date("d/m/Y");?></h3>
		</div>
			<div class="printing" style="border-top: 1px solid black;">

                    <div class="row filter-row" style="padding-top: 16px;">
                  
						<div class="col-sm-6 col-md-6">  
							<div class="form-group form-focus">
								<h4>Attendance Date: <?php echo  date("d/m/Y");?></h4>
								<h4>Department: Accounts</h4>
							</div>
						</div>
				
                    </div>
					<!-- /Search Filter -->
					
                    <div class="row">
                        <div class="col-lg-12">
                        	
							<div class="table-responsive">
								<table class="table table-striped custom-table table-nowrap mb-0" id="myTable">
									<thead>
										<tr>
											<th>S.No.</th>
											<th>Employee Code</th>
											<th>Employee Name</th>
											<th>Shift</th>
											<th>A.In Time</th>
											<th>A.Out Time</th>
											<th>D.Break D</th>
											<th>W.Duration</th>
											<th>OT</th>
											<th>T Duration</th>
											<th>Status</th>
											<th>Remarks</th>		
										</tr>
									</thead>
									<tbody>
										
										<tr>
											<td>1</td>
											<td>021</td>
											<td>Gaurav</td>
											<td>GS</td>
											<td>09:02:15</td>
											<td>00:00</td>
											<td>0</td>
											<td>00:00</td>
											<td>0</td>
											<td>0</td>
											<td>A</td>
											<td></td>
										</tr>
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
				window.location.href='http://34.72.9.224/SSSPayroll/daily-basic-report/'+bid+'/'+mon_yr+'/'+dept+'/'+desg;
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
    var filename = 'daily_basic_report' + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

var today = new Date();
var time = today.getHours() + ":" + today.getMinutes();
  document.getElementById("currentTime").value = time;

function currentDate(){
    var dtToday = new Date();
  var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
  var day = dtToday.getDate();
  var year = dtToday.getFullYear();
  if(month < 10)
      month = '0' + month.toString();
  if(day < 10)
      day = '0' + day.toString();

  var maxDate = year + '-' + month + '-' + day;
  $('#dates').attr('max', maxDate);
}
     
</script>
         
   @stop

