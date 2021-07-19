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
                    <h4 class="card-title">Add Leave Type</h4>
                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified"
                        style="border: 1px solid lightgrey;box-shadow: 1px 1px 6px #e3e1e1;">
                        <li class="nav-item"><a class="nav-link step disabled active" href="#" data-toggle="tab">STEP
                                1</a></li>
                        <li class="nav-item"><a class="nav-link step disabled" href="#" data-toggle="tab">STEP 2</a>
                        </li>
                        <li class="nav-item"><a class="nav-link step disabled" href="#" data-toggle="tab">STEP 3</a>
                        </li>
                    </ul>
                    <form id="regForm" action="{{url('add_leaves')}}" method="POST"
                        style="border: 1px solid lightgrey;box-shadow: 1px 1px 6px #e3e1e1;">
                        @csrf
                        <div class="tab-content">

                            <div class="tab-pane show active" id="solid-rounded-justified-tab1" style="margin: 10px;">
                                <h1 class="mb-4">Add Leave Details</h1>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Leave Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" placeholder="Leave Name" type="text"
                                                name="name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="col-form-label">Leave Effective</label>
                                        <div class="leave-inline-form" style="align-items: center;display: flex;min-height: 44px;margin-right: 45%;">
                                            <div class="form-check form-check-inline" style="display: contents;">
                                                
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="carry_no" value="Paid">
                                                        <label class="form-check-label" for="carry_no" style="margin-right: 14%;font-size: 14px;">  Paid</label>
                                            </div>
                                            <div class="form-check form-check-inline" style="display: contents;">
                                              
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="carry_yes" value="Unpaid">
                                                        <label class="form-check-label" for="carry_yes" style="margin-right: 14%;font-size: 14px;"> Unpaid</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row" style="margin-left:0">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-check-label">
                                                <input style="width:1em;" type="radio"
                                                    class="form-check-input" value="startfrom" id="startfrom"
                                                    name="leavedate" onclick="radiochange();">
                                                Start From</label>
                                            <select class="select form-control" style="width:1%" id="startnumber"
                                                name="numberofdays" onchange='setcustomdate();' required="" disabled="">
                                                <option value="">Choose Option..</option>
                                                <option value="joingdate">Joining Date</option>
                                                <option value="confirmationdate">Confirmation Date</option>
                                                <option value="probationconfirm">Probation Confirmation Date
                                                </option>
                                                <option value="customdate">Custom Date</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6" style="margin-top: 3%;">
                                        <div class="form-group">
                                            <input class="form-control" style="display:none;" type="date"
                                                id="customdate" name="numberofdays" disabled>
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
                                                        name="leavedate" onclick="radiochange();">
                                                    Avail After</label>
                                                <!-- <label class="custom-control-label" for="addLeaves">Avail after </label> -->
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-2" style="margin-top: 0%;right: -27px;">
                                        <div class="form-group">
                                            <input class="form-control"
                                                style="margin-left: -17%; border-top: 0;border-left: 0;border-right: 0;text-align: center;"
                                                type="text" id="availinput" name="numberofdays" required="" disabled>
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
                                                    onclick="make_editable(this.id,'m_input','m_select')">
                                                <label class="custom-control-label" for="addLeaves">Maximum
                                                    number of leaves
                                                    allowed:</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2" style="margin-top: 0%;right: -27px;">
                                        <div class="form-group">
                                            <input class="form-control"
                                                style="margin-left: -17%; border-top: 0;border-left: 0;border-right: 0;text-align: center;"
                                                type="text" id="m_input" name="m_input" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-2" style="margin-top: 1%;">
                                        Days /
                                    </div>

                                    <div class="col-lg-2" style="right: 67px;">
                                        <div class="form-group">
                                            <select class="form-control select" id="m_select" name="m_select" disabled>

                                                <option value="Months">Months</option>
                                                <option value="Quarter">Quarter</option>
                                                <option value="Year">Year</option>
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
                                                                onclick="cfcheck()">
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
                                                                id="carryforward"
                                                                onclick="make_editable2(this.id,'cf_select')">
                                                            <label class="custom-control-label" for="carryforward">Carry
                                                                forward to next:</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6" style="right: 43px;">
                                                        <div class="form-group">
                                                            <select class="select" id="cf_select" name="cf_select"
                                                                disabled>
                                                                <option value="Month" selected="">Month</option>
                                                                <option value="Quarter" selected="">Quarter</option>
                                                                <option value="Year" selected="">Year</option>
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
                                                                <option value="encashall" selected="">encash all
                                                                </option>
                                                                <option value="cfall" selected="">C/F all</option>
                                                                <option value="lapseall" selected="">lapse all</option>
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
                                                                type="text" id="m_cfinput" name="m_cfinput" required="">
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
                                                <option value="00">Select All</option>

                                                @foreach ($branch as $item=>$value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                                <!-- <option value="01">Deselect All</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Departments</label>

                                            <select class="departments form-control" multiple="multiple"
                                                name="departments[]" style="width:100%;"
                                                placeholder="Select Departments">
                                                <option value="02">Select All</option>
                                                @foreach ($dept as $item=>$value)
                                                <option value="{{$value->id}}">{{$value->name}} ( {{ $value->b_name }} )</option>
                                                @endforeach
                                                <!-- <option value="04">Deselect all</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Designation</label>

                                            <select class="designation form-control" multiple="multiple"
                                                name="designation[]" style="width:100%;"
                                                placeholder="Select Designation">
                                               
                                                <option value="03">Select All</option>
                                                @foreach ($desg as $item=>$value)
                                                <option value="{{$value->name}}">{{$value->name}}</option>
                                                @endforeach
                                                <!-- <option value="05">Deselect All</option> -->
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
                </div>
            </div>
        </div>
    </div>
    <!-- /ADD LEAVE TYPE -->


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

@stop
@section('content-js')

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



$('.branches').change(function(){

  if($(".branches option[value='00']").is(':selected'))
  {
    $('.branches option').prop('selected', true);
   $(".branches option[value='00']").prop('selected', false);
  }
  

})
$('.departments').change(function(){

  if($(".departments option[value='02']").is(':selected'))
  {
    $('.departments option').prop('selected', true);
   $(".departments option[value='02']").prop('selected', false);
  }
 

})
$('.designation').change(function(){

  if($(".designation option[value='03']").is(':selected'))
  {
     $('.designation option').prop('selected', true);
   $(".designation option[value='03']").prop('selected', false);
  }
  

})

</script>

@stop