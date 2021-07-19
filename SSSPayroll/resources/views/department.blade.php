@extends('include.header')
@section('content')
@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif
<div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>List Of Departments</b></h3>
                <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModal">Add Department</button>
              </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="add_dept" method="POST">
    @csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <label for="name">Department Name</label>
                <input class="form-control" type="text" name="dept_name" placeholder="Department Name">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</form>
</div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
            @foreach($dept as $key=>$value)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$value->name}}</td>
                     <td><select class="form-control" onchange="change_st('{{$value->id}}','department',this.value);">
                      <option value="A" @if($value->status=='A'){{'selected="selected"'}}@endif >Active</option>
                      <option value="D" @if($value->status=='D'){{'selected="selected"'}}@endif >Inactive</option>
                    </select></td>
                    <td><a class="fa fa-edit" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal_{{$value->id}}"></a>&nbsp;&nbsp;
                      <a class="fa fa-trash" style="cursor: pointer;" href="{{url('delete1/'.$value->id.'/department')}}" onclick="return confirm('Are you sure?')"></a></td>
<div class="modal fade" id="exampleModal_{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="{{url('update_dept/'.$value->id)}}" method="POST">
    @csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <label for="name">Department Name</label>
                <input class="form-control" type="text" name="dept_name" value="{{$value->name}}" placeholder="Department Name">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</form>
</div>
                  </tr>
            @endforeach

                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            @endsection