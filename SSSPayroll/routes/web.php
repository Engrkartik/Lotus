<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('newadmin/pages/login');
});
// Route::get('index', function () {
//     return view('index');
// });
// Route::any('login','App\Http\Controllers\User@login');

// Route::any('/employeelist','App\Http\Controllers\User@employeelist');
// Route::get('create','App\Http\Controllers\User@create');
// Route::post('loginsubmit','App\Http\Controllers\User@loginsubmit');
// Route::post('createsubmit','App\Http\Controllers\User@createsubmit');
// Route::any('/index','App\Http\Controllers\User@showSuccess')->name('index');
// Route::any('add_employee','App\Http\Controllers\User@Add_Employee');
// Route::any('/department','App\Http\Controllers\User@department');
// Route::any('update_dept/{id}','App\Http\Controllers\User@update_dept');
// Route::any('add_dept','App\Http\Controllers\User@add_dept');
// Route::any('/add_desg1','App\Http\Controllers\User@add_desg1');
// Route::any('create_employee','App\Http\Controllers\User@create_employee');
// Route::any('branchlist','App\Http\Controllers\User@branchlist');
// Route::any('add_branch','App\Http\Controllers\User@add_branch');
// Route::any('update_branch/{id}','App\Http\Controllers\User@update_branch');
// Route::any('/delete1/{id}/{type}','App\Http\Controllers\User@delete1');
// Route::any('/update_employee/{id}','App\Http\Controllers\User@Add_Employee');
// Route::any('/update_emp/{id}','App\Http\Controllers\User@Upt_Employee');
// Route::any('bank_detail/{id}','App\Http\Controllers\User@bank_detail');
// Route::any('change_status','App\Http\Controllers\User@change_status')->name('change_status');
// Route::any('emp_filter','App\Http\Controllers\User@emp_filter')->name('emp_filter');
// Route::any('prof_detail/{id}','App\Http\Controllers\User@prof_detail');
// Route::any('working_day','App\Http\Controllers\working_day@working_day');
// Route::any('add_working','App\Http\Controllers\working_day@add_working')->name('add_working');
// Route::any('holiday_day','App\Http\Controllers\working_day@holiday_day');
// Route::any('holiday_group','App\Http\Controllers\working_day@holiday_group');
// Route::any('holiday_list','App\Http\Controllers\working_day@add_holiday_list');
// Route::any('update_holiday_list/{id}','App\Http\Controllers\working_day@update_holiday_list');
// Route::any('update_workingday','App\Http\Controllers\working_day@update_workingday')->name('update_workingday');
// Route::any('leave_type','App\Http\Controllers\leave@leave_type');
// Route::any('add_leave','App\Http\Controllers\leave@add_leave');
// Route::any('update_leave','App\Http\Controllers\leave@update_leave')->name('update_leave');
// Route::any('attendance','App\Http\Controllers\attendance@attendance');
// Route::any('att_report','App\Http\Controllers\attendance@att_report');
// // Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('registration','App\Http\Controllers\User@create')->name('registration');
Route::post('registration','App\Http\Controllers\User@reg12');

//permissions and roles page
Route::any('/roles-permissions','App\Http\Controllers\Newadmin\User@permissions');


// NEW ADMIN PANEL ROUTES

// LOGIN PANEL 
 Route::any('/validate_login','App\Http\Controllers\Newadmin\LoginController@index');
Route::any('register','App\Http\Controllers\LoginController@register');
Route::any('/logout','App\Http\Controllers\Newadmin\LoginController@logout');


// Route::get('/employeelis','App\Http\Controllers\Newadmin\User@employeelist');
Route::get('/departments','App\Http\Controllers\Newadmin\User@departments');
Route::get('/home','App\Http\Controllers\Newadmin\HomeController@index');

//attendance
Route::any('/attendance','App\Http\Controllers\Newadmin\Attendance1@attendance');
Route::any('/attendance-edit','App\Http\Controllers\Newadmin\Attendance1@attendance_edit');
Route::any('/update-attendance-edit','App\Http\Controllers\Newadmin\Attendance1@update_attendance_edit');
Route::any('/filter_dept','App\Http\Controllers\Newadmin\Attendance1@filter_dept');
Route::any('/bulk_edit_filter','App\Http\Controllers\Newadmin\Attendance1@attendance_edit');
Route::any('/attendance_f/{bid}/{val}/{dept}/{desg}','App\Http\Controllers\Newadmin\Attendance1@attendance_f');
Route::any('/filter','App\Http\Controllers\Newadmin\Attendance1@att_branch')->name('filter');

