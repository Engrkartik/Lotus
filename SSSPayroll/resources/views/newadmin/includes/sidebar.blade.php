<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li>
					<a href="home2"><i class="la la-home"></i> <span>Dashboard</span></a>
				</li>
				<li class="submenu">
					<a href="#"  class="noti-dot"><i class="la la-cogs"></i> <span> Master</span> <span
							class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li>
					<a href="{{url('employees-list')}}" class="noti-dot"><i class="la la-users"></i> <span>
							Employees</span></a>
				</li>
						<li><a href="{{url('branch-master')}}">Branch Master</a></li>
						<li><a href="{{url('department-master')}}">Department Master</a></li>
						<li><a href="{{url('designation-master')}}">Designation Master</a></li>
						<li><a href="{{url('working-day')}}">Working Days Master</a></li>
						<li><a href="{{url('holiday-master')}}">Holidays Master</a></li>
						<li class="submenu">
					<a href="#"><i class="la la-calendar-minus-o"></i> <span> Leaves Master</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<!-- <li><a href="{{url('apply-leave')}}">Apply Leaves</a></li> -->
						<!-- <li><a href="{{url('leaves-settings')}}">Add Leaves</a></li> -->
						<li><a href="{{url('leave-list')}}">Leaves List</a></li>
						<!-- <li><a href="{{url('leavebal-report')}}">Leave Requests</a></li> -->
					</ul>
				</li>
					<li class="submenu">
					<a href="#" ><i class="la la-calendar-minus-o"></i> <span> Shift Master</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<!-- <li><a href="{{url('shift')}}">Add Shift</a></li> -->
						{{-- <li><a href="{{url('edit-shift')}}">Edit Shift</a></li> --}}
						<li><a href="{{url('shift-list')}}">Shift List</a></li>
						<!-- <li><a href="{{url('/shift_calender/'.date('Y-m-d').'/week')}}">Shift Calender</a></li> -->
					</ul>
				</li>
				<li><a href="attendance-machine">Attendance Machine Master</a></li>
						<!-- <li><a href="{{url('shift')}}">Shift Master</a></li> -->
					</ul>
				</li>

				
				<!-- <li>
					<a href="{{url('empleaverequest-view')}}" class="noti-dot"><i class="la la-users"></i> <span>
							Leave Requests</span></a>
				</li> -->
				<!-- <li class="submenu">
					<a href="#" ><i class="la la-calendar-check-o"></i> <span> Attendance Master</span> <span
							class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a href="{{url('attendance')}}"><span>Attendance</span></a></li>
							<li><a href="{{url('attendance-edit')}}"><span>Attendance Bulk Edit</span></a></li>
					</ul>
				</li> -->
				<!-- <li>

					<a href="{{url('attendance')}}"><i class="la la-calendar-check-o"
							aria-hidden="true"></i><span>Attendance</span></a></li>

				</li> -->
				
				<li class="submenu">
					<a href="#" ><i class="la la-calendar-minus-o"></i> <span>Report Master</span> <span
							class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li class="submenu">
					<a href="#"><i class="la la-calendar-minus-o"></i> <span>Attendance Report</span> <span
							class="menu-arrow"></span></a>
					<ul style="display: none;">
						<!-- <li><a href="{{url('apply-leave')}}">Apply Leaves</a></li> -->
						<!-- <li><a href="{{url('leaves-list')}}">Leaves List</a></li> -->
						<li><a href="{{url('daily-report')}}"><span>daily basic</span></a></li>
						<li><a href="{{url('daily-detailed-report')}}">daily detailed</a></li>
					</ul>
				</li>
						<!-- <li><a href="{{url('empleavebal-report')}}">Leave Balance Report</a></li> -->
						<li><a href="{{url('/shift_calender/'.date('Y-m-d').'/week')}}">Shift Calender</a></li>
						<!-- <li><a href="{{url('leave-list')}}">Leaves List</a></li>
						<li><a href="{{url('leavebal-report')}}">Leave Requests</a></li> -->
					</ul>
				</li>
				<li><a href="{{url('leavebal-report')}}"><i class="la la-calendar-minus-o"></i><span>Leave Requests</span></a></li>
				<li><a href="{{url('attendance-edit')}}"><i class="la la-calendar-minus-o"></i><span>Attendance Bulk Edit</span></a></li>

				<!-- <li class="submenu text-center">
					<a href="#"><span>Employees Part</span> </a>
				</li> -->
				<!-- <li>

					<a href="{{url('apply-leave')}}"><i class="la la-calendar-check-o"
							aria-hidden="true"></i><span>Apply Leaves</span></a></li>

				</li> -->
				<li class="submenu">
					<a href="#"><i class="la la-calendar-minus-o"></i> <span>Employees Part</span> <span
							class="menu-arrow"></span></a>
					<ul style="display: none;">
						<!-- <li><a href="{{url('apply-leave')}}">Apply Leaves</a></li> -->
						<!-- <li><a href="{{url('leaves-list')}}">Leaves List</a></li> -->
						<li><a href="{{url('apply-leave')}}">Apply Leaves</a></li>
						<li><a href="{{url('attendance')}}"><span>Attendance</span></a></li>
						<li><a href="{{url('empleavebal-report')}}">Leave Balance Report</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#" ><i class="la la-cog"></i> <span>Settings</span> <span
							class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a href="attendance-machine">Attendance Machine
								Master</a></li>
						<li><a href="roles-permissions">Permissions & Roles(old)</a></li>
						<li class="submenu">
					<a href="#" class="noti-dot"><i class="la la-calendar-minus-o"></i> <span>User Management</span> 
					<span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<!-- <li><a href="{{url('apply-leave')}}">Apply Leaves</a></li> -->
						<li><a href="{{url('functional-role-master')}}">Functional Role Master</a></li>
						<li><a href="{{url('user-administration')}}">User Administration</a></li>
					</ul>
				</li>

					</ul>
				</li>
				<!-- <li class="submenu text-center">
					<a href="#"><span>Payroll Part</span> </a>
				</li> -->
				<!-- <li>

					<a href="{{url('apply-leave')}}"><i class="la la-calendar-check-o"
							aria-hidden="true"></i><span>Apply Leaves</span></a></li>

				</li> -->
				<li class="submenu">
					<a href="#"><i class="la la-calendar-minus-o"></i> <span>Payroll Part</span> <span
							class="menu-arrow"></span></a>
					<ul style="display: none;">
						<!-- <li><a href="{{url('apply-leave')}}">Apply Leaves</a></li> -->
						<li><a href="{{url('org-details')}}">Organization Details</a></li>
						<li><a href="{{url('payschedule')}}">Pay Schedule</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#" class="noti-dot"><i class="la la-calendar-minus-o"></i> <span>Others</span> 
					<span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<!-- <li><a href="{{url('apply-leave')}}">Apply Leaves</a></li> -->
						<li><a href="{{url('outdoor-manual-entry')}}">Outdoor entry manual</a></li>
						<li><a href="{{url('manual-leave')}}">Leave Manual Entry</a></li>
					</ul>
				</li>


				<li class="submenu">
					<a href="{{url('company-group')}}" ><i class="la la-calendar-minus-o"></i> <span>Company Master</span> 
					<span class="menu-arrow"></span></a>
					<ul style="display: none;">
					    <li><a href="{{url('company-group')}}">Company Group</a></li>
						<li><a href="{{url('company-mapping')}}">Company Mapping</a></li>
						<li><a href="{{url('company')}}">Company</a></li>
						<li><a href="{{url('company-location')}}">Company Location</a></li>
						<li><a href="{{url('company-department')}}">Company Departments</a></li>
						<li><a href="{{url('sub-department')}}">Sub Departments</a></li>
						<li><a href="{{url('designation')}}">Designation</a></li>
						<li><a href="{{url('grade')}}">Grade</a></li>
					</ul>
				</li>
				<li>
					<a href="{{url('create-shift')}}"><i class="la la-calendar-minus-o"></i> <span>Create Shift</span></a>
				</li>

				<li>
					<a href="{{url('create-leave')}}"><i class="la la-calendar-minus-o"></i> <span>Create Leave</span></a>
				</li>
				<li>
					<a href="{{url('create-holiday')}}"><i class="la la-calendar-minus-o"></i> <span>Create Holiday</span></a>
				</li>

				<li>
					<a href="{{url('create-roles')}}"><i class="la la-calendar-minus-o"></i> <span>Roles & Permissions</span></a>
				</li>

				<li>
					<a href="{{url('employee-master')}}"><i class="la la-calendar-minus-o"></i> <span>Employee Master</span></a>
				</li>


				
			</ul>
		</div>
	</div>
</div>