@extends('newadmin.layouts.default')
@section('content')
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

<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Designation</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active">Designation</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_department"><i
                        class="fa fa-plus"></i> Add Designation</a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">
            <div>
                <table class="table table-striped custom-table mb-0 datatable">
                    <thead>
                        <tr>
                            <th style="width: 30px;">#</th>
                            <th>Designation Name</th>
                            <th >Status</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($desg as $item=>$value)
                        <tr>
                            <td>{{++$item}}</td>
                            <td>{{$value->name}}</td>
                            <td>
                                <select class="form-control" onchange="change_st('{{$value->id}}','designation',this.value);">
                                    <option @if($value->status=='A') selected="selected" @endif value="A">Active</option>
                                    <option @if($value->status=='D') selected="selected" @endif value="D">In-Active</option>
                                </select>
                               </td>
                            <td >
                                <a class="pencil" href="#" data-toggle="modal" data-target="#edit-department_{{$value->id}}"><i
                                        class="la la-pencil m-r-5"></i></a>
                                <a class="trash" href="#" data-toggle="modal" data-target="#delete-department_{{$value->id}}"><i
                                        class="fa fa-trash-o m-r-5"></i> </a>
                            </td>
                        </tr> 
                        <!-- Edit Designation Modal -->
<div id="edit-department_{{$value->id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Designation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('update_designation/'.$value->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Designation Name <span class="text-danger">*</span></label>
                        <input class="form-control" value="{{$value->name}}" name="name" type="text">
                    </div>
                    <div class="submit-section">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary submit-btn">Save</button>
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
<!-- /Edit Department Modal -->

<!-- Delete Department Modal -->
<div class="modal custom-modal fade" id="delete-department_{{$value->id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Designation</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{url('delete1/'.$value->id.'/designation')}}" class="btn btn-primary continue-btn">Delete</a>
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
<!-- /Delete Department Modal -->   
                        @endforeach
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->

<!-- Add Designation Modal -->
<div id="add_department" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Designation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('add_designation')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Designation Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name">
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
<!-- /Add Designation Modal -->


@stop