// attendance reports
Route::any('/daily-report','App\Http\Controllers\Newadmin\AttendanceController@dailyReport');
Route::any('/daily-detailed-report','App\Http\Controllers\Newadmin\AttendanceController@dailyDetailedReport');
Route::any('/monthly-detailed-report','App\Http\Controllers\Newadmin\AttendanceController@monthlyDetailedReport');


//change status global route
Route::any('/change_status','App\Http\Controllers\Newadmin\employees@change_status')->name('change_status');
//delete row global route
Route::any('/delete1/{id}/{type}','App\Http\Controllers\Newadmin\employees@delete1');


//employee
Route::get('/employees','App\Http\Controllers\Newadmin\employees@employee');
Route::get('/empprofile/{id}','App\Http\Controllers\Newadmin\employees@employeeprofile');
Route::get('/employees-list','App\Http\Controllers\Newadmin\employees@employeelist');
Route::any('/create_employee','App\Http\Controllers\Newadmin\employees@create_employee');
Route::any('/emp_filter','App\Http\Controllers\Newadmin\employees@emp_filter')->name('emp_filter');
Route::any('/update_emp/{id}','App\Http\Controllers\Newadmin\employees@Upt_Employee');
Route::any('/update_bank/{id}','App\Http\Controllers\Newadmin\employees@bank_detail');
Route::any('/emp_map','App\Http\Controllers\Newadmin\employees@maped');
Route::any('/save_report','App\Http\Controllers\Newadmin\employees@save_reports');
Route::any('/add_employees','App\Http\Controllers\Newadmin\employees@add_employee');
Route::any('/edit_employees/{id}','App\Http\Controllers\Newadmin\employees@edit_employee');

//leaves
Route::any('/leaves','App\Http\Controllers\Newadmin\Leave_Con@emp_leaves_detail');
Route::any('/leaves-settings','App\Http\Controllers\Newadmin\Leave_Con@leavessetting');
Route::any('/add_leaves','App\Http\Controllers\Newadmin\Leave_Con@leaves_detail');
Route::any('/leave-list','App\Http\Controllers\Newadmin\Leave_Con@leavelist');
Route::any('/edit-leave/{id}','App\Http\Controllers\Newadmin\Leave_Con@editleave');
Route::any('/update-leaves/{id}','App\Http\Controllers\Newadmin\Leave_Con@update_leave');
Route::any('/view_leave/{id}','App\Http\Controllers\Newadmin\Leave_Con@view_leave');
Route::any('/filter_leave','App\Http\Controllers\Newadmin\Leave_Con@filter_leave');
Route::any('/add-leave-request','App\Http\Controllers\Newadmin\Leave_Con@add_leaverequest');
Route::any('/edit-leave-request','App\Http\Controllers\Newadmin\Leave_Con@edit_leaverequest');
Route::any('/leave-request','App\Http\Controllers\Newadmin\Leave_Con@empleaverequest_view');
Route::any('/leavebal-report','App\Http\Controllers\Newadmin\Reports_Con@leavebalance_report'); 

Route::any('/add-manual-leave','App\Http\Controllers\Newadmin\Leave_Con@add_manual_leave');
Route::any('/manual-leave','App\Http\Controllers\Newadmin\Leave_Con@manual_leave'); 
Route::any('/edit-manual-leave','App\Http\Controllers\Newadmin\Leave_Con@editManual_leave'); 


// Reports leave request
Route::any('/leavebal-report','App\Http\Controllers\Newadmin\Reports_Con@leavebalance_report');  

// Employees Leave Request
Route::any('/empleavebal-report','App\Http\Controllers\Newadmin\Reports_Con@empleavebalance_report');



//shift
Route::any('/filter_shift','App\Http\Controllers\Newadmin\Shift_Con@filter_shift');
Route::any('/shift','App\Http\Controllers\Newadmin\Shift_Con@index');
Route::any('/edit-shift/{id}','App\Http\Controllers\Newadmin\Shift_Con@editshift');
Route::any('/shift-list','App\Http\Controllers\Newadmin\Shift_Con@shiftlist');
Route::any('/save_shift','App\Http\Controllers\Newadmin\Shift_Con@saveshift');
Route::any('/shift_calender/{dt}/{type}','App\Http\Controllers\Newadmin\Shift_Con@shiftcalender')->name('shift_calender');
Route::any('/shift_emp','App\Http\Controllers\Newadmin\Shift_Con@shift_emp');
Route::any('/update_shift/{id}','App\Http\Controllers\Newadmin\Shift_Con@update_shift');
Route::any('/shiftcheck','App\Http\Controllers\Newadmin\Shift_Con@shiftcheck');
Route::any('/filter_calender/{dt}/{type}','App\Http\Controllers\Newadmin\Shift_Con@filter_calender');
// yeh delete kr dena  Route::get('/employeelis','App\Http\Controllers\Newadmin\User@employeelist');

