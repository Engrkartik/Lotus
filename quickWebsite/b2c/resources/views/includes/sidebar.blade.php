<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li>
					<a href="home"><i class="la la-home"></i> <span>Dashboard</span></a>
				</li>
				<li class="submenu">
					<a href="#" ><i class="la la-cogs"></i> <span> Master</span> <span
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
					<a href="#" class="noti-dot"><i class="la la-calendar-minus-o"></i> <span>Attendance Report</span> <span
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
					<a href="#" class="noti-dot"><i class="la la-calendar-minus-o"></i> <span>Employees Part</span> <span
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
						<li><a href="roles-permissions">Permissions & Roles</a></li>
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
					<a href="#" class="noti-dot"><i class="la la-calendar-minus-o"></i> <span>Payroll Part</span> <span
							class="menu-arrow"></span></a>
					<ul style="display: none;">
						<!-- <li><a href="{{url('apply-leave')}}">Apply Leaves</a></li> -->
						<li><a href="{{url('org-details')}}">Organization Details</a></li>
						<li><a href="{{url('payschedule')}}">Pay Schedule</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#" class="noti-dot"><i class="la la-calendar-minus-o"></i> <span>Others</span> <span
							class="menu-arrow"></span></a>
					<ul style="display: none;">
						<!-- <li><a href="{{url('apply-leave')}}">Apply Leaves</a></li> -->
						<li><a href="{{url('outdoor-manual-entry')}}">Outdoor entry manual</a></li>
						<li><a href="{{url('manual-leave')}}">Leave Manual Entry</a></li>
					</ul>
				</li>


				<!-- <li class="submenu">
					<a href="#" class="noti-dot"><i class="la la-calendar-minus-o"></i> <span>Reports</span> <span
							class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a href="{{url('empleavebal-report')}}">Leave Balance Report</a></li>
					</ul>
				</li> -->

				
			</ul>
		</div>
	</div>
</div>