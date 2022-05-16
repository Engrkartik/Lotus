@extends('newadmin.layouts.default')
@section('content')

<!-- Page Content -->
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-12 offset-md-12">
        <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Company Group & Company Mapping</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://34.72.9.224/SSSPayroll/home">Dashboard</a></li>
                    <li class="breadcrumb-item active">Company Group & Company Mapping</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row filter-row" style="padding-top: 16px;">
        <div class="col-sm-6 col-md-6">  
            <div class="form-group form-focus">
                <h4>Map Company & Company Group</h4>
            </div>
        </div>
   <div class="col-auto float-right ml-auto">
       <button form="companyMap" class="btn btn-info map w-100" style="margin-left: 19px;" type="submit">Save</button>
    </div>
    </div>
            <form id="companyMap" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-2" id="labelCol">
                    <div class="form-group">
                        <label> Company Group <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required>
                        <option value="">Select group</option>
                        <option value="1">Sss pvt ltd</option>
                    </select>
                    </div>
                </div>
                    <div class="col-sm-2" id="labelCol">
                    <div class="form-group">
                        <label>Select Company <span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required>
                        <option value="">Select Company</option>
                        <option value="1">SSS</option>
                    </select>
                    </div>
                </div>
                </div>
            </form>
            <br>
     
     <div id="companyMapping" class="tabcontent">
        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Company Group</th>
                                <th>Company Name</th>
                                
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <tr>
                                <td>1</td>
                                <td>SSS Pvt. Ltd</td>
                                <td>SSS Pvt. Ltd</td> 
                            </tr>
                             <tr>
                                <td>2</td>
                                <td>SSS Pvt. Ltd</td>
                                <td>Sybertech</td>  
                            </tr>
                             <tr>
                                <td>3</td>
                                <td>Saraogi Super Sales</td>
                                <td>SSS Sybertech</td>  
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Company List End -->

        </div>
    </div>
</div>
<!-- /Page Content -->
@stop