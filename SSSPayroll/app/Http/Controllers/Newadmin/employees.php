<?php

namespace App\Http\Controllers\Newadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\login;
use App\Models\employee;
use App\Models\branch;
use App\Models\bank_detail;
use App\Models\working_days;
use App\Models\attendances;
use App\Models\department;
use App\Models\designation;
use Carbon\Carbon;
use DB;
use Session;
use Redirect;
use View;
use compact;


class employees extends Controller
{
    public function employee()
    {
    	$aid=session()->get('aid');
    	$emp=employee::leftjoin('branch','branch.id','employee.bid')
    	->where('employee.aid','=',$aid)
    	->where('employee.status','!=','R')
    	->get();
        return view::make('newadmin/pages/admin/employees/employees')->with(compact('emp'));
    }

    public function employeelist()
    {
    	// $aid=session()->get('aid');
    	$aid='1';
    	$emp=DB::table('employee as A')
    	->select('A.*','B.emp_name as report_to','branch.name as b_name','bank_detail.bank_name','bank_detail.branch_name','bank_detail.account_no','bank_detail.ifsc_code','department.name as department')
        ->leftjoin('bank_detail','bank_detail.emp_id','=','A.id')
    	->leftjoin('branch','branch.id','A.bid')
        ->leftjoin('department','department.id','A.dept_id')
        ->leftjoin('employee as B','A.reporting_manager','B.id')
    	->where([['A.aid','=',$aid],['A.status','!=','R']])
        ->orderBy('A.id','ASC')
    	->get();
    	$branch=branch::where('aid','=',$aid)
    	->where('status','!=','R')
    	->get();
    	$dept=DB::table('department')
        ->select('department.*','branch.name as b_name')
    	->leftjoin('branch','branch.id','department.bid')
        ->where([['department.aid','=',$aid],['department.status','!=','R']])
    	->get();
    	$desg=DB::table('designation')
        ->select('*')
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->get();
        return view::make('newadmin/pages/admin/employees/employeeslist')->with(compact('emp','branch','dept','desg'));
        // return view('newadmin/pages/employees/employeeslist');
    }
    public function create_employee(Request $req)
    {
        print_r($req->all());
    	$aid=Session::get('aid');
    	
    	// print_r($req->input());
    	 $check=DB::table('employee')
        ->select('*')
        ->where('phone_number','=',$req->phone_no)
        ->where('dob','=',$req->dob)
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->count();
        if($check>0)
        {
            return redirect()->back()->with('error',date('d-M-Y',strtotime($req->dob)).'With Contact Number'.$req->phone_no.' already exist..!!');
        }else{
        	 $ch=DB::table('employee')
        ->select('emp_code')
        ->where('aid','=',$aid)
        ->orderby('employee.id','desc')
        ->first();
        $code=explode("_",$ch->emp_code);
        $emp_code=$code[1]+1;
    	$emp = new employee;
    	$emp->aid=$aid;
        $emp->bid=$req->branch;
    	$emp->emp_code='SSS_'.$emp_code;
    	$emp->emp_name=$req->emp_name;
    	$emp->joining_date=$req->joining_dt;
    	$emp->probation_dt=$req->probation_dt;
    	$emp->confirmation_dt=$req->cnfrm_dt;
    	$emp->dob=$req->dob;
    	$emp->designation=$req->desig;
    	$emp->dept_id=$req->dept;
    	$emp->reporting_manager=$req->report_to;
    	$emp->gender=$req->gender;
    	$emp->marital_status=$req->marital_st;
    	$emp->email_p=$req->email_p;
    	$emp->username=$req->username;
    	$emp->password=$req->pwd;
    	$emp->phone_number=$req->phone_no;
    	$emp->alt_phone_number=$req->alt_phone_no;
    	$emp->CTC=$req->ctc;
    	$emp->pan_no=$req->pan_no;
    	$emp->aadhar_no=$req->aadhar_no;
    	$emp->current_add=$req->current_add;
    	$emp->permanent_add=$req->permanent_add;
    	$emp->pf_number=$req->pf_num;
    	$emp->uan_number=$req->uan_num;
    	$emp->esi_number=$req->esi_num;
    	$emp->pf_enabled=$req->pf_status;
    	$emp->emp_pf_enabled=$req->emppf_status;
    	$emp->esi_enabled=$req->esi_status;
    	$emp->p_tax_enabled=$req->tax_status;
    	$emp->working_plan=$req->working_plan;
    	$result=$emp->save();
        if($req->bank_name!='')
        {
        $bank=new bank_detail;
    	$bank->aid=$aid;
        $bank->emp_id=$emp->id;
        $bank->bank_name=$req->bank_name;
        $bank->branch_name=$req->bank_name;
        $bank->account_no=$req->account_no;
        $bank->ifsc_code=$req->ifsc_code;
        $bank->updated_at=date('Y-m-d H:i:s');
        $result1=$bank->save();
        }
    	if($result)
    	{
        return redirect('employees-list')->with('success','Created..!!');
    	}else {
            return redirect('employees-list')->with('error','Error..!!');
        }
    	}

    }
///////////////////////////////////////////////mapped/////////////////////////////////////////////////    
    public function maped(Request $request)
    {
        // $delet = now();
        $ids = json_decode($request->ids);
        $html ='<select class="form-control" id="report_to">';
            $map=DB::table('employee')->select('emp_name','id')->whereNotIn('id',$ids)->get();
            foreach ($map as $key => $value) {
                $html.= '<option value="'.$value->id.'">'.$value->emp_name.'</option>';
            }
        $html.='</select>';
        return response()->json(['data'=>$html,'status'=>'true']);
        // DB::table('products')->whereIn('id',explode(",",$ids))->update(['deleted_at'=>$delet]);
        // return back()->with('success', trans('messages.deleted', ['model' => $this->model]));
      // return view::make('newadmin/pages/employees/employeeslist')->with(compact('map'));
    }
//////////////////////////////////////////////end mapped//////////////////////////////////////////////

public function save_reports(Request $req)
{
    $upd=DB::table('employee')->select('id')->whereIn('id',$req->ids)->get();
    if(($upd->count())>0)
    {
        foreach ($upd as $key => $value) {
        $upd1=employee::where('id','=',$value->id)
        ->update(array('reporting_manager'=>$req->report_to));
        }
    }
    if($upd1)
    {
        return response()->json(['status'=>'true','data'=>'Done']);
    }else {
        return response()->json(['status'=>'false','data'=>$upd]);
    }
}
    public function change_status(Request $req)
    {
    	$upt= DB::table($req->table)
            ->where('id', $req->id)
            ->update(array('status' => $req->val));
            if($upt)
            {
            	return response()->json(['msg'=>'Updated Successfully', 'success'=>'true']);
            }else
            {
            	return response()->json(['msg'=>'Failed', 'success'=>'false']);
            	
            }
    }
    public function delete1(Request $req)
    
