@extends('newadmin.layouts.default')
@section('content')

<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Shift Settings</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Shift Settings</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">

            <!-- ADD SHIFT -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Shift</h4>
                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                        <li class="nav-item"><a class="nav-link step disabled active" href="#" data-toggle="tab">STEP
                                1</a></li>
                        <li class="nav-item"><a class="nav-link step disabled " href="#" data-toggle="tab">STEP 2</a>
                        </li>
                        <li class="nav-item"><a class="nav-link step disabled" href="#" data-toggle="tab">STEP 3</a>
                        </li>
                        <li class="nav-item"><a class="nav-link step disabled" href="#" data-toggle="tab">STEP 4</a>
                        </li>
                    </ul>
                    <form id="regForm" action="{{url('/save_shift')}}" method="POST">
                        @csrf
                        <div class="tab-content">
                            <!-- Circles which indicates the steps of the form: -->
                            <!-- <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                            </div> -->

                            <div class="tab-pane show active" id="solid-rounded-justified-tab1">
                                <h1 class="mb-4">Add Shift Details</h1>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Shift Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" placeholder="Shift Name" type="text" name="name"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Shift Type<span
                                                    class="text-danger">*</span></label>
                                            <select class="select " name="type" required>
                                                <option value="Time-Based">Time Based</option>
                                                <option value="Hour-Based">Hour Based</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Shift Start<span
                                                    class="text-danger">*</span></label>
                                            <div class=""><input type="time" id="shiftstart" value="09:30:00"
                                                    name="punch_in" required></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Shift End<span
                                                    class="text-danger">*</span></label>
                                            <div class=""><input type="time" id="shiftend" value="18:30:00"
                                                    name="punch_out" required></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Full Day <label><span
                                                        class="text-danger">(Hours)</span></label>:<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="fullday" name="fullday"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Half Day <label><span
                                                        class="text-danger">(Hours)</span></label>:<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="halfday" class="form-control" name="half_day_hr"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="solid-rounded-justified-tab2">
                                <h1 class="mb-5">Add Shift Rules</h1>
                                <div class="row">
                                    <div class="col-sm-12" id="rules">
                                        <div class="form-group shiftrules" id="shiftrules">
                                            <div class="row shiftrulerow" id="shiftrulerow1">
                                                <span id="shiftrulenum1">1 ).</span>
                                                <div class="col-lg-8 inputfieldsshiftrule" id="inputfieldsshiftrule1">
                                                    <div class="mb-3">
                                                        Mark
                                                        <input type="text" name="t_type[]" class="form-control"
                                                            value="shift" style="display:none;">
                                                        <select name="ruledaydum[]" class="ruleday">
                                                            <option value="1/2">1/2</option>
                                                            <option value="1/4">1/4</option>
                                                            <option value="3/4">3/4</option>
                                                        </select>
                                                        <select name="rulestatusdum[]" class="rulestatus">
                                                            <option value="absent">Absent</option>
                                                            <option value="present">Present</option>
                                                        </select>
                                                        when <select name="rulereportdum[]" class="rulereport">
                                                            <option value="report">Report</option>
                                                            <option value="leave">Leave</option>
                                                        </select> to
                                                        office <select name="ruleafterbeforedum[]"
                                                            class="ruleafterbefore">
                                                            <option value="after">After</option>
                                                            <option value="before">Before</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 inputtimeshiftrule" id="inputtimeshiftrule1"
                                                    style="margin-top: -2%;">
                                                    <input class="form-control ruletime"
                                                        style="border-top: 0;border-left: 0;border-right: 0;text-align: center;"
                                                        name="timedum[]" id="time" type="time" value="09:30:00">
                                                </div>
                                                <div class="col-8 textshiftrule" id="textshiftrule1"
                                                    style="display:none;">
                                                    <div class=" mb-3">
                                                        <p>Mark 1/2 absent when report to office after 09:30 AM.</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-4"
                                                    style="display: flex;flex-direction: row-reverse;">
                                                    <button type="button" class="addshiftbtn" id="addshiftbtn1"
                                                        style="padding: 7px 31px;" onClick='addshift();'><i
                                                            class="fa fa-plus m-r-5"></i>Add
                                                        New Rule</button>
                                                    <!-- <div class="mb-3">
                                                        <a href='#' class="remCF" style="display: none;" id="remshiftbtn1"
                                                            onclick='return editshiftbtn(1);'><i
                                                                class="pencil la la-pencil m-r-5"></i></a>
                                                        <a href='#' class="editshiftbtn mr-3" style="display: none;" id="editshiftbtn1"
                                                            onclick='return remshiftbtn(1);'><i
                                                                class="trash fa fa-trash-o m-r-5"></i></a>
                                                    </div> -->
                                                    <button type="button" id="remshiftbtn1" onclick="remshiftbtn(1);"
                                                        class="remCF"
                                                        style="display: none;padding: 7px 15px;background-color: #bbbbbb;"><i
                                                            class="fa fa-trash-o m-r-5"></i>
                                                        Remove Rule</button>
                                                    <button type="button" class="editshiftbtn mr-3" id="editshiftbtn1"
                                                        style="padding: 7px 31px;display: none;"
                                                        onClick="editshiftbtn(1);"><i
                                                            class="la la-pencil m-r-5"></i>Edit Rule</button>
                                                </div>
                                            </div>

                                            <!-- <div class="row shiftrulerow" id="shiftruletext1" style="display:none; margin-top: 9px;"> -->
                                            <!-- <div class="col-8">
                                                <p> 1). Mark 1/2 absent when report to office after 09:30 AM.</p>
                                            </div> -->

                                            <!-- </div> -->



                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="solid-rounded-justified-tab2">
                                <h1 class="mb-5">Add Shift Rules</h1>
                                <div class="row">
                                    <div class="col-2">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="graceperiod"
                                                required>
                                            <label class="custom-control-label" for="graceperiod">Grace Period ( In/Out
                                                )</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <div class="input-group time timepicker">
                                                <input class="form-control" placeholder="HH:MM"
                                                    name="grace_time" /><span
                                                    class="input-group-append input-group-addon"><span
                                                        class="input-group-text"><i
                                                            class="fa fa-clock-o"></i></span></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="overtime"
                                                onclick="hideweekoff()" required>
                                            <label class="custom-control-label" for="overtime">Overtime</label>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label class="col-form-label">Minimum <label><span
                                                        class="text-danger">(Hours)</span></label>:<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group time timepicker">
                                                <input class="form-control" placeholder="HH:MM"
                                                    name="min_overtime" /><span
                                                    class="input-group-append input-group-addon"><span
                                                        class="input-group-text"><i
                                                            class="fa fa-clock-o"></i></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label class="col-form-label">Maximum <label><span
                                                        class="text-danger">(Hours)</span></label>:<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group time timepicker">
                                                <input class="form-control" placeholder="HH:MM"
                                                    name="max_overtime" /><span
                                                    class="input-group-append input-group-addon"><span
                                                        class="input-group-text"><i
                                                            class="fa fa-clock-o"></i></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6" id="weekoffblock" style="display:none;">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input" id="overtimeweekoff"
                                                    name="overtime_as_weekoff" required>
                                                <label class="custom-control-label" for="overtimeweekoff">Weekoff /
                                                    Holiday consider as
                                                    overtime<span class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="solid-rounded-justified-tab2">
                                <h1 class="mb-4">Add Breaks</h1>
                                <div class="allbreaks">

                                    <div class="break" id="break1">
                                        <div class="breakbox">
                                            <div class="brhead mb-4">
                                                <div class="col-6"><span class="breakvisiblesno" id="sno1">1).</span>
                                                    <span class="breakvisiblename" id="output1">Break Name 1</span>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <!-- <button type="button" class="addshift"
                                                        style="display:none; padding: 7px 31px;"
                                                        onClick='addshiftbreak(1);'>
                                                        <i class="fa fa-plus m-r-5"></i>Add </button> -->
                                                    <button type="button" class="editbreak" onclick="editbreak(1);"
                                                        id="editBtn1"
                                                        style="background-color: ##ff9b44;padding: 7px 15px; display:none;">
                                                        <i class="la la-edit m-r-5"></i>Edit</button>
                                                    <button type="button" onclick="removebreak(1);" class="removebreak"
                                                        id="removeBtn1"
                                                        style="background-color: #bbbbbb;padding: 7px 15px; display:none;">
                                                        <i class="fa fa-trash m-r-5"></i>Remove</button>

                                                    <!-- <button type="button" id="removeBtn1" onclick="removebreak(1);" 
                                                        class="removebreak" 
                                                        style="background-color: rgb(187, 187, 187); margin-right: 12px; padding: 7px 31px;">Remove
                                                    Break</button> -->
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Break Name <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control breakname" placeholder="Break Name"
                                                            type="text" id="breakname1" name="b_dumname[]"
                                                            onkeyup="breaknamekeyup(1);" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Break Duration <label><span
                                                                    class="text-danger">(Hours)</span></label><span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group time timepicker">
                                                            <input class="form-control breakduration"
                                                                id="breakduration1" placeholder="HH:MM"
                                                                name="b_dumduration[]"
                                                                onclick="breakhourtime(1);" /><span
                                                                class="input-group-append input-group-addon"
                                                                onclick="breakhourtime(1);"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Start Time<span
                                                                class="text-danger">*</span></label>
                                                        <div class=""><input class="breakstarttime" type="time"
                                                                id="breakstartTime1" value="09:30:00"
                                                                name="b_dumstart[]" required></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">End Time<span
                                                                class="text-danger">*</span></label>
                                                        <div class=""><input class="breakendtime" type="time"
                                                                id="breakendTime1" value="18:30:00" name="b_dumend[]"
                                                                required></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 mt-4"
                                                    style="background-color: #ffeeeea1;padding: 21px;">
                                                    <div class="text-center"><span class="breakvisibleruleno"
                                                            id="breakruleno1"
                                                            style="text-align: center;border-bottom: 3px solid;"> Break
                                                            1
                                                            Rules</span></div>
                                                    <div class="form-group mt-4" id="breakrules1">
                                                        <div class="row breakrulerow" id="breakrulerow11">
                                                            <p class="breakrulevisiblesno" id="brsno11">1).</p>
                                                            <div class="col-lg-8">
                                                                <div class="mb-3">
                                                                    Mark
                                                                    <input type="text" name="t_typedum_1[]"
                                                                        class="form-control breaktypedum" value="break"
                                                                        style="display:none;">
                                                                    <select name="ruledaydum_1[]" class="bruleday">
                                                                        <option value="1/2">1/2</option>
                                                                        <option value="1/4">1/4</option>
                                                                        <option value="3/4">3/4</option>
                                                                    </select>
                                                                    <select name="rulestatusdum_1[]"
                                                                        class="brulestatus">
                                                                        <option value="absent">Absent</option>
                                                                        <option value="present">Present</option>
                                                                    </select>
                                                                    when <select name="rulereportdum_1[]"
                                                                        class="brulereport">
                                                                        <option value="report">Report</option>
                                                                        <option value="leave">Leave</option>
                                                                    </select> to
                                                                    office <select name="ruleafterbeforedum_1[]"
                                                                        class="bruleafterbefore">
                                                                        <option value="after">After</option>
                                                                        <option value="before">Before</option>
                                                                    </select></label>
                                                                </div>
                                                            </div>


                                                            <div class="col-lg-3" style="margin-top: -2%;">
                                                                <input class="form-control bruletime"
                                                                    style="border-top: 0;border-left: 0;border-right: 0;text-align: center;"
                                                                    name="btimedum_1[]" type="time" value="09:30:00">
                                                            </div>
                                                            <div class="col-lg-12 mb-4"
                                                                style="display: flex;flex-direction: row-reverse;">
                                                                <!-- <input type="submit" class="button " id="addshift" value="Add rule"/> -->
                                                                <!-- <a href="#" onClick='addshift();' class="addshift">Add</a> -->
                                                                <button type="button" class="addshift"
                                                                    style="padding: 7px 31px;"
                                                                    onClick='addshiftbreak(1);'><i
                                                                        class="fa fa-plus m-r-5"></i>Add Rule</button>
                                                                <button type="button" id="brruleBtn11"
                                                                    onclick='removebreakrule(1,1);'
                                                                    class="remshftbrkrule"
                                                                    style="background-color: #bbbbbb; display: none;padding: 7px 15px;">
                                                                    <i class="fa fa-trash m-r-5"></i>Remove
                                                                    Rule</button>
                                                                <button type="button" class="editbrrulebtn mr-3"
                                                                    id="editbrrulebtn11"
                                                                    style="display: none; padding: 7px 31px;"
                                                                    onclick='editbrrulebtn(1,1);'><i
                                                                        class="la la-edit m-r-5"></i>Edit Rule</button>
                                                                <!-- <button type='button' class='btnDelete' onclick="remove();">x</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- <div class="addmoreadd" style="padding-left: 15px;"> -->
                                                <!-- <a onClick='addbreak();'  class="addmore">Add More Address</a> -->
                                                <!-- <button type="button" id="removeBtn1" onClick='removebreak(1);'
                                                        class="removebreak"
                                                        style="background-color: #bbbbbb;display:none;margin-right: 12px;padding: 7px 31px;">Remove
                                                        Break</button>
                                                </div> -->
                                            </div>
                                        </div>
                                        <button type="button" id="addBtn1" onClick='addbreak();'
                                            class="addmore addshift"
                                            style="background-color: #ff9b44; display: inline;padding: 7px 15px;">
                                            <i class="fa fa-plus m-r-5"></i>Add Break</button>
                                    </div>

                                </div>
                            </div>


                            <div style="overflow:auto;">
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
</div>

