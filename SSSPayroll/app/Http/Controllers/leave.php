<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login;
use App\Models\employee;
use App\Models\leave_type;
use Carbon\Carbon;
use DB;
use Session;
use Redirect;
use View;
use compact;
class leave extends Controller
{
    //
    function leave_type($value='')
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

         $leave=leave_type::where('status','!=','R')->get();
        return View::make('leave_type', compact('data','emp','leave'));
    }
    function add_leave(Request $req)
    {
        $aid=Session::get('aid');
    	if($req->carry_forward==null){
    		$cf='No';
    	}else{$cf=$req->carry_forward;}
    	$chk=leave_type::where('name','=',$req->name)
        ->where('aid','=',$aid)
        ->count();
    	if($chk>0)
    	{
    		return redirect('leave_type')->with('error',$req->name.' already exist..!!');
    	}else
    	{
    		$leave=new leave_type;
            $leave->aid=$aid;
	    	$leave->name=$req->name;
	    	$leave->type=$req->type;
	    	$leave->no_of_leave=$req->no_leave;
	    	$leave->affective_from=$req->affect_from;
	    	$leave->carry_forward=$cf;
	    	$result=$leave->save();
	    	if($result==true)
	    	{
	    		return redirect('leave_type')->with('success','Created..!!');
	    	}
    	}
    }
    function update_leave(Request $req)
    {
        $result=leave_type::where('id','=',$req->id)
        ->update(array('name'=>$req->name,'type'=>$req->type,'no_of_leave'=>$req->no_leave,'carry_forward'=>$req->carry_forward,'affective_from'=>$req->affective_from,'updated_at'=>date('Y-m-d H:i:s')));
        if($result)
        {
            return response()->json(['msg'=>'Success','status'=>true]);
        }else{
            return response()->json(['msg'=>'Failed','status'=>false]);
        }
    }
}
