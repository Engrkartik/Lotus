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
                <h3 class="page-title">Manual Leave List</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manual Leave List</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="add-manual-leave" class="btn add-btn"><i class="fa fa-plus"></i> Add Manual Leave</a>
                
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
                            <th>Leave Type</th>
                            <th>Number Of Days</th>
                            <th>Leave Start</th>
                            <th>Leave End</th>
                            <th>Leave Balance</th>
                            <th>Note To Employee</th>
                            <th class="text-right no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      

                        <tr>
                            <td>1</td>
                            <td>name</td>
                            <td>CL</td>
                            <td>2</td>
                            <td>13/04/2021</td>
                            <td>15/04/2021</td>
                            <td>5 </td>
                            <td><textarea>Note......</textarea> </td>
                            <td>
                                <a class="pencil" href="edit-manual-leave"><i
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