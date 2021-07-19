<?php
use \App\Http\Controllers\attendance;
?>
@extends('include.header')
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
<div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Attendance Report</b></h3>
                <!-- <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModal">Add Leave Type</button> -->
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                @php
                    $d=cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));

                    @endphp
                <div class="row">
                  <div class="col-md-12">
                    <div class="row" style="border:1px solid grey;">
                      @php
                      $e_id=request()->id;
                      for($i=1;$i<=$d;$i++)
                      {
                        $style='';
                        $mon=date('m');
                        $yr=date('Y');
                        $date=$yr.'-'.$mon.'-'.$i;
                        $week=date('l', strtotime($date));
                        $resp_in=attendance::att_report1($e_id,$date,'ASC');
                        $resp_out=attendance::att_report1($e_id,$date,'DESC');
                        if(($resp_in[1]=="P") || ($resp_out[1]=="P"))
                        {
                          $style='background-color:#008000b3;';
                        }elseif(($resp_in[1]=="L") || ($resp_out[1]=="L"))
                        {
                          $style='background-color:#ffff008a;';
                        }elseif(($resp_in[1]=="A") || ($resp_out[1]=="A"))
                        {
                          $style='background-color:#ff00007a;';
                        }
                      @endphp
                      <div class="col-md-1" style="border:1px solid grey;height:160px; {{$style}}">
                        <p style="text-align: center;"><i ><b>{{$i}}</b></i><br>
                        <i><b>{{$week}}</b></i><br>
                        <i><b>{{$resp_in[0]}}</b></i><br>
                        <i><b>{{$resp_out[0]}}</b></i></p>
                      </div>
                      @php
                      }
                      @endphp
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
     
            @endsection