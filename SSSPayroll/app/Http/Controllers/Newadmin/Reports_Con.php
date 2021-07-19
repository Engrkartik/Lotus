<?php

namespace App\Http\Controllers\Newadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\leave_details;
use Session;
use DB;
use View;
use compact;

class Reports_Con extends Controller
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
        return view('newadmin/pages/admin/departments/departments');
    }

    public function leavebalance_report()
    {

     return view('newadmin/pages/admin/leaves/leavebalance_report');
 
    }
    
    public function empleavebalance_report(Request $req)
    {
        $eid = Session::get('emp_id');
        if($eid){

            // $emp = DB::table('leave_details')
                // ->select('leave_details.*')
                $emp=DB::select(
                	DB::raw(
                     "SELECT DISTINCT(leave_details.emp_id), leave_details.name as emp_name,(SELECT leaves.name from leave_details as lv1 LEFT JOIN leaves on lv1.leave_type = leaves.id WHERE lv1.leave_type=leave_details.leave_type ORDER BY lv1.id DESC LIMIT 1) as leave_type,(SELECT leave_bal from leave_details as lv1 WHERE lv1.leave_type=leave_details.leave_type ORDER BY id DESC LIMIT 1) as leave_bal,(SELECT leave_taken from leave_details as lv1 WHERE lv1.leave_type=leave_details.leave_type ORDER BY id DESC LIMIT 1) as leave_taken,(SELECT leaves.max_leave from leave_details as lv1 LEFT JOIN leaves on lv1.leave_type = leaves.id WHERE lv1.leave_type=leave_details.leave_type ORDER BY lv1.id DESC LIMIT 1) as max_leave, (SELECT leaves.max_leave_effect from leave_details as lv1 LEFT JOIN leaves on lv1.leave_type = leaves.id WHERE lv1.leave_type=leave_details.leave_type ORDER BY lv1.id DESC LIMIT 1) as max_leave_effect FROM `leave_details` WHERE emp_id = '$eid'")
                );
                // ->leftjoin('leaves','leave_details.leave_type','leaves.id')
                // ->where('leave_details.emp_id','=',$eid)
                // // ->where('leave_details.`')
                // ->orderBy('leave_details.id','DESC')
                // ->take(1)
                // ->get();
            
            return view('newadmin/pages/admin/leaves/emplb_report', array('emp'=>$emp));
            // return View::make('newadmin/pages/admin/leaves/emplb_report', compact('emp'));
        }
        else{
            $emp = DB::table('leave_details')
                // ->select('leave_details.*')
                ->select([ 
                    'leave_details.*',
                    'leaves.name',
                    DB::raw("SUM(leave_bal + leave_taken) as total")
                ])
                ->leftjoin('leaves','leave_details.leave_type','leaves.id')
                // ->where('leave_details.emp_id','=',$eid)
                ->get();
            
            // return view('newadmin/pages/admin/leaves/emplb_report');
            return View::make('newadmin/pages/admin/leaves/emplb_report', compact('emp'));
        }
    }



    public function increment_report()
    {

     return view('newadmin/pages/admin/reports/increment_report');
 
    }

     public function ctc_report()
    {

     return view('newadmin/pages/admin/reports/ctc_report');
 
    }
}