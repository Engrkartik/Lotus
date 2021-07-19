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
                    <li class="breadcrumb-item active">Edit Shift</li>
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
                    <h4 class="card-title">Edit Shift</h4>
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
                    <form id="regForm" action="{{url('/update_shift/'.request()->id)}}">

                        <div class="tab-content">
                            @foreach ($shift as $item=>$value)
                            <div class="tab-pane show active" id="solid-rounded-justified-tab1">

                                <h1 class="mb-4">Edit Shift Details</h1>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Shift Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" placeholder="Shift Name" name="name" type="text"
                                                value="{{$value->shift_name}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Shift Type</label>
                                            <select class="select" onchange="yesnoCheck(this);" name="type">
                                                <!-- <option>-- Select Shift Type --</option> -->
                                                <option value="Time-Based" @if ($value->shift_type=='Time-Based')
                                                    selected="selected" @endif>Time Based (DEFAULT)</option>
                                                <option value="Hour-Based" @if ($value->shift_type=='Hour-Based')
                                                    selected="selected" @endif>Hour Based </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Punch Begin<span
                                                    class="text-danger">*</span></label>
                                            <div class=""><input type="time" id="myTime" value="{{$value->shift_in}}"
                                                    name="punch_in" required></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Punch Out<span
                                                    class="text-danger">*</span></label>
                                            <div class=""><input type="time" id="myTime" value="{{$value->shift_out}}"
                                                    name="punch_out" required></div>
                                        </div>
                                    </div>
                                    <div class="row" id="ifYes" @if ($value->shift_type=='Time-Based') style="display: none;" @else style="display: contents;" @endif>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Full Day <label><span class="text-danger">(Hours)</span></label>:<span
                                                        class="text-danger">*</span></label>
                                                <input type="time" class="form-control" id="fullday" name="full_day_hr"
                                                    value="{{$value->full_day}}" required>

                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Half Day <label><span class="text-danger">(Hours)</span></label>:<span
                                                        class="text-danger">*</span></label>
                                                <input type="time" id="halfday" class="form-control" name="half_day_hr"
                                                    value="{{$value->half_day}}" required>

                                                {{-- <label><span class="text-danger">Hours</span></label> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="tab-pane" id="solid-rounded-justified-tab2">
                                <h1 class="mb-4">Add Shift Rules</h1>
                                @if(sizeof($rule_shift)>0)
                                @foreach ($rule_shift as $item=>$data)

                                <div class="row">
                                    <div class="col-sm-12" id="rules">
                                        <div class="form-group " id="shiftrules">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="quaterday" @if(!is_null($data->ruleday))
                                                        checked="checked" @endif>
                                                        <label class="custom-control-label" for="quaterday">Mark
                                                            <input type="text" name="t_type[]" class="form-control"
                                                                value="shift" style="display:none;">
                                                            <select name="ruleday[]">
                                                                <option value="1/2" @if($data->ruleday=='1/2')
                                                                    selected="selected" @endif>1/2</option>
                                                                <option value="1/4" @if($data->ruleday=='1/4')
                                                                    selected="selected" @endif>1/4</option>
                                                                <option value="3/4" @if($data->ruleday=='3/4')
                                                                    selected="selected" @endif>3/4</option>
                                                            </select>
                                                            <select name="rulestatus[]">
                                                                <option value="absent" @if($data->rulestatus=='absent')
                                                                    selected="selected" @endif>Absent</option>
                                                                <option value="present" @if($data->ruleday=='present')
                                                                    selected="selected" @endif>Present</option>
                                                            </select>
                                                            when <select name="rulereport[]">
                                                                <option value="report" @if($data->rulereport=='report')
                                                                    selected="selected" @endif>Report</option>
                                                                <option value="leave" @if($data->rulereport=='leave')
                                                                    selected="selected" @endif>Leave</option>
                                                            </select> to
                                                            office <select name="ruleafterbefore[]">
                                                                <option value="after" @if($data->
                                                                    ruleafterbefore=='after') selected="selected"
                                                                    @endif>After</option>
                                                                <option value="before" @if($data->
                                                                    ruleafterbefore=='before') selected="selected"
                                                                    @endif>Before</option>
                                                            </select></label>
                                                    </div>
                                                </div>


                                                <div class="col-lg-3" style="margin-top: -2%;">
                                                    <input class="form-control"
                                                        style="border-top: 0;border-left: 0;border-right: 0;text-align: center;"
                                                        name="time[]" type="time" value="{{$data->shift_time}}">
                                                </div>
                                                <div class="col-lg-12 mb-3"
                                                    style="display: flex;flex-direction: row-reverse;">
                                                    <!-- <input type="submit" class="button " id="addshift" value="Add rule"/> -->
                                                    <!-- <a href="#" onClick='addshift();' class="addshift">Add</a> -->
                                                    @if($item==0)
                                                    <button type="button" class="addshift" style="padding: 7px 31px;"
                                                        onClick='addshift("add");'>Add</button>
                                                    @else
                                                    <button type="button" class="remCF_a{{$item}}"
                                                        style="display: inline;padding: 7px 15px;"
                                                        onClick='addshift2(this);'>Remove</button>
                                                    @endif
                                                    <!-- <button type='button' class='btnDelete' onclick="remove();">x</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="row">
                                    <div class="col-sm-12" id="rules">
                                        <div class="form-group " id="shiftrules">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="quaterday" required>
                                                        <label class="custom-control-label" for="quaterday">Mark
                                                            <input type="text" name="t_type[]" class="form-control"
                                                                value="shift" style="display:none;">
                                                            <select name="ruleday[]">
                                                                <option value="1/2">1/2</option>
                                                                <option value="1/4">1/4</option>
                                                                <option value="3/4">3/4</option>
                                                            </select>
                                                            <select name="rulestatus[]">
                                                                <option value="absent">Absent</option>
                                                                <option value="present">Present</option>
                                                            </select>
                                                            when <select name="rulereport[]">
                                                                <option value="report">Report</option>
                                                                <option value="leave">Leave</option>
                                                            </select> to
                                                            office <select name="ruleafterbefore[]">
                                                                <option value="after">After</option>
                                                                <option value="before">Before</option>
                                                            </select></label>
                                                    </div>
                                                </div>


                                                <div class="col-lg-3" style="margin-top: -2%;">
                                                    <input class="form-control"
                                                        style="border-top: 0;border-left: 0;border-right: 0;text-align: center;"
                                                        name="time[]" type="time" value="09:30:00">
                                                </div>
                                                <div class="col-lg-12 mb-3"
                                                    style="display: flex;flex-direction: row-reverse;">
                                                    <!-- <input type="submit" class="button " id="addshift" value="Add rule"/> -->
                                                    <!-- <a href="#" onClick='addshift();' class="addshift">Add</a> -->
                                                    <button type="button" class="addshift" style="padding: 7px 31px;"
                                                        onClick='addshift("add");'>Add</button>

                                                    <!-- <button type='button' class='btnDelete' onclick="remove();">x</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="tab-pane" id="solid-rounded-justified-tab2">
                                @foreach ($shift as $item=>$value)

                                <h1 class="mb-4">Add Shift Rules</h1>
                                <div class="row">
                                    <div class="col-2">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="graceperiod"
                                                @if(!is_null($value->grace_time)) checked="checked" @endif>
                                            <label class="custom-control-label" for="graceperiod">Grace Period ( In/Out
                                                )</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <input type="time" name="grace_time" class="form-control"
                                                value="{{$value->grace_time}}">
                                            <!-- <label><span class="text-danger">minutes</span></label> -->
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="overtime"
                                                @if(!is_null($value->overtime_min)) checked="checked" @endif>
                                            <label class="custom-control-label" for="overtime">Overtime</label>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label class="col-form-label">Minimum <label><span class="text-danger">(Hours)</span></label>:<span
                                                    class="text-danger">*</span></label>
                                            <input type="time" name="min_overtime" class="form-control"
                                                value="{{$value->overtime_min}}">
                                            {{-- <label><span class="text-danger">Hours</span></label> --}}
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label class="col-form-label">Maximum <label><span class="text-danger">(Hours)</span></label>:<span
                                                    class="text-danger">*</span></label>
                                            <input type="time" name="max_overtime" class="form-control"
                                                value="{{$value->overtime_max}}">

                                            {{-- <label><span class="text-danger">Hours</span></label> --}}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input" id="overtimeweekoff"
                                                    name="overtime_as_weekoff" @if($value->wo_holi_overtime=='on')
                                                checked="checked" @endif>
                                                <label class="custom-control-label" for="overtimeweekoff">Weekoff /
                                                    Holiday consider as
                                                    overtime<span class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="tab-pane" id="solid-rounded-justified-tab2">
                                <h1 class="mb-4">Add Breaks</h1>
                                <div class="allbreaks">
                                    <!-- <div class="break" id="break0"> -->
                                @if(sizeof($rule_shift)>0)
                                    @foreach ($break as $item=>$data)     
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Break Name <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" placeholder="Break Name" type="text"
                                                    name="b_name[]" value="{{$data->break_name}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Break Duration <label><span class="text-danger">(Hours)</span></label><span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" placeholder="Break Duration" type="time"
                                                    name="b_duration[]" value="{{$data->break_duration}}">
                                                {{-- <label><span class="text-danger">Hours</span></label> --}}

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Start Time<span
                                                        class="text-danger">*</span></label>
                                                <div class=""><input type="time" id="breakstartTime"
                                                        name="b_start[]" value="{{$data->break_start}}"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">End Time<span
                                                        class="text-danger">*</span></label>
                                                <div class=""><input type="time" id="breakendTime"
                                                        name="b_end[]" value="{{$data->break_end}}"></div>
                                            </div>
                                        </div>
                                        @foreach ($rule_break as $item=>$datas)
                                            @if ($datas->rule_id==$data->id)
                                                
                                        <div class="col-sm-12 mt-4">
                                            <div class="form-group" id="breakrules0">
                                                <div class="row" id="breakrulerow0">
                                                    <div class="col-lg-8">
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="quaterdays_0" @if(!is_null($datas->ruleday))
                                                                checked="checked" @endif>
                                                            <label class="custom-control-label" for="quaterdays_0">Mark
                                                                <input type="text" name="t_type_0[]"
                                                                    class="form-control" value="break"
                                                                    style="display:none;">
                                                                <select name="ruleday_0[]">
                                                                    <option value="1/2" @if($datas->ruleday=='1/2')
                                                                        selected="selected" @endif>1/2</option>
                                                                    <option value="1/4" @if($datas->ruleday=='1/4')
                                                                        selected="selected" @endif>1/4</option>
                                                                    <option value="3/4" @if($datas->ruleday=='3/4')
                                                                        selected="selected" @endif>3/4</option>
                                                                </select>
                                                                <select name="rulestatus_0[]">
                                                                    <option value="absent" @if($datas->rulestatus=='absent')
                                                                        selected="selected" @endif>Absent</option>
                                                                    <option value="present" @if($datas->rulestatus=='present')
                                                                        selected="selected" @endif>Present</option>
                                                                </select>
                                                                when <select name="rulereport_0[]">
                                                                    <option value="report" @if($datas->rulereport=='report')
                                                                        selected="selected" @endif>Report</option>
                                                                    <option value="leave" @if($datas->rulereport=='leave')
                                                                        selected="selected" @endif>Leave</option>
                                                                </select> to
                                                                office <select name="ruleafterbefore_0[]">
                                                                    <option value="after"  @if($datas->ruleafterbefore=='after')
                                                                        selected="selected" @endif>After</option>
                                                                    <option value="before" @if($datas->ruleafterbefore=='before')
                                                                        selected="selected" @endif>Before</option>
                                                                </select></label>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3" style="margin-top: -2%;">
                                                        <input class="form-control"
                                                            style="border-top: 0;border-left: 0;border-right: 0;text-align: center;"
                                                            name="time_0[]" type="time" value="{{$datas->shift_time}}">
                                                    </div>
                                                    <div class="col-lg-12 mb-3"
                                                        style="display: flex;flex-direction: row-reverse;">
                                                        <!-- <input type="submit" class="button " id="addshift" value="Add rule"/> -->
                                                        <!-- <a href="#" onClick='addshift();' class="addshift">Add</a> -->
                                                        <button type="button" class="addshift"
                                                            style="padding: 7px 31px;"
                                                            onClick='addshiftbreak(0);'>Add</button>

                                                        <!-- <button type='button' class='btnDelete' onclick="remove();">x</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach


                                        <div class="addmoreadd" style="padding-left: 15px;">
                                            <!-- <a onClick='addbreak();'  class="addmore">Add More Address</a> -->
                                            <button type="button" id="addBtn0" onClick='addbreak();'
                                                class="addmore addshift"
                                                style="background-color: #ff9b44; display: inline;padding: 7px 15px;">Add
                                                Break</button>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Break Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" placeholder="Break Name" type="text"
                                                name="b_name[]">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Break Duration <label><span class="text-danger">(Hours)</span></label><span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" placeholder="Break Duration" type="time"
                                                name="b_duration[]">
                                            {{-- <label><span class="text-danger">Hours</span></label> --}}

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Start Time<span
                                                    class="text-danger">*</span></label>
                                            <div class=""><input type="time" id="breakstartTime" value="09:30:00"
                                                    name="b_start[]"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">End Time<span
                                                    class="text-danger">*</span></label>
                                            <div class=""><input type="time" id="breakendTime" value="18:30:00"
                                                    name="b_end[]"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mt-4">
                                        <div class="form-group" id="breakrules0">
                                            <div class="row" id="breakrulerow0">
                                                <div class="col-lg-8">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="quaterdays_0" required>
                                                        <label class="custom-control-label" for="quaterdays_0">Mark
                                                            <input type="text" name="t_type_0[]"
                                                                class="form-control" value="break"
                                                                style="display:none;">
                                                            <select name="ruleday_0[]">
                                                                <option value="1/2">1/2</option>
                                                                <option value="1/4">1/4</option>
                                                                <option value="3/4">3/4</option>
                                                            </select>
                                                            <select name="rulestatus_0[]">
                                                                <option value="absent">Absent</option>
                                                                <option value="present">Present</option>
                                                            </select>
                                                            when <select name="rulereport_0[]">
                                                                <option value="report">Report</option>
                                                                <option value="leave">Leave</option>
                                                            </select> to
                                                            office <select name="ruleafterbefore_0[]">
                                                                <option value="after">After</option>
                                                                <option value="before">Before</option>
                                                            </select></label>
                                                    </div>
                                                </div>


                                                <div class="col-lg-3" style="margin-top: -2%;">
                                                    <input class="form-control"
                                                        style="border-top: 0;border-left: 0;border-right: 0;text-align: center;"
                                                        name="time_0[]" type="time" value="09:30:00">
                                                </div>
                                                <div class="col-lg-12 mb-3"
                                                    style="display: flex;flex-direction: row-reverse;">
                                                    <!-- <input type="submit" class="button " id="addshift" value="Add rule"/> -->
                                                    <!-- <a href="#" onClick='addshift();' class="addshift">Add</a> -->
                                                    <button type="button" class="addshift"
                                                        style="padding: 7px 31px;"
                                                        onClick='addshiftbreak(0);'>Add</button>

                                                    <!-- <button type='button' class='btnDelete' onclick="remove();">x</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="addmoreadd" style="padding-left: 15px;">
                                        <!-- <a onClick='addbreak();'  class="addmore">Add More Address</a> -->
                                        <button type="button" id="addBtn0" onClick='addbreak();'
                                            class="addmore addshift"
                                            style="background-color: #ff9b44; display: inline;padding: 7px 15px;">Add
                                            Break</button>
                                    </div>
                                </div>
                                @endif
                                    <!-- </div> -->
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
<script type="text/javascript">
    function yesnoCheck(that) {
        if (that.value == "hour-based") {
            document.getElementById("ifYes").style.display = "contents";
        } else {
            document.getElementById("ifYes").style.display = "none";
            $("#fullday").attr("disabled", true);
            $("#halfday").attr("disabled", true);


        }
    }

    var i = 0;

    function addshift(type) {
        i++;
        // alert('uyes');
        console.log(type);
        if (type == 'add') {
            $("#shiftrules").append(
                '<div class="row "><div class="col-lg-8"><div class="custom-control custom-checkbox mb-3"><input type="checkbox" class="custom-control-input" id="quaterday' +
                i + '"><label class="custom-control-label" for="quaterday' + i + '">' +
                'Mark<input type="text" name="t_type[]" class="form-control" value="shift" style="display:none;"><select name="ruleday[]"><option value="1/2">1/2</option><option value="1/4">1/4</option><option value="3/4">3/4</option></select>' +
                '<select name="rulestatus[]"><option value="absent">Absent</option><option value="present">present</option></select> when ' +
                '<select name="rulereport[]"><option value="report">Report</option><option value="leave">Leave</option></select> to office' +
                '<select name="ruleafterbefore[]"><option value="after">After</option><option value="before">Before</option></select></label></div></div><div class="col-lg-3" style="margin-top: -2%;"><input class="form-control" style="border-top: 0;border-left: 0;border-right: 0;text-align: center;" name="time[]" type="time" value="09:30:00"></div>' +
                '<div class="col-lg-12 mb-3" style="display: flex;flex-direction: row-reverse;"><button type="button" id="prevBtn" class="remCF_' +
                i + '" style="display: inline;padding: 7px 15px;" onclick="addshift(' + i + ')">Remove</button>'

            );
        } else {
            $("#shiftrules").on('click', '.remCF_' + type + '', function () {
                $(this).parent().parent().remove();
            });
        }
    }

    function addshift2(obj) {
        var cls = $(obj).attr('class');
        console.log(cls); {

            $("." + cls).parent().parent().remove();

        }
    }

    var br = 0;

    function addshiftbreak(id) {
        br++;
        $("#breakrules" + id).append(
            '<div class="row " id="breakrulerow' + id + '' + br +
            '"><div class="col-lg-8"><div class="custom-control custom-checkbox mb-3"><input type="checkbox" class="custom-control-input" id="quaterdays_' +
            id +
            br + '"><label class="custom-control-label" for="quaterdays_' + id + br + '">' +
            'Mark<input type="text" name="t_type_' + id +
            '[]" class="form-control" value="break" style="display:none;"><select name="ruleday_' + id +
            '[]"><option value="1/2">1/2</option><option value="1/4">1/4</option><option value="3/4">3/4</option></select>' +
            '<select name="rulestatus_' + id +
            '[]"><option value="absent">Absent</option><option value="present">present</option></select> when ' +
            '<select name="rulereport_' + id +
            '[]"><option value="report">Report</option><option value="leave">Leave</option></select> to office' +
            '<select name="ruleafterbefore_' + id +
            '[]"><option value="after">After</option><option value="before">Before</option></select></label></div></div><div class="col-lg-3" style="margin-top: -2%;"><input class="form-control" style="border-top: 0;border-left: 0;border-right: 0;text-align: center;" name="time_' +
            id + '[]" type="time" value="09:30:00"></div>' +
            '<div class="col-lg-12 mb-3" style=" display: flex;flex-direction: row-reverse;"><button type="button"  id="brruleBtn' +
            id + '' + br + '" onClick="removebreakrule(' +
            id + ',' +
            br +
            ');" class="remshftbrkrule" style="background-color: #bbbbbb; display: inline;padding: 7px 15px;">Remove</button>'
        );
        $("#breakrules").on('click', '.remshftbrkrule', function () {
            $(this).parent().parent().remove();
        });
    };

    var rowNum = 0;

    function addbreak() {
        rowNum++;
        var rm = '<div class="break" id="break' + rowNum +
            '"> <div class="row"> <div class="col-sm-6"><div class="form-group"> <label class="col-form-label">Break Name <span class="text-danger">*</span></label><input class="form-control" placeholder="Break Name" type="text" name="b_name[]"></div></div>  <div class="col-sm-6"><div class="form-group"><label class="col-form-label">Break Duration <span class="text-danger">*</span></label><input class="form-control" placeholder="Break Duration" type="time" name="b_duration[]"><label><span class="text-danger">Hours</span></label></div></div><div class="col-sm-6"><div class="form-group"><label class="col-form-label">Start Time<span class="text-danger">*</span></label><div class=""><input type="time" id="breakstartTime" value="09:30:00" name="b_start[]"></div></div></div> <div class="col-sm-6"><div class="form-group"> <label class="col-form-label">End Time<span class="text-danger">*</span></label><div class=""><input type="time" id="breakendTime" value="18:30:00"name="b_end[]"></div> </div></div> <div class="col-sm-12 mt-4" id="brules"><div class="form-group " id="breakrules' +
            rowNum +
            '"> <div class="row" id="breakrulerow' +
            rowNum +
            '"> <div class="col-lg-8"><div class="custom-control custom-checkbox mb-3"><input type="checkbox" class="custom-control-input" id="quaterdays' +
            rowNum + '" required> <label class="custom-control-label" for="quaterdays' + rowNum +
            '">Mark <input type="text" name="t_type_' + rowNum +
            '[]"  class="form-control" value="break" style="display:none;"><select name="ruleday_' + rowNum +
            '[]"><option value="1/2">1/2</option><option value="1/4">1/4</option><option value="3/4">3/4</option></select> <select name="rulestatus_' +
            rowNum +
            '[]"><option value="absent">Absent</option>  <option value="present">Present</option></select>when <select name="rulereport_' +
            rowNum +
            '[]"> <option value="report">Report</option><option value="leave">Leave</option> </select> to office <select name="ruleafterbefore_' +
            rowNum +
            '[]"><option value="after">After</option> <option value="before">Before</option>  </select></label></div> </div><div class="col-lg-3" style="margin-top: -2%;"> <input class="form-control" style="border-top: 0;border-left: 0;border-right: 0;text-align: center;" name="time_' +
            rowNum +
            '[]" type="time" value="09:30:00"> </div> <div class="col-lg-12 mb-3" style="display: flex;flex-direction: row-reverse;"> <button type="button" class="addshift" style="padding: 7px 31px;" onClick="addshiftbreak(' +
            rowNum +
            ');">Add</button> </div></div></div>  </div>   <div class="addmoreadd" style="padding-left: 15px;"><button type="button" id="addBtn' +
            rowNum +
            '" onClick="addbreak();"class="addmore "style="margin-right: 12px; background-color: #ff9b44;display: inline;padding: 7px 15px;">Add Break</button><button type="button" id="prevBtn' +
            rowNum + '" style="background-color: #bbbbbb;margin-right: 12px;padding: 7px 31px;" onClick="removebreak(' +
            rowNum + ');">Remove Break</button></div></div></div> ';
        $('.allbreaks').append(rm);
        $("#addBtn").hide();
        $("#addBtn" + (rowNum - 1)).hide();
    };

    function removebreak(id) {
        $("#break" + id).remove();
        $("#addBtn" + (id - 1)).show();

    }

    function removebreakrule(rid, bid) {
        $("#breakrulerow" + rid + '' + bid).remove();

    }

    // 
</script>
<!-- /Page Wrapper -->
@stop