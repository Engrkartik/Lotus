@extends('newadmin.layouts.default')
@section('content')

<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Leave Settings</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Leave Settings</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">

            <!-- ADD LEAVE TYPE -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Leave Type</h4>
                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified" style="border: 1px solid lightgrey;box-shadow:5px 5px 5px lightgrey;">
                        <li class="nav-item"><a class="nav-link step disabled active" href="#" data-toggle="tab">STEP
                                1</a></li>
                        <li class="nav-item"><a class="nav-link step disabled" href="#" data-toggle="tab">STEP 2</a>
                        </li>
                        <li class="nav-item"><a class="nav-link step disabled" href="#" data-toggle="tab">STEP 3</a>
                        </li>
                    </ul>
                    @foreach ($leave as $item=>$values)
                        
                    <form id="regForm" action="{{url('update-leaves/'.$values->id)}}" method="POST" style="border: 1px solid lightgrey;box-shadow:5px 5px 10px 8px lightgrey;">
                        @csrf
                        <div class="tab-content">
                           
                            <div class="tab-pane show active" id="solid-rounded-justified-tab1" style="margin: 10px;">
                                <h1 class="mb-4">Edit Leave Details</h1>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Leave Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" placeholder="Leave Name" type="text" name="name" value="{{$values->name}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">No. Of Leave <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" placeholder="Number of Leave" type="number" name="no_leave" value="{{$values->no_of_leave}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Leave Type</label>
                                            <select class="select form-control" name="type"  disabled>
                                                <option value="">-- Select Leave Type --</option>
                                                <option value="paid" @if($values->type=='paid') selected="selected" @endif>Paid</option>
                                                <option value="unpaid" @if($values->type=='unpaid') selected="selected" @endif>Unpaid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Effective From <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control"
                                                    type="date" name="effect_from" value="{{$values->effected_from}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Effective To <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control"
                                                    type="date" name="effect_to" value="{{$values->effected_to}}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="solid-rounded-justified-tab2" style="margin: 10px;">
                                <h1 class="mb-4">Edit Leave Rules</h1>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6">

                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="addLeaves" onclick="make_editable(this.id,'m_input','select')" @if($values->max_leave_applied>0)  checked="checked" @endif  disabled>
                                                        <label class="custom-control-label" for="addLeaves">Maximum
                                                            number of applications
                                                            allowed:</label>
                                                    </div>
                                                </div>


                                                <div class="col-lg-2" style="margin-top: 0%;">
                                                    <input class="form-control"
                                                        style="margin-left: -58%; border-top: 0;border-left: 0;border-right: 0;text-align: center;"
                                                        type="text" id="m_input" name="m_input" value="{{$values->max_leave_applied}}" required="" @if($values->max_leave_applied<1) disabled="" @endif  disabled>
                                                </div>
                                                <div class="col-lg-4" style="right: 65px;">

                                                    <div class="form-group">
                                                        <select class="select" id="select" name="m_select"  disabled >
                                                            <option value="Days" @if($values->max_leave_effected_on=='Days') selected="selected" @endif>Days</option>
                                                            <option value="Weeks" @if($values->max_leave_effected_on=='Weeks') selected="selected" @endif>Weeks</option>
                                                            <option value="Months" @if($values->max_leave_effected_on=='Months') selected="selected" @endif>Months</option>
                                                            <option value="Years" @if($values->max_leave_effected_on=='Years') selected="selected" @endif>Years</option>
                                                        </select>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 radio">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="carryforward" onclick="make_editable(this.id,'c_input','c_select')"  @if($values->carry_forward>0) checked="checked" @endif  disabled>
                                                        <label class="custom-control-label" for="carryforward">Carry
                                                            Forward:</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2" style="margin-top: -1%;">

                                                    <input class="form-control"
                                                        style="margin-left: -58%; border-top: 0;border-left: 0;border-right: 0;text-align: center;"
                                                         id="c_input" type="text" name="c_input" value="{{$values->carry_forward}}" required="" @if($values->carry_forward<1) disabled="" @endif  disabled>
                                                </div>
                                                <div class="col-lg-4" style="right: 65px;">
                                                    <div class="form-group">
                                                        <select class="select" id="c_select" name="c_select"  disabled>
                                                            <option value="Days" selected="">Days</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 radio">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="weekend" name="weekend"
                                                        @if($values->weekend_count=='on') checked="checked" @endif  disabled>
                                                        <label class="custom-control-label" for="weekend">Weekend
                                                            between leave period.</label>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 radio">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="holiday" name="holiday"
                                                        @if($values->holiday_count=='on') checked="checked" @endif  disabled>
                                                        <label class="custom-control-label" for="holiday">Holiday between leave period.</label>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                             
                                </div>
                            </div>
                            <div class="tab-pane" id="solid-rounded-justified-tab2" style="margin: 10px;">
                                <h1 class="mb-4">Select Where To Apply</h1>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Branches</label>

                                            <select class="branches form-control" multiple="multiple" name="branches[]"
                                                style="width:100%;" placeholder="Select Branches" disabled>
                                               
                                                @foreach ($branch as $item=>$value)
                                                @php
                                                $style='';
                                                 $branch=str_replace('[','',str_replace('"','',str_replace(']','',$values->branch)));   
                                                 $token = strtok($branch, ",");
                                                    while ($token !== false)
                                                    {
                                                        if($token==($value->name))
                                                        {
                                                          $style='selected=""'; 
                                                          break; 
                                                        }
                                                    $token = strtok(",");
                                                    }
                                                @endphp
                                                <option value="{{$value->name}}" {{$style}}>{{$value->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Departments</label>

                                            <select class="departments form-control" multiple="multiple"
                                                name="departments[]" style="width:100%;"
                                                placeholder="Select Departments" disabled>
                                                @foreach ($dept as $item=>$value)
                                                @php
                                                $style='';
                                                $branch=str_replace('[','',str_replace('"','',str_replace(']','',$values->department)));   
                                                $token = strtok($branch, ",");
                                                   while ($token !== false)
                                                   {
                                                       if($token==($value->name))
                                                       {
                                                         $style='selected=""'; 
                                                         break; 
                                                       }
                                                   $token = strtok(",");
                                                   }
                                               @endphp
                                                <option value="{{$value->name}}" {{$style}}>{{$value->name}}</option>
                                                @endforeach
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Designation</label>

                                            <select class="designation form-control" multiple="multiple"
                                                name="designation[]" style="width:100%;"
                                                placeholder="Select Designation" disabled>
                                                @foreach ($desg as $item=>$value)
                                                @php
                                                $style='';
                                                $branch=str_replace('[','',str_replace('"','',str_replace(']','',$values->designation)));   
                                                $token = strtok($branch, ",");
                                                   while ($token !== false)
                                                   {
                                                       if($token==($value->name))
                                                       {
                                                         $style='selected=""'; 
                                                         break; 
                                                       }
                                                   $token = strtok(",");
                                                   }
                                               @endphp
                                                <option value="{{$value->name}}" {{$style}}>{{$value->name}}</option>
                                                @endforeach
                                                </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="overflow:auto;margin:10px;">
                                <div style="float:right;">
                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- /Edit LEAVE TYPE -->


</div>
</div>

</div>
<!-- /Page Content -->

</div>
<script type="text/javascript">
    function make_editable(id, input, select) {
        console.log($('#' + id).is(":checked"));
        if (($('#' + id).is(":checked")) == true) {
            document.getElementById(input).disabled = false;
            document.getElementById(select).disabled = false;
        } else {
            document.getElementById(input).disabled = true;
            document.getElementById(select).disabled = true;
            document.getElementById(input).value='';
        }
    }
</script>
@stop