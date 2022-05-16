@extends('newadmin.layouts.default')
@section('content')
    <!-- Page Wrapper -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header not">
						<div class="row align-items-center">
							<div class="col">
				<h3 class="page-title">Increment Report</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Increment Report</li>
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
							<label>Salary Structure</label>

							<select class="form-control floating"  id="salary_structure">
								<option value='00' selected="" disabled="">-----------</option>
								<option value='01'>Salary Structure</option>
							
							</select>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<label>Employee Name</label>

							<input type="text" name="emp_name" placeholder="Search for Employee Name">
						</div>
					</div>
					<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<label>Employee Code</label>

							<input type="text" name="emp_code" placeholder="Search for Employee Code">
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
							<label>Payroll Month</label>
							<input type="month" class="form-control floating" id="pay_mnth" onclick="currentDate();">	
						</div>
					</div>
				</div>
				<br>
				<div class="row filter-row not">
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
			<h6 style="text-align: center;">Increment Report</h6>
		</div>
			<div class="printing" style="border-top: 1px solid black;">
					<!-- /Search Filter -->
					
                    <div class="row mt-2">
                        <div class="col-lg-12">
                        	
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable mb-0" id="myTable">
									<thead>
										<tr>
											<th>S.No.</th>
											<th>Emp Code</th>
											<th>Emp Name</th>
											<th>Company</th>
											<th>Category</th>
											<th>Department</th>
											<th>Status</th>
											<th>Gross Salary</th>
											<th>CTC</th>
											<th>Total</th>
													
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>022</td>
											<td>Gaurav</td>
											<td>SSS Sales</td>
											<td>Default Category</td>
											<td>Marketing</td>
											<td>Working</td>
											<td>28,300.00</td>
											<td>28,300.00</td>
											<td>0.00</td>
											
										</tr>
										<tr>
											<td>2</td>
											<td>021</td>
											<td>Dhyanesh</td>
											<td>SSS Sales</td>
											<td>Default Category</td>
											<td>Marketing</td>
											<td>Working</td>
											<td>28,300.00</td>
											<td>28,300.00</td>
											<td>0.00</td>
											
										</tr>
										<tr>
											<td>3</td>
											<td>020</td>
											<td>Kartik</td>
											<td>SSS Sales</td>
											<td>Default Category</td>
											<td>Marketing</td>
											<td>Working</td>
											<td>28,300.00</td>
											<td>28,300.00</td>
											<td>0.00</td>
											
										</tr>
									</tbody>
								</table>
							</div>
                        </div>
                    </div>
                    <br>
                    <div class="section" style="border:1px solid #0000002b; padding: 20px;">
                    	<table>
                    		<tr>
                    			<td>Salary Head &nbsp;</td>
                    			<td>
                    			 <select style="padding: 10px;">
                    			 <option>Gross & CTC </option>
                    		     </select>
                    	       </td>
                    		</tr>
                    			<tr>
                    			<td>By Amount &nbsp;</td>
                    			<td>
                    			<input type="number" name="amount" placeholder="0.00" style="width: 60%;">
                    		   </td>
                    		</tr>
                    			<tr>
                    			<td>By Percentage &nbsp;</td>
                    			<td>
                    			<input type="number" placeholder="0.00" name="percent" style="width: 60%;">
                    		   </td>
                    		</tr>
                    		<tr>
                    			<td>Effective From &nbsp;</td>
                    			<td>
                    			<input type="month" name="effective_month" style="width: 60%;">
                    		   </td>
                    		</tr>
                    	</table>
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
    var filename = 'Increment-Report' + '.csv';
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

