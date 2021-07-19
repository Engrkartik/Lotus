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
                <h3 class="page-title">Shift Settings</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Shift List</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="{{url('shift')}}" class="btn add-btn"><i class="fa fa-plus"></i> Create Shift</a>
                <!-- <div class="view-icons">
                    <a href="employees.html" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                    <a href="employees-list.html" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                </div> -->
            </div>
        </div>

        <div class="col-md-12"><br>
            <form action="{{url('/shift-list')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Branches</label>
                            <select class="branches form-control" size="10" multiple="multiple" id="branch_0" name="branches[]"
                                style="width:100%;" placeholder="Select Branches" onchange="show_filter('0','dept_0')">
                                <option style="display:none;" value="">Select All</option>
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
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Departments</label>
                            <select class="departments form-control" multiple="multiple"
                                name="departments[]" style="width:100%;" id="dept_0"
                                placeholder="Select Departments">
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
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Designation</label>
                            <select class="designation form-control" multiple="multiple"
                                name="designations[]" style="width:100%;"
                                placeholder="Select Designations">
                                @foreach ($desg as $item=>$value)
                                @if(isset($arr3))
                                <option value="{{$value->id}}"  @for($i=0;$i< sizeof($arr3);$i++)  @if($arr3[$i]==($value->id)) selected="selected" @endif @endfor>{{$value->name}}</option>
                                
                                @else
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <button class="form-control btn add-btn" ><i class="fa fa-filter"></i>&nbsp;&nbsp;Filter</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


    </div>
    <!-- /Page Header -->



    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table datatable">
                    <thead>
                        <tr>
                            <th>Shift Name</th>
                            <th>Shift Type</th>
                            <th>Punch Begin</th>
                            <th>Punch End</th>
                            {{-- <th>Break Name</th> --}}
                            {{-- <th>Break Duration</th> --}}
                            <th>Assign Shift</th>
                            <th class="text-right no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shift as $item=> $data)
                            
                        <tr>
                            <td>
                                <h2 class="table-avatar">
                                    <a style="color: #ff7700;" href="{{url('edit-shift/'.$data->id)}}">{{$data->shift_name}}<span>({{date('h:i A',strtotime($data->shift_in))}} To
                                        {{date('h:i A',strtotime($data->shift_out))}})</span></a>
                                </h2>
                            </td>
                            <td>{{str_replace('-',' ',$data->shift_type)}}</td>
                            <td>{{date('h:i A',strtotime($data->shift_in))}}</td>
                            <td>{{date('h:i A',strtotime($data->shift_out))}}</td>
                            {{-- <td>{{$data->break_name}}</td> --}}
                            {{-- <td>{{$data->break_duration}}</td> --}}
                            <td style="vertical-align: middle;display: inline-block;"><a href="#" class="btn add-btn" data-toggle="modal" data-target="#assign-shift_{{$data->id}}">
                            <i class="fa fa-plus"></i>Assign Shift</a></td>

                            <td>
                                <a class="pencil" href="{{url('edit-shift/'.$data->id)}}"><i class="la la-pencil m-r-5"></i></a>
                                <a class="trash" href="#" data-toggle="modal" data-target="#delete_shift_{{$data->id}}"><i
                                        class="fa fa-trash-o m-r-5"></i> </a>
                            </td>
                                                    <!-- Edit Shift Modal -->
                        <div id="assign-shift_{{$data->id}}" class="modal custom-modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Assign Shift {{$data->shift_name}} ({{date('h:i A',strtotime($data->shift_in))}}- {{date('h:i A',strtotime($data->shift_out))}})</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="javascript:;" method="POST" onsubmit="shift_emp('{{$data->id}}');">
                                            @csrf
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Branches</label>
                                                        <select class="branches form-control" multiple="multiple" id="branch_{{$data->id}}" name="branches_{{$data->id}}[]"
                                                            style="width:100%;" placeholder="Select Branches" onchange="show_filter('{{$data->id}}','dept_{{$data->id}}');">
                                                            <option  style="display:none;"  value="">Select All</option>
                                                            @foreach ($branch as $item=>$value)
                                                            <option value="{{$value->id}}" id="{{$value->id}}">{{$value->name}}</option>                                        
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Department</label>
                                                        <select class="departments form-control" multiple="multiple" name="departments_{{$data->id}}[]"
                                                            style="width:100%;" placeholder="Select Departments" id="dept_{{$data->id}}" onchange="show_filter('{{$data->id}}','emp_{{$data->id}}')">
                                                            @foreach ($dept as $item=>$value)
                                                            <option value="{{$value->id}}">{{$value->name}} ({{$value->b_name}})</option>                                        
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-3">
                                                    <div class="form-group ">
                                                        <label class="col-form-label">Designation</label>
                                                        <select class="form-control" multiple="multiple" name="designation[]"
                                                            style="width:100%;" placeholder="Select Designations">
                                                            @foreach ($desg as $item=>$value)
                                                            <option value="{{$value->name}}">{{$value->name}}</option>                                        
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div> --}}
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Employee</label>
                                                            <select class="departments form-control" multiple="multiple" name="emp_{{$data->id}}[]"
                                                            style="width:100%;" placeholder="Select Designations" id="emp_{{$data->id}}">
                                                                @foreach ($emp as $item=>$value)
                                                                <option value="{{$value->id}}">{{$value->emp_name}}</option>                                        
                                                                @endforeach
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Effective From </label>
                                                    <input type="date" id="from_dt_{{$data->id}}" class="form-control" required="">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Effective To </label>
                                                    <input type="date" id="to_dt_{{$data->id}}" class="form-control" required="">
                                                </div>
                                            </div>

                                            <div class="submit-section">
                                                <button class="btn btn-primary submit-btn">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<!-- /Edit Shift Modal -->
                        <!-- Delete Shift Modal -->
                        <div class="modal custom-modal fade" id="delete_shift_{{$data->id}}" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="form-header">
                                            <h3>Delete Shift</h3>
                                            <p>Are you sure want to delete?</p>
                                        </div>
                                        <div class="modal-btn delete-action">
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{url('/delete1/'.$data->id.'/shift')}}" class="btn btn-primary continue-btn">Delete</a>
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
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="#" class="btn btn-lg btn-primary" id="sentMessage" data-toggle="modal" data-target="#myModal" style="display: none;">Click to open Modal</a>
    <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Shifts are already assigned to these.<br>Please select the employee if you wish to change their existing shift</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row" id="show_cont">
                            
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btn_click" >Save</button>
            </div>
          </div>
        </div>
      </div>
