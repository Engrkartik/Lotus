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
                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified"
                        style="border: 1px solid lightgrey;box-shadow: 1px 1px 6px #e3e1e1;">
                        <li class="nav-item"><a class="nav-link step disabled active" href="#" data-toggle="tab">STEP
                                1</a></li>
                        <li class="nav-item"><a class="nav-link step disabled" href="#" data-toggle="tab">STEP 2</a>
                        </li>
                        <li class="nav-item"><a class="nav-link step disabled" href="#" data-toggle="tab">STEP 3</a>
                        </li>
                    </ul>
                    <form id="regForm" action="{{url('update-leaves/'.request()->id)}}" method="POST"
                        style="border: 1px solid lightgrey;box-shadow: 1px 1px 6px #e3e1e1;">
                        @csrf
                        @foreach ($leave as $item=>$value)
                            
                        <div class="tab-content">

                            <div class="tab-pane show active" id="solid-rounded-justified-tab1" style="margin: 10px;">
                                <h1 class="mb-4">Edit Leave Details</h1>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Leave Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" placeholder="Leave Name" type="text"
                                                name="name" value="{{$value->name}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="col-form-label">Leave Effective</label>
                                        <div class="leave-inline-form"
                                            style="align-items: center;display: flex;min-height: 44px;margin-right: 45%;">
                                            <div class="form-check form-check-inline" style="display: contents;">

                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="carry_no" value="Paid" @if ($value->leave_effect=='Paid')
                                                    checked="checked"  @endif >
                                                <label class="form-check-label" for="carry_no"
                                                    style="margin-right: 14%;font-size: 14px;" > Paid</label>
                                            </div>
                                            <div class="form-check form-check-inline" style="display: contents;">

                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="carry_yes" value="Unpaid" @if ($value->leave_effect=='Unpaid')
                                                    checked="checked"  @endif>
                                                <label class="form-check-label" for="carry_yes"
                                                    style="margin-right: 14%;font-size: 14px;"> Unpaid</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row" style="margin-left:0">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-check-label">
                                                <input style=" width:1em;" type="radio"
                                                    class="form-check-input" value="startfrom" id="startfrom"
                                                    name="leavedate" onclick="radiochange();" @if($value->effect_type=='startfrom')
                                                    checked="checked"  @endif>
                                                Start From</label>
                                            <select class="select form-control" style="width:1%" id="startnumber"
                                                name="numberofdays" value="" onchange='setcustomdate();' required @if($value->effect_type!='startfrom')
                                                disabled=""  @endif >
                                            <option value="">Choose Option..</option>
                                            <option value="joingdate" @if($value->effect=='joingdate') selected="selected"  @endif >Joining Date</option>
                                            <option value="confirmationdate" @if($value->effect=='confirmationdate') selected="selected"  @endif>Confirmation Date</option>
                                            <option value="probationconfirm" @if($value->effect=='probationconfirm') selected="selected"  @endif>Probation Confirmation Date</option>
                                            <option value="customdate" @if(($value->effect!='confirmationdate') && ($value->effect!='probationconfirm') && ($value->effect!='joingdate') && ($value->effect_type!='availafter')) selected="selected"  @endif>Custom Date</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6" style="margin-top: 3%;">
                                        <div class="form-group">
                                            <input class="form-control" @if(($value->effect=='confirmationdate') || ($value->effect=='probationconfirm') || ($value->effect=='joingdate') || ($value->effect_type=='availafter')) style="display:none;"  @endif  type="date"
                                                id="customdate" name="numberofdays" @if(($value->effect=='confirmationdate') || ($value->effect=='probationconfirm') || ($value->effect=='joingdate') || ($value->effect_type=='availafter'))  disabled=""  @endif value="{{$value->effect}}">
                                        </div>
                                    </div>
                                    {{-- <div class="col-6">
                                        <div class="form-group">
                                            <input class="form-control"
                                                style="display:none; border-top: 0;border-left: 0;border-right: 0;text-align: center;"
                                                id="setnumberdays" type="text" name="setnumberdays" required="">
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="innerform" style="margin-left: 5%;">
                                            <div class="form-group">
                                                <label class="form-check-label">
                                                    <input style=" width:1em;" type="radio"
                                                        class="form-check-input" value="availafter" id="availafter"
                                                        name="leavedate" onclick="radiochange();" @if($value->effect_type=='availafter')
                                                        checked="checked"  @endif>
                                                    Avail After</label>
                                                <!-- <label class="custom-control-label" for="addLeaves">Avail after </label> -->
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-2" style="margin-top: 0%;right: -27px;">
                                        <div class="form-group">
                                            <input class="form-control"
                                                style="margin-left: -17%; border-top: 0;border-left: 0;border-right: 0;text-align: center;"
                                                type="text" id="availinput" name="numberofdays" required=""  @if($value->effect_type!='availafter')
                                                disabled="" value="" @endif value="{{$value->effect}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="margin-top: 1%;">
                                        days of employment.
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input" id="addLeaves"
                                                    onclick="make_editable(this.id,'m_input','m_select')" @if (($value->max_leave)>0)
                                                    checked="checked" @endif>
                                                <label class="custom-control-label" for="addLeaves" >Maximum number of leaves allowed:</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2" style="margin-top: 0%;right: -27px;">
                                        <div class="form-group">
                                            <input class="form-control"
                                                style="margin-left: -17%; border-top: 0;border-left: 0;border-right: 0;text-align: center;"
                                                type="text" id="m_input" name="m_input" @if ($value->max_leave<1)
                                                disabled="" @else value="{{$value->max_leave}}" @endif required>
                                        </div>
                                    </div>
                                    <div class="col-lg-2" style="margin-top: 1%;">
                                        Days /
                                    </div>

                                    <div class="col-lg-2" style="right: 67px;">
                                        <div class="form-group">
                                            <select class="select form-control" id="m_select" name="m_select" @if ($value->max_leave<1)
                                                disabled="" @endif>
                                                <option value="">Choose Option..</option>
                                                <option value="Months" @if ($value->max_leave_effect=='Months') selected="selected" @endif>Months</option>
                                                <option value="Quarter" @if ($value->max_leave_effect=='Quarter') selected="selected" @endif>Quarter</option>
                                                <option value="Year" @if ($value->max_leave_effect=='Year') selected="selected" @endif>Year</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="tab-pane" id="solid-rounded-justified-tab2" style="margin: 10px;">
                                <h1 class="mb-4">Treatment Of Leaves</h1>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="h3 card-title with-switch">
                                                        Carry Forward
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="onoffswitch"
                                                                class="onoffswitch-checkbox" id="switch_sick"
                                                                onclick="cfcheck()" @if (($value->carry_forward=='') && ($value->carry_forward_treatment=='') && ($value->max_carry_forward==''))
                                                                    @else checked="checked" 
                                                                @endif value="{{$value->carry_forward_treatment}}">
                                                            <label class="onoffswitch-label" for="switch_sick">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="cfblock" name="cfblock">
                                                <div class="row">
                                                    <div class="col-lg-6 radio">
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="carryforward" @if ($value->carry_forward!='')
                                                                    checked="checked"
                                                                @endif
                                                                onclick="make_editable2(this.id,'cf_select')">
                                                            <label class="custom-control-label" for="carryforward">Carry
                                                                forward to next:</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6" style="right: 43px;">
                                                        <div class="form-group">
                                                            <select class="select" id="cf_select" name="cf_select"
                                                            @if ($value->carry_forward=='')
                                                            disabled=""
                                                        @endif>
                                                                <option value="Month" @if ($value->carry_forward=='Month')
                                                                    selected=""
                                                                @endif >Month</option>
                                                                <option value="Quarter" @if ($value->carry_forward=='Quarter')
                                                                    selected=""
                                                                @endif >Quarter</option>
                                                                <option value="Year" @if ($value->carry_forward=='Year')
                                                                    selected=""
                                                                @endif >Year</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 ">
                                                        <div class="form-group">
                                                            <label class="col-form-label">Treatment of leaves to next
                                                                year</label>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6" style="right: 43px;">
                                                        <div class="form-group">
                                                            <select class="select" id="treatmentofleaves"
                                                                name="treatmentofleaves">
                                                                <option value="encashall" @if ($value->carry_forward_treatment=='encashall')
                                                                    selected=""
                                                                @endif >encash all
                                                                </option>
                                                                <option value="cfall"  @if ($value->carry_forward_treatment=='cfall')
                                                                    selected=""
                                                                @endif >C/F all</option>
                                                                <option value="lapseall"  @if ($value->carry_forward_treatment=='lapseall')
                                                                    selected=""
                                                                @endif >lapse all</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 ">
                                                        <div class="form-group">
                                                            <label class="col-form-label">Max C/F leave allowed</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2" style="margin-top: 0%;right: -27px;">
                                                        <div class="form-group">
                                                            <input class="form-control"
                                                                style="margin-left: -17%; border-top: 0;border-left: 0;border-right: 0;text-align: center;"
                                                                type="text" id="m_cfinput" name="m_cfinput" value="{{$value->max_carry_forward}}" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2" style="margin-top: 2%;">
                                                        Days
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

                                            <select class="branches form-control" size="10" multiple="multiple"
                                                name="branches[]" style="width:100%;" placeholder="Select Branches">
                                                <option style="display:none;" value="">Select All</option>

                                                @foreach ($branch as $item=>$values)
                                                @php
                                                $string=str_replace('[','',str_replace('"','',str_replace(']','',$value->branch)));
                                                $token = strtok($string, ",");
                                                echo 'token-'.$token;
                                                $style='';
                                                    while ($token !== false)
                                                    {
                                                        if($token==$values->id)
                                                        {
                                                            $style='selected=""';
                                                            break;
                                                        }else
                                                        {
                                                            $style='';
                                                        }
                                                    $token = strtok(",");
                                                    }   
                                                @endphp
                                                <option value="{{$values->id}}" {{$style}}>{{$values->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Departments</label>

                                            <select class="departments form-control" multiple="multiple"
                                                name="departments[]" style="width:100%;"
                                                placeholder="Select Departments">
                                                @foreach ($dept as $item=>$values)
                                                @php
                                                $string=str_replace('[','',str_replace('"','',str_replace(']','',$value->department)));
                                                $token = strtok($string, ",");
                                                echo 'token-'.$string;
                                                $style='';
                                                    while ($token !== false)
                                                    {
                                                        if($token==$values->id)
                                                        {
                                                            $style='selected=""';
                                                            break;
                                                        }else
                                                        {
                                                            $style='';
                                                        }
                                                    $token = strtok(",");
                                                    }   
                                                @endphp
                                                <option value="{{$values->id}}" {{$style}}>{{$values->name}} ( {{ $values->b_name }} )</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Designation</label>

                                            <select class="designation form-control" multiple="multiple"
                                                name="designation[]" style="width:100%;"
                                                placeholder="Select Designation">
                                                {{-- <option value="d">Select All</option>
                                                <option value="ds">Select All</option>
                                                <option value="dsa">Select All</option>
                                                <option value="das">Select All</option>
                                                <option value="fa">Select All</option> --}}
                                                @foreach ($desg as $item=>$values)
                                                @php
                                                $string=str_replace('[','',str_replace('"','',str_replace(']','',$value->designation)));
                                                $token = strtok($string, ",");
                                                echo 'token-'.$string;
                                                $style='';
                                                    while ($token !== false)
                                                    {
                                                        if($token==$values->name)
                                                        {
                                                            $style='selected=""';
                                                            break;
                                                        }else
                                                        {
                                                            $style='';
                                                        }
                                                    $token = strtok(",");
                                                    }   
                                                @endphp
                                                <option value="{{$values->name}}" {{$style}}>{{$values->name}}</option>
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
                        @endforeach

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /ADD LEAVE TYPE -->


</div>
</div>

</div>
<!-- /Page Content -->

<!-- Add Custom Policy Modal -->
<div id="add_custom_policy" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Custom Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Policy Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Days <span class="text-danger">*</span></label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group leave-duallist">
                        <label>Add employee</label>
                        <div class="row">
                            <div class="col-lg-5 col-sm-5">
                                <select name="customleave_from" id="customleave_select" class="form-control" size="5"
                                    multiple="multiple">
                                    <option value="1">Bernardo Galaviz </option>
                                    <option value="2">Jeffrey Warden</option>
                                    <option value="2">John Doe</option>
                                    <option value="2">John Smith</option>
                                    <option value="3">Mike Litorus</option>
                                </select>
                            </div>
                            <div class="multiselect-controls col-lg-2 col-sm-2">
                                <button type="button" id="customleave_select_rightAll"
                                    class="btn btn-block btn-white"><i class="fa fa-forward"></i></button>
                                <button type="button" id="customleave_select_rightSelected"
                                    class="btn btn-block btn-white"><i class="fa fa-chevron-right"></i></button>
                                <button type="button" id="customleave_select_leftSelected"
                                    class="btn btn-block btn-white"><i class="fa fa-chevron-left"></i></button>
                                <button type="button" id="customleave_select_leftAll" class="btn btn-block btn-white"><i
                                        class="fa fa-backward"></i></button>
                            </div>
                            <div class="col-lg-5 col-sm-5">
                                <select name="customleave_to" id="customleave_select_to" class="form-control" size="8"
                                    multiple="multiple"></select>
                            </div>
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
<!-- /Add Custom Policy Modal -->

<!-- Edit Custom Policy Modal -->
<div id="edit_custom_policy" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Custom Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Policy Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="LOP">
                    </div>
                    <div class="form-group">
                        <label>Days <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="4">
                    </div>
                    <div class="form-group leave-duallist">
                        <label>Add employee</label>
                        <div class="row">
                            <div class="col-lg-5 col-sm-5">
                                <select name="edit_customleave_from" id="edit_customleave_select" class="form-control"
                                    size="5" multiple="multiple">
                                    <option value="1">Bernardo Galaviz </option>
                                    <option value="2">Jeffrey Warden</option>
                                    <option value="2">John Doe</option>
                                    <option value="2">John Smith</option>
                                    <option value="3">Mike Litorus</option>
                                </select>
                            </div>
                            <div class="multiselect-controls col-lg-2 col-sm-2">
                                <button type="button" id="edit_customleave_select_rightAll"
                                    class="btn btn-block btn-white"><i class="fa fa-forward"></i></button>
                                <button type="button" id="edit_customleave_select_rightSelected"
                                    class="btn btn-block btn-white"><i class="fa fa-chevron-right"></i></button>
                                <button type="button" id="edit_customleave_select_leftSelected"
                                    class="btn btn-block btn-white"><i class="fa fa-chevron-left"></i></button>
                                <button type="button" id="edit_customleave_select_leftAll"
                                    class="btn btn-block btn-white"><i class="fa fa-backward"></i></button>
                            </div>
                            <div class="col-lg-5 col-sm-5">
                                <select name="customleave_to" id="edit_customleave_select_to" class="form-control"
                                    size="8" multiple="multiple"></select>
                            </div>
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
<!-- /Edit Custom Policy Modal -->

<!-- Delete Custom Policy Modal -->
<div class="modal custom-modal fade" id="delete_custom_policy" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Custom Policy</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
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
<!-- /Delete Custom Policy Modal -->

</div>

<script type="text/javascript">
    function make_editable(id, input, select) {
        console.log($('#' + id).is(":checked"));
        if (($('#' + id).is(":checked")) == true) {
            document.getElementById(select).disabled = false;
            document.getElementById(input).disabled = false;
        } else {
            document.getElementById(select).disabled = true;
            document.getElementById(input).disabled = true;
        }
    }

    function make_editable2(id, select) {
        console.log($('#' + id).is(":checked"));
        if (($('#' + id).is(":checked")) == true) {
            document.getElementById(select).disabled = false;
        } else {
            document.getElementById(select).disabled = true;
        }
    }

    // SET CUSTOM DATE
    function setcustomdate() {
        var element = document.getElementById("startnumber");
        var element2 = document.getElementById("customdate");
        if (element.value == 'customdate') {
            $('#customdate').prop("disabled", false);
            element2.style.display = 'block';

        } else {
            $('#customdate').prop("disabled", true);
            element2.style.display = 'none';
        }
    }
    
    // CARRY FORWARD CHECK OR UNCHECK
    function cfcheck() {
        console.log($('#switch_sick').is(':checked'));
        if ($('#switch_sick').is(':checked')) {
            $('#cfblock').show(500);
            $('#carryforward').prop("disabled", false);
            $('#treatmentofleaves').prop("disabled", false);
            $('#m_cfinput').prop("disabled", false);
        } else {
            $('#cfblock').hide(500);
            $('#carryforward').prop("disabled", true);
            $('#treatmentofleaves').prop("disabled", true);
            $('#m_cfinput').prop("disabled", true);
            $('#cf_select').prop("disabled", true);
        }
    }


    // FOR LEAVE RADIO BUTTON SELECTION
    function radiochange() {
        var element = document.getElementById("startnumber");
        $('input:radio[name="leavedate"]').change(
            function () {
                if ($(this).is(':checked') && $(this).val() == 'availafter') {
                    $('#startnumber').prop("disabled", true);
                    $('#customdate').prop("disabled", true);
                    $('#availinput').prop("disabled", false);
                    $("#startfrom").prop('checked', false);
                } else {
                    $("#startfrom").prop('checked', true);
                    $('#startnumber').prop("disabled", false);
                    $('#availinput').prop("disabled", true);
                    if ($("#startfrom").prop('checked', true) && element.value == 'customdate') {
                        $('#customdate').prop("disabled", false);
                    }
                }
            });
    }
</script>
<!-- /Page Wrapper -->
@stop