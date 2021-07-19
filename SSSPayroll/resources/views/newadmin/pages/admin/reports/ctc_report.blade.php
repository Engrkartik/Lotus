@extends('newadmin.layouts.default')
@section('content')
    <!-- Page Wrapper -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header not">
						<div class="row align-items-center">
							<div class="col">
				<h3 class="page-title">CTC Report</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">CTC Report</li>
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
							<label>Year</label>
							<input type="month" name="year">
						</div>
					</div>
					<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<label>Payroll Month</label>

							<input type="month" name="payroll_month">
						</div>
					</div>
					<div class="col-sm-6 col-md-3">  
						<div class="form-group form-focus">
							<label>Employee</label>

							<select name="emp_name" placeholder="Search Employee By Name" class="form-control floating">
								<option>Name1</option>
								<option>Name2</option>
								
							</select>
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
				<div class="content-print">
			<h3 style="text-align: center;">Saraogi Super Sales PVT LTD.</h3>
			<br>
			<h5 style="text-align: center;">Gandhi Nagar( New Delhi)</h5>
			<br>
			<h5 style="text-align: center;">Employee's CTC Details</h5>
		    </div>
			
			<div class="printing">
					<!-- /Search Filter -->
					
                    <div class="row" style="padding-top: 25px;">
                        <div class="col-lg-12">
                        	
							<div class="table-responsive">
								<table class="table custom-table mb-0" id="myTable">

									<tbody>
										<tr>
										 <td>Employee Name:</td>
										 <td colspan="2">Gaurav </td>
										 <td>Designation:</td>
										 <td colspan="2">Marketing manager</td>
										
										 
										</tr>
										<tr>
											<td>Department:</td>
											<td colspan="2">Marketing Department</td>
											<td></td>
											<td></td>
											<td></td>
											
										</tr>
										<tr>
											<td>Joining Date:</td>
											<td colspan="2">08- Jan- 2017</td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td>Salary Month:</td>
											<td colspan="2">01- Jul - 2020</td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<tr style="text-align: center;">
											<th colspan="2">Earning(A)</th>
											<th colspan="2">Deduction(C)</th>
											<th colspan="2">Earning(B)</th>
										</tr>
										<tr>
											<td>Earning Head</td>
											<td>Amount(Rs.)</td>
											<td>Deduction Head</td>
											<td>Amount(Rs.)</td>
											<td>Earning Head</td>
											<td>Amount(Rs.)</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td>PF</td>
											<td>&#8377;0.00</td>
											<td>CPF</td>
											<td>&#8377;0.00</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td>PT</td>
											<td>&#8377;0.00</td>
											<td>CESI</td>
											<td>&#8377;0.00</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td>ESI</td>
											<td>&#8377;0.00</td>
											<td>BASIC</td>
											<td>&#8377;0.00</td>
										</tr>
										<tr>
											<th>Total </th>
											<th>&#8377;0.00</th>
											<th></th>
											<th>&#8377;0.00</th>
											<th></th>
											<th>&#8377;0.00</th>
										</tr>
										<tr>
											<th>Total on Hand(A-C) </th>
											<th>&#8377;0.00</th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
										</tr>
										<tr>
											<th>Total CTC (A+B) </th>
											<th>&#8377;0.00</th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
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
				window.location.href='http://34.72.9.224/SSSPayroll/ctc-report/'+bid+'/'+mon_yr+'/'+dept+'/'+desg;
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
    var filename = 'CTC-Report' + '.csv';
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

