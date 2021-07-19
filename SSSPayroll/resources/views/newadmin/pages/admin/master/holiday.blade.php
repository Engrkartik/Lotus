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
                <h3 class="page-title">Holidays List</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active">Holidays</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_holiday"><i
                        class="fa fa-plus"></i> Add Holiday Group</a>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_holidaylist"><i
                        class="fa fa-plus"></i> Add Holiday List</a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name </th>
                            <th>Holiday Type </th>
                            <th>Holiday Date</th>
                            <th colspan="2">Holiday Group</th>
                            <th>Affected From</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($holiday as $item=>$value)
                        <tr>
                            <td>{{++$item}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->type}}</td>
                            <td>{{date('d-m-Y',strtotime($value->holiday_date))}}</td>
                            <td>{{$value->group_name}}</td>
                            <td><i class="fa fa-edit" data-toggle="modal" data-target="#edit-group_{{$value->id}}"></i></td>
                            <td>{{$value->affected_from}}</td>
                            <td>
                                <select class="form-control" onchange="change_st('{{$value->id}}','holiday_list',this.value);">
                                    <option @if($value->status=='A') selected="selected" @endif value="A">Active</option>
                                    <option @if($value->status=='D') selected="selected" @endif value="D">In-Active</option>
                                </select>
                               </td>
                            <td><i class="fa fa-edit" data-toggle="modal" data-target="#edit-holiday_{{$value->id}}"></i>&nbsp;&nbsp;
                                <i class="fa fa-trash" data-toggle="modal" data-target="#delete-holiday_{{$value->id}}"></i></td>
                        </tr>
                        <!-- Edit Holiday Modal -->
<div class="modal custom-modal fade" id="edit-holiday_{{$value->id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Holiday List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('update_holiday_list/'.$value->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Holiday Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{$value->name}}">
                    </div>
                  <!--   <div class="form-group">
                        <label>Holiday Type <span class="text-danger">*</span></label>
                        <select class="select" name="type" required>
                            <option @if($value->type=='') selected="selected" @endif>Select Holiday Type</option>
                            <option @if($value->type=='Regular') selected="selected" @endif value="Regular">Regular</option>
                            <option @if($value->type=='Optional') selected="selected" @endif value="Optional">Optional</option>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label>Holiday Date <span class="text-danger">*</span></label>
                        <input class="form-control" value="{{$value->holiday_date}}" type="date" name="holiday_on" min="{{date('Y-m-d')}}" onchange="affect_max(this.value,'_{{$value->id}}')">
                        
                    </div>
                    <div class="form-group">
                        <label>Holiday Affected From <span class="text-danger">*</span></label>
                        <input class="form-control" min="{{date('Y-m-d')}}" value="{{$value->affected_from}}" max="{{$value->holiday_date}}" type="date" id="affect_from_{{$value->id}}" name="affect_from">
                        
                    </div>
                    <div class="form-group">
                        <label>Holiday Group <span class="text-danger">*</span></label>
                        <select class="select" name="group" required>
                            <option @if($value->holiday_group=='') selected="selected" @endif value="">Select Holiday Group</option>
                            @foreach ($holiday_group as $item=>$values)
                                <option @if($value->holiday_group==$values->id) selected="selected" @endif value="{{$values->id}}">{{$values->name}}</option>
                            @endforeach
                            
                        </select>
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
<!-- /Edit Holiday Modal -->
<!-- edit holiday group modal-->
<div class="modal custom-modal fade" id="edit-group_{{$value->id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Holiday Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('update_holiday_grp/'.$value->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Holiday Group Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{$value->group_name}}">
                    </div>
                  
                    <div class="form-group">
                        <label>Holiday Description <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" value="{{$value->group_desc}}" name="desc">
                        
                    </div>
                      <div class="form-group">
                        <label class="col-form-label">Select Branches</label>
                        <select class="branches form-control" id="branches" name="branches[]" multiple="" placeholder="Select Branches" style="width:100%;">
                      <option value="00">Select all</option>
                      @foreach ($branch as $item=>$data)
                          <option value="{{$data->id}}">{{$data->name}}</option>
                      @endforeach
                      <!-- <option value="01">Deselect All</option> -->
                </select>
                       
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

<!-- end-->

<!-- Delete Holiday Modal -->
<div class="modal custom-modal fade" id="delete-holiday_{{$value->id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Holiday</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{url('delete1/'.$value->id.'/holiday_list')}}" class="btn btn-primary continue-btn">Delete</a>
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
<!-- /Delete Holiday Modal -->

                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->

<!-- Add Holiday Group Modal -->
<div class="modal custom-modal fade" id="add_holiday" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Holiday Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('holiday_group')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Holiday Group Name <span class="text-danger">*</span></label>
                        <input class="form-control" name="name" type="text">
                    </div>
                    <div class="form-group">
                        <label>Holiday Description <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="desc">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Select Branches</label>
                        <select class="branches form-control" id="branches" name="branches[]" multiple="" placeholder="Select Branches" style="width:100%;">
                            <option value="00">Select all</option>
                            @foreach ($branch as $item=>$data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                            <!-- <option value="01">Deselect all</option> -->
                </select>
                       
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Holiday Group Modal -->

<!-- Add Holiday List Modal -->
<div class="modal custom-modal fade" id="add_holidaylist" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Holiday List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('holiday_list')}}">
                    <div class="form-group">
                        <label>Holiday Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name">
                    </div>
                  <!--   <div class="form-group">
                        <label>Holiday Type <span class="text-danger">*</span></label>
                        <select class="select" name="holiday_type" required>
                            <option value="">Select Holiday Type</option>
                            <option value="Regular">Regular</option>
                            <option value="Optional">Optional</option>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label>Holiday Date <span class="text-danger">*</span></label>
                        <input class="form-control" value="01-01-2019" min="{{date('Y-m-d')}}" type="date" name="holiday_on" onchange="affect_max(this.value,'')">
                        
                    </div>
                    <div class="form-group">
                        <label>Holiday Affected From <span class="text-danger">*</span></label>
                        <input class="form-control" min="{{date('Y-m-d')}}" type="date" min="{{date('Y-m-d')}}" id="affect_from" name="affect_from">
                        
                    </div>
                    <div class="form-group">
                        <label>Holiday Group <span class="text-danger">*</span></label>
                        <select class="select" name="group" required>
                            <option value="">Select Holiday Group</option>
                            @foreach ($holiday_group as $item =>$values)
                            <option value="{{$values->id}}">{{$values->name}}</option>
                            @endforeach
                        </select>
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
<!-- /Add Holiday List Modal -->
@stop
@section('content-js')

<script type="text/javascript">
function affect_max(val,id) {
    document.getElementById('affect_from'+id).max=val;
    console.log(val);
}

// selectAll();

$('.branches').change(function(){

  if($(".branches option[value='00']").is(':selected'))
  {
     selectAll();
  }
  // else{
  //   deselectAll();
  // }

})

function selectAll()
{
   $('.branches option').prop('selected', true);
   $(".branches option[value='00']").prop('selected', false);
   // $(".branches option[value='01']").prop('selected', false);
}
 
//  function deselectAll(){

// $('.branches option').prop('selected', false);
//    $(".branches option[value='01']").prop('selected', false);
//  }

</script>
@stop