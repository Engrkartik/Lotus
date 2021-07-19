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
                <h3 class="page-title">Leave List</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Leave List</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="leaves-settings" class="btn add-btn"><i class="fa fa-plus"></i> Add Leave</a>
                <!-- <div class="view-icons">
                    <a href="employees" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                    <a href="employees-list" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                </div> -->
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12"><br>
                    <form action="{{url('filter_leave')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <select name="branch" id="" class="form-control">
                                    <option value="00">Select Branch</option>
                                    @foreach ($branch as $item=>$value)
                                    <option value="{{$value->name}}" @if (request()->branch==$value->name)
                                        selected='selected' @endif>{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="department" id="" class="form-control">
                                    <option value="00">Select Department</option>
                                    @foreach ($dept as $item=>$value)
                                    <option value="{{$value->id}}" @if (request()->department==$value->id)
                                        selected='selected' @endif>{{$value->name}} ( {{ $value->b_name }} )</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="designation" id="" class="form-control">
                                    <option value="00">Select Designation</option>
                                    @foreach ($desg as $item=>$value)
                                    <option value="{{$value->name}}" @if (request()->designation==$value->name)
                                        selected='selected' @endif>{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="status" id="" class="form-control">
                                    <option value="00" @if (request()->status=='00') selected='selected' @endif>Select
                                        Status</option>
                                    <option value="A" @if (request()->status=='A') selected='selected' @endif>Active
                                    </option>
                                    <option value="D" @if (request()->status=='D') selected='selected' @endif>In-Active
                                    </option>
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
                            <th> Leave Name</th>
                            <th>Number Of Leave</th>
                            <th>Leave Type</th>
                            <th>Leave Start</th>
                            <th class="text-center">Applied Rules</th>
                            <th>Status</th>
                            <th class="text-right no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leave as $item=>$value)

                        <tr>
                            <td>{{++$item}}</td>
                            <td><a href="{{url('view_leave/'.$value->id)}}" target="_blank">{{$value->name}}</a></td>
                            <td>{{$value->max_leave}} / {{$value->max_leave_effect}}</td>
                            <td>{{$value->leave_effect}}</td>
                            <td>{{$value->effect_type}} - {{$value->effect}}</td>
                            <td style="vertical-align: middle;display: inline-block;">
                                <a href="#" class="btn add-btn" data-toggle="modal"
                                    data-target="#edit_employee_{{$value->id}}"><i class="fa fa-plus"></i>View Rules</a>
                            </td>
                            <td>
                                <select class="form-control" onchange="change_st('{{$value->id}}','leaves',this.value);">
                                    <option value="A" @if ($value->status=='A')
                                        selected=""
                                    @endif>Active</option>
                                    <option value="D" @if ($value->status=='D')
                                        selected=""
                                    @endif>Inactive</option>
                                </select>
                            </td>
                            <!-- Edit Employee Modal -->
                            <div id="edit_employee_{{$value->id}}" class="modal custom-modal fade" role="dialog">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Applied Rules</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="list-unstyled">
                                                <ul style="color:rgb(255, 0, 98)">
                                                    @if($value->max_leave>0)
                                                    <li>Maximum number of leaves allowed <u><b>{{$value->max_leave}}</b> </u>
                                                        days /
                                                        <u><b>{{$value->max_leave_effect}}</b></u> .</li>
                                                    @endif
                                                    @if($value->max_carry_forward>0)
                                                    <li>Max <u><b>{{$value->max_carry_forward}}</b></u> C/F leave allowed in 
                                                        <u><b>{{$value->carry_forward}}</b></u></li>
                                                    <li>{{$value->carry_forward_treatment}}</b></u> leaves after
                                                        <u><b>{{$value->carry_forward}}</b></u> 
                                                    </li>
                                                    </li>
                                                    @endif
                                                    

                                                </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Edit Employee Modal -->

                            <td>
                                <a class="pencil" href="{{url('edit-leave/'.$value->id)}}"><i
                                        class="la la-pencil m-r-5"></i></a>
                                <a class="trash" href="#" data-toggle="modal"
                                    data-target="#delete_leave_{{$value->id}}"><i class="fa fa-trash-o m-r-5"></i> </a>
                            </td>
                        </tr>
                        <!-- Delete Employee Modal -->
                        <div class="modal custom-modal fade" id="delete_leave_{{$value->id}}" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="form-header">
                                            <h3>Delete Leave</h3>
                                            <p>Are you sure want to delete?</p>
                                        </div>
                                        <div class="modal-btn delete-action">
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{url('delete1/'.$value->id.'/leaves')}}"
                                                        class="btn btn-primary continue-btn">Delete</a>
                                                </div>
                                                <div class="col-6">
                                                    <a href="javascript:void(0);" data-dismiss="modal"
                                                        class="btn btn-primary cancel-btn">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Delete Employee Modal -->


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->

<!-- /Add Employee Modal -->




@stop