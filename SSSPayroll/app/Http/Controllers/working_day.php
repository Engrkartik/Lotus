<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\login;
use App\Models\employee;
use App\Models\working_days;
use App\Models\holiday;
use App\Models\holiday_list;
use Carbon\Carbon;
use DB;
use Session;
use Redirect;
use View;
use compact;

class working_day extends Controller
{
    function working_day(Request $req)
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
        $work_day=DB::table('working_day')
            ->select('*')
            ->where('status','!=','R')
            ->where('aid','=',$aid)
            ->get();
        return View::make('working_day', compact('data','emp','work_day'));
    }
    function add_working(Request $req)
    {
        $aid=Session::get('aid');
        
        $chk=DB::table('working_day')
            ->select('*')
            ->where('name','=',$req->name)
            ->where('aid','=',$aid)
            ->count();
        if($chk>0)
        {
        return response()->json(['msg'=>'Name already exist..!!','status'=>false]);
        }else
        {
        $working = new working_days;
        $working->aid=$aid;
        $working->name = $req->name;
        $working->week1=json_encode($req->week1);
        $working->week2=json_encode($req->week2);
        $working->week3=json_encode($req->week3);
        $working->week4=json_encode($req->week4);
        $result=$working->save();
        // // $json=$req->week1;
        return response()->json(['msg'=>'Added..!!','status'=>$result]);
    }
    }
    function holiday_day(Request $req)
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
        $group=DB::table('holiday_group')
            ->select('*')
            ->where('status','!=','R')
            ->where('aid','=',$aid)
            ->get();
        $list=DB::table('holiday_list')
            ->select('holiday_list.*','holiday_group.name as h_name')
            ->leftjoin('holiday_group','holiday_group.id','holiday_list.working_group')
            ->where('holiday_list.status','!=','R')
            ->where('holiday_list.aid','=',$aid)
            ->get();
        return View::make('holiday', compact('data','emp','group','list'));
    }
    function holiday_group(Request $req)
    {
        $aid=Session::get('aid');
        
        $chk=DB::table('holiday_group')
            ->select('*')
            ->where('name','=',$req->name)
            ->where('aid','=',$aid)
            ->count();
        if($chk>0)
        {
             return redirect('holiday_day')->with('error', 'Group Name Already Exist..!!');
        }else
        {
        $working = new holiday;
        $working->aid=$aid;
        $working->name = $req->name;
        $working->description=$req->desc;
        $result=$working->save();
        // // $json=$req->week1;
             return redirect('holiday_day')->with('success', 'Created..!!');
    }
    }
     function add_holiday_list(Request $req)
    {
        $aid=Session::get('aid');
        
        $chk=DB::table('holiday_list')
            ->select('*')
            ->where('name','=',$req->name)
            ->where('aid','=',$aid)
            ->count();
        if($chk>0)
        {
             return redirect('holiday_day')->with('error', 'Holiday List Already Exist..!!');
        }else
        {
        $working = new holiday_list;
        $working->aid=$aid;
        $working->name = $req->name;
        $working->type=$req->type;
        $working->working_group=$req->group;
        $working->holiday_date=$req->date;
        $result=$working->save();
        // // $json=$req->week1;
             return redirect('holiday_day')->with('success', 'Created..!!');
    }
    }
    function update_holiday_list(Request $req,$id)
    {
        $aid=Session::get('aid');
        
       // return $id;
        $working = holiday_list::where('id','=',$id)
        ->update(array('name'=>$req->name,'type'=>$req->type,'working_group'=>$req->group,'holiday_date'=>$req->date,'updated_at'=>date('Y-m-d H:i:s')));
        // $result=$working->save();
        // // $json=$req->week1;
             return redirect('holiday_day')->with('success', 'Updated..!!');
    // }
    }
    function update_workingday(Request $req)
    {
        $aid=Session::get('aid');
        
        // $week1=json_encode($req->week1);
        $fetch=working_days::where('id','=',$req->id)->first();

        $result=working_days::where('id','=',$req->id)
        ->update(array('name'=>$req->name,'week1'=>json_encode($req->week1)=='null'?$fetch->week1:json_encode($req->week1),'week2'=>json_encode($req->week2)=='null'?$fetch->week2:json_encode($req->week2),'week3'=>json_encode($req->week3)=='null'?$fetch->week3:json_encode($req->week3),'week4'=>json_encode($req->week4)=='null'?$fetch->week4:json_encode($req->week4)));
        if($result)
        {
            return response()->json(['msg'=>'Success','status'=>true]);
        }else
        {
            return response()->json(['msg'=>'Failed','status'=>false]);
        }
    }
}
