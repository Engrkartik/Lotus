@extends('newadmin.layouts.default')
@section('content')

<!-- Page Content -->
<div class="content container-fluid">

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
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_event"><i class="fa fa-plus"></i>
                    Add Shift</a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        	  <div class="main-wrp" id="attendance-shiftmapping-calview">

                                <div class="well ZPPhed">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5>Hours View</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <nav class="ZPInlineNav">
                                                <ul class="pager">
                                                    <li>
                                                        <div class="IC-ar-lft gry S18 CP" onclick="AttendanceShift.getNavigator(true)"></div>
                                                    </li>
                                                    <li>
                                                        <div class="ZPCalNav MT8" id="ZPAtt_hoursview_month">01-Mar-2021</div>
                                                    </li>
                                                    <li>
                                                        <div class="IC-ar-rgt gry S18 CP" onclick="AttendanceShift.getNavigator(false)"></div>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                 
                                    </div>
                                </div>
                             
  
        <div class="Scrcont Drow fixTable" id="ZPAtt_calView" scroll="enabled">
            <div class="RHLtbl RHFixed" style="padding-left: 300px">
                
            
        <div class="Scrcont" id="ZPAtt_hoursView" style="" scroll="enabled">
            <div class="scheduler-container jobSchdl-con" style="">
                <div class="top-gutter">
                    <ul class="zp-list zpheader-list">
                        <li class="zpuser-row zpl-title">
                            <div class="zpuser-col zpdata-col zpfirst-col">
                                <div class="zpth-title"><span>Employee</span> <i class="sort-img sort CP" id="ZPAtt_hoursView_myReqEmpSort" onclick="AttendanceShift.myReqEmpNameTimeSort(this)" data-toggle="tooltip" data-placement="bottom" data-container="body" data-original-title="Sort"></i></div>
                            </div>
                            <div class="zpdata-col" id="ZPAtt_hours_shiftListHeader" style="position: relative; left: 0px;">
                                <div class="zphours-row">
                                    <div class="zphour-col zpsmall-col">12A</div>
                                    <div class="zphour-col zpsmall-col">01A</div>
                                    <div class="zphour-col zpsmall-col">02A</div>
                                    <div class="zphour-col zpsmall-col">03A</div>
                                    <div class="zphour-col zpsmall-col">04A</div>
                                    <div class="zphour-col zpsmall-col">05A</div>
                                    <div class="zphour-col zpsmall-col">06A</div>
                                    <div class="zphour-col zpsmall-col">07A</div>
                                    <div class="zphour-col zpsmall-col">08A</div>
                                    <div class="zphour-col zpsmall-col">09A</div>
                                    <div class="zphour-col zpsmall-col">10A</div>
                                    <div class="zphour-col zpsmall-col">11A</div>
                                    <div class="zphour-col zpsmall-col">12P</div>
                                    <div class="zphour-col zpsmall-col">01P</div>
                                    <div class="zphour-col zpsmall-col">02P</div>
                                    <div class="zphour-col zpsmall-col">03P</div>
                                    <div class="zphour-col zpsmall-col">04P</div>
                                    <div class="zphour-col zpsmall-col">05P</div>
                                    <div class="zphour-col zpsmall-col">06P</div>
                                    <div class="zphour-col zpsmall-col">07P</div>
                                    <div class="zphour-col zpsmall-col">08P</div>
                                    <div class="zphour-col zpsmall-col">09P</div>
                                    <div class="zphour-col zpsmall-col">10P</div>
                                    <div class="zphour-col zpsmall-col">11P</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="zpschedule-scroller">
                    <div class="zpschedule-content" id="ZPAtt_hours_shiftLister">
                        <div class="zpdata-col BB0I BL0I">
                            <ul class="zp-list zpschedule-list">
                                <li class="zpuser-row">
                                    <div class="zpuser-col zpfirst-col">
                                        <div class="zpth-user"><img class="FL" src="https://contacts.zoho.in/file?ID=60006904431&amp;fs=thumb">
                                            <div class="ZPusrName"><span class="ellipsis W100 CP" data-toggle="tooltip" data-placement="top" data-container="body" title="1 ssssybertech fd"><b>1</b><span>ssssybertech fd</span></span></div>
                                        </div>
                                    </div>
                                    <div class="zpdata-col">
                                        <div class="zpshift-spans">
                                            <div class="shif-itemdiv" style="width:37.5%; left:39.566847147022074%;">
                                                <div class="shift-items LC1" data-toggle="tooltip" data-placement="top" data-container="body" title="" data-original-title="09:30AM - 06:30PM / General">
                                                    <p><b>09:30AM - 06:30PM</b> &nbsp;/&nbsp;<span class="zp-sname">General</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="zphours-row">
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="zpuser-row">
                                    <div class="zpuser-col zpfirst-col">
                                        <div class="zpth-user"><img class="FL" src="/newhr/images/sampleemployeephotos/user1.jpg">
                                            <div class="ZPusrName"><span class="ellipsis W100 CP" data-toggle="tooltip" data-placement="top" data-container="body" title="S1 Allan Francis"><b>S1</b><span>Allan Francis</span></span></div>
                                        </div>
                                    </div>
                                    <div class="zpdata-col">
                                        <div class="zpshift-spans">
                                            <div class="shif-itemdiv" style="width:37.5%; left:39.566847147022074%;">
                                                <div class="shift-items LC1" data-toggle="tooltip" data-placement="top" data-container="body" title="" data-original-title="09:30AM - 06:30PM / General">
                                                    <p><b>09:30AM - 06:30PM</b> &nbsp;/&nbsp;<span class="zp-sname">General</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="zphours-row">
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="zpuser-row">
                                    <div class="zpuser-col zpfirst-col">
                                        <div class="zpth-user"><img class="FL" src="/newhr/images/sampleemployeephotos/user2.jpg">
                                            <div class="ZPusrName"><span class="ellipsis W100 CP" data-toggle="tooltip" data-placement="top" data-container="body" title="S2 Aleo Kirb"><b>S2</b><span>Aleo Kirb</span></span></div>
                                        </div>
                                    </div>
                                    <div class="zpdata-col">
                                        <div class="zpshift-spans">
                                            <div class="shif-itemdiv" style="width:37.5%; left:39.566847147022074%;">
                                                <div class="shift-items LC1" data-toggle="tooltip" data-placement="top" data-container="body" title="" data-original-title="09:30AM - 06:30PM / General">
                                                    <p><b>09:30AM - 06:30PM</b> &nbsp;/&nbsp;<span class="zp-sname">General</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="zphours-row">
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="zpuser-row">
                                    <div class="zpuser-col zpfirst-col">
                                        <div class="zpth-user"><img class="FL" src="/newhr/images/sampleemployeephotos/user3.jpg">
                                            <div class="ZPusrName"><span class="ellipsis W100 CP" data-toggle="tooltip" data-placement="top" data-container="body" title="" data-original-title="S3 Austin Mayer"><b>S3</b><span>Austin Mayer</span></span></div>
                                        </div>
                                    </div>
                                    <div class="zpdata-col">
                                        <div class="zpshift-spans">
                                            <div class="shif-itemdiv" style="width:37.5%; left:39.566847147022074%;">
                                                <div class="shift-items LC1" data-toggle="tooltip" data-placement="top" data-container="body" title="" data-original-title="09:30AM - 06:30PM / General">
                                                    <p><b>09:30AM - 06:30PM</b> &nbsp;/&nbsp;<span class="zp-sname">General</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="zphours-row">
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="zpuser-row">
                                    <div class="zpuser-col zpfirst-col">
                                        <div class="zpth-user"><img class="FL" src="/newhr/images/sampleemployeephotos/user4.jpg">
                                            <div class="ZPusrName"><span class="ellipsis W100 CP" data-toggle="tooltip" data-placement="top" data-container="body" title="" data-original-title="S4 Charles Mavric"><b>S4</b><span>Charles Mavric</span></span></div>
                                        </div>
                                    </div>
                                    <div class="zpdata-col">
                                        <div class="zpshift-spans">
                                            <div class="shif-itemdiv" style="width:37.5%; left:39.566847147022074%;">
                                                <div class="shift-items LC1" data-toggle="tooltip" data-placement="top" data-container="body" title="09:30AM - 06:30PM / General">
                                                    <p><b>09:30AM - 06:30PM</b> &nbsp;/&nbsp;<span class="zp-sname">General</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="zphours-row">
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="zpuser-row">
                                    <div class="zpuser-col zpfirst-col">
                                        <div class="zpth-user"><img class="FL" src="/newhr/images/sampleemployeephotos/user5.jpg">
                                            <div class="ZPusrName"><span class="ellipsis W100 CP" data-toggle="tooltip" data-placement="top" data-container="body" title="" data-original-title="S5 Dave Duken"><b>S5</b><span>Dave Duken</span></span></div>
                                        </div>
                                    </div>
                                    <div class="zpdata-col">
                                        <div class="zpshift-spans">
                                            <div class="shif-itemdiv" style="width:37.5%; left:39.566847147022074%;">
                                                <div class="shift-items LC1" data-toggle="tooltip" data-placement="top" data-container="body" title="" data-original-title="09:30AM - 06:30PM / General">
                                                    <p><b>09:30AM - 06:30PM</b> &nbsp;/&nbsp;<span class="zp-sname">General</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="zphours-row">
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="zpuser-row">
                                    <div class="zpuser-col zpfirst-col">
                                        <div class="zpth-user"><img class="FL" src="/newhr/images/sampleemployeephotos/user6.jpg">
                                            <div class="ZPusrName"><span class="ellipsis W100 CP" data-toggle="tooltip" data-placement="top" data-container="body" title="" data-original-title="S6 George Dwell"><b>S6</b><span>George Dwell</span></span></div>
                                        </div>
                                    </div>
                                    <div class="zpdata-col">
                                        <div class="zpshift-spans">
                                            <div class="shif-itemdiv" style="width:37.5%; left:39.566847147022074%;">
                                                <div class="shift-items LC1" data-toggle="tooltip" data-placement="top" data-container="body" title="" data-original-title="09:30AM - 06:30PM / General">
                                                    <p><b>09:30AM - 06:30PM</b> &nbsp;/&nbsp;<span class="zp-sname">General</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="zphours-row">
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="zpuser-row">
                                    <div class="zpuser-col zpfirst-col">
                                        <div class="zpth-user"><img class="FL" src="/newhr/images/sampleemployeephotos/user7.jpg">
                                            <div class="ZPusrName"><span class="ellipsis W100 CP" data-toggle="tooltip" data-placement="top" data-container="body" title="S7 Jennifer Jackson"><b>S7</b><span>Jennifer Jackson</span></span></div>
                                        </div>
                                    </div>
                                    <div class="zpdata-col">
                                        <div class="zpshift-spans">
                                            <div class="shif-itemdiv" style="width:37.5%; left:39.566847147022074%;">
                                                <div class="shift-items LC1" data-toggle="tooltip" data-placement="top" data-container="body" title="" data-original-title="09:30AM - 06:30PM / General">
                                                    <p><b>09:30AM - 06:30PM</b> &nbsp;/&nbsp;<span class="zp-sname">General</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="zphours-row">
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="zpuser-row">
                                    <div class="zpuser-col zpfirst-col">
                                        <div class="zpth-user"><img class="FL" src="/newhr/images/sampleemployeephotos/user11.jpg">
                                            <div class="ZPusrName"><span class="ellipsis W100 CP" data-toggle="tooltip" data-placement="top" data-container="body" title="S8 Morgan Finely"><b>S8</b><span>Morgan Finely</span></span></div>
                                        </div>
                                    </div>
                                    <div class="zpdata-col">
                                        <div class="zpshift-spans">
                                            <div class="shif-itemdiv" style="width:37.5%; left:39.566847147022074%;">
                                                <div class="shift-items LC1" data-toggle="tooltip" data-placement="top" data-container="body" title="09:30AM - 06:30PM / General">
                                                    <p><b>09:30AM - 06:30PM</b> &nbsp;/&nbsp;<span class="zp-sname">General</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="zphours-row">
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="zpuser-row">
                                    <div class="zpuser-col zpfirst-col">
                                        <div class="zpth-user"><img class="FL" src="/newhr/images/sampleemployeephotos/user12.jpg">
                                            <div class="ZPusrName"><span class="ellipsis W100 CP" data-toggle="tooltip" data-placement="top" data-container="body" title="S9 Ruby Richards"><b>S9</b><span>Ruby Richards</span></span></div>
                                        </div>
                                    </div>
                                    <div class="zpdata-col">
                                        <div class="zpshift-spans">
                                            <div class="shif-itemdiv" style="width:37.5%; left:39.566847147022074%;">
                                                <div class="shift-items LC1" data-toggle="tooltip" data-placement="top" data-container="body" title="09:30AM - 06:30PM / General">
                                                    <p><b>09:30AM - 06:30PM</b> &nbsp;/&nbsp;<span class="zp-sname">General</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="zphours-row">
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="zpuser-row">
                                    <div class="zpuser-col zpfirst-col">
                                        <div class="zpth-user"><img class="FL" src="/newhr/images/sampleemployeephotos/user13.jpg">
                                            <div class="ZPusrName"><span class="ellipsis W100 CP" data-toggle="tooltip" data-placement="top" data-container="body" title="S10 Tia Burmen"><b>S10</b><span>Tia Burmen</span></span></div>
                                        </div>
                                    </div>
                                    <div class="zpdata-col">
                                        <div class="zpshift-spans">
                                            <div class="shif-itemdiv" style="width:37.5%; left:39.566847147022074%;">
                                                <div class="shift-items LC1" data-toggle="tooltip" data-placement="top" data-container="body" title="09:30AM - 06:30PM / General">
                                                    <p><b>09:30AM - 06:30PM</b> &nbsp;/&nbsp;<span class="zp-sname">General</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="zphours-row">
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                            <div class="zphour-col zpsmall-col"></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
        
    </div>
</div>
</div>
</div>
</div>
</div>





     
