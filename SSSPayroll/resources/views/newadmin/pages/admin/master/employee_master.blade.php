@extends('newadmin.layouts.default')
@section('content')

<style>
			/** Start: to style navigation tab **/
			.nav {
			  margin-bottom: 18px;
			  margin-left: 0;
			  list-style: none;
			}

			.nav > li > a {
			  display: block;
			}
			
			.nav-tabs{
			  *zoom: 1;
			}

			.nav-tabs:before,
			.nav-tabs:after {
			  display: table;
			  content: "";
			}

			.nav-tabs:after {
			  clear: both;
			}

			.nav-tabs > li {
			  float: left;
			}

			.nav-tabs > li > a {
			  padding-right: 12px;
			  padding-left: 12px;
			  margin-right: 2px;
			  line-height: 14px;
			}

			.nav-tabs {
			  border-bottom: 1px solid #ddd;
			}

			.nav-tabs > li {
			  margin-bottom: -1px;
			}

			.nav-tabs > li > a {
			  padding-top: 8px;
			  padding-bottom: 8px;
			  line-height: 18px;
			  border: 1px solid transparent;
			  -webkit-border-radius: 4px 4px 0 0;
				 -moz-border-radius: 4px 4px 0 0;
					  border-radius: 4px 4px 0 0;
			}

			.nav-tabs > li > a:hover {
			  border-color: #eeeeee #eeeeee #dddddd;
			}

			.nav-tabs > .active > a,
			.nav-tabs > .active > a:hover {
			  color: #fff;
			  cursor: default;
			  background-color: #bc0003;
			  border: 1px solid #bc0003;
			  border-bottom-color: transparent;
			}
			
			li {
			  line-height: 18px;
			}
			
			.tab-content.active{
				display: block;
			}
			
			.tab-content.hide{
				display: none;
			}
			
			
			/** End: to style navigation tab **/
		</style>
