@extends('newadmin.layouts.default')
@section('content')

<!-- Page Content -->
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title" style="text-align: center;">Company Settings</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="profile-img-wrap edit-img">
                            <img class="inline-block" src="http://34.72.9.224/SSSPayroll/public/imgnew/organization.png"
                                alt="user">
                            <div class="fileupload btn">
                                <span class="btn-text">Add Logo</span>
                                <input class="upload" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label> Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" value="Ramesh">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>PAN Number</label>
                            <input class="form-control" value="ALWPG5809L" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Address Line 1</label>
                            <input class="form-control " value="3864 Quiet Valley Lane, Sherman Oaks, CA, 91403"
                                type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Address Line 2</label>
                            <input class="form-control " value="3864 Quiet Valley Lane, Sherman Oaks, CA, 91403"
                                type="text">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>Country <span class="text-danger">*</span></label>
                            <select class="form-control select">
                                <option>India</option>
                                <option>Pakistan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>State/Province</label>
                            <select class="form-control select">
                                <option>Madhya Pradesh</option>
                                <option>Delhi</option>
                                <option>Rajasthan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>City</label>
                            <select class="form-control select">
                                <option>Gwalior</option>
                                <option>Bhind</option>
                                <option>Moorena</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>PinCode</label>
                            <input class="form-control" value="91403" type="text">
                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input class="form-control" value="818-635-5579" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fax</label>
                            <input class="form-control" value="818-978-7102" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Website Url</label>
                            <input class="form-control" value="https://www.example.com" type="text">
                        </div>
                    </div>
                </div> -->
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Page Content -->
@stop