//master
	//wokring day
Route::any('/working-day','App\Http\Controllers\Newadmin\Master@index');
Route::any('/add_working','App\Http\Controllers\Newadmin\Master@add_working')->name('add_working');
Route::any('/update_workingday','App\Http\Controllers\Newadmin\Master@update_workingday')->name('update_workingday');

//holiday
Route::any('/holiday-master','App\Http\Controllers\Newadmin\Master@holidaylist');
Route::any('/holiday_group','App\Http\Controllers\Newadmin\Master@holiday_group');
Route::any('/holiday_list','App\Http\Controllers\Newadmin\Master@add_holiday_list');
Route::any('update_holiday_list/{id}','App\Http\Controllers\Newadmin\Master@update_holiday_list');
Route::any('update_holiday_grp/{id}','App\Http\Controllers\Newadmin\Master@update_holiday_grp');

//branch
Route::any('/branch-master','App\Http\Controllers\Newadmin\Master@branch');
Route::any('/add_branch','App\Http\Controllers\Newadmin\Master@add_branch');
Route::any('/update_branch/{id}','App\Http\Controllers\Newadmin\Master@update_branch');

// department
Route::any('/department-master','App\Http\Controllers\Newadmin\Master@department');
Route::any('/add_department','App\Http\Controllers\Newadmin\Master@add_department');
Route::any('/update_department/{id}','App\Http\Controllers\Newadmin\Master@update_department');
//
// designation
Route::any('/designation-master','App\Http\Controllers\Newadmin\Master@designation');
Route::any('/add_designation','App\Http\Controllers\Newadmin\Master@add_designation');
Route::any('/update_designation/{id}','App\Http\Controllers\Newadmin\Master@update_designation');


// EMPLOYEE PANEL 
Route::any('/dashboard','App\Http\Controllers\Newadmin\Employee\EmployeeController@index');
Route::any('/apply-leave','App\Http\Controllers\Newadmin\Employee\EmployeeController@applyleave');
Route::any('/edit-leave','App\Http\Controllers\Newadmin\Employee\EmployeeController@editleave');
Route::any('/leaves-list','App\Http\Controllers\Newadmin\Employee\EmployeeController@leave_list');

// 
Route::any('/attendance-machine','App\Http\Controllers\Newadmin\Master@attendancemachine');

// PAYROLL PART
Route::any('/org-details','App\Http\Controllers\Newadmin\PayrollController@index');
Route::any('/payschedule','App\Http\Controllers\Newadmin\PayrollController@payschedule');


// Outdoor manual entry 
Route::any('/outdoor-manual-entry','App\Http\Controllers\Newadmin\Leave_Con@outdoorManual');
Route::any('/add-outdoor-entry','App\Http\Controllers\Newadmin\Leave_Con@addOutdoorManual');
Route::any('/edit-outdoor-entry','App\Http\Controllers\Newadmin\Leave_Con@editOutdoorManual');


// other reports
Route::any('/increment-report','App\Http\Controllers\Newadmin\Reports_Con@increment_report');
Route::any('/ctc-report','App\Http\Controllers\Newadmin\Reports_Con@ctc_report');

//company group in Newadmin/User controller 

Route::any('/company-group','App\Http\Controllers\Newadmin\User@companyGroup');
Route::any('/company-mapping','App\Http\Controllers\Newadmin\User@companyMapping');
Route::any('/company','App\Http\Controllers\Newadmin\User@company');
Route::any('/company-location','App\Http\Controllers\Newadmin\User@companyLocation');
Route::any('/company-department','App\Http\Controllers\Newadmin\User@companyDepartment');
Route::any('/sub-department','App\Http\Controllers\Newadmin\User@subDepartment');
Route::any('/designation','App\Http\Controllers\Newadmin\User@designation');
Route::any('/grade','App\Http\Controllers\Newadmin\User@grade');

//create shift in Newadmin/User controller

Route::any('/create-shift','App\Http\Controllers\Newadmin\User@createShift');

//create leave/holiday in Newadmin/User controller

Route::any('/create-leave','App\Http\Controllers\Newadmin\User@createLeave');

Route::any('/create-holiday','App\Http\Controllers\Newadmin\User@createHoliday');

// create roles & permissions and user management options

Route::any('/create-roles','App\Http\Controllers\Newadmin\User@assignRoles');

Route::any('/functional-role-master','App\Http\Controllers\Newadmin\User@functionalRole');

Route::any('/user-administration','App\Http\Controllers\Newadmin\User@userAdministration');

Route::any('/home2','App\Http\Controllers\Newadmin\User@homeNew');

//new employee master 
Route::any('/employee-master','App\Http\Controllers\Newadmin\Master@employeeMaster');
