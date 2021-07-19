@extends('include.header')
@section('content')
<div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12">
                        <h3 class="card-title"><b>List Of Employees</b></h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                <a href="add_employee"><button type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Employee</button></a>
              </div>
              <div class="col-md-2">
                  <button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-filter" aria-hidden="true"></i>&nbsp;&nbsp;Joining Date</button>
              </div>
              <div class="col-md-6">
               <label class="col-md-12" style="float: right;"><textarea type="text" name="Search" placeholder="Search for Code/Name/Designation/Department/Branch" class="col-md-10" id="myInput" onkeyup="myFunction(this.value,'example1')" rows="2"></textarea><i class="fas fa-search"></i></label>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{url('emp_filter')}}" method="POST">
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><label>Joining Date Filter</label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <label>From Date</label>
                <input type="date" name="from_dt" class="form-control" max="{{date('Y-m-d')}}">
              </div>
              <div class="col-md-6">
                <label>To Date</label>
                <input type="date" name="to_dt" class="form-control" max="{{date('Y-m-d')}}">
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
  </form>
  </div>
</div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Emp. Code</th>
                    <th>Emp Name</th>
                    <th>Joining Date</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <!-- <th>Location</th> -->
                    <th>Branch</th>
                    <!-- <th>Create Payslip</th> -->
                    <th>Status</th>
                    <th>More</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($emp as $key=>$value)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$value->emp_code}}</td>
                    <td>{{$value->emp_name}}</td>
                    <td>{{date('d-M-Y',strtotime($value->joining_date))}}</td>
                    <td>{{$value->designation}}</td>
                    <td>{{$value->department}}</td>
                    <!-- <td>{{$value->current_add}}</td> -->
                    <td>{{$value->b_name}}</td>
                    <td><select class="form-control" onchange="change_st('{{$value->id}}','employee',this.value);">
                      <option value="A" @if($value->status=='A'){{'selected="selected"'}}@endif >Active</option>
                      <option value="D" @if($value->status=='D'){{'selected="selected"'}}@endif >Inactive</option>
                    </select></td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          More
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" type="button" href="#">Create Payslip</a>
                          <a class="dropdown-item" type="button" href="#" data-toggle="modal" data-target="#exampleModal1{{$value->id}}">Bank Detail</a>
                          <a class="dropdown-item" type="button" href="#" data-toggle="modal" data-target="#exampleModal2{{$value->id}}">Professional Detail</a>
                        </div>
                      </div>
                      <!-- <select class="form-control">
                        <option class="btn btn-info" type="button">Create Payslip</option>
                        <option class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal{{$value->id}}">Bank Details</option>
                      </select> -->
                    </td>
                      <!-- <button class="btn btn-info" type="button">Create Payslip</button></td> -->
                    <!-- <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal{{$value->id}}">Bank Details</button></td> -->
<div class="modal fade" id="exampleModal1{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="{{url('bank_detail/'.$value->id)}}" method="POST">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bank Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row" >
            <div class="col-md-12">
              <div class="row" style="display: none;">
                <div class="col-md-12">
                  <label>Emp Id</label>
                  <input type="text" class="form-control" name="emp_id" value="{{$value->id}}">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label>Bank Name</label>
                  <input type="text" class="form-control" name="bank_name" value="{{$value->bank_name}}">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label>Branch Name</label>
                  <input type="text" class="form-control" name="branch_name" value="{{$value->branch_name}}">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label>Account Number</label>
                  <input type="number" class="form-control" name="account_no" onkeydown="javascript: return event.keyCode === 8 ||event.keyCode === 46 ? true : !isNaN(Number(event.key))" value="{{$value->account_no}}">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label>IFSC Code</label>
                  <input type="text" class="form-control" name="ifsc_code" value="{{$value->ifsc_code}}">
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

<div class="modal fade" id="exampleModal2{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="{{url('prof_detail/'.$value->id)}}" method="POST">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Professional Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row" >
            <div class="col-md-12">
              <div class="row" style="display: none;">
                <div class="col-md-12">
                  <label>Supervisor</label>
                  <input type="text" class="form-control" name="supervisor" value="{{$value->supervisor}}">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label>CTC</label>
                  <input type="text" class="form-control" onkeydown="javascript: return event.keyCode === 8 ||event.keyCode === 46 ? true : !isNaN(Number(event.key))" name="ctc" value="{{$value->CTC}}">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label>Joining Date</label>
                  <input type="date" class="form-control" name="joining_dt" value="{{$value->joining_date}}">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label>Working Days</label>
                  <input type="number" class="form-control" name="account_no"  value="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label>Holiday Group</label>
                  <input type="text" class="form-control" name="ifsc_code" value="">
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
                    
                    <td>
                      <a class="fa fa-edit" href="{{url('update_employee/'.$value->id)}}" style="cursor: pointer;"></a>&nbsp;&nbsp;
                      <a class="fa fa-trash" style="cursor: pointer;" href="{{url('delete1/'.$value->id.'/employee')}}" onclick="return confirm('Are you sure?')"></a></td>
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