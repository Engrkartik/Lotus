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
                <h3 class="page-title">Working Days List</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active">Working Days</li>
                </ul>
            </div>
            
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i>
                    Add Working Days</a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0 datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Working Plan</th>
                            <th>Add-on Week</th>
                            <th>Add-on Day</th>
                            <th>Add-on Off Type</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($working as $key1=>$values)
                        <tr>
                            <td>{{$values->name}}</td>
                            <td>
                                <ul class="team-members">
                                @php
                                $week=str_replace(']','',str_replace('"','',str_replace('[','',$values->week1)));
                                $token = strtok($week, ",");
                                while ($token !== false)
                                {
                                
                                @endphp
                                    <li style="text-align:center;">
                                        <a class="all-users" href="#" title="" data-toggle="tooltip"
                                            data-original-title="{{$token}}">{{substr($token,0,3)}}</a>
                                    </li>
                                   @php
									$token = strtok(",");
									}
                                   @endphp
                                </ul>
                            </td>
                            <td>{{str_replace('_',' ',$values->addon_week)}}</td>
                            <td>{{str_replace('_',' ',$values->addon_day)}}</td>
                            <td>{{str_replace('_',' ',$values->addon_off_type)}}</td>
                            
                            <td class="text-right">
                                <a class="pencil" href="#" data-toggle="modal" data-target="#edit_leave_{{$values->id}}"><i
                                        class="fa fa-pencil m-r-5"></i></a>
                                <a class="trash" href="#" data-toggle="modal" data-target="#delete_approve_{{$values->id}}"><i
                                        class="fa fa-trash-o m-r-5"></i> </a>

                            </td>
                        </tr>