    {
    	$aid='1';
    	
        // print_r($req->id);
        // print_r($req->type);

       $del= DB::table($req->type)
            ->where('id', $req->id)
            ->update(array('status' => 'R'));
            if($del)
            {
            	if($req->type=='employee')
            	{
					$emp=DB::table('employee')

					->select('employee.*','bank_detail.bank_name','bank_detail.branch_name','bank_detail.account_no','bank_detail.ifsc_code','branch.name as b_name')
					->leftjoin('bank_detail','bank_detail.emp_id','=','employee.id')
					->leftjoin('branch','branch.id','=','employee.bid')
					->where('employee.status','!=','R')
       				->where('employee.aid','=',$aid)
					->get();
					$data=login::all();

					return redirect('employees-list')->with('success','Deleted Successfully..!!');
				}
                if($req->type=='working_day')
                {
                    return redirect('/working-day')->with('success','Deleted Successfully..!!');
                }
                if($req->type=='holiday_list')
                {
                    return redirect('holiday-master')->with('success','Deleted Successfully..!!');
                }
                if($req->type=='designation')
                {
                    return redirect('designation-master')->with('success','Deleted Successfully..!!');
                }
                if($req->type=='department')
                {
                    return redirect('department-master')->with('success','Deleted Successfully..!!');
                }
                if($req->type=='branch')
                {
                    return redirect('branch-master')->with('success','Deleted Successfully..!!');
                }
                if($req->type=='leaves')
                {
                    return redirect('leave-list')->with('success','Deleted Successfully..!!');
                }
                if($req->type=='shift')
                {
                    return redirect('shift-list')->with('success','Deleted Successfully..!!');
                }
			}
	}

