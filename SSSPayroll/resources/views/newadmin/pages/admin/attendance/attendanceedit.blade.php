
@extends('newadmin.layouts.default')
@section('content')

<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-9">
                <h3 class="page-title">Attendance Bulk Edit Settings</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Attendance Bulk Edit Settings</li>
                </ul>
            </div>
            <div class="col-3 text-right">
                <button class="btn btn-white filter-btn mr-2" id="filterbtn" onclick="return filterform()" style="box-shadow: 0px 0px 12px 0px rgb(55 73 72 / 2%);
    border: 0;
    width: 45px;
    height: 45px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    color: #ed3237;
    border-radius: 10px;
}" id="filter_search">
                    <i class="fa fa-filter"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- /Page Header -->


    <div class="row">
        <div class="col-md-12">

            <!-- Attendance Bulk Edit Settings -->
            <div class="card" id="atteditcard">

                <!-- <h1 class="card-title mb-4 text-center">Attendance Bulk Edit Search</h1> -->
                <form id="atteditForm" action="{{ url('bulk_edit_filter') }}" method="POST" style="box-shadow: 1px 1px 6px #e3e1e1;">
                    @csrf
                    <div style="margin: 10px;">
                        <!-- <h1 class="mb-4">Select Where To Apply</h1> -->
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Branches</label>
                                    <select class="branches form-control" size="10" multiple="multiple"
                                        name="branches[]" id="branches" style="width:100%;" placeholder="Select Branches" onchange="show_filter();">
                                        @foreach ($branch as $item=>$value)
                                        @if(isset($arr1))
                                @for($i=0;$i< sizeof($arr1);$i++)    
                                <option value="{{$value->id}}" @if($arr1[$i]==($value->id)) selected="selected" @endif>{{$value->name}}</option>
                                @endfor
                                @else
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Departments</label>
                                    <select class="departments form-control" multiple="multiple" name="departments[]"
                                        style="width:100%;" placeholder="Select Departments" id="departments">
                                        @foreach ($dept as $item=>$value)
                                        @if(isset($arr2)) 
                                        <option value="{{$value->id}}"  @for($i=0;$i< sizeof($arr2);$i++) @if($arr2[$i]==($value->id)) selected="selected" @endif @endfor>{{$value->name.'( '.$value->b_name.' )'}}</option>
                                        
                                        @else
                                        <option value="{{$value->id}}">{{$value->name.'( '.$value->b_name.' )'}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <select class="designation form-control" multiple="multiple" name="designation[]"
                                        style="width:100%;" placeholder="Select Designation">
                                        @foreach ($desg as $item=>$value)
                                        @if(isset($arr3))
                                        <option value="{{$value->name}}"  @for($i=0;$i< sizeof($arr3);$i++)  @if($arr3[$i]==($value->name)) selected="selected" @endif @endfor>{{$value->name}}</option>  
                                        @else
                                        <option value="{{$value->name}}">{{$value->name}}</option>
                                        @endif
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Choose Date</label>
                                    <input type="date" class="form-control" name="c_date" id="c_date"  @if(isset($arr4)) value="{{ $arr4 }}" @endif>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Check In Time</label>
                                    <input type="time" class="form-control" name="checkin" id="checkin"
                                        placeholder="Enter Check In Time"  @if(isset($arr5)) value="{{ $arr5 }}" @endif />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Check Out Time</label>
                                    <input type="time" class="form-control" name="checkout" id="checkout"
                                        placeholder="Enter Check Out Time"  @if(isset($arr6)) value="{{ $arr6 }}" @endif />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 radio">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="ispresent" name="ispresent">
                                    <label class="custom-control-label" for="ispresent">Is Present
                                    </label>
                                </div>
                            </div>
                            <div class="col-3 radio">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="isabsent" name="isabsent" @if ($arr7=='on')
                                        checked='checked'
                                    @endif>
                                    <label class="custom-control-label" for="isabsent">Is Absent</label>
                                </div>
                            </div>
                            <div class="col-3 radio">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="ischeckin" name="ischeckin">
                                    <label class="custom-control-label" for="ischeckin">
                                        Is Check In</label>
                                </div>
                            </div>
                            <div class="col-3 radio">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="ischeckout" name="ischeckout">
                                    <label class="custom-control-label" for="ischeckout">
                                        Is Check Out</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary submit-btn" onclick="/*return hidenshow()*/">Filter</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

            <!-- Employee List Starts-->
            <div id="empatttable" class="tabcontent card">
                <div class="row"></div>
                <div class="row ">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#add_employee">
                            <!-- <i  class="fa fa-plus" ></i> -->
                            Update Attendance</a>
                        <!-- <a href="" target="_blank" class="downbtn" ><i class="icon-download"></i>Update Attendance</a> -->
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table attbulkedit">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee Name</th>
                                        <th>Employee ID</th>
                                        <th>Joining Date</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>Branch</th>
                                        <th>Reporting Manager</th>
                                        {{-- <th>Status</th>
                                        <!-- <th>Payslip</th> -->
                                        <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($emp as $item=>$value)
                                    <tr>
                                        <td><input type="checkbox" class="sub_chk1" name="emp[]" value="{{ $value->id }}"></td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="" class="avatar"><img alt=""
                                                        src="assets/img/profiles/avatar-02.jpg"></a>
                                                <a href="">
                                                    {{ $value->emp_name }}</a>
                                            </h2>
                                        </td>
                                        <td>{{ $value->emp_code }}</td>
                                        <td>{{ $value->joining_date }}</td>
                                        <td>{{ $value->designation }}</td>
                                        <td>{{ $value->dept_name }}</td>
                                        <td>{{ $value->b_name }}</td>
                                        <td>{{ $value->report_to }}</td>
                                        {{-- <td>ss</td>
                                        <td>ss</td> --}}
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Employee List End -->

        </div>
    </div>
    <!-- /ADD LEAVE TYPE -->


    <!-- SHOW EMPLOYEE AFTER SEARCH -->


</div>
<!-- /Page Content -->


<!-- Update Bulk Attendance -->
<div id="add_employee" class="modal custom-modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: bold;text-decoration: underline;">Update Bulk Attendance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="javascript:;" method="POST" onsubmit="update_att();">
                    @csrf
                    <div class="row">
                        <div class="col-2 radio">
                            <div class="custom-control custom-radio mb-3">
                                <input type="radio" class="custom-control-input" id="leave_type"
                                    name="radiobtn" value="leave_type" onclick="show_duration()">
                                <label class="custom-control-label" style="font-weight: bold;" for="leave_type">Mark Leave</label>
                            </div>
                        </div>
                                <div class="col-md-10">
                                    {{-- <label for="leave">Select Leave Type</label> --}}
                                    <select class="form-control" id="leave" style="width:100%;">
                                    <option value="">Select Leave</option>
                                    @foreach ($leave as $item=>$data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                        </div>
                    <div class="row">
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Provide Overtime <span
                                        class="text-danger">*</span></label>
                                <input type="radio" name="radioyes"> Yes
                                <input type="radio" name="radiono"> No
                            </div>
                        </div> -->
                        <div class="col-md-2">
                            <label style="font-weight: bold;">Provide Overtime</label>
                        </div>
                            <div style="display: inline-flex;" class="col-md-10">
                                <div class="col-5 radio">
                                    <div class="custom-control custom-radio mb-3">
                                        <input type="radio" class="custom-control-input" id="radioyes"
                                            name="radiobtn" value="yes" onclick="show_duration()">
                                        <label class="custom-control-label" for="radioyes">Yes
                                        </label>
                                    </div>
                                </div>
                                <div class="col-3 radio">
                                    <div class="custom-control custom-radio mb-3">
                                        <input type="radio" class="custom-control-input" id="radiono"
                                            name="radiobtn" value="no" onclick="show_duration()">
                                        <label class="custom-control-label" for="radiono">No</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-2">
                            <label style="font-weight: bold;">Mark Attendance</label>
                        </div>
                        <div style="display: inline-flex;" class="col-md-10">
                                <div class="col-5 radio">
                                    <div class="custom-control custom-radio mb-3">
                                        <input type="radio" class="custom-control-input" id="present"
                                            name="radiobtn" value="Present" onclick="show_duration()">
                                        <label class="custom-control-label" for="present">Mark As Present
                                        </label>
                                    </div>
                                </div>
                                <div class="col-5 radio">
                                    <div class="custom-control custom-radio mb-3">
                                        <input type="radio" class="custom-control-input" id="absent"
                                            name="radiobtn" value="absent" onclick="show_duration()">
                                        <label class="custom-control-label" for="absent">Mark As Absent</label>
                                    </div>
                                </div>
                            </div>
                       
                    </div>
                    <div class="row" id="duration" style="display: none;">
                        <div class="col-md-2">
                            <label style="font-weight: bold;">Duration</label>
                        </div>
                        <div class="col-md-10" style="display: inline-flex;">
                                <div class="col-3 radio">
                                    <div class="custom-control custom-radio mb-3">
                                        <input type="radio" class="custom-control-input" id="full"
                                            name="radioday" value="full" checked>
                                        <label class="custom-control-label" for="full">Full Day</label>
                                    </div>
                                </div>
                                <div class="col-3 radio">
                                    <div class="custom-control custom-radio mb-3">
                                        <input type="radio" class="custom-control-input" id="1sthalf"
                                            name="radioday" value="1sthalf">
                                        <label class="custom-control-label" for="1sthalf">1st Half Day</label>
                                    </div>
                                </div>
                                <div class="col-3 radio">
                                    <div class="custom-control custom-radio mb-3">
                                        <input type="radio" class="custom-control-input" id="2ndhalf"
                                            name="radioday" value="2ndhalf">
                                        <label class="custom-control-label" for="2ndhalf">2nd Half Day</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                       
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Apply Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
              <div class="row">
                  <div class="col-md-12">
                      <div class="row">
                          <div class="col-md-12">
                              <label for="print_dup" style="color: #ed3237;display:none;" id="print_dup_title" >Leave already assigned for employees:</label>
                              <div id="print_dup">
                              </div>
                              <label for="print_zero" style="color: #ed3237;display:none;" id="print_zero_title" >Zero Leave Balance of employees:</label>
                              <div id="print_zero">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">OK</button>
        </div>
      </div>
    </div>
  </div>
<!-- /Add Employee Modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
// if('{{ isset($arr1) }}')
// {
    window.onload=show_filter();
// }

function show_duration() {
    if(document.getElementById('present').checked || document.getElementById('absent').checked)
    {
    document.getElementById('duration').style.display='block';
    }else
    {
        document.getElementById('duration').style.display='none';
    }
}
    function hidenshow() {
        $('#atteditForm').submit(function () {
            // alert('Yes Working');
            $('#atteditcard').hide();
            $('#empatttable').show();
            return false;
        });
    }

    function filterform() {
        $("#atteditcard").toggle(1000);
    }


    function show_filter() {
    console.log("Hello");
    // alert(id);
    var token='{{csrf_token()}}';
    var val=new Array();
    var x=document.getElementById('branches');
      for (var i = 0; i < x.options.length; i++) {
         if(x.options[i].selected ==true){
              val.push(x.options[i].value);
          }
      }
      console.log(val);
    $.ajax({
        type:'POST',
        url:'{{url('filter_dept')}}',
        data:{'branch':val,'_token':token,'arr2':'{{ json_encode($arr2) }}'},
        async: true,
        success:function(res)
        {
            console.log("hello");
            $('#departments').html(res.data);
        }
    });
}
function requiredFunction() {
  var answer = prompt("Specify the Reason for changing it.");
  if (answer == "") {
    requiredFunction();
  }
  else
  {
      return answer;
  }
  
}
function update_att() {
    var overtime;
    var attendance;
    var duration;
    var leave;
    var token='{{ csrf_token() }}';
    var type;
    var remark=requiredFunction();
    if(document.getElementById('radioyes').checked)
    {
        overtime=document.getElementById('radioyes').value;
        type='overtime';
    }
    if(document.getElementById('radiono').checked)
    {
        overtime=document.getElementById('radiono').value;
        type='overtime';

    }
    if(document.getElementById('present').checked)
    {
        attendance=document.getElementById('present').value;
        type='mark_p_a';

    }
    if(document.getElementById('absent').checked)
    {
        attendance=document.getElementById('absent').value;
        type='mark_p_a';

    }
    if(document.getElementById('full').checked)
    {
        duration=document.getElementById('full').value;
        type='mark_p_a';

    }
    if(document.getElementById('1sthalf').checked)
    {
        duration=document.getElementById('1sthalf').value;
        type='mark_p_a';
    }
    if(document.getElementById('2ndhalf').checked)
    {
        duration=document.getElementById('2ndhalf').value;
        type='mark_p_a';
    }
    var val=document.getElementById('leave').value;
    if(val!='')
    {
        type='leave';
    }
    var cdate=document.getElementById('c_date').value;
    if(cdate=='')
    {
        cdate=new Date().toISOString().slice(0, 10);
    }
    var emp=new Array();
    var x=document.getElementsByName('emp[]');
      for (var i = 0; i < x.length; i++) {
         if(x[i].checked ==true){
              emp.push(x[i].value);
          }
      }

    console.log(overtime,attendance,duration,val,emp,cdate,remark,type);
    $.ajax({
        type:'POST',
        url:'{{ url('update-attendance-edit') }}',
        data:{'type':type,'_token':token,'overtime':overtime,'attendance':attendance,'duration':duration,'leave':val,'emp':emp,'cdate':cdate,'remark':remark},
        success:function(res)
        {
           console.log(res.status);
           console.log(res.data);
           if(res.status=='dupl')
           {
           $("#exampleModal").modal('show');
           var txt=res.data;
           var obj = JSON.parse(txt);
           console.log((obj.duplicate).length);
           if((obj.duplicate).length>0)
           {
            if((obj.zero).length==0)
               {
                document.getElementById('print_zero_title').style.display='none';
                $('#print_zero').html('');
               }
            document.getElementById('print_dup_title').style.display='';
            $('#print_dup').html(' '+obj.duplicate+'\n');
           }
           if((obj.zero).length>0)
           {
               if((obj.duplicate).length==0)
               {
                document.getElementById('print_dup_title').style.display='none';
                $('#print_dup').html('');
               }
           document.getElementById('print_zero_title').style.display='';
           $('#print_zero').html(' '+obj.zero+'\n');
           }
        }
        }
    });
}
</script>


<!-- /Page Wrapper -->
@stop