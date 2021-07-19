@extends('newadmin.layouts.default')
@section('content')
<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Attendance Machine </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Attendance Machine </li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i>
                    Add Attendance Machine</a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <!-- Leave Statistics -->
    <!-- <div class="row">
        <div class="col-md-3">
            <div class="stats-info">
                <h6>Today Presents</h6>
                <h4>12 / 60</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-info">
                <h6>Planned Leaves</h6>
                <h4>8 <span>Today</span></h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-info">
                <h6>Unplanned Leaves</h6>
                <h4>0 <span>Today</span></h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-info">
                <h6>Pending Requests</h6>
                <h4>12</h4>
            </div>
        </div>
    </div> -->
    <!-- /Leave Statistics -->

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0 datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Device Name</th>
                            <th>IP Address</th>
                            <th>Device Serial Number</th>
                            <th>Branch</th>
                            <th>Status</th>

                            <!-- <th class="text-center">Status</th>
                            <th class="text-right">Actions</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <h2 class="table-avatar">
                                    Machine 1
                                </h2>
                            </td>
                            <td>192.168.2.10</td>
                            <td>02332522</td>
                            <td>Delhi</td>
                            <td style="position:absolute; display:flex;">
                                <span class="offline-dot">
                                Offline
                                </span>
                            </td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                <h2 class="table-avatar">
                                    Machine 2
                                </h2>
                            </td>
                            <td>192.168.2.10</td>
                            <td>02332522</td>
                            <td>Mathura</td>
                            <td style="position:absolute; display:flex;"><span class="online-dot"></span>Online</td>


                        </tr>
                        <tr>
                            <td>3</td>
                            <td>
                                <h2 class="table-avatar">
                                    Machine 3
                                </h2>
                            </td>
                            <td>192.168.2.10</td>
                            <td>02332522</td>
                            <td>Mohan Nagar</td>
                            <td style="position:absolute; display:flex;"><span class="online-dot"></span>Online</td>


                        </tr>
                        <tr>
                            <td>4</td>
                            <td>
                                <h2 class="table-avatar">
                                    Machine 4
                                </h2>
                            </td>
                            <td>192.168.2.10</td>
                            <td>02332522</td>
                            <td>Ghaziabad</td>
                            <td style="position:absolute; display:flex;"><span class="offline-dot"></span>Offline</td>


                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->

<!-- Add Leave Modal -->
<div id="add_leave" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Attendance Machine</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Device Name<span class="text-danger">*</span></label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>IP Address<span class="text-danger">*</span></label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Device Serial Number<span class="text-danger">*</span></label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Branch <span class="text-danger">*</span></label>
                        <select class="select">
                            <option>-- Select Branch --</option>
                            <option>Gandhi Nagar</option>
                            <option>Noida</option>
                            <option>Ghaziabad</option>
                            <option>Mathura</option>
                        </select>
                    </div>

                    <div class="submit-section">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="btn btn-primary submit-btn">Submit</a>
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
<!-- /Add Leave Modal -->

<!-- Edit Leave Modal -->
<div id="edit_leave" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Leave Type <span class="text-danger">*</span></label>
                        <select class="select">
                            <option>Select Leave Type</option>
                            <option>Casual Leave 12 Days</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>From <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input class="form-control datetimepicker" value="01-01-2019" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>To <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input class="form-control datetimepicker" value="01-01-2019" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Number of days <span class="text-danger">*</span></label>
                        <input class="form-control" readonly type="text" value="2">
                    </div>
                    <div class="form-group">
                        <label>Remaining Leaves <span class="text-danger">*</span></label>
                        <input class="form-control" readonly value="12" type="text">
                    </div>
                    <div class="form-group">
                        <label>Leave Reason <span class="text-danger">*</span></label>
                        <textarea rows="4" class="form-control">Going to hospital</textarea>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Leave Modal -->

<!-- Approve Leave Modal -->
<div class="modal custom-modal fade" id="approve_leave" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Leave Approve</h3>
                    <p>Are you sure want to approve for this leave?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="javascript:void(0);" class="btn btn-primary continue-btn">Approve</a>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0);" data-dismiss="modal"
                                class="btn btn-primary cancel-btn">Decline</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Approve Leave Modal -->

<!-- Delete Leave Modal -->
<div class="modal custom-modal fade" id="delete_approve" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Leave</h3>
                    <p>Are you sure want to delete this leave?</p>
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
<!-- /Delete Leave Modal -->

@stop
