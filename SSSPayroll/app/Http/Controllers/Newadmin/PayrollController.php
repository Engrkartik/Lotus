<?php

namespace App\Http\Controllers\Newadmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use App\Http\Requests;
// use App\Http\Controllers\Controller;

class PayrollController extends Controller
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

    public function index()
    {
        return view('newadmin/pages/admin/payrollpart/orgdetails');
    }


public function payschedule()
    {
        return view('newadmin/pages/admin/payrollpart/payschedule');
    }
    /**
     * SHOWS EMPLOYEES  IN BLOCK.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function employee()
    {
        return view('newadmin/pages/admin/employees/employees');
    }

    /**
     * SHOWS EMPLOYEES LIST.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function employeelist()
    {
        return view('newadmin/pages/admin/employees/employeeslist');
    }
}
