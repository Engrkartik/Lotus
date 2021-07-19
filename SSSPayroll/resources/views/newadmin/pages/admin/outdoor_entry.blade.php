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
                <h3 class="page-title">Outdoor Entry Manual List</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active">Outdoor Entry Manual</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="add-outdoor-entry" class="btn add-btn"><i class="fa fa-plus"></i> Add Outdoor Entry Manual</a>
                
            </div>
        </div>
          <div class="col-md-12">
            <div class="row">
                <div class="col-md-12"><br>
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                              <div class="form-group form-focus select-focus">
                            <input type="date" class="form-control floating" id="from_date">
                            
                            <label class="focus-label">From Date</label>
                        </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-focus select-focus">
                            <input type="date" class="form-control floating" id="to_date">
                            
                            <label class="focus-label">To Date</label>
                        </div>
                            </div>
                            <div class="col-md-3">
                                <select name="outdoor_type" id="" class="form-control">
                                    <option value="Official">Official</option>
                                    
                                </select>
                            </div>
                           
                            <div class="col-md-2">
                                <button class="form-control btn btn-success"><i class="fa fa-filter"></i> Filter</button>
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
                <table class="table table-striped custom-table datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Employee Name</th>
                            <th>Number Of Days</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Begin Time</th>
                            <th>End Time</th>
                            <th>Outdoor Type</th>
                            <th>Remarks</th>
                            <th class="text-right no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      

                        <tr>
                            <td>1</td>
                            <td>name</td>
                            <td>2</td>
                            <td>13/04/2021</td>
                            <td>15/04/2021</td>
                            <td>9:30 Am </td>
                            <td>6:30 Pm</td>
                            <td>Official</td>
                            <td><textarea>Remarks......</textarea> </td>
                            <td>
                                <a class="pencil" href="edit-outdoor-entry"><i
                                        class="la la-pencil m-r-5"></i></a>
                                <a class="trash" href="#" data-toggle="modal"
                                    data-target=""><i class="fa fa-trash-o m-r-5"></i> </a>
                            </td>
                        </tr>

                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>





@stop