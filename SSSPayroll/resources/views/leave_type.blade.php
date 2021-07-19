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
                <h3 class="card-title"><b>Leave Confriguration</b></h3>
                <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModal">Add Leave Type</button>
              </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="{{url('add_leave')}}" method="POST">
    @csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Leave Type</h5>
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
                <input class="form-control" type="text" name="name" placeholder="Name" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="name">Type</label>
                <select class="form-control" name="type" required>
                  <option value="">Select Option</option>
                  <option value="One-Time">One-Time</option>
                  <option value="Every-Month">Every-Month</option>
                  <option value="Quaterly">Quaterly</option>
                  <option value="Half-Yearly">Half-Yearly</option>
                  <option value="Every-Year">Every-Year</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="name">No. Of Leave</label>
                <input class="form-control" type="number" name="no_leave" placeholder="No Of Leave" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="name">Affective From</label>
                <input class="form-control" type="date" name="affect_from" required="">
              </div>
            </div>
             <div class="row">
              <div class="col-md-12">
                <input type="checkbox" name="carry_forward" id="carry_forward" value="No" onchange="click1()">
                <label for="name">Is Carry Forward</label>
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
                    <th>No. Of Leaves</th>
                    <th>Is Carry Forward</th>
                    <th>Affective From</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($leave as $key=>$value)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->type}}</td>
                    <td>{{$value->no_of_leave}}</td>
                    <td>{{$value->carry_forward}}</td>
                    <td>{{$value->affective_from}}</td>
                    <td><select class="form-control" onchange="change_st('{{$value->id}}','leave_type','D')">
                      <option @if($value->carry_forward=='A'){{'selected="selected"'}}@endif>Active</option>
                      <option @if($value->carry_forward=='D'){{'selected="selected"'}}@endif>In-Active</option>
                    </select></td>
                    <td><a href="#" class="fa fa-edit" data-toggle="modal" data-target="#exampleModal_{{$value->id}}"></a>&nbsp;&nbsp;
                      <a href="{{url('delete1/'.$value->id.'/leave_type')}}" class="fa fa-trash"></a></td>
<div class="modal fade" id="exampleModal_{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Leave Type</h5>
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
                <input type="text" class="form-control" id="name_{{$value->id}}" value="{{$value->name}}">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="name">Type</label>
                <select class="form-control" id="type_{{$value->id}}" required>
                  <option value="">Select Option</option>
                  <option value="One-Time" @if($value->type=='One-Time'){{'selected="selected"'}}@endif>One-Time</option>
                  <option value="Every-Month" @if($value->type=='Every-Month'){{'selected="selected"'}}@endif>Every-Month</option>
                  <option value="Quaterly" @if($value->type=='Quaterly'){{'selected="selected"'}}@endif>Quaterly</option>
                  <option value="Half-Yearly" @if($value->type=='Half-Yearly'){{'selected="selected"'}}@endif>Half-Yearly</option>
                  <option value="Every-Year" @if($value->type=='Every-Year'){{'selected="selected"'}}@endif>Every-Year</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="name">No Of Leave</label>
                <input type="number" class="form-control" id="no_leave_{{$value->id}}" value="{{$value->no_of_leave}}">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="name">Affective From</label>
                <input class="form-control" type="date" id="affect_from_{{$value->id}}" value="{{$value->affective_from}}" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <input type="checkbox" id="carry_forward_{{$value->id}}" value="{{$value->carry_forward}}" @if($value->carry_forward=='Yes'){{'checked="checked"'}}@endif onchange="click1()">
                <label for="name">Is Carry Forward</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="update_leave('{{$value->id}}')">Save changes</button>
      </div>
    </div>
  </div>
</div>
                  </tr>
                  @endforeach
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      <script type="text/javascript">
        function click1() {
          var val;
          var cf=document.getElementById('carry_forward');
          if(cf.checked)
          {
            document.getElementById('carry_forward').value='Yes';
          }else{
            document.getElementById('carry_forward').value='No';
          }
          // alert(val);
        }

        function update_leave(id) {
          // console.log(id);
          var name=document.getElementById('name_'+id).value;
          var type=document.getElementById('type_'+id).value;
          var no_leave=document.getElementById('no_leave_'+id).value;
          var carry_forward=document.getElementById('carry_forward_'+id).value;
          var affective_from=document.getElementById('affect_from_'+id).value;
          // console.log(name);
          $.ajax({
            type:"POST",
            url:'{{route('update_leave')}}',
            data:{'id':id,'name':name,'type':type,'no_leave':no_leave,'carry_forward':carry_forward,'affective_from':affective_from,'_token':'{{csrf_token()}}'},
            success:function(res) {
              if(res.status==true)
              {
                window.location.href="{{url('leave_type')}}";
              }else
              {
                alert(res.msg);
              }
            }
          });
        }
      </script>
            @endsection