<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Employee Master</h3>
                <!-- <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active">Employee Master</li>
                </ul> -->
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn btn-info" type="submit" >Save</a>
            </div>
        </div>
    </div>
    <div class="row">
    
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                <ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1">Create New Emp.</a>
				</li>
				<li>
					<a href="#tab2">Official Section</a>
				</li>
				<li>
					<a href="#tab3">Shift Allocation</a>
				</li>
                <li>
					<a href="#tab4">Week Off</a>
				</li>
                <li>
					<a href="#tab5">Grade Allocation</a>
				</li>
                <li>
					<a href="#tab6">Designation Allocation</a>
				</li>
                <li>
					<a href="#tab7">Functional Role</a>
				</li>
                <li>
					<a href="#tab8">Manager Allocation</a>
				</li>
                <li>
					<a href="#tab9">Personal Details</a>
				</li>
                <li>
					<a href="#tab10">Qualification Details</a>
				</li>
                <li>
					<a href="#tab11">Family Details</a>
				</li>
               
			   </ul>
            <section id="tab1" class="tab-content active">
                <div>
				<form id="company" enctype="multipart/form-data" method="post">
            @csrf
              <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label> Company Group <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="text" required="required" placeholder="Enter Company Group">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Company <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="syber">SSS Sybertech</option>
                    <option value="sss">SSS saraogi sales</option>
                    <option value="lotus">Lotus</option>
                    </select> 
                    </div>
                   </div>
                </div>   
            </form>
            
                </div>
            </section>
            <section id="tab2" class="tab-content hide">
                <div>
				<form id="company" enctype="multipart/form-data" method="post">
              @csrf
              <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label> Company <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="text" required="required" placeholder="Enter Company Name">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Emp. Code <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="text" required="required" placeholder="Enter Employee Code"> 
                    </div>
                   </div>
                </div>
				<div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label> Location <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="noida">Noida</option>
                    <option value="delhi">Delhi</option>
                    </select> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Department<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="it">IT</option>
                    <option value="sales">Sales</option>
                    <option value="admin">Admin</option>
                    </select> 
                    </div>
                   </div>
                </div>
				<div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label> Sub Department <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="web">Web Development</option>
                    <option value="app">App Development</option>
					<option value="sales">Software Sales</option>
                    </select> 
                    </div>
                    </div> 
                </div>
				<div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label> Card/Emp. No. <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="text" required="required" placeholder="Enter Employee No.">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Salutation<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="">Select</option>
                    </select> 
                    </div>
                   </div>
                </div>
				<div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label>First Name<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="text" required="required" placeholder="Enter first name">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Middle Name</label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="text" placeholder="Enter middle name"> 
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label>Last Name<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="text" required="required" placeholder="Enter last name">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Group Joining Date<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="date" required="required" placeholder="Enter date"> 
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label>Date Of Joining<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="date" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Dept. Joining Date<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="date" required="required" placeholder="Enter date"> 
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Date Of Birth<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="date" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Maritial Status<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="married">Married</option>
                    <option value="single">Single</option>
                    </select> 
                    </div>
                   </div>
                </div> 
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>HR Spoc<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="">select</option>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Religion<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="hindu">Hindu</option>
                    <option value="muslim">Muslim</option>
                    </select> 
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Official Email Id<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="email" required="required" placeholder="Enter Official Email Id">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Employment Type<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="permanent">Permanent</option>
                    <option value="partTime">Part Time</option>
                    </select> 
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-1" id="labelCol1">
                    <div class="form-group">
                    <label>OT Allowed</label>
                    </div>
                    </div>
                    <div class="col-sm-1" id="labelCol1">
                    <div class="form-group">
                    <input type="checkbox" id="1" name="1">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Comp Off Allowed</label>
                    </div>
                    </div>
                    <div class="col-sm-1" id="labelCol1">
                    <div class="form-group">
                    <input type="checkbox" id="1" name="1">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Outdoor Allowed</label>
                    </div>
                    </div>
                    <div class="col-sm-1" id="labelCol1">
                    <div class="form-group">
                    <input type="checkbox" id="1" name="1">
                    </div>
                    </div>
                    <div class="col-sm-1" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Photo Upload</label>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-group">
					<input type="file" class="form-group">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Outdoor From<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="date" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Outdoor To<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="date" required="required"> 
                    </div>
                   </div>
                </div>
            </form>
                </div>
        </section>
        <section id="tab3" class="tab-content hide">
                <div>
				<form id="shiftAllocation" enctype="multipart/form-data" method="post">
              @csrf
              <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label> Company <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="text" required="required" value="SSS Sybertech" disabled="disable">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Emp. Code <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="st002">ST0002</option>
                    </select>  
                    </div>
                   </div>
                </div>
				<div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Select Shift <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="morning">Morning</option>
                    <option value="evening">Evening</option>
                    </select> 
                    </div>
                    </div>
                </div>
				<div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>From Date <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="date" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>To Date<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="date" required="required">
                    </div>
                    </div> 
                </div>
				
            </form>
                </div>
        </section>

        <section id="tab5" class="tab-content hide">
                <div>
				<form id="gradeAllocation" enctype="multipart/form-data" method="post">
              @csrf
              <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label> Company <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="text" required="required" value="SSS Sybertech" disabled="disable">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Emp. Code <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="st002">ST0002</option>
                    </select>  
                    </div>
                   </div>
                </div>
				<div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Select Grade <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="g001">G001</option>
                    <option value="g002">G002</option>
                    </select> 
                    </div>
                    </div>
                </div>
				<div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>From Date <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="date" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>To Date<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="date" required="required">
                    </div>
                    </div> 
                </div>
				
            </form>
                </div>
        </section>

        <section id="tab6" class="tab-content hide">
                <div>
				<form id="designationAllocation" enctype="multipart/form-data" method="post">
              @csrf
              <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label> Company <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="text" required="required" value="SSS Sybertech" disabled="disable">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Emp. Code <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="st002">ST0002</option>
                    </select>  
                    </div>
                   </div>
                </div>
				<div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Select Designation <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="director">Director</option>
                    <option value="pm">Project Manager</option>
                    </select> 
                    </div>
                    </div>
                </div>
				<div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>From Date <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="date" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>To Date<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="date" required="required">
                    </div>
                    </div> 
                </div>
				
            </form>
                </div>
        </section>

        <section id="tab7" class="tab-content hide">
                <div>
				<form id="functionalRoles" enctype="multipart/form-data" method="post">
              @csrf
              <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label> Company <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="text" required="required" value="SSS Sybertech" disabled="disable">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Emp. Code <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="st002">ST0002</option>
                    </select>  
                    </div>
                   </div>
                </div>
				<div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Department<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="it">IT</option>
                    <option value="admin">Admin</option>
                    </select> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Role <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="director">Director</option>
                    <option value="manager">Manager</option>
                    </select> 
                    </div>
                    </div>
                </div>
				<div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Associated F. Role<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="director">Director</option>
                    <option value="manager">Manager</option>
                    </select>
                    </div>
                    </div> 
                </div>
				
            </form>
                </div>
        </section>

        <section id="tab8" class="tab-content hide">
                <div>
				<form id="managerAllocation" enctype="multipart/form-data" method="post">
              @csrf
              <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label> Company <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<input class="form-control" type="text" required="required" value="SSS Sybertech" disabled="disable">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Emp. Code <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="st002">ST0002</option>
                    </select>  
                    </div>
                   </div>
                </div>
				<div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Select RM1<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="option1">option1</option>
                    <option value="option2">option2</option>
                    </select> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Select RM2 <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
					<select class="form-control" required="required">
                    <option value="option1">option1</option>
                    <option value="option2">option2</option>
                    </select> 
                    </div>
                    </div>
                </div>
            </form>
                </div>
        </section>

        <section id="tab9" class="tab-content hide">
        <div>
        <form id="personalDetails" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Company<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" required="required" value="SSSsybertech" disabled="disable">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Emp Code<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="st001">ST001</option>
                    </select>
                    </div>
                   </div>
                </div>
               <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Name in Documents<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" required="required" placeholder="Enter Name as on Documents">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Pan Card No. <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" required="required" placeholder="Enter Pan Card no.">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Adhaar Number <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="number" placeholder="Enter Adhaar Number" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Blood Group<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    </select> 
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Primary Mobile<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="number" placeholder="Enter Primary Mobile Number" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Alt. Mobile </label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="number" placeholder="Enter Alternate Mobile Number">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Primary Email <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="email" placeholder="Enter Email Id" required="required"> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Secondary Email</label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="email" placeholder="Enter Secondary Email Id">
                    </div>
                   </div>
                </div>
                <div class="faq-card">
                <div class="card">
                <div class="card-header">
                <h4 class="card-title">
                <a class="collapsed" data-toggle="collapse" href="#collapseTwo">Permanent Address</a>
                </h4>
                </div>
                <div id="collapseTwo" class="card-collapse collapse show">
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Line 1<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter House no./flat/office" required="required"> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Line 2<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter street/locality/society" required="required">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Pin Code<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="number" placeholder="Enter Pin Code" required="required"> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>City<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="city">city</option>
                    </select> 
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>State<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="state">State</option>
                    </select> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Country<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="India">India</option>
                    </select> 
                    </div>
                   </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="faq-card">
                <div class="card">
                <div class="card-header">
                <h4 class="card-title">
                <a class="collapsed" data-toggle="collapse" href="#collapseThree">Correspondence Address</a>
                </h4>
                </div>
                <div id="collapseThree" class="card-collapse collapse show">
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                    <div class="form-group">
                    <label>Same As Permanent Address</label>
                    </div>
                    </div>
                    <div class="col-sm-1">
                    <div class="form-group">
                    <input type="checkbox" id="1" name="1">
                    </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Line 1<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter House no./flat/office" required="required"> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Line 2<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter street/locality/society" required="required">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Pin Code<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="number" placeholder="Enter Pin Code" required="required"> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>City<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="city">city</option>
                    </select> 
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>State<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="state">State</option>
                    </select> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Country<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="India">India</option>
                    </select> 
                    </div>
                   </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="faq-card">
                <div class="card">
                <div class="card-header">
                <h4 class="card-title">
                <a class="collapsed" data-toggle="collapse" href="#collapseFour">Emergency Contact</a>
                </h4>
                </div>
                <div id="collapseFour" class="card-collapse collapse show">
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                    <div class="form-group">
                    <label>Same As Permanent Address</label>
                    </div>
                    </div>
                    <div class="col-sm-1">
                    <div class="form-group">
                    <input type="checkbox" id="1" name="1">
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-group">
                    <label>Same As Correspondance Address</label>
                    </div>
                    </div>
                    <div class="col-sm-1">
                    <div class="form-group">
                    <input type="checkbox" id="1" name="1">
                    </div>
                    </div>               
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Name<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter Name" required="required"> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Relation<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter Relation with the emergency contact" required="required">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Mobile Number<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="number" placeholder="Enter Mobile Number" required="required"> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Address<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter Address" required="required">
                    </div>
                   </div>
                </div>
                </div>
                </div>
                </div>
                </div>  
            </form>
            </div>
        </section>
        <section id="tab11" class="tab-content hide">
                <div>
				<form id="familyDetails" enctype="multipart/form-data" method="post">
              @csrf
              <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label> Relation <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="father">Father</option>
                    <option value="mother">Mother</option>
                    <option value="brother">Brother</option>
                    <option value="sister">Sister</option>
                    </select> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Occupation <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" required="required" placeholder="Enter Type of Occupation" value="Self Employed">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter Name" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>D.O.B <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="date" placeholder="Enter date of birth" required="required">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Gender <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    </select> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Dependent <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    </select> 
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Nominee <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="yes">Yes</option>
                    <option value="no ">No</option>
                    </select> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Nominee % <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="number" placeholder="Enter nominee %" required="required" value="100">
                    </div>
                   </div>
                </div>
            </form>
                </div>
        </section>
                    
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
$(document).ready(function() {
		$('.nav-tabs > li > a').click(function(event){
		event.preventDefault();//stop browser to take action for clicked anchor
					
		//get displaying tab content jQuery selector
		var active_tab_selector = $('.nav-tabs > li.active > a').attr('href');					
					
		//find actived navigation and remove 'active' css
		var actived_nav = $('.nav-tabs > li.active');
		actived_nav.removeClass('active');
					
		//add 'active' css into clicked navigation
		$(this).parents('li').addClass('active');
					
		//hide displaying tab content
		$(active_tab_selector).removeClass('active');
		$(active_tab_selector).addClass('hide');
					
		//show target tab content
		var target_tab_selector = $(this).attr('href');
		$(target_tab_selector).removeClass('hide');
		$(target_tab_selector).addClass('active');
	     });
	
    
});
</script>



@stop