</div>
<!-- /Page Content -->

</div>




<!-- /Page Wrapper -->
@stop
@section('content-js')

<script type="text/javascript">
    // function firstchangecheck(id) {

    // }
    // $(" .shiftrulerow").change(function () {
    //     alert(parseInt($('.shiftrulerow').length));
    //     var idArr = [];
    //     $(breakrules).each(function () {
    //         idArr.push($(this).attr("id"));
    //     });
    //     $.each(idArr, function (key, value) {});

    // });

    // HIDE WEEK OFF
    function hideweekoff() {
        if ($('#overtime').prop("checked")) {
            document.getElementById("weekoffblock").style.display = "block";
        } else {
            document.getElementById("weekoffblock").style.display = "none";
        }
    }

    // ADD SHIFT RULES
    var i = 1;
    var sc = 1;
    // var functionIsRunning = false;

    function addshift() {
        i++;
        // alert(i);
        var shiftrulelength = $(".shiftrulerow").length;
        var shiftrulelengthinc = parseInt(shiftrulelength) + 1;
        $('.editshiftbtn:first').show();
        $('.remCF:first').show();
        $('.addshiftbtn:first').hide();

        ($('.addshiftbtn:first').length <= 1) ? $("#addshiftbtn:first").parent().css('margin-top', '-46px'):
            $(
                "#addshiftbtn:first").parent().css('margin-top', '-43px');

        var firstruleday = $('.ruleday:first option:selected').val();
        var firstruletime = $('.ruletime:first').val();
        var H = +firstruletime.substr(0, 2);
        var h = H % 12 || 12;
        var ampm = (H < 12 || H === 24) ? "AM" : "PM";
        var firstruletime12hr = h + firstruletime.substr(2, 3) + ampm;
        var firstrulestatus = $('.rulestatus:first option:selected').val();
        var firstrulereport = $('.rulereport:first option:selected').val();
        var firstruleafterbefore = $('.ruleafterbefore:first option:selected').val();

        $("#shiftrules").append(
            '<div class="row shiftrulerow" id="shiftrulerow' + i + '"><p style="display:none;" id="shiftrulenum' +
            i + '">' + shiftrulelengthinc +
            ').</p> <div class="col-lg-8 inputfieldsshiftrule" id="inputfieldsshiftrule' + i +
            '"><div class="mb-3">' +
            'Mark<select name="ruledaydum[]"  class="ruleday"><option value="1/2">1/2</option><option value="1/4">1/4</option><option value="3/4">3/4</option></select>' +
            '<select name="rulestatusdum[]" class="rulestatus"><option value="absent">Absent</option><option value="present">present</option></select> when ' +
            '<select name="rulereportdum[]"  class="rulereport"><option value="report">Report</option><option value="leave">Leave</option></select> to office' +
            '<select name="ruleafterbeforedum[]"  class="ruleafterbefore"><option value="after">After</option><option value="before">Before</option></select></label></div></div><div class="col-lg-3 inputtimeshiftrule" id="inputtimeshiftrule' +
            i +
            '" style="margin-top: -2%;"><input class="form-control ruletime "  style="border-top: 0;border-left: 0;border-right: 0;text-align: center;" name="timedum[]" type="time" value="09:30:00"></div>' +
            '<div class="col-8 textshiftrule" id="textshiftrule' + i +
            '" style="display:none;"><p class="ruletext"> </p></div><div class="col-12 mb-4" style="display: flex;flex-direction: row-reverse;"><button type="button" class="remCF" id="remshiftbtn' +
            i + '" onclick="remshiftbtn(' + i + ');"' +
            'class="remCF" style="display: inline;padding: 7px 15px;background-color: #bbbbbb;"><i class="fa fa-trash-o m-r-5"></i>Remove Rule</button><button type="button" class="editshiftbtn mr-3"  id="editshiftbtn' +
            i +
            '" style="padding: 7px 31px;" onClick="editshiftbtn(' + i +
            ');"><i class="la la-pencil m-r-5"></i> Edit Rule</button><button type="button" class="addshiftbtn"  id="addshiftbtn' +
            i +
            '" style="padding: 7px 31px;" onClick="addshift();"><i class="fa fa-plus m-r-5"></i>Add New Rule</button></div></div>'
        );

        if (($('.shiftrulerow').length) < 1) {
            alert('YEs');
            $('.textshiftrule:first').html(
                '<div class="mb-3 ">Mark ' + firstruleday + ' ' + firstrulestatus + ' when ' +
                firstrulereport +
                ' to office ' + firstruleafterbefore + ' ' + firstruletime12hr + '.</div>').show();
            $('.shiftrulerow:first').show();
            $('.inputfieldsshiftrule:first').hide();
            $('.inputtimeshiftrule:first').hide();
            // if ($(".quaterday:first").prop("checked") == true) {
            //     $('.quarterdayview:first').attr("checked", "checked");
            // }
        }



        var idruleday = $('#shiftrulerow' + (i - 1) + ' .ruleday').val();
        var idruletime = ($('#shiftrulerow' + (i - 1) + ' .ruletime').val());
        var H = +idruletime.substr(0, 2);
        var h = H % 12 || 12;
        var ampm = (H < 12 || H === 24) ? "AM" : "PM";
        var idruletime12hr = h + idruletime.substr(2, 3) + ampm;
        var idrulestatus = $('#shiftrulerow' + (i - 1) + ' .rulestatus option:selected').val();
        var idrulereport = $('#shiftrulerow' + (i - 1) + ' .rulereport option:selected').val();
        var idruleafterbefore = $('#shiftrulerow' + (i - 1) + ' .ruleafterbefore option:selected').val();

        $('#textshiftrule' + (i - 1)).html(
            '<div class="mb-3">Mark ' + idruleday + ' ' + idrulestatus + ' when ' + idrulereport +
            ' to office ' + idruleafterbefore + ' ' + idruletime12hr + '.</div>').show();

        ($('.addshiftbtn').length <= 2) ? $("#addshiftbtn" + (i - 1)).parent().css('margin-top', '-43px'):
            $(
                "#addshiftbtn" + (i - 1)).parent().css('margin-top', '-43px');

        // if ($('#quaterday' + (i - 1)).prop("checked") == true) {

        //     $('#quarterdayview' + (i - 1)).attr("checked", "checked");
        // }

        $('#inputfieldsshiftrule' + (i - 1)).hide();
        $('#inputtimeshiftrule' + (i - 1)).hide();
        $('#shiftrulenum' + (i - 1)).css('display', 'block');
        $('#shiftrulerow' + (i - 1)).find('.ruleday').attr('name', 'ruleday[]');
        $('#shiftrulerow' + (i - 1)).find('.rulestatus').attr('name', 'rulestatus[]');
        $('#shiftrulerow' + (i - 1)).find('.rulereport').attr('name', 'rulereport[]');
        $('#shiftrulerow' + (i - 1)).find('.ruleafterbefore').attr('name', 'ruleafterbefore[]');
        $('#shiftrulerow' + (i - 1)).find('.ruletime').attr('name', 'time[]');


        $('#addshiftbtn' + (i - 1)).hide();
        $('#editshiftbtn' + (i - 1)).show();
        $('#remshiftbtn' + (i - 1)).show();
        $('.editshiftbtn:last').hide();
        $('.remCF:last').hide();

    }

    // EDIT SHIFT RULE
    function editshiftbtn(id) {
        // alert(id);
        $("#textshiftrule" + id).hide();
        $('#inputfieldsshiftrule' + id).show();
        $('#inputtimeshiftrule' + id).show();
        $('#editshiftbtn' + id).attr('onclick', 'okshiftbtn(' + id + ')');
        $('#editshiftbtn' + id).html('Ok');

        ($('.editshiftbtn:first').length <= 2) ? $(".editshiftbtn:first").parent().css('margin-top', ''): $(
            ".editshiftbtn:first").parent().css('margin-top', '');
        ($('.editshiftbtn').length <= 2) ? $("#editshiftbtn" + id).parent().css('margin-top', ' '): $(
                "#editshiftbtn" +
                id)
            .parent().css('margin-top', '');
    }

    // EDITED SHIFT RULE
    function okshiftbtn(id) {
        // alert(id);
        var idruleday = ($('#shiftrulerow' + id + ' .ruleday option:selected').val());
        var idruletime = ($('#shiftrulerow' + id + ' .ruletime').val());
        var H = +idruletime.substr(0, 2);
        var h = H % 12 || 12;
        var ampm = (H < 12 || H === 24) ? "AM" : "PM";
        var idruletime12hr = h + idruletime.substr(2, 3) + ampm;
        var idrulestatus = $('#shiftrulerow' + id + ' .rulestatus option:selected').val();
        var idrulereport = $('#shiftrulerow' + id + ' .rulereport option:selected').val();
        var idruleafterbefore = $('#shiftrulerow' + id + ' .ruleafterbefore option:selected').val();
        $('#textshiftrule' + id).html(
            '<div class="mb-3 ">Mark ' + idruleday + ' ' + idrulestatus + ' when ' + idrulereport +
            ' to office ' + idruleafterbefore + ' ' + idruletime12hr + '.</div>').show();


        $("#textshiftrule" + id).show();
        $('#inputfieldsshiftrule' + id).hide();
        $('#inputtimeshiftrule' + id).hide();
        $('#editshiftbtn' + id).attr('onclick', 'editshiftbtn(' + id + ')');
        $('#editshiftbtn' + id).html('<i class="la la-pencil m-r-5"></i>Edit Rule');
        ($('.addshiftbtn').length <= 2) ? $("#addshiftbtn" + id).parent().css('margin-top', '-27px'): $(
            "#addshiftbtn" +
            id).parent().css('margin-top', '-43px');
        //    FOR CHECKBOX AFTER FIELD INPUTS
        if ($('#quaterday' + id).prop("checked") == true) {
            $('#quarterdayview' + id).attr("checked", "checked");
        }
        //  //    FOR Id CHECKBOX AFTER FIELD INPUTS
        //  if ($('#quaterday' + id).prop("checked") == true) {
        //     $('#quarterdayview' + id).attr("checked", "checked");
        // }
    }

    // Remove Shift Rules
    function remshiftbtn(id) {
        $("#shiftrulerow" + (id)).remove();
        $("#editshiftbtn" + (id - 1)).show();
        $("#remshiftbtn" + (id - 1)).show();
        i--;
        recalId();
    }

    // Update Shift Rules Id
    function recalId() {
        var idArr = [];
        $(".shiftrulerow").each(function () {
            idArr.push($(this).attr("id"));
        });
        $.each(idArr, function (key, value) {
            var sno = parseInt(key) + 1;
            $('#' + value).attr('id', 'shiftrulerow' + sno);
            $('#shiftrulenum' + value.replace('shiftrulerow', '')).text(sno + ').');
            $('#shiftrulenum' + value.replace('shiftrulerow', '')).attr('id', 'shiftrulenum' + sno);
            // $('#quaterdaylabel' + value.replace('shiftrulerow', '')).attr('for', 'quaterday' + sno);
            // $('#quaterdaylabel' + value.replace('shiftrulerow', '')).attr('id', 'quaterdaylabel' +
            //     sno);
            // $('#quaterday' + value.replace('shiftrulerow', '')).attr('id', 'quaterday' + sno);
            // $('#quarterdayviewlabel' + value.replace('shiftrulerow', '')).attr('for',
            //     'quarterdayview' + sno);
            // $('#quarterdayviewlabel' + value.replace('shiftrulerow', '')).attr('id',
            //     'quarterdayviewlabel' +
            //     sno);
            // $('#quarterdayview' + value.replace('shiftrulerow', '')).attr('id', 'quarterdayview' +
            //     sno);
            $('#inputfieldsshiftrule' + value.replace('shiftrulerow', '')).attr('id',
                'inputfieldsshiftrule' +
                sno);
            $('#inputtimeshiftrule' + value.replace('shiftrulerow', '')).attr('id',
                'inputtimeshiftrule' + sno);
            $('#textshiftrule' + value.replace('shiftrulerow', '')).attr('id', 'textshiftrule' +
                sno);
            $('#addshiftbtn' + value.replace('shiftrulerow', '')).attr('id', 'addshiftbtn' + sno);
            $('#editshiftbtn' + value.replace('shiftrulerow', '')).attr('id', 'editshiftbtn' + sno);
            $('#editshiftbtn' + sno).attr('onclick', 'editshiftbtn(' + sno + ')');
            $('#remshiftbtn' + value.replace('shiftrulerow', '')).attr('id', 'remshiftbtn' + sno);
            $('#remshiftbtn' + sno).attr('onclick', 'remshiftbtn(' + sno + ')');
        });
    }


    // var br = 0;

    function addshiftbreak(id) {

        // br++;
        var br = parseInt($('#breakrules' + id + ' .breakrulerow').length) + 1;
        // ($('#breakrules'+ id + ' .breakrulerow').length <= 1) ? $('#brruleBtn'+ id +'1').hide() : $('#brruleBtn'+ id +''+ br ).show();
        $('.addshift:first').hide();
        alert(id);
        alert(br);
        $("#breakrules" + id).append(
            '<div class="row breakrulerow" id="breakrulerow' + id + '' + br +
            '"><p class="breakrulevisiblesno" style="display:none;" id="brsno' + id + '' + br +
            '">' + br +
            ').</p>  <div class="col-lg-8"><div class="mb-3">Mark<input type="text" name="t_typedum_' + id +
            '[]" class="form-control breaktypedum" value="break" style="display:none;"><select name="ruledaydum_' +
            id +
            '[]" class="bruleday" ><option value="1/2">1/2</option><option value="1/4">1/4</option><option value="3/4">3/4</option></select>' +
            '<select name="rulestatusdum_' + id +
            '[]" class="brulestatus"><option value="absent">Absent</option><option value="present">present</option></select> when ' +
            '<select name="rulereportdum_' + id +
            '[]" class="brulereport"><option value="report">Report</option><option value="leave">Leave</option></select> to office' +
            '<select name="ruleafterbeforedum_' + id +
            '[]" class="bruleafterbefore"><option value="after">After</option><option value="before">Before</option></select></div></div><div class="col-lg-3  inputtimeshiftrule" id="inputtimeshiftrule1" style="margin-top: -2%;"><input class="form-control bruletime" style="border-top: 0;border-left: 0;border-right: 0;text-align: center;" name="btimedum_' +
            id + '[]" type="time" value="09:30:00"></div>' +
            '<div class="col-lg-12 mb-4" style=" display: flex;flex-direction: row-reverse;">' +
            '<button type="button" class="addshift" style="padding: 7px 31px;" onClick="addshiftbreak(' +
            id +
            ');"><i class="fa fa-plus m-r-5"></i>Add Rule</button><button type="button"  id="brruleBtn' + id + '' +
            br + '" onClick="removebreakrule(' +
            id + ',' + br +
            ');" class="remshftbrkrule" style="background-color: #bbbbbb; display: none;padding: 7px 15px;"><i class="fa fa-trash m-r-5"></i>Remove Rule</button>' +
            '<button type="button" class="editbrrulebtn mr-3" id="editbrrulebtn' + id + '' + br +
            '"" style="padding: 7px 31px;"  onClick="editbrrulebtn(' + id + ',' + br +
            ');"><i class="la la-edit m-r-5"></i>Edit Rule</button>'
        );

        $('#breakrulerow' + id + '' + (br - 1) + ' .addshift').hide();
        $('#breakrulerow' + id + '' + br + ' .remshftbrkrule').hide();
        $('#breakrulerow' + id + '' + br + ' .editbrrulebtn').hide();
        $('#breakrulerow' + id + '' + (br - 1) + ' .editbrrulebtn').show();
        $('#breakrulerow' + id + '' + (br - 1) + ' .remshftbrkrule').show();
        $('#breakrulerow' + id + '' + (br - 1) + ' .breakrulevisiblesno').css('display', 'block');
        $('#breakrulerow' + id + '' + (br - 1)).find('input, textarea, select').attr('disabled', 'disabled');


        if (!$('.break:last')) {
            $('#breakrulerow' + id + '' + (br - 1)).find('.bruleday').attr('name', 'ruleday_' + id + '[]');
            $('#breakrulerow' + id + '' + (br - 1)).find('.brulestatus').attr('name', 'rulestatus_' + id + '[]');
            $('#breakrulerow' + id + '' + (br - 1)).find('.brulereport').attr('name', 'rulereport_' + id + '[]');
            $('#breakrulerow' + id + '' + (br - 1)).find('.bruleafterbefore').attr('name', 'ruleafterbefore_' + id +
                '[]');
            $('#breakrulerow' + id + '' + (br - 1)).find('.bruletime').attr('name', 'time_' + id + '[]');
            $('#breakrulerow' + id + '' + (br - 1)).find('.breaktypedum').attr('name', 't_type_' + id + '[]');
        }
        // $('#breakrulerow' + id + '' + (br - 1)).find('.bruleday').attr('name', 'ruleday_' + id + '[]');
        // $('#breakrulerow' + id + '' + (br - 1)).find('.brulestatus').attr('name', 'rulestatus_' + id + '[]');
        // $('#breakrulerow' + id + '' + (br - 1)).find('.brulereport').attr('name', 'rulereport_' + id + '[]');
        // $('#breakrulerow' + id + '' + (br - 1)).find('.bruleafterbefore').attr('name', 'ruleafterbefore_' + id + '[]');
        // $('#breakrulerow' + id + '' + (br - 1)).find('.bruletime').attr('name', 'time_' + id + '[]');

        // var idruleday = $('#breakrulerow' + id + '' + (br - 1) + ' .ruleday').val();
        // var idruletime = ($('#breakrulerow' + id + '' + (br - 1) + ' .ruletime').val());
        // var H = +idruletime.substr(0, 2);
        // var h = H % 12 || 12;
        // var ampm = (H < 12 || H === 24) ? "AM" : "PM";
        // var idruletime12hr = h + idruletime.substr(2, 3) + ampm;
        // var idrulestatus = $('#breakrulerow' + id + '' + (br - 1) + ' .rulestatus option:selected').val();
        // var idrulereport = $('#breakrulerow' + id + '' + (br - 1) + ' .rulereport option:selected').val();
        // var idruleafterbefore = $('#breakrulerow' + id + '' + (br - 1) + ' .ruleafterbefore option:selected').val();




        // $('#textshiftrule' + (i - 1)).html(
        //     '<div class="custom-control custom-checkbox "><input disabled type="checkbox" class="custom-control-input quarterdayview" id="quarterdayview' +
        //     (i - 1) +
        //     '" name="quarterdayview[]">  <label class="custom-control-label " id="quarterdayviewlabel' + (i - 1) +
        //     '" for="quarterdayview' + (i - 1) +
        //     '">Mark ' + idruleday + ' ' + idrulestatus + ' when ' + idrulereport +
        //     ' to office ' + idruleafterbefore + ' ' + idruletime12hr + '.</div>').show();

        // ($('.addshiftbtn').length <= 2) ? $("#addshiftbtn" + (i - 1)).parent().css('margin-top', '-27px'): $(
        //     "#addshiftbtn" + (i - 1)).parent().css('margin-top', '-43px');

        // if ($('#quaterday' + (i - 1)).prop("checked") == true) {
        //     // alert('check quater');
        //     $('#quarterdayview' + (i - 1)).attr("checked", "checked");
        // }




        $("#breakrules").on('click', '.remshftbrkrule', function () {
            $(this).parent().parent().remove();
        });
    };



    var rowNum = 1;

    function addbreak() {
        rowNum++;

        var rm = '<div class="break" id="break' + rowNum + '"><div class="breakbox">' +
            '<div class="brhead mb-4"><div class="col-6"><span class="breakvisiblesno" id="sno' + rowNum +
            '">' + rowNum + ').</span><span class="breakvisiblename" id="output' + rowNum + '">Break Name ' + rowNum +
            '</span></div><div class="col-6 text-right">' +
            '<button type="button" class="editbreak" onclick="editbreak(' + rowNum + ');" id="editBtn' + rowNum +
            '" style="background-color: ##ff9b44;padding: 7px 15px; margin-right: 6px;">' +
            '<i class="la la-edit m-r-5"></i>Edit</button><button type="button" onclick="removebreak(' + rowNum +
            ');" class="removebreak" id="removeBtn' + rowNum +
            '"  style="background-color: #bbbbbb;padding: 7px 15px;">' +
            '<i class="fa fa-trash m-r-5"></i>Remove</button></div></div><div class="row"> <div class="col-sm-6"><div class="form-group"> <label class="col-form-label">Break Name <span class="text-danger">*</span></label><input class="form-control breakname" id="breakname' +
            rowNum + '" onkeyup="breaknamekeyup(' + rowNum +
            ');" placeholder="Break Name" type="text" name="b_dumname[]"></div></div>     <div class="col-sm-6"><div class="form-group"><label class="col-form-label">Break Duration <label><span class="text-danger">(Hours)</span></label><span class="text-danger">*</span></label><div class="input-group time timepicker"><input class="form-control breakduration" id="breakduration' +
            rowNum + '" onclick="breakhourtime(' + rowNum +
            ');" placeholder="HH:MM" name="b_dumduration[]" /><span class="input-group-append input-group-addon" onclick="breakhourtime(' +
            rowNum +
            ');"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span></div></div></div><div class="col-sm-6"><div class="form-group"><label class="col-form-label">Start Time<span class="text-danger">*</span></label><div class=""><input class="breakstarttime" type="time" id="breakstartTime' +
            rowNum +
            '" value="09:30:00" name="b_dumstart[]"></div></div></div> <div class="col-sm-6"><div class="form-group"> <label class="col-form-label">End Time<span class="text-danger">*</span></label><div class=""><input type="time" id="breakendTime' +
            rowNum +
            '" class="breakendtime" value="18:30:00"name="b_dumend[]"></div> </div></div> <div class="col-sm-12 mt-4" style="background-color: #ffeeeea1;padding: 21px;" id="brules"> <div class="text-center"><span class="breakvisibleruleno" id="breakruleno' +
            rowNum + '" style="text-align: center;border-bottom: 3px solid;"> Break ' + rowNum +
            ' Rules</span></div> <div class="form-group mt-4" id="breakrules' +
            rowNum + '"> <div class="row breakrulerow" id="breakrulerow' +
            rowNum + '1"> <span class="breakrulevisiblesno" id="brsno' +
            rowNum + '1">1).</span>  <div class="col-lg-8"><div class="mb-3">Mark <input type="text" name="t_typedum_' +
            rowNum +
            '[]"  class="form-control breaktypedum" value="break" style="display:none;"><select name="ruledaydum_' +
            rowNum +
            '[]" class="bruleday"><option value="1/2">1/2</option><option value="1/4">1/4</option><option value="3/4">3/4</option></select> <select class="brulestatus" name="rulestatusdum_' +
            rowNum +
            '[]"><option value="absent">Absent</option>  <option value="present">Present</option></select>when <select class="brulereport" name="rulereportdum_' +
            rowNum +
            '[]"> <option value="report">Report</option><option value="leave">Leave</option> </select> to office <select class="bruleafterbefore" name="ruleafterbeforedum_' +
            rowNum +
            '[]"><option value="after">After</option> <option value="before">Before</option>  </select></label></div> </div><div class="col-lg-3" style="margin-top: -2%;"> <input class="form-control" style="border-top: 0;border-left: 0;border-right: 0;text-align: center;" class="btimedum" name="timedum_' +
            rowNum +
            '[]" type="time" value="09:30:00"> </div> <div class="col-lg-12 mb-4" style=" display: flex;flex-direction: row-reverse;">' +
            '<button type="button" class="addshift" style="padding: 7px 31px;" onClick="addshiftbreak(' +
            rowNum +
            ');"><i class="fa fa-plus m-r-5"></i>Add Rule</button><button type="button"  id="brruleBtn' + rowNum +
            '1" onClick="removebreakrule(' +
            rowNum +
            ',1);" class="remshftbrkrule" style="background-color: #bbbbbb; display: none;padding: 7px 15px;"><i class="fa fa-trash m-r-5"></i>Remove Rule</button>' +
            '<button type="button" class="editbrrulebtn mr-3" id="editbrrulebtn' + rowNum +
            '1" style="padding: 7px 31px;" onclick="editbrrulebtn(' +
            rowNum + ',1);"><i class="la la-edit m-r-5"></i>Edit Rule</button></div></div></div>' +
            '</div></div></div><button type="button" id="addBtn' + rowNum +
            '" onClick="addbreak();" class="addmore addshift" style="background-color: #ff9b44; display: inline;padding: 7px 15px;"><i class="fa fa-plus m-r-5"></i>Add Break</button></div>';
        $('.allbreaks').append(rm);
        $(".addmore:first").hide();
        $(".removebreak:first").show();
        $(".removebreak:last").hide();
        $(".editbreak:last").hide();
        var removebtn = "#removeBtn" + (rowNum - 1);
        var editbtn = "#editBtn" + (rowNum - 1);
        // alert($('.removebreak:last').attr('id'));
        $("#removeBtn" + (rowNum - 1)).show();
        $("#editBtn" + (rowNum - 1)).show();
        $("#addBtn" + (rowNum - 1)).hide();
        $("#break" + (rowNum - 1)).find('input, textarea, button, select').attr('disabled', 'disabled');
        $("#break" + (rowNum - 1)).find("#removeBtn" + (rowNum - 1)).removeAttr("disabled");
        $("#break" + (rowNum - 1)).find("#editBtn" + (rowNum - 1)).removeAttr("disabled");
        $("#break" + (rowNum - 1)).find(".editbrrulebtn ").hide();
        $("#break" + (rowNum - 1)).find(".addshift ").hide();
        $("#break" + (rowNum - 1)).find(".remshftbrkrule ").hide();
        $("#break" + (rowNum - 1) + " .breakrulerow:last").hide();
        $("#break" + (rowNum - 1)).find('.breakname').attr('name', 'b_name[]');
        $("#break" + (rowNum - 1)).find('.breakduration').attr('name', 'b_duration[]');
        $("#break" + (rowNum - 1)).find('.breakstarttime').attr('name', 'b_start[]');
        $("#break" + (rowNum - 1)).find('.breakendtime').attr('name', 'b_end[]');
        $("#break" + (rowNum - 1)).find('.bruleday').attr('name', 'ruleday_' + (rowNum - 1) + '[]');
        $("#break" + (rowNum - 1)).find('.brulestatus').attr('name', 'rulestatus_' + (rowNum - 1) + '[]');
        $("#break" + (rowNum - 1)).find('.brulereport').attr('name', 'rulereport_' + (rowNum - 1) + '[]');
        $("#break" + (rowNum - 1)).find('.bruleafterbefore').attr('name', 'ruleafterbefore_' + (rowNum - 1) + '[]');
        $("#break" + (rowNum - 1)).find('.bruletime').attr('name', 'btime_' + (rowNum - 1) + '[]');
        $("#break" + (rowNum - 1)).find('.breaktypedum').attr('name', 't_type_' + (rowNum - 1) + '[]');

        $("#break" + (rowNum - 1)).find('.bruleday:last').attr('name', 'ruledaydum_' + (rowNum - 1) + '[]');
        $("#break" + (rowNum - 1)).find('.brulestatus:last').attr('name', 'rulestatusdum_' + (rowNum - 1) + '[]');
        $("#break" + (rowNum - 1)).find('.brulereport:last').attr('name', 'rulereportdum_' + (rowNum - 1) + '[]');
        $("#break" + (rowNum - 1)).find('.bruleafterbefore:last').attr('name', 'ruleafterbeforedum_' + (rowNum - 1) +
            '[]');
        $("#break" + (rowNum - 1)).find('.bruletime:last').attr('name', 'btimedum_' + (rowNum - 1) + '[]');
        $("#break" + (rowNum - 1)).find('.breaktypedum:last').attr('name', 't_typedum_' + (rowNum - 1) + '[]');


        // $("#break" + (rowNum - 1)).find('.bruletime').attr('name', 'time_' + (rowNum - 1) + '[]');
        // alert("#break" + (rowNum - 1) + '' + (br - 1) + ' .addshift');
    }

    function editbrrulebtn(rid, bid) {
        // alert('Hi ');
        // alert( $("#breakrulerow" + rid + '' + bid));
        $("#breakrulerow" + rid + '' + bid).find('input, textarea, select').removeAttr("disabled");
        $('#editbrrulebtn' + rid + '' + bid).attr('onclick', 'okbreakrulebtn(' + rid + ',' + bid + ')');
        $('#editbrrulebtn' + rid + '' + bid).html('<i class="la la-check-circle m-r-5"></i>Ok');
    }

    function okbreakrulebtn(rid, bid) {
        // alert('Hi ');
        // alert( $("#breakrulerow" + rid + '' + bid));
        $("#breakrulerow" + rid + '' + bid).find('input, textarea, select').attr('disabled', 'disabled');
        $('#editbrrulebtn' + rid + '' + bid).attr('onclick', 'editbrrulebtn(' + rid + ',' + bid + ')');
        $('#editbrrulebtn' + rid + '' + bid).html('<i class="la la-edit m-r-5"></i>Edit Rule');
    }

    function editbreak(id) {
        // alert(id);
        $("#break" + id).find('input, textarea, button, select').removeAttr("disabled");
        $("#break" + id + " .breakrulerow").find('input, textarea,select').attr('disabled', 'disabled');
        $("#break" + id + " .breakrulerow:last").find('input, textarea,select').removeAttr("disabled");
        // $('.addshift').length <= 1) ?
        $("#break" + id).find(".editbrrulebtn ").show();
        $("#break" + id).find(".editbrrulebtn:last ").hide();
        $("#break" + id).find(".addshift").hide();
        //  alert($("#break" + id + " .addshift").length);

        $("#break" + id).find(".remshftbrkrule ").show();
        $("#break" + id).find(".remshftbrkrule:last").hide();
        $("#break" + id).find("#addBtn" + id).hide();
        $("#break" + id + " .breakrulerow:last").show();
        $('#editBtn' + id).attr('onclick', 'okbreakbtn(' + id + ')');
        $('#editBtn' + id).html('<i class="la la-check-circle m-r-5"></i>Ok');
        $("#breakrules" + id).find(".addshift:last").show();
    }

    function okbreakbtn(id) {
        $("#break" + id).find('input, textarea, button, select').attr('disabled', 'disabled');
        $("#break" + id).find(".editbrrulebtn ").hide();
        $("#break" + id).find(".addshift ").hide();
        $('#editBtn' + id).attr('onclick', 'editbreak(' + id + ')');
        $('#editBtn' + id).html('<i class="la la-edit m-r-5"></i>Edit');
        $("#break" + id).find("#removeBtn" + id).removeAttr("disabled");
        $("#breakrules" + id).find('.remshftbrkrule').hide();
        $("#break" + id).find("#editBtn" + id).removeAttr("disabled");
        $("#break" + id + " .breakrulerow:last").hide();
        $("#break" + id).find('.bruleday').attr('name', 'ruleday_' + id + '[]');
        $("#break" + id).find('.brulestatus').attr('name', 'rulestatus_' + id + '[]');
        $("#break" + id).find('.brulereport').attr('name', 'rulereport_' + id + '[]');
        $("#break" + id).find('.bruleafterbefore').attr('name', 'ruleafterbefore_' + id + '[]');
        $("#break" + id).find('.bruletime').attr('name', 'btime_' + id + '[]');
        $("#break" + id).find('.breaktypedum').attr('name', 't_type_' + id + '[]');


        $("#break" + id).find('.bruleday:last').attr('name', 'ruledaydum_' + id + '[]');
        $("#break" + id).find('.brulestatus:last').attr('name', 'rulestatusdum_' + id + '[]');
        $("#break" + id).find('.brulereport:last').attr('name', 'rulereportdum_' + id + '[]');
        $("#break" + id).find('.bruleafterbefore:last').attr('name', 'ruleafterbeforedum_' + id + '[]');
        $("#break" + id).find('.bruletime:last').attr('name', 'btimedum_' + id + '[]');
        $("#break" + id).find('.breaktypedum:last').attr('name', 't_typedum_' + id + '[]');


    }

    function removebreak(id) {
        $("#break" + id).remove();
        --rowNum;
        recalBreakId();

    }

    function removebreakrule(rid, bid) {
        $("#breakrulerow" + rid + '' + bid).fadeOut(function () {
            $(this).remove();
            // alert($('#breakrules' + rid + ' .breakrulerow').length);
            var breakrulesize = $('#breakrules' + rid + ' .breakrulerow').length;
            var breakrules = ($('#breakrules' + rid + ' .breakrulerow'));

            // Gather all rule id in an array
            var idArr = [];
            $(breakrules).each(function () {
                idArr.push($(this).attr("id"));
            });
            $.each(idArr, function (key, value) {
                // Add 1 to break rule id
                var brid = parseInt(key) + 1;

                // Previous break rule id
                var prid = value.replace('breakrulerow' + rid, '');
                $('#' + value).attr('id', 'breakrulerow' + rid + '' + brid);
                $('#brsno' + rid + '' + prid).attr('id', 'brsno' + rid + '' + brid);
                $('#brsno' + rid + '' + brid).text(brid + ' ).');
                $('#breakrulerow' + rid + '' + brid + ' .addshift').attr('onclick',
                    'addshiftbreak(' +
                    rid + ')');
                $('#brruleBtn' + rid + '' + prid).attr('id', 'brruleBtn' + rid + '' + brid);
                $('#brruleBtn' + rid + '' + brid).attr('onclick', 'removebreakrule(' + rid +
                    ',' +
                    brid + ')');
                $('#editbrrulebtn' + rid + '' + prid).attr('id', 'editbrrulebtn' + rid +
                    '' + brid);
                $('#editbrrulebtn' + rid + '' + brid).attr('onclick', 'editbrrulebtn(' +
                    rid + ',' +
                    brid + ')');
            });
        });
    }

    function breaknamekeyup(id) {
        var out = $("#breakname" + id).val();
        (out == '') ? $("#output" + id).text("Break Name " + id): $("#output" + id).text(out);
        (out == '') ? $("#breakruleno" + id).text("Break " + id + " Rules"): $("#breakruleno" + id).text(
            out +
            ' Rules');
    }

    function recalBreakId() {
        var idArr = [];
        $(".break").each(function () {
            idArr.push($(this).attr("id"));
        });
        $.each(idArr, function (key, value) {
            var sno = key + 1;
            // alert(sno);
            alert(value);
            // $('#' + value).attr('id', 'shiftrulerow' + sno);
            // $('#' + value).attr('id', 'shiftrulerow' + key);
            // var ret = "data-123".replace('data-','');
            var breakid = value.replace('break', '');
            // alert(breakid);

            $("#sno" + breakid).text(sno + ').');
            $(".breakvisiblename:last").text('Break Name ' + sno);
            $(".breakvisibleruleno:last").text('Break ' + sno + ' Rules');

            $("#sno" + breakid).attr('id', 'sno' + sno);
            $("#output" + breakid).attr('id', 'output' + sno);
            $("#breakruleno" + breakid).attr('id', 'breakruleno' + sno);
            $("#breakruleno" + sno).html('Break ' + sno + ' Rules');
            // $("#breakrules" + breakid).attr('id', 'breakrules' + sno);
            // $("#breakrules" + breakid).attr('id', 'breakrules' + sno);
            // $("#breakrules" + sno).attr('id', 'breakrules' + sno);

            // var ruleidArr = [];
            // $("#breakrules" + sno).each(function () {
            //     ruleidArr.push($(this).attr("id"));
            // });

            // $.each(ruleidArr, function (keys, values) {
            // // var sno = key + 1;
            //         alert(values);
            // });
            // $("#breakrules" + sno + " div").each(function () {
            //     var text = $(this).text();
            //     $(this).text(text.replace('dog', 'doll'));
            // });

            $('#breakname' + breakid).attr('id', 'breakname' + sno);
            $('#breaknamekeyup' + sno).attr('onkeyup', 'breaknamekeyup(' + sno + ')');
            $('#break' + breakid + ' .breakvisiblename').html('Break Name' + sno);
            $('#break' + breakid).attr('id', 'break' + sno);
            $('#removeBtn' + breakid).attr('id', 'removeBtn' + sno);
            $('#removeBtn' + sno).attr('onclick', 'removebreak(' + sno + ')');
            $("#editBtn" + breakid).attr('id', 'editBtn' + sno);
            $('#editBtn' + sno).attr('onclick', 'editbreak(' + sno + ')');
            $('#breakname' + sno).attr('onkeyup', 'breaknamekeyup(' + sno + ')');

            $('#breakduration' + breakid).attr('id', 'breakduration' + sno);
            $('#breakduration' + sno).attr('onclick', 'breakhourtime(' + sno + ')');
            $('#break' + sno + ' .timepicker').find('span').attr('onclick', 'breakhourtime(' + sno + ')');
            $('#breakstartTime' + breakid).attr('id', 'breakstartTime' + sno);
            $('#breakendTime' + breakid).attr('id', 'breakendTime' + sno);
            $('#break' + sno).find('breakrules' + breakid).attr('id', 'breakrules(' + sno + ')');



            $("#addBtn" + breakid).attr('id', 'addBtn' + sno);
        });
        // alert(idArr);

    }

    function breakhourtime(id) {
        $("#breakduration" + id).datetimepicker({
            format: 'HH:mm',
            viewDate: false,
            icons: {
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down"
            }
        }).focus();
    }



    var start = document.getElementById("shiftstart").value;
    var end = document.getElementById("shiftend").value;

    document.getElementById("shiftstart").onchange = function () {
        diff(start, end)
    };
    document.getElementById("shiftend").onchange = function () {
        diff(start, end)
    };


    function diff(start, end) {
        start = document.getElementById("shiftstart").value; //to update time value in each input bar
        end = document.getElementById("shiftend").value; //to update time value in each input bar

        start = start.split(":");
        end = end.split(":");
        var startDate = new Date(0, 0, 0, start[0], start[1], 0);
        var endDate = new Date(0, 0, 0, end[0], end[1], 0);
        var diff = endDate.getTime() - startDate.getTime();
        var hours = Math.floor(diff / 1000 / 60 / 60);
        diff -= hours * 1000 * 60 * 60;
        var minutes = Math.floor(diff / 1000 / 60);

        return (hours < 9 ? "0" : "") + hours + " hr :" + (minutes < 9 ? "0" : "") + minutes + " min";
    }

    function halfdiff(start, end) {
        start = document.getElementById("shiftstart").value; //to update time value in each input bar
        end = document.getElementById("shiftend").value; //to update time value in each input bar

        start = start.split(":");
        end = end.split(":");
        var startDate = new Date(0, 0, 0, start[0], start[1], 0);
        var endDate = new Date(0, 0, 0, end[0], end[1], 0);
        var diff = endDate.getTime() - startDate.getTime();
        var hours = Math.floor(diff / 1000 / 60 / 60);
        diff -= hours * 1000 * 60 * 60;
        var minutes = Math.floor(diff / 1000 / 60);

        return hours / 2 + " hr :" + minutes / 2 + " min";
    }

    setInterval(function () {
            document.getElementById("fullday").value = diff(start, end);
            document.getElementById("halfday").value = halfdiff(start, end);
        },
        1000
    ); //to update time every second (1000 is 1 sec interval and function encasing original code you had down here is because setInterval only reads functions) You can change how fast the time updates by lowering the time interval
</script>
@stop