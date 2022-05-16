@extends('newadmin.layouts.default')
@section('content')
    <!-- Page Wrapper -->
<div class="content container-fluid">
        
            <!-- Page Header -->
    <div class="page-header not">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Role & Rights Allocation</h3>
            <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Role & Rights Allocation</li>
        </ul>
    </div>

    </div>
    </div>
				
          <div class="row filter-row" style="padding-top: 16px;"> 
        <div class="col-sm-6 col-md-6">  
            <div class="form-group form-focus">
           <h4>Role Allocation</h4> 
            </div>
        </div>
   <div class="col-auto float-right ml-auto">
       <button form="roles" class="btn btn-info map w-100" style="margin-left: 19px;" type="submit">Save</button>
    </div>
    </div>
    <form id="roles" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label> Company <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="">Select </option>
                    <option value="SSS">SSS </option>
                    <option value="lotus">Lotus </option>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Select Employee<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="">Select </option>
                    <option value="alka">Alka </option>
                    <option value="arpan">Arpan </option>
                    <option value="sachin">Sachin </option>
                    </select>
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Select Role<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="">Select </option>
                    <option value="manager">Manager </option>
                    <option value="admin">Admin </option>
                    </select>
                    </div>
                    </div>
                </div>	
            </form>	
        <div class="row filter-row" style="padding-top: 16px;"> 
        <div class="col-sm-6 col-md-6">  
            <div class="form-group form-focus">
           <h4>RIghts Allocation</h4> 
            </div>
        </div>
    </div>
			
	<div class="row">
         <div class="col-sm-6">
          <div class="table-responsive" id="weeks">
            <table class="table table-hover table-border">
            <thead style="transition: top 0.3s ease 0s !important; left: 570px;" class="TB_fxd">
                <tr style="height: 50px;">
                    <th>
                        <div>
                            <h4>Form / Master Name</h4>
                        </div>
                    </th>
                    <th>
                        <div style="text-align: center;">
                            <h4>View</h4>
                        </div>
                    </th>                                   
                    <th>
                        <h4 style="text-align: center;">Edit</h4>
                        </th>
                    <th>
                    <h4 style="text-align: center;">Add</h4>
                        </th>
                    <th>
                    <h4 style="text-align: center;">Delete</h4>
                        </th>
                    </tr>
            </thead>
            <tbody>
            <tr>
                <td>Employee Master *</td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
               
            </tr>
            <tr>
            <td>Shift Master *</td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
            </tr>
            <tr>
            <td>Leave & Shift Master *</td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
                <td> <input type="checkbox" id="1" name="1"></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
<br>
 <!-- Company List Starts-->
 <div id="roleTable" class="tabcontent" style="display:block;">
        <div class="row">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Company Name</th>
                                <th>Employee Name & ID</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <tr>
                                <td>1</td>
                                <td>SSS Pvt. Ltd</td>
                                <td>Priyam Saraogi SSS001</td>
                                <td>Admin</td>
                            </tr>
                             <tr>
                             <td>2</td>
                             <td>SSS Sybertech</td>
                            <td>Priya Saraogi SSS002</td>
                            <td>Sub Admin</td>
                            </tr>
                            <tr>
                            <td>3</td>
                            <td>Lotus</td>
                            <td>Alka Thakur SSS004</td>
                            <td>Developer</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

            @stop