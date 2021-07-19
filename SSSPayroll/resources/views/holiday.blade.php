@extends('include.header')
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
<div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12">
                        <h3 class="card-title"><b>List Of Holidays</b></h3>                      
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8"></div>
                      <div class="col-md-2">
                        <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModal">Add Holiday Group</button></div>
                        <div class="col-md-2">
                        <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModal2">Add Holiday List</button>        
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="{{url('holiday_group')}}" method="POST">
    @csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Holiday Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Name" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="name">Description</label>
                <input class="form-control" type="text" name="desc" id="name" placeholder="Description" required="">
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
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="{{url('holiday_list')}}" method="POST">
    @csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Holiday List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Name" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="name">Type</label>
                <select class="form-control" name="type" required>
                  <option value="">Select Option</option>
                  <option value="regular">Regular</option>
                  <option value="optional">Optional</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="name">Date</label>
                <input class="form-control" type="date" name="date" required>
              </div>
            </div>
             <div class="row">
              <div class="col-md-12">
                <label for="name">Group</label>
                <select class="form-control" name="group" required>
                  @foreach($group as $value)
                  <option value="{{$value->id}}">{{$value->name}}</option>
                  @endforeach
                </select>
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
                    <th>Name</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Group</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($list as $key=>$value)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->type}}</td>
                    <td>{{$value->holiday_date}}</td>
                    <td>{{$value->h_name}}</td>
                    <td>
                      <a class="fa fa-edit" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal_{{$value->id}}"></a>&nbsp;&nbsp;&nbsp;
                      <a class="fa fa-trash" href="{{url('delete1/'.$value->id.'/holiday_list')}}" style="cursor: pointer;"></a>
<div class="modal fade" id="exampleModal_{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="{{url('update_holiday_list/'.$value->id)}}" method="POST">
    @csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Holiday List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{$value->name}}" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="name">Type</label>
                <select class="form-control" name="type" required>
                  <option value="">Select Option</option>
                  <option value="regular" @if($value->type=='regular'){{'selected="selected"'}}@endif>Regular</option>
                  <option value="optional" @if($value->type=='optional'){{'selected="selected"'}}@endif>Optional</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="name">Date</label>
                <input class="form-control" type="date" name="date" value="{{$value->holiday_date}}" required>
              </div>
            </div>
             <div class="row">
              <div class="col-md-12">
                <label for="name">Group</label>
                <select class="form-control" name="group" required>
                  <option value="">Select Option</option>
                  @foreach($group as $value1)
                  <option value="{{$value1->id}}" @if($value->working_group==$value1->id){{'selected="selected"'}}@endif>{{$value1->name}}</option>
                  @endforeach
                </select>
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
                      </td>
                  </tr>
                  @endforeach
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
<script type="text/javascript">
   
</script>
            @endsection