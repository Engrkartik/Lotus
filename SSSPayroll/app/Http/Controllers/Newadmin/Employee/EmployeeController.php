<?php

namespace App\Http\Controllers\Newadmin\Employee;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/newadmin/pages/employee/index');
    }

    public function applyleave()
    {
        return view('/newadmin/pages/employee/applyLeaves/applyleave');
    }
     public function leave_list()
    {
        return view('/newadmin/pages/employee/applyLeaves/leavelist');
    }
    public function editleave()
    {
        return view('/newadmin/pages/employee/applyLeaves/edit_leave');
    }
}
