@extends('newadmin.layouts.default')
@section('content')

<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Pay Schedule</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pay Schedule</li>
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
                   
                    <form id="regForm" action="#" method="POST"
                        style="border: 1px solid lightgrey;box-shadow: 1px 1px 6px #e3e1e1;">
                        
                        <div class="tab-content">

                            <div class="tab-pane show active" id="solid-rounded-justified-tab1" style="margin: 10px;">
                                <h1 class="mb-4">Pay Schedule</h1>
                              <div class="row">
                                <div class="col-md-3">
                                    <label style="font-weight: bold;">Calculate monthly salary based on:</label>
                                </div>
                                <div style="display: inline-flex;" class="col-md-9">
                                        <div class="col-3 radio">
                                            <div class="custom-control custom-radio mb-3">
                                                <input type="radio" class="custom-control-input" id="actual_days"
                                                    name="radiobtn" value="actual_days">
                                                <label class="custom-control-label" for="actual_days">Actual days in a month
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 radio">
                                            <div class="custom-control custom-radio mb-3">
                                                <input type="radio" class="custom-control-input" id="working_days"
                                                    name="radiobtn" value="working_days">
                                                <label class="custom-control-label" for="working_days">Organisation working days</label>
                                                <select placeholder="Select Day" id="wdays">
                                             <option value="20">20</option>
                                             <option value="21">21</option>
                                             <option value="22">22</option>
                                             <option value="23">23</option>
                                             <option value="24">24</option>
                                             <option value="25">25</option>
                                             <option value="26">26</option>
                                             <option value="27">27</option>
                                             <option value="28">28</option>
                                             <option value="29">29</option>
                                             <option value="30">30</option>

                                         </select>
                                         <label>Days per month</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <br>
                                    <div class="row">
                                <div class="col-md-2">
                                    <label style="font-weight: bold;">Pay your employees on:</label>
                                </div>
                                <div style="display: inline-flex;" class="col-md-10">
                                        <div class="col-5 radio">
                                            <div class="custom-control custom-radio mb-3">
                                                <input type="radio" class="custom-control-input" id="last_day"
                                                    name="radiobtn1" value="last_day">
                                                <label class="custom-control-label" for="last_day">last working day of every month
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-5 radio">
                                            <div class="custom-control custom-radio mb-3">
                                                <input type="radio" class="custom-control-input" id="salary_day"
                                                    name="radiobtn1" value="salary_day">
                                                <label class="custom-control-label" for="salary_day">Day </label>
                                                <select placeholder="Select Day" id="salary_days">
                                                  <option value="01">1</option>
                                                  <option value="02">2</option>
                                                  <option value="03">3</option>
                                                  <option value="04">4</option>
                                                  <option value="05">5</option>
                                                  <option value="06">6</option>
                                                  <option value="07">7</option>
                                                  <option value="08">8</option>
                                                  <option value="09">9</option>
                                                  <option value="10">10</option>
                                                  <option value="11">11</option>
                                                  <option value="12">12</option>
                                                  <option value="13">13</option>
                                                  <option value="14">14</option>
                                                  <option value="15">15</option>
                                                  <option value="16">16</option>
                                                  <option value="17">17</option>
                                                  <option value="18">18</option>
                                                  <option value="19">19</option>
                                                  <option value="20">20</option>
                                                  <option value="21">21</option>
                                                  <option value="22">22</option>
                                                  <option value="23">23</option>
                                                  <option value="24">24</option>
                                                  <option value="25">25</option>
                                                  <option value="26">26</option>
                                                  <option value="27">27</option>
                                                  <option value="28">28</option>
                                                  <option value="29">29</option>
                                                  <option value="30">30</option>
                                                  <option value="31">31</option>
                                         </select>
                                         <label>Of every month </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label style="font-weight: bold;">Start your first payroll from:</label>
                                    </div>
                                    <div class="col-md-5">
                                         <input type="month" name="payroll_start">
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

<script type="text/javascript">
//    function show_days() {
//     if(document.getElementById('working_days').checked
//     {
//     document.getElementById('days').style.disabled='false';
//     }else
//     {
//         document.getElementById('days').style.disabled='true';
//     }
// }

//  function show_salary() {
//     if(document.getElementById('salary_day').checked
//     {
//     document.getElementById('salary_days').style.disabled='false';
//     }else
//     {
//         document.getElementById('salary_days').style.disabled='true';
//     }
// }

$("#working_days").click(function() {
    $("#wdays").attr("disabled", false);
});

$("#actual_days").click(function() {
    $("#wdays").attr("disabled", true);
});

$("#salary_day").click(function() {
    $("#salary_days").attr("disabled", false);
});

$("#last_day").click(function() {
    $("#salary_days").attr("disabled", true);
});

</script>
<!-- /Page Wrapper -->
@stop