</div>
<!-- /Page Content -->

<script type="text/javascript">
    var b_val=new Array();
    var d_val=new Array();
    var e_val=new Array();
    var val=new Array();
    var type='';
    function save_emp(shift_id) {
        var token='{{csrf_token()}}';
        type='ext';
        var emp=document.getElementsByName('new_emp[]');
        var from_dt=document.getElementById('from_dt_'+shift_id).value;
        var to_dt=document.getElementById('to_dt_'+shift_id).value;
        // console.log(emp.length);
        // console.log(e_val);
        if(e_val.length>0)
        {
            type='emp';
        for (let j = 0; j < emp.length; j++) {   
        // console.log(emp[j].checked);
            if(emp[j].checked===false)
            {
                console.log(emp[j].value);
        for (let i = 0; i < e_val.length; i++) {
                if(emp[j].value==e_val[i])
                {        
                    e_val.splice(i,1);
                }
        }
        }
        }
    }else if(b_val.length>0)
    {
        type='branch';
        var branch=document.getElementById('branch_'+shift_id);
      for (var i = 0; i < branch.options.length; i++) {
         if(branch.options[i].selected ==true){
              e_val.push(branch.options[i].value);
          }
      }
      for (let j = 0; j < emp.length; j++) {   
        // console.log(emp[j].checked);
            if(emp[j].checked===false)
            {
                val.push(emp[j].value);
            }
      }
    }else if(d_val.length>0)
    {
        type='dept';
        var branch=document.getElementById('dept_'+shift_id);
      for (var i = 0; i < branch.options.length; i++) {
         if(branch.options[i].selected ==true){
              e_val.push(branch.options[i].value);
          }
      }
      for (let j = 0; j < emp.length; j++) {   
        // console.log(emp[j].checked);
            if(emp[j].checked===false)
            {
                val.push(emp[j].value);
            }
      }
    }
        console.log(e_val,type,val,emp.length);
        $.ajax({
       type:'POST',
       url:'{{'shift_emp'}}',
       data:{'shift_id':shift_id,'emp':e_val,'val':val,'_token':token,'from_dt':from_dt,'to_dt':to_dt,'type':type},
       success:function(res)
       {
        console.log(res.html);
           if(res.status=='true')
           {
            window.location.href='{{url('/shift-list/')}}';
           }else
           {
               console.log(res.html);
           }
       }
    });  
    }
