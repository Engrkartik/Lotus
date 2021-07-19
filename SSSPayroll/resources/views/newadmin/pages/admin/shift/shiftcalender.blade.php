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
                <h3 class="page-title">Shift Calender</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active">Shift Calender</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="{{url('shift/')}}" class="btn add-btn" 
                {{-- data-toggle="modal" data-target="#add_event" --}}
                ><i class="fa fa-plus"></i>
                    Add Shift</a>
            </div>
        </div>
        <div class="col-md-12" >
            <div class="row">
            <form action="{{url('filter_calender/'.request()->dt.'/'.request()->type)}}" method="POST">
                @csrf
                <div class="col-md-12"><br>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="month">Month</label>
                            <select name="month" id="month" class="form-control">
                                <option value="">Select Month</option>
                                <option value='1' @isset($mont) @if (1==$mont) selected="selected" @endif @endisset >Janaury</option>
                                <option value='2' @isset($mont) @if (2==$mont) selected="selected" @endif @endisset>February</option>
                                <option value='3' @isset($mont) @if (3==$mont) selected="selected" @endif @endisset>March</option>
                                <option value='4' @isset($mont) @if (4==$mont) selected="selected" @endif @endisset>April</option>
                                <option value='5' @isset($mont) @if (5==$mont) selected="selected" @endif @endisset>May</option>
                                <option value='6' @isset($mont) @if (6==$mont) selected="selected" @endif @endisset>June</option>
                                <option value='7' @isset($mont) @if (7==$mont) selected="selected" @endif @endisset>July</option>
                                <option value='8' @isset($mont) @if (8==$mont) selected="selected" @endif @endisset>August</option>
                                <option value='9' @isset($mont) @if (9==$mont) selected="selected" @endif @endisset>September</option>
                                <option value='10' @isset($mont) @if (10==$mont) selected="selected" @endif @endisset>October</option>
                                <option value='11' @isset($mont) @if (11==$mont) selected="selected" @endif @endisset>November</option>
                                <option value='12' @isset($mont) @if (12==$mont) selected="selected" @endif @endisset>December</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="year">Year</label>
                             <select name="year" class="form-control">
                              <option value="">Select Year</option>
                              @php
                              $dt=date('Y');
                              @endphp
                              @for ($i = $dt; $i >= 2011; $i--)
                              <option value="{{$i}}" @isset($yer) @if ($i==$yer) selected="selected" @endif @endisset >{{$i}}</option>
                           @endfor 
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="date">Date</label>
                             <select name="date" id="date" class="form-control">
                                <option value="">Select Date</option>
                                @for ($i = 1; $i <= 31; $i++)
                                   <option value="{{$i}}" @isset($date) @if ($i==$date) selected="selected" @endif @endisset >{{$i}}</option>
                                @endfor                                
                            </select>
                        </div>
                    {{-- </div><br>
                    <div class="row"> --}}
                        {{-- <div class="col-md-2">
                            <label for="employee">Employee</label>
                            <select name="employee" id="" class="form-control">
                                <option value="">Select Employee</option>
                                @foreach ($emp as $item=>$value)
                                    <option value="{{$value->id}}">{{$value->emp_name}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="col-md-2">
                            <label for="shift">Shift</label>
                            <select name="shift" id="" class="form-control">
                                <option value="">Select Shift</option>
                                @foreach ($shift_all as $item=>$value)
                                    <option value="{{$value->id}}" @isset($s_name) @if ($value->id==$s_name) selected="selected" @endif @endisset >{{$value->shift_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    {{-- </div><br>
                    <div class="row"> --}}
                        <div class="col-md-3">
                            <label for="employee">Branch</label>
                            <select name="branch" id="" class="form-control">
                                <option value="">Select Branch</option>
                                @foreach ($branch as $item=>$value)
                                    <option value="{{$value->id}}" @isset($arr1) @if ($value->id==$arr1) selected="selected" @endif @endisset >{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="shift">Department</label>
                            <select name="dept" id="" class="form-control">
                                <option value="">Select Department</option>
                                @foreach ($dept as $item=>$value)
                                    <option value="{{$value->id}}" @isset($arr2) @if ($value->id==$arr2) selected="selected" @endif @endisset >{{$value->name}} ( {{$value->b_name}} )</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="shift">Designation</label>
                            <select name="desg" id="" class="form-control">
                                <option value="">Select Designation</option>
                                @foreach ($desg as $item=>$value)
                                    <option value="{{$value->name}}" @isset($arr3) @if ($value->name==$arr3) selected="selected" @endif @endisset >{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-2">
                        <button class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <!--  <div class="row">
        <div class="col-lg-12">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12"> -->

    <!-- Calendar -->

    <div class="demos__main">
        <div class="demos__main-container" id="demo-content">
            <div class="demo-calendar fc fc-media-screen fc-direction-ltr fc-theme-standard">
                <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">


                    <div class="fc-button-group" id="daysbtn" @if (request()->type=='week') style="display:none;" @endif>
                        <button id="datedown" class="fc-prev-button fc-button fc-button-primary" type="button"
                            aria-label="prev" onclick="dateDown();"><span
                                class="fc-icon fc-icon-chevron-left"></span></button>
                        <button id="dateup" class="fc-next-button fc-button fc-button-primary" type="button"
                            aria-label="next" onclick="dateUp();"><span
                                class="fc-icon fc-icon-chevron-right"></span></button></div>
                    <div class="fc-button-group" id="weeksbtn" @if (request()->type=='day') style="display:none;" @endif>
                        <button id="weekdown" class="fc-prev-button fc-button fc-button-primary" type="button"
                            aria-label="prev" onclick="weekDown();"><span
                                class="fc-icon fc-icon-chevron-left"></span></button>
                        <button id="weekup" class="fc-next-button fc-button fc-button-primary" type="button"
                            aria-label="next" onclick="weekUp();"><span
                                class="fc-icon fc-icon-chevron-right"></span></button></div>
                    <div>


                        <h2 id="daystitle" @if (request()->type=='week')style="display:none;" @endif>
                            {{date('d-M-Y',strtotime(request()->dt))}}
                        </h2>
                        <h2 id="weekstitle" @if (request()->type=='day')style="display:none;" @endif>
                            @php
                            $start=date('d',strtotime($week_array[0]));
                            $end=date('d',strtotime($week_array[1]));
                            @endphp
                            {{date('d-M-Y',strtotime($week_array[0]))}} ----- {{date('d-M-Y',strtotime($week_array[1]))}}
                        </h2>
                    </div>
                    <div class="fc-button-group">
                        <button class="btn btn-primary" id="hours" type="button" onclick="clickMe();"
                            style="margin-right: 15px;">day</button>
                        <button class="btn btn-primary" id="weekly" type="button" onclick="clickMe1();">week</button>
                    </div>
                </div>
                <div class="table-responsive"  @if (request()->type=='day') style="display: none;" @endif id="weeks">
                    <table class="table table-hover table-border">
                        <thead style="transition: top 0.3s ease 0s !important; left: 570px;" class="TB_fxd">
                            <tr style="height: 50px;">
                                <th style="max-width: 50px; width: 50px; left: 270px;">
                                    <div>
                                        <h4>#</h4>
                                    </div>
                                </th>
                                <th style="max-width: 300px; width: 150px; left: 270px;">
                                    <div>
                                        <h4>Employee</h4>
                                    </div>
                                </th>
                                @php
                                $date = $week_array[0];
                                // End date
                                $end_date = $week_array[1];
                                @endphp
                                @while (strtotime($date) <= strtotime($end_date)) 
                                <th class="text-center" style="min-width: 192px; max-width: initial;">
                                    <h4 class="shft-hdat">
                                        <small>{{date('D',strtotime($date))}}</small>- {{date('d',strtotime($date))}}</h4>
                                    </th>
                                @php
                                $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));                                    
                                @endphp                                    
                                @endwhile
                            </tr>
                        </thead>
                        <tbody id="cal_shiftLister">
                            @foreach ($shift as $item=>$value)

                            <tr>
                                <td style="text-align: center;vertical-align: middle;">
                                    <span>{{++$item}}</span>
                                </td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <span>{{$value->emp_name}}</span>
                                </td>
                                @php
                                $date = $week_array[0];
                                // End date
                                $end_date = $week_array[1];
                                @endphp
                                @while (strtotime($date) <= strtotime($end_date)) 
                                @php
                                    $w_arr='App\Http\Controllers\Newadmin\Shift_Con'::get_shift(($date),$value->id,$value->emp_id);                                    
                                @endphp
                                    
                                    @if(!empty($w_arr))
                                    <td style="text-align: center;vertical-align: middle;"><span>{{str_replace('[','',str_replace('"','',str_replace(']','',$w_arr[0])))}}</span>
                                    </td>
                                    @else
                                    <td style="color: red;text-align:center;vertical-align: middle;">No Record</td>
                                    @endif
                                    @php
                                    $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));                                    
                                    @endphp 
                                    @endwhile

                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>

                <!-- hour wise,(day)-->

                <div class="fc-view-harness fc-view-harness-active" @if (request()->type=='week') style="height: 644.667px; display: none;" @else  style="height: 644.667px;" @endif id="days">

                    <div
                        class="fc-resource-timeline  fc-timeline fc-timeline-overlap-enabled fc-resourceTimelineWeek-view fc-view">
                        <table class="fc-scrollgrid  fc-scrollgrid-liquid">
                            <thead style="transition: top 0.3s ease 0s !important; left: 570px;" class="TB_fxd">
                                <tr class="ZPLHRow">
                                    <th style="max-width: 300px; width: 300px; left: 270px;">
                                        <div><span>Employee</span></div>
                                    </th>
                                    @for ($i =1; $i <=24; $i++)
                                    <th class="zphour-col zpsmall-col">{{date('h a',strtotime(($i<10?'0'.$i.':00':$i.':00')))}}</th>
                                    @endfor
                                   
                                </tr>
                            </thead>
                            <tbody>
                               <tr>
                                   @foreach ($shift as $item=>$value)
                                   <th style="max-width: 300px; width: 300px; left: 270px;text-align: center;vertical-align: middle;">
                                    <div><span>{{$value->emp_name}}</span></div>
                                </th>
                                @php
                                $w_arr='App\Http\Controllers\Newadmin\Shift_Con'::get_shift((request()->dt),$value->id,$value->emp_id);
                                // print_r($w_arr);
                                @endphp
                                 @if(!empty($w_arr))
                                 
                                 @for ($i =1; $i <25; $i++)
                                 @php 
                                 $str=str_replace('[','',str_replace('"','',str_replace(']','',$w_arr[0])));
                                 $split=explode('(',$str);
                                 $t_split=explode('-',$split[1]);
                                 $in_time = explode(':', $t_split[0]);
                                 $in_minutes=(($in_time[0]*60) + ($in_time[1]));
                                 $in_hours = floor($in_minutes / 60);
                                 $out_time = explode(':', $t_split[1]);
                                 $out_minutes=(($out_time[0]*60) + ($out_time[1]));
                                 $out_hours = floor($out_minutes / 60);
                                 $total_min=$out_minutes-$in_minutes;
                                 $hours = floor($total_min / 60);
                                 @endphp
                                 @if($in_minutes==$out_minutes)
                                 <td colspan="24" style="text-align: center;vertical-align: middle;background-color:lightgreen;">{{(str_replace('[','',str_replace('"','',str_replace(']','',$w_arr[0]))))}}</td>
                                 @break
                                 @else
                                 @if (($i<$in_hours) || ($i>$out_hours))
                                 <td></td>
                                 @else
                                 @if ($i==$in_hours)
                                    <td colspan="{{$hours}}" style="text-align: center;vertical-align: middle;background-color:lightgreen;">{{(str_replace('[','',str_replace('"','',str_replace(']','',$w_arr[0]))))}}</td>
                                 @endif
                                 @endif
                                 @endif
                                 @endfor
                                 @if ((($in_minutes%60!=0) || ($out_minutes%60!=0) ) && ($in_minutes!=$out_minutes))
                                 <td></td>
                             @endif
                                 @else
                                 <td style="color: red;text-align:center;vertical-align: middle;background-color:lightgray;" colspan="24"><span>No Record</span></td>
                                 @endif
                               </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Calendar -->

</div>

<!-- /Page Content -->

<!-- Add Shift Modal -->
<div id="add_event" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Event Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Event Date <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input class="form-control datetimepicker" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Category</label>
                        <select class="select form-control">
                            <option>Danger</option>
                            <option>Success</option>
                            <option>Purple</option>
                            <option>Primary</option>
                            <option>Pink</option>
                            <option>Info</option>
                            <option>Inverse</option>
                            <option>Orange</option>
                            <option>Brown</option>
                            <option>Teal</option>
                            <option>Warning</option>
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
<!-- /Add Shift Modal -->

<!-- Shift Modal -->
<div class="modal custom-modal fade" id="event-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-success submit-btn save-event">Create event</button>
                <button type="button" class="btn btn-danger submit-btn delete-event"
                    data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- /Shift Modal -->

<!-- Add Category Modal-->
<div class="modal custom-modal fade" id="add-category">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add a category</h4>
            </div>
            <div class="modal-body p-20">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-form-label">Category Name</label>
                            <input class="form-control" placeholder="Enter name" type="text" name="category-name">
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Choose Category Color</label>
                            <select class="form-control" data-placeholder="Choose a color..." name="category-color">
                                <option value="success">Success</option>
                                <option value="danger">Danger</option>
                                <option value="info">Info</option>
                                <option value="pink">Pink</option>
                                <option value="primary">Primary</option>
                                <option value="warning">Warning</option>
                                <option value="orange">Orange</option>
                                <option value="brown">Brown</option>
                                <option value="teal">Teal</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger save-category" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- /Add Category Modal-->

<script type="text/javascript">
// if('{{request()->type}}'=='week')
// {
//     window.onload=clickMe1();
// }else
// {
//     window.onload=clickMe();
// }
    function clickMe() {
        // alert('{{request()->type}}');
        <?php
       $dt=date('Y-m-d', strtotime(request()->dt));
       $prev= date('Y-m-d', strtotime($dt));
       ?>
       console.log('{{$prev}}');
        window.location.href="http://34.72.9.224/SSSPayroll/shift_calender/"+'<?=$prev?>'+"/day";
        //    FOR DAY PART SHOWING
        // $('#days').show();
        // $('#daysbtn').show();
        // $('#daystitle').show();
        // // document.getElementById('daystitle').innerHTML=date('d-M-Y');

        // //    FOR WEEK PART SHOWING
        // $('#weeks').hide();
        // $('#weeksbtn').hide();
        // $('#weekstitle').hide();
    };

    function clickMe1() {
        <?php
       $dt=date('Y-m-d', strtotime(request()->dt));
       $prev= date('Y-m-d', strtotime($dt));
       ?>
       console.log('{{$prev}}');
        window.location.href="http://34.72.9.224/SSSPayroll/shift_calender/"+'<?=$prev?>'+"/week";
        //    FOR WEEK PART SHOWING
        // $('#weeksbtn').show();
        // $('#weeks').show();
        // $('#weekstitle').show();
        // document.getElementById('weeksbtn').style.display='';
        // document.getElementById('weeks').style.display='';
        // document.getElementById('weekstitle').style.display='';
        // //    FOR DAY PART HIDING
        // $('#days').hide();
        // $('#daysbtn').hide();
        // $('#daystitle').hide();

    };

    // var daystitle = document.getElementById("daystitle");
    // var today = new Date();
    // var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
    //     "November", "December"
    // ];
    // document.getElementById("month").innerHTML = months[today.getMonth()];
    // document.getElementById("year").innerHTML = today.getFullYear();
    // document.getElementById("date").innerHTML = today.getDate();



    // FOR DAY CHANGE
    function dateUp() {
        <?php
       $dt=date('Y-m-d', strtotime(request()->dt));
       $prev= date('Y-m-d', strtotime($dt .' +1 day'));
       ?>
       console.log('{{$prev}}');
        window.location.href="http://34.72.9.224/SSSPayroll/shift_calender/"+'<?=$prev?>'+"/day";
    }

    function dateDown() {
        <?php
       $dt=date('Y-m-d', strtotime(request()->dt));
       $prev= date('Y-m-d', strtotime($dt .' -1 day'));
       ?>
       console.log('{{$prev}}');
        window.location.href="http://34.72.9.224/SSSPayroll/shift_calender/"+'<?=$prev?>'+"/day";

    }

    // FOR WEEK CHANGE
    function weekUp() {
        <?php
       $dt=date('Y-m-d', strtotime($week_array[1]));
       $prev= date('Y-m-d', strtotime($dt .' +1 day'));
       ?>
       console.log('{{$prev}}');
        window.location.href="http://34.72.9.224/SSSPayroll/shift_calender/"+'<?=$prev?>'+"/week";
    }

    function weekDown() {
       <?php
       $dt=date('Y-m-d', strtotime($week_array[0]));
       $prev= date('Y-m-d', strtotime($dt .' -1 day'));
       ?>
       console.log('{{$prev}}');
       window.location.href="http://34.72.9.224/SSSPayroll/shift_calender/"+'<?=$prev?>'+"/week";

    }

    // for year selection
//     var max = new Date().getFullYear(),
//     min = max - 10,
//     select = document.getElementById('year');

// for (var i = max; i>=min; i--){
//     var opt = document.createElement('option');
//     opt.value = i;
//     opt.innerHTML = i;
//     select.appendChild(opt);
// }
</script>

@stop