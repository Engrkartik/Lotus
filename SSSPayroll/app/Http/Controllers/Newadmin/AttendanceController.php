<?php

namespace App\Http\Controllers\Newadmin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AttendanceController extends Controller
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
        return view('/newadmin/pages/admin/attendance');
    }

    public function dailyReport()
    {
        return view('/newadmin/pages/admin/attendance/daily_basic_report');
    }

    public function dailyDetailedReport(){
        return view('/newadmin/pages/admin/attendance/daily_detailed_report');
    }
    public function  monthlyDetailedReport(){
        return view('/newadmin/pages/admin/attendance/monthly_detailed');
    }
   

    public function leaves()
    {
        return view('/newadmin/pages/admin/leaves');
    }
}