<!-- edit -->
<!-- Edit Working Modal -->
<div id="edit_leave_{{$values->id}}" class="modal custom-modal fade text-center" role="dialog" data-keyboard="false"
    data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Working Day</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Working Plan Name<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" placeholder="Enter Working Plan Name" id="up_name_{{$values->id}}" value="{{$values->name}}">
                    </div>
                  {{-- <!--   <div class="form-group">
                        <label>Branch Name<span class="text-danger">*</span></label>
                        <select class="form-control" id="up_branch_{{$values->id}}" required>
                            <option value="">Select Branch</option>
                            @foreach($branch as $key =>$value)
                            <option value="{{$value->id}}" @if($values->bid==$value->id) selected="selected" @endif>{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div> --> --}}
                    <div class="form-group text-center">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name">Week 1</label><br>
                                <ul class="modalweek">
                            @php
                            $style='';
                            $weekdays = array('Monday', 'Tuesday', 'Wednesday','Thursday','Friday','Saturday','Sunday');
                            $week=str_replace(']','',str_replace('"','',str_replace('[','',$values->week1)));
                            $token = strtok($week, ",");
							for($i=0;$i< sizeof($weekdays);$i++)
							{
								while ($token !== false)
								{
									if($token==$weekdays[$i])
									{
										$style='btn-outline-success active';
										break;
									}
									else
									{
									$style='';
									}
									$token = strtok(",");
									
								}
                             @endphp
                                   <li style="text-align:center;">
                                        <button data-toggle="tooltip" data-original-title="{{$weekdays[$i]}}" class="modalday {{$style}}"
                                            id="{{substr($weekdays[$i],0,3)}}_1_{{$values->id}}" name="week1_{{$values->id}}[]" value="{{$weekdays[$i]}}"
                                            onclick="active_btn(this.id);save_week(this.id,'week1_{{$values->id}}',this.value,'{{$values->id}}')"type="button">{{substr($weekdays[$i],0,3)}}</button>
                                    </li>
                            @php
                        	}
                            @endphp
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="row">

                            <div class="col-md-12">
                                <label for="name"><input type="checkbox" name="add-on" id="add-on_{{$values->id}}"  @if($values->addon_week!='null') checked="" @endif onclick="add_ons(this.id)"/> Add-on Off</label><br>
                                <div class="row">
                                    
                                <div class="col-md-4">
                                    <select class="form-control" id="opt1_{{$values->id}}"  name="weeks[]" @if($values->addon_week=='null') disabled="" @endif>
                                        <option value="" @if($values->addon_week=='null') selected="selected" @endif>{{$values->addon_week}}</option>
                                        <option value="all" @if($values->addon_week=='all') selected="selected" @endif>All Week</option>
                                        <option value="Week_1" @if($values->addon_week=='Week_1') selected="selected" @endif>Week 1</option>
                                        <option value="Week_2" @if($values->addon_week=='Week_2') selected="selected" @endif>Week 2</option>
                                        <option value="Week_3" @if($values->addon_week=='Week_3') selected="selected" @endif>Week 3</option>
                                        <option value="Week_4" @if($values->addon_week=='Week_4') selected="selected" @endif>Week 4</option>
                                    </select>
                                </div>
                               
                                <div class="col-md-4">
                                    <select class="form-control" id="opt2_{{$values->id}}" name="option[]" @if($values->addon_day=='null') disabled="" @endif>
                                        <option value="" @if($values->addon_day=='null') selected="selected" @endif>Choose Option</option>
                                        <option value="First_day" @if($values->addon_day=='First_day') selected="selected" @endif>First Day Of Week</option>
                                        <option value="Last_day" @if($values->addon_day=='Last_day') selected="selected" @endif>Last Day Of Week</option>
                                        <option value="Monday" @if($values->addon_day=='Monday') selected="selected" @endif>Monday</option>
                                        <option value="Tuesday" @if($values->addon_day=='Tuesday') selected="selected" @endif>Tuesday</option>
                                        <option value="Wednesday" @if($values->addon_day=='Wednesday') selected="selected" @endif>Wednesday</option>
                                        <option value="Thursday" @if($values->addon_day=='Thursday') selected="selected" @endif>Thursday</option>
                                        <option value="Friday" @if($values->addon_day=='Friday') selected="selected" @endif>Friday</option>
                                        <option value="Saturday" @if($values->addon_day=='Saturday') selected="selected" @endif>Saturday</option>
                                        <option value="Sunday" @if($values->addon_day=='Sunday') selected="selected" @endif>Sunday</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" id="opt3_{{$values->id}}" name="option[]" @if($values->addon_off_type=='null') disabled="" @endif>
                                        <option value="" @if($values->addon_day=='null') selected="selected" @endif>Choose Option</option>
                                        <option value="Full_day" @if($values->addon_off_type=='Full_day') selected="selected" @endif>Full Day</option>
                                        <option value="Half_day" @if($values->addon_off_type=='Half_day') selected="selected" @endif>Half Day</option>
                                        </select>
                                </div>
                             </div>
                            </div>
                        </div>
                    </div>


                    <div class="submit-section">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary submit-btn" type="button" onclick="update_working('{{$values->id}}')">Edit</button>
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
<!-- /Edit Working Modal -->
<!-- end edit -->
<!-- delete  -->
<div class="modal custom-modal fade" id="delete_approve_{{$values->id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Leave</h3>
                    <p>Are you sure want to delete this working day?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{('delete1/'.$values->id.'/working_day')}}" class="btn btn-primary continue-btn">Delete</a>
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
  <!-- end delete -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->

