<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login;
use App\Models\employee;
use App\Models\branch;
use App\Models\working_days;
use App\Models\attendances;
use Carbon\Carbon;
use DB;
use Session;
use Redirect;
use View;
use compact;
class attendance extends Controller
{
    //
    function attendance(Request $req)
    {
        $aid=Session::get('aid');

    	 $data=login::all();
    	// $emp=employee::all();
        $emp=DB::table('employee')
            ->select('employee.*','bank_detail.bank_name','bank_detail.branch_name','bank_detail.account_no','bank_detail.ifsc_code','branch.name as b_name')
            ->leftjoin('bank_detail','bank_detail.emp_id','=','employee.id')
            ->leftjoin('branch','branch.id','=','employee.bid')
            ->where('employee.status','!=','R')
            ->where('employee.aid','=',$aid)
            ->get();

        return View::make('attendance', compact('data','emp'));
    }
    function att_report($id){
        $aid=Session::get('aid');

    	 $data=login::all();
    	// $emp=employee::all();
        $emp=DB::table('employee')
            ->select('employee.*','bank_detail.bank_name','bank_detail.branch_name','bank_detail.account_no','bank_detail.ifsc_code','branch.name as b_name')
            ->leftjoin('bank_detail','bank_detail.emp_id','=','employee.id')
            ->leftjoin('branch','branch.id','=','employee.bid')
            ->where('employee.status','!=','R')
            ->where('employee.aid','=',$aid)
            ->where('employee.id','=',$id)
            ->get();

        return View::make('att_report', compact('data','emp'));
    }
    public static function att_report1($id,$dt,$val){
        
        $att=DB::select("SELECT time(punch_time) as punch,punch_type FROM attendance where date(punch_time)='$dt%' and emp_id='$id' order by id $val limit 1");

            if($att)
            {
                if($att[0]->punch_type=='P')
                {
                    if($val=='DESC')
                    {
                    return ['Out-Time : '.$att[0]->punch,$att[0]->punch_type];
                    }else{
                    return ['In-Time : '.$att[0]->punch,$att[0]->punch_type];
                    }
                }
                else
                {
                return ['On-Leave ',$att[0]->punch_type];
                }
            }else{
                return ['Absent','A'];
            }
        // return View::make('att_report', compact('data','emp','att'));
    }
}