	public function employeeprofile($id)
	{
        print_r($id);
        $aid=SESSION::get('aid');
        $emp=DB::table('employee as A')
    	->select('A.*','B.emp_name as report_to','branch.name as b_name','bank_detail.bank_name','bank_detail.branch_name','bank_detail.account_no','bank_detail.ifsc_code','department.name as d_name')
        ->leftjoin('bank_detail','bank_detail.emp_id','=','A.id')
    	->leftjoin('branch','branch.id','A.bid')
        ->leftjoin('department','department.id','A.dept_id')
        ->leftjoin('employee as B','A.reporting_manager','B.id')
    	->where([['A.aid','=',$aid],['A.status','!=','R'],['A.id','=',$id]])
        ->orderBy('A.id','ASC')
    	->get();
        $branch=branch::where('aid','=',$aid)
    	->where('status','!=','R')
    	->get();
    	$dept=DB::table('department')
        ->select('department.*','branch.name as b_name')
    	->leftjoin('branch','branch.id','department.bid')
        ->where([['department.aid','=',$aid],['department.status','!=','R']])
    	->get();
    	$desg=DB::table('designation')
        ->select('*')
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->get();
			return view('newadmin/pages/admin/employees/employeesprofile')->with(compact('branch','dept','desg','emp'));
	}
    public function add_employee()
    {
        $aid=SESSION::get('aid');
        $emp=employee::where('aid','=',$aid)
    	->where('status','=','A')
    	->get();
        $branch=branch::where('aid','=',$aid)
    	->where('status','!=','R')
    	->get();
    	$dept=DB::table('department')
        ->select('department.*','branch.name as b_name')
    	->leftjoin('branch','branch.id','department.bid')
        ->where([['department.aid','=',$aid],['department.status','!=','R']])
    	->get();
    	$desg=DB::table('designation')
        ->select('*')
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->get();
        $working_day=working_days::where('status','!=','R')
        ->where('aid','=',$aid)
        ->get();
            return view('newadmin/pages/admin/employees/addemployee')->with(compact('branch','dept','desg','emp','working_day'));
    }
    public function edit_employee($id)
    {
        $aid=SESSION::get('aid');
        $emp=DB::table('employee as A')
    	->select('A.*','B.emp_name as report_to','branch.name as b_name','bank_detail.bank_name','bank_detail.branch_name','bank_detail.account_no','bank_detail.ifsc_code','department.name as d_name')
        ->leftjoin('bank_detail','bank_detail.emp_id','=','A.id')
    	->leftjoin('branch','branch.id','A.bid')
        ->leftjoin('department','department.id','A.dept_id')
        ->leftjoin('employee as B','A.reporting_manager','B.id')
    	->where([['A.aid','=',$aid],['A.status','!=','R'],['A.id','=',$id]])
        ->orderBy('A.id','ASC')
    	->get();
        $branch=branch::where('aid','=',$aid)
    	->where('status','!=','R')
    	->get();
    	$dept=DB::table('department')
        ->select('department.*','branch.name as b_name')
    	->leftjoin('branch','branch.id','department.bid')
        ->where([['department.aid','=',$aid],['department.status','!=','R']])
    	->get();
    	$desg=DB::table('designation')
        ->select('*')
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->get();
        $emp_report=employee::where('aid','=',$aid)
    	->where('status','=','A')
    	->get();
        $working_day=working_days::where('aid','=',$aid)
    	->where('status','=','A')
    	->get();
            return view('newadmin/pages/admin/employees/editemployee')->with(compact('emp','branch','dept','desg','emp_report','working_day'));
    }
    public function emp_filter(Request $req)
    {
            $aid='1';
            

            $emp=DB::table('employee as A')
            ->select('A.*','B.emp_name as report_to','branch.name as b_name','bank_detail.bank_name','bank_detail.branch_name','bank_detail.account_no','bank_detail.ifsc_code','department.name as department')
            ->leftjoin('bank_detail','bank_detail.emp_id','=','A.id')
            ->leftjoin('branch','branch.id','A.bid')
            ->leftjoin('department','department.id','A.dept_id')
            ->leftjoin('employee as B','A.reporting_manager','B.id')
            ->where([
                    ['A.status','!=','R'],
                    ['A.joining_date','>=',$req->from_dt],
                    ['A.joining_date','<=',$req->to_dt],
                    ['A.aid','=',$aid],
                ])
                ->get();
            $branch=branch::where('aid','=',$aid)
            ->where('status','!=','R')
            ->get();
            $dept=department::where('aid','=',$aid)
            ->where('status','!=','R')
            ->get();
            $desg=DB::table('designation')
            ->select('*')
            ->where('status','!=','R')
            ->where('aid','=',$aid)
            ->get();
            return view::make('newadmin/pages/admin/employees/employeeslist')->with(compact('emp','branch','dept','desg'));
            
    }
   