<!-- Add Working Day Modal -->
<div id="add_leave" class="modal custom-modal fade text-center" role="dialog" data-keyboard="false"
    data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Working Pattern</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Working Plan Name<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" placeholder="Enter Working Plan Name" id="name">
                    </div>
                    <!-- <div class="form-group">
                        <label>Branch Name<span class="text-danger">*</span></label>
                        <select class="form-control" id="branch" required>
                            <option value="">Select Branch</option>
                            @foreach($branch as $key =>$value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div> -->
                    <div class="form-group text-center">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name">Working Plan</label><br>
                                <ul class="modalweek">
                                    <li style="text-align:center;">
                                        <button data-toggle="tooltip" data-original-title="Monday" class="modalday"
                                            id="mon1" name="week_1[]" value="Monday"
                                            onclick="active_btn(this.id);save_week1(this.id,'week_1',this.value)"
                                            type="button">Mon</button>
                                    </li>
                                    <li>
                                        <button data-toggle="tooltip" data-original-title="Tuesday" class="modalday"
                                            id="tue1" name="week_1[]" value="Tuesday"
                                            onclick="active_btn(this.id);save_week1(this.id,'week_1',this.value)"
                                            type="button">Tue</button>
                                    </li>
                                    <li>
                                        <button data-toggle="tooltip" data-original-title="Wednesday" class="modalday"
                                            id="wed1" name="week_1[]" value="Wednesday"
                                            onclick="active_btn(this.id);save_week1(this.id,'week_1',this.value)"
                                            type="button">Wed</button>
                                    </li>
                                    <li>
                                        <button data-toggle="tooltip" data-original-title="Thursday" class="modalday"
                                            id="thu1" name="week_1[]" value="Thursday"
                                            onclick="active_btn(this.id);save_week1(this.id,'week_1',this.value)"
                                            type="button">Thu</button>

                                    </li>
                                    <li>
                                        <button data-toggle="tooltip" data-original-title="Friday" class="modalday"
                                            id="fri1" name="week_1[]" value="Friday"
                                            onclick="active_btn(this.id);save_week1(this.id,'week_1',this.value)"
                                            type="button">Fri</button>

                                    </li>
                                    <li>
                                        <button data-toggle="tooltip" data-original-title="Saturday" class="modalday"
                                            id="sat1" name="week_1[]" value="Saturday"
                                            onclick="active_btn(this.id);save_week1(this.id,'week_1',this.value)"
                                            type="button">Sat</button>
                                    </li>
                                    <li>
                                        <button data-toggle="tooltip" data-original-title="Sunday" class="modalday"
                                            id="sun1" name="week_1[]" value="Sunday"
                                            onclick="active_btn(this.id);save_week1(this.id,'week_1',this.value)"
                                            type="button">Sun</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="row">

                            <div class="col-md-12">
                                <label for="name"><input type="checkbox" name="add-on" id="add-on_" onclick="add_ons(this.id)"/> Add-on Off</label><br>
                                <div class="row">
                                    
                                <div class="col-md-4">
                                    <select class="form-control" id="opt1_"  name="weeks[]" disabled="">
                                        <option value="" >Choose Week</option>
                                        <option value="all">All Week</option>
                                        <option value="Week_1">Week 1</option>
                                        <option value="Week_2">Week 2</option>
                                        <option value="Week_3">Week 3</option>
                                        <option value="Week_4">Week 4</option>
                                    </select>
                                </div>
                               
                                <div class="col-md-4">
                                    <select class="form-control" id="opt2_" name="option[]" disabled="">
                                        <option value="">Choose Option</option>
                                        <option value="First_day">First Day Of Week</option>
                                        <option value="Last_day">Last Day Of Week</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" id="opt3_" name="option[]"  disabled="" >
                                        <option value="">Choose Option</option>
                                        <option value="Full_day" >Full Day</option>
                                        <option value="Half_day" >Half Day</option>
                                        </select>
                                </div>
                             </div>
                            </div>
                        </div>
                    </div>
                    


                    <div class="submit-section">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary submit-btn" onclick="add_working()" type="button">Add</button>
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
<!-- /Add Working Modal -->



<!-- Approve Leave Modal -->
<div class="modal custom-modal fade" id="approve_leave" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Leave Approve</h3>
                    <p>Are you sure want to approve for this leave?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="javascript:void(0);" class="btn btn-primary continue-btn">Approve</a>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0);" data-dismiss="modal"
                                class="btn btn-primary cancel-btn">Decline</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Approve Leave Modal -->

<!-- Delete Leave Modal -->

<!-- /Delete Leave Modal -->

@stop