function shift_emp(shift_id) {
    e_val=[];
    b_val=[];
    d_val=[];
    var token='{{csrf_token()}}';
    type='new';
    var from_dt=document.getElementById('from_dt_'+shift_id).value;
    var to_dt=document.getElementById('to_dt_'+shift_id).value;
   
    var branch=document.getElementById('branch_'+shift_id);
      for (var i = 0; i < branch.options.length; i++) {
         if(branch.options[i].selected ==true){
              b_val.push(branch.options[i].value);
          }
      }
      var dept=document.getElementById('dept_'+shift_id);
      for (var i = 0; i < dept.options.length; i++) {
         if(dept.options[i].selected ==true){
              d_val.push(dept.options[i].value);
          }
      }
      var emp=document.getElementById('emp_'+shift_id);
      for (var i = 0; i < emp.options.length; i++) {
         if(emp.options[i].selected ==true){
              e_val.push(emp.options[i].value);
          }
      }
      console.log(b_val,d_val,e_val,from_dt,to_dt,type);
    $.ajax({
       type:'POST',
       url:'{{'shift_emp'}}',
       data:{'shift_id':shift_id,'branch':b_val,'dept':d_val,'emp':e_val,'_token':token,'from_dt':from_dt,'to_dt':to_dt,'type':type},
       success:function(res)
       {
           console.log(res.html);
           if(res.status=='true')
           {
            window.location.href='{{url('shift-list')}}';
           }else if(res.status=='false')
           {
           var dt=JSON.parse(res.html);
           console.log(dt);
           document.getElementById("btn_click").setAttribute("onclick", "save_emp("+shift_id+");"); 
           $("#myModal").modal('show');       
           $('#show_cont').html(dt);
           } 
       }
    });
}
function show_filter(id,lett) {
    console.log("Hello");
    // alert(id);
    var token='{{csrf_token()}}';
    var val=new Array();
    var x=document.getElementById('branch_'+id);
      for (var i = 0; i < x.options.length; i++) {
         if(x.options[i].selected ==true){
              val.push(x.options[i].value);
          }
      }
      var val1=new Array();
    var x1=document.getElementById('dept_'+id);
      for (var i = 0; i < x1.options.length; i++) {
         if(x1.options[i].selected ==true){
              val1.push(x1.options[i].value);
          }
      }  
    console.log(id,val,val1,lett);
    $.ajax({
        type:'POST',
        url:'{{url('filter_shift')}}',
        data:{'branch':val,'dept':val1,'type':lett,'id':id,'_token':token},
        async: false,
        success:function(res)
        {
            console.log(res.status);
            $('#'+lett).html(res.data);
        }
    });
}

  

</script>
@stop