    public function Upt_Employee(Request $req,$id)
    {
        $aid=SESSION::get('aid');
        
        // $upt=DB::table('employee')
        $upt=employee::where('id','=',$id)
        ->update(array('bid'=>$req->branch,
        'emp_name'=>$req->emp_name,
        'joining_date'=>$req->joining_dt,
        'probation_dt'=>$req->probation_dt,
    	'confirmation_dt'=>$req->cnfrm_dt,
        'dob'=>$req->dob,
        'designation'=>$req->desig,
        'dept_id'=>$req->dept,
        'reporting_manager'=>$req->report_to,
        'gender'=>$req->gender,
        'marital_status'=>$req->marital_st,
        'email_p'=>$req->email_p, 
        'username'=>$req->username, 
        'password'=>$req->pwd, 
        'phone_number'=>$req->ph_number, 
        'alt_phone_number'=>$req->alt_ph_number, 
        'pan_no'=>$req->pan_no, 
        'aadhar_no'=>$req->aadhar_no, 
        'current_add'=>$req->current_add, 
        'permanent_add'=>$req->permanent_add
        ,'pf_number'=>$req->pf_num
    	,'uan_number'=>$req->uan_num
    	,'esi_number'=>$req->esi_num
    	,'pf_enabled'=>$req->pf_status
    	,'CTC'=>$req->ctc
    	,'emp_pf_enabled'=>$req->emppf_status
    	,'esi_enabled'=>$req->esi_status
    	,'p_tax_enabled'=>$req->tax_status
    	,'working_plan'=>$req->working_plan,
        'updated_at'=>date('Y-m-d H:i:s')));
     if($upt)
     {
        return redirect('employees-list')->with('success','Updated Successfully..!!');
     }else{
        return redirect('employees-list')->with('error',$upt);
     }
    }

    public function bank_detail(Request $req)
    {   
        $aid='1';
        
        $chk=bank_detail::where('emp_id',$req->id)
        ->where('aid','=',$aid)
        ->count();
        if($chk>0)
        {
        $bank=bank_detail::where('emp_id',$req->id)
        ->update(array('bank_name'=>$req->bank_name, 'branch_name'=>$req->branch_name, 'account_no'=>$req->account_no, 'ifsc_code'=>$req->ifsc_code,'updated_at'=>date('Y-m-d H:i:s')));
        }else
        {
            $bank1=new bank_detail;
            $bank1->aid=$aid;
            $bank1->emp_id=$req->id;
            $bank1->bank_name=$req->bank_name;
            $bank1->branch_name=$req->branch_name;
            $bank1->account_no=$req->account_no;
            $bank1->ifsc_code=$req->ifsc_code;
            $bank=$bank1->save();
        }
        if($bank)
        {
           
        return redirect('employees-list')->with('success','Updated Successfully..!!');
        }else{
        return redirect('employees-list')->with('error',$bank);
        }
    }

    //leaves

    public function leaves_detail($value='')
    {
        $aid='1';
        $emp=DB::table('employee')
        ->select('employee.*','branch.name as b_name','bank_detail.bank_name','bank_detail.branch_name','bank_detail.account_no','bank_detail.ifsc_code','department.name as department')
        ->leftjoin('bank_detail','bank_detail.emp_id','=','employee.id')
        ->leftjoin('branch','branch.id','employee.bid')
        ->leftjoin('department','department.id','=','employee.dept_id')
        ->where('employee.aid','=',$aid)
        ->where('employee.status','!=','R')
        ->orderBy('employee.id','ASC')
        ->get();
        $branch=branch::where('aid','=',$aid)
        ->where('status','!=','R')
        ->get();
        $dept=department::where('aid','=',$aid)
        ->where('status','!=','R')
        ->get();
        $desg=DB::table('designation')
        ->select('*')
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->get();
    
    return view::make('newadmin/pages/admin/employees/leaves')->with(compact('emp','branch','dept','desg'));
        
    }

}
