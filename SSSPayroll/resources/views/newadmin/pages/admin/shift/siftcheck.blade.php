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
                            <!-- Circles which indicates the steps of the form: -->
                            <!-- <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                            </div> -->

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
                                        <div class="form-group">
                                            <label class="col-form-label">No. Of Leave <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" placeholder="Number of Leave" type="number"
                                                name="no_leave">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Leave Type</label>
                                            <select class="select form-control" name="type" required>
                                                <option value="">-- Select Leave Type --</option>
                                                <option value="paid">Paid</option>
                                                <option value="unpaid">Unpaid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Effective From <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="date" name="effect_from">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Effective To <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="date" name="effect_to">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="solid-rounded-justified-tab2" style="margin: 10px;">
                                <h1 class="mb-4">Add Leave Rules</h1>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6">

                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="addLeaves"
                                                            onclick="make_editable(this.id,'m_input','select')">
                                                        <label class="custom-control-label" for="addLeaves">Maximum
                                                            number of applications
                                                            allowed:</label>
                                                    </div>
                                                </div>


                                                <div class="col-lg-2" style="margin-top: 0%;right: -27px;">
                                                    <input class="form-control"
                                                        style="margin-left: -58%; border-top: 0;border-left: 0;border-right: 0;text-align: center;"
                                                        type="text" id="m_input" name="m_input" required="" disabled>
                                                </div>
                                                <div class="col-lg-4" style="right: 43px;">

                                                    <div class="form-group">
                                                        <select class="select" id="select" name="m_select" disabled>
                                                            <option value="Days" selected="">Days</option>
                                                            <option value="Weeks">Weeks</option>
                                                            <option value="Months">Months</option>
                                                            <option value="Years">Years</option>
                                                        </select>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 radio">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="carryforward"
                                                            onclick="make_editable(this.id,'c_input','c_select')">
                                                        <label class="custom-control-label" for="carryforward">Carry
                                                            Forward:</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2">

                                                    <input class="form-control"
                                                        style="margin-left: -27%; border-top: 0;border-left: 0;border-right: 0;text-align: center;"
                                                        id="c_input" type="text" name="c_input" required="" disabled>
                                                </div>
                                                <div class="col-lg-4" style="right: 43px;">
                                                    <div class="form-group">
                                                        <select class="select" id="c_select" name="c_select" disabled>
                                                            <option value="Days" selected="">Days</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 radio">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="weekend"
                                                            name="weekend">
                                                        <label class="custom-control-label" for="weekend">Weekend
                                                            between leave period.</label>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 radio">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="holiday"
                                                            name="holiday">
                                                        <label class="custom-control-label" for="holiday">Holiday
                                                            between leave period.</label>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-12">
                                        <div class="leave-row">
                                            <div class="leave-left">
                                                <div class="input-box">
                                                    <label class="d-block">Carry forward</label>
                                                    <div class="leave-inline-form">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="inlineRadioOptions" id="carry_no" value="option1"
                                                                disabled>
                                                            <label class="form-check-label" for="carry_no">No</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="inlineRadioOptions" id="carry_yes" value="option2"
                                                                disabled>
                                                            <label class="form-check-label" for="carry_yes">Yes</label>
                                                        </div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Maximum number of
                                                                    applications allowed:</span>
                                                            </div>
                                                            <input type="text" class="form-control" disabled>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Days.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="leave-right">
                                                <button class="leave-edit-btn">
                                                    Edit
                                                </button>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="tab-pane" id="solid-rounded-justified-tab2" style="margin: 10px;">
                                <h1 class="mb-4">Select Where To Apply</h1>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Branches</label>

                                            <select class="branches form-control"  size="10" multiple="multiple" name="branches[]"
                                                style="width:100%;" placeholder="Select Branches">
                                                <option style="display:none;" value="">Select All</option>
                                                <option style="display:none;" value="">Select All</option>
                                                <option style="display:none;" value="">Select All</option>
                                                <option style="display:none;" value="">Select All</option>

                                             

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Departments</label>

                                            
                                                <option style="display:none;" value="">Select All</option>
                                                <option style="display:none;" value="">Select All</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Designation</label>

                                            <select class="designation form-control" multiple="multiple"
                                                name="designation[]" style="width:100%;"
                                                placeholder="Select Designation">
                                                <option value="d">Select All</option>
                                                <option value="ds">Select All</option>
                                                <option value="dsa">Select All</option>
                                                <option value="das">Select All</option>
                                                <option value="fa">Select All</option>
                                               
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
            document.getElementById(input).disabled = false;
            document.getElementById(select).disabled = false;
        } else {
            document.getElementById(input).disabled = true;
            document.getElementById(select).disabled = true;
        }
    }
</script>
<!-- /Page Wrapper -->
@stop