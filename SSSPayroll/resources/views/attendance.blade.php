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
                <h3 class="card-title"><b>Attendance Report</b></h3>
                <!-- <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModal">Add Leave Type</button> -->
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Emp Name</th>
                    <th>Emp Code</th>
                    <th>Branch</th>
                    <th>Total Present</th>
                    <th>Total Leave</th>
                    <th>Total Absent</th>
                    <th>Action</th>
                  </tr>
                  
                  </thead>
                  <tbody>
                  	@foreach($emp as $key=>$emp)
                <tr>
                  <td>{{++$key}}</td>
                    <td>{{$emp->emp_name}}</td>
                    <td>{{$emp->emp_code}}</td>
                    <td>{{$emp->b_name}}</td>
                    <td>20</td>
                    <td>0</td>
                    <td>0</td>
                    <td><a href="{{url('att_report/'.$emp->id)}}" class="fa fa-eye"></a></td>
                </tr>
                @endforeach
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
     
            @endsection