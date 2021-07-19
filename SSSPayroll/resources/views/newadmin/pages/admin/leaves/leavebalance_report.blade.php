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
        <div class="row align-items-center not">
            <div class="col">
                <h3 class="page-title">Leave Balance Report</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active">Leave Balance Report</li>
                </ul>
            </div>

            <!-- <div class="col-auto float-right ml-auto">
                <a href="leaves-settings" class="btn add-btn"><i class="fa fa-plus"></i> Add Leave</a> -->
            <!-- <div class="view-icons">
                    <a href="employees" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                    <a href="employees-list" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                </div> -->
            <!-- </div> -->
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12"><br>
                    <form action="{{url('filter_leave')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <select name="branch" id="" class="form-control">
                                    <option value="00">Select Branch</option>

                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="department" id="" class="form-control">
                                    <option value="00">Select Department</option>

                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="designation" id="" class="form-control">
                                    <option value="00">Select Designation</option>

                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="designation" id="" class="form-control">
                                    <option value="00">Select Leave Type</option>
                                    <option value="CL">Casual Leave</option>
                                    <option value="SL">Sick Leave</option>
                                    <option value="ML">Maternity Leave</option>

                                </select>
                            </div>
                            <!-- <div class="col-md-2">
                                <select name="status" id="" class="form-control">
                                 
                                </select>
                            </div> -->
                            <div class="col-md-3 mt-2" style="float:left">
                                <button class="form-control btn btn-success"><i class="fa fa-filter"></i> <label
                                        for="name"> Filter</label></button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Header -->


    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <div class="not">
                <div class="col-auto float-right ml-auto">
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-white" onclick="download_table_as_csv('toprint');">CSV</button>
                        <button class="btn btn-white"><i class="far fa-file-pdf fa-lg"></i>PDF</button>
                        <button class="btn btn-white" id="printPageButton" onclick="window.print();"><i class="fa fa-print fa-lg"></i> Print</button>
                    </div>
                </div>
            </div>

                <table class="table table-striped custom-table datatable" id="toprint">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Employee Name</th>
                            <th>Leave Limit</th>
                            <th>Leave Type</th>
                            <th>Leave Taken</th>
                            <th>Leave Balance</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->
<!-- /Add Employee Modal -->


<script type="text/javascript">
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
    var filename = 'adminleave_balance_report' + '.csv';
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