<script type="text/javascript">
    var week1 = [];
    var week2 = [];
    var week3 = [];
    var week4 = [];
    var final_list = new Array();

    // var final_list=[];
    var i;

    function active_btn(id, name) {
        console.log(id);
        var el = document.getElementById(id).classList.contains('active');
        // console.log(el);
        if (el == true) {
            $('#' + id).removeClass('active');
        } else {
            $('#' + id).addClass('btn-outline-success active');
        }
    }

    function save_week(id, name, val, sid) {
        var len = document.getElementsByName(name + '[]');
        console.log(name);
        
            week1 = [];
            for (i = 0; i < len.length; i++) {
                var el2 = document.getElementById(len[i].id).classList.contains('active');
                console.log(len[i].id);
                if (el2 == true) {
                    week1.push(len[i].value);
                }
            }
        // final_list=[{week1:week1},{week2:week2},{week3:week3},{week4:week4}];
        console.log(week1);
    }

    function save_week1(id, name, val) {
        var len = document.getElementsByName(name + '[]');
        console.log(name);
        if (name == 'week_1') {
            week1 = [];
            for (i = 0; i < len.length; i++) {
                var el2 = document.getElementById(len[i].id).classList.contains('active');
                // var cc=len[i].id;
                if (el2 == true) {
                    week1.push(len[i].value);
                }
            }
        }
        console.log(week1); 
        }
      
    function add_working() {
  var url = '{{ route("add_working")}}';
    var token = "{{ csrf_token()}}";
    var name=(document.getElementById('name').value);
    // var bid=(document.getElementById('branch').value);
    var addon_week=document.getElementById('opt1_').value;
    var addon_day=document.getElementById('opt2_').value;
    var addon_off_type=document.getElementById('opt3_').value;
    console.log(week1);
    if(name=='')
    {
        document.getElementById('name').focus();
        return false;
    }
    // else if(bid=='')
    // {
	// 	document.getElementById('branch').focus();
    //     return false;
    // }
    // console.log(JSON.stringify(final_list));
   $.ajax({
     type:"post",
     url: url,
     data:{'name':name,'week1':week1,'addon_week':addon_week,'addon_day':addon_day,'addon_off_type':addon_off_type,'_token':token},
     // dataType: 'json',
     success: function(response) {
      if(response.status==true)
      {
      console.log(response.msg);
      window.location.href='{{url('working-day')}}';
      }else{
        alert(response.msg);
      }
     }
   });
}
function update_working(id) {
  var url = '{{ route("update_workingday")}}';
    var token = "{{ csrf_token()}}";
   var name1=(document.getElementById('up_name_'+id).value);
    // var bid1=(document.getElementById('up_branch_'+id).value);
    var addon_week=(document.getElementById('opt1_'+id).value);
    var addon_day=(document.getElementById('opt2_'+id).value);
    var addon_off_type=(document.getElementById('opt3_'+id).value);
    console.log(week1);
    if(name1=='')
    {
        document.getElementById('up_name_'+id).focus();
        return false;
    }
    // else if(bid1=='')
    // {
	// 	document.getElementById('up_branch_'+id).focus();
    //     return false;
    // }
   $.ajax({
     type:"post",
     url: url,
     data:{'name':name1,'week1':week1,'addon_week':addon_week,'addon_day':addon_day,'addon_off_type':addon_off_type,'id':id,'_token':token},
     // dataType: 'json',
     success: function(response) {
      if(response.status==true)
      {
      console.log(response.msg);
      window.location.href='{{url('working-day')}}';
      }else{
        alert(response.msg);
      }
     }
   });
}
function add_ons(id) {
    // alert(id);
    var split=id.split('_');
    if(document.getElementById(id).checked==true)
    {
        document.getElementById('opt1_'+split[1]).disabled = false;
        document.getElementById('opt2_'+split[1]).disabled = false;
        document.getElementById('opt3_'+split[1]).disabled = false;
    }else{
        document.getElementById('opt1_'+split[1]).disabled = true;
        document.getElementById('opt2_'+split[1]).disabled = true;
        document.getElementById('opt3_'+split[1]).disabled = true;

    }
}
</script>