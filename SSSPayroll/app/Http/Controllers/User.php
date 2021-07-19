<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\login;
use App\Models\department;
use App\Models\employee;
use App\Models\branch;
use App\Models\bank_detail;
use App\Models\working_days;
use Carbon\Carbon;
use DB;
use Session;
use Redirect;
use View;
use compact;
// Use App\Exception;
class User extends Controller
{
    //
    function login()
    {
        return view('login');
    }
     function employeelist()
    {
    	
    	$aid=Session::get('aid');
        // return view('employeelist');
        $data=login::all();
    	// $emp=employee::all();
        $emp=DB::table('employee')
            ->select('employee.*','bank_detail.bank_name','bank_detail.branch_name','bank_detail.account_no','bank_detail.ifsc_code','branch.name as b_name')
            ->leftjoin('bank_detail','bank_detail.emp_id','=','employee.id')
            ->leftjoin('branch','branch.id','=','employee.bid')
            ->where('employee.status','!=','R')
            ->where('employee.aid','=',$aid)
            ->get();
        return View::make('employeelist', compact('data','emp'));
    }
     function create()
    {
        return view('register');
    }
    function loginsubmit(Request $req)
    {
        // print_r($req['ph_number']);
        // return lsogin::all();
        $check1=DB::table('admin')
        ->where('phone_number','=',$req->ph_number)
        ->where('password','=',$req->pwd)
        ->select('*')
        ->get();
        // $check1=login::all();
        $check2=$check1->first();
        $check=$check1->count();
        
        // print_r($check1);
        if($check>0)
        {
            // print_r($check);
            Session::put('aid',$check2->id);
            if(!empty(Session::get('aid')))
            {
            
                return Redirect::route('index'); 

            }

        }else{
             return Redirect::to('/')->with('error', 'Mobile Number does not exist! Please contact to admin.');
        }
    }

    function showSuccess()
{
    // $data = Session::get( 'c_name');
    // print_r($data);
    $aid=Session::get('aid');
    $data=login::all();
    // print_r($aid);
    // return View::make('include.header', compact('data'));
    return View::make('index', compact('data'));
}

    function createsubmit(Request $req)
    {
        print_r($req->input());
        $user = new login;
        // $user=login::create([
        //  'company_name' => $req->c_name
        // ]); 
        $user->company_name = $req->c_name;
        $user->email=$req->email;
        $user->password=$req->pwd;
        $user->phone_number=$req->ph_number;
        $user->address=$req->address;
        $user->state=$req->state;
        $user->city=$req->city;
        $user->pin_code=$req->pin_code;
        $result=$user->save();
        if($result)
        {
            // return login::all();
        //  // print_r($user->getMessage());
            return redirect('/');
        }
        // return login::all();
    }
    function reg12(Request $request)
    {
        return $request->all();
    }
    function Add_Employee(Request $req)
    {
    	$aid=Session::get('aid');

        $data=login::all();
        $dept=DB::table('department')
        ->select('*')
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->get();
        $desg=DB::table('designation')
        ->select('*')
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->get();
        $branch=DB::table('branch')
        ->select('*')
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->get();
        if(empty($req->id))
        {
        $emp=DB::table('employee')
        ->where('aid','=',$aid)
        ->orderby('employee.id','DESC')
        ->LIMIT(1)
        ->COUNT();
        // if($emp==0)
        // {
            $emp+=1;
        // }
        return View::make('add_employee', compact('data','dept','desg','branch','emp'));
        }else
        {
            $emp=DB::table('employee')
             ->select('employee.*','bank_detail.bank_name','bank_detail.branch_name','bank_detail.account_no','bank_detail.ifsc_code','branch.name as b_name')
            ->leftjoin('bank_detail','bank_detail.emp_id','=','employee.id')
            ->leftjoin('branch','branch.id','=','employee.bid')
            // ->where('employee.status','!=','R')
            ->where('employee.id','=',$req->id)
        	->where('employee.aid','=',$aid)

            ->get();
        // if($emp==0)
        // {
        //     $emp+=1;
        // }
        return View::make('./update_employee', compact('data','dept','desg','branch','emp'));
        }
        
    }
    function department()
    {
    	$aid=Session::get('aid');

        $data=login::all();
         $dept=DB::table('department')
        ->select('*')
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->get();
        return View::make('department', compact('data','dept'));
    }
     function add_dept(Request $req)
    {
    	$aid=Session::get('aid');
    	
        // print_r($req->input());
        $dept= new department;
        $check1=DB::table('department')
        ->select('*')
        ->where('name','=',$req->dept_name)
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->count();
        if($check1>0)
        {
            return redirect()->back()->with('alert',$req->dept_name.' already exist..!!');
        }else{
        $dept->aid=Session::get('aid');
        $dept->name=$req->dept_name;
        $result=$dept->save();
        if($result)
        {
        $data=login::all();
        $dept=DB::table('department')
        ->select('*')
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->get();
        return redirect('department')->with(compact('data','dept'));
        // return View::make('department', compact('data','dept'));
        }else{
            print_r($result);
        }
    }
    }
    function update_dept(Request $req,$id)
    {
        $result=department::where('id',$id)->update(array('name'=>$req->dept_name,'updated_at'=>date('Y-m-d H:i:s')));
        if($result)
        {
            return redirect('department');
        }
    }
    function create_employee(Request $req)
    {
    	$aid=Session::get('aid');
    	
    	print_r($req->input());
    	 $check=DB::table('employee')
        ->select('*')
        ->where('emp_name','=',$req->emp_name)
        ->orwhere('emp_code','=',$req->emp_code)
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->count();
        if($check>0)
        {
            return redirect()->back()->with('alert',$req->emp_name.'Or '.$req->emp_code.' already exist..!!');
        }else{
    	$emp = new employee;
    	$emp->aid=$aid;
        $emp->bid=$req->branch;
    	$emp->emp_code=strtoupper($req->emp_code);
    	$emp->emp_name=$req->emp_name;
    	$emp->joining_date=$req->joining_dt;
    	$emp->dob=$req->dob;
    	$emp->designation=$req->desig;
    	$emp->department=$req->dept;
    	$emp->gender=$req->gender;
    	$emp->marital_status=$req->marital_st;
    	$emp->email_p=$req->email_p;
    	$emp->username=$req->username;
    	$emp->password=$req->pwd;
    	$emp->phone_number=$req->ph_number;
    	$emp->pan_no=$req->pan_no;
    	$emp->aadhar_no=$req->aadhar_no;
    	$emp->current_add=$req->current_add;
    	$emp->permanent_add=$req->permanent_add;
    	$result=$emp->save();
    	if($result)
    	{
    		// $emp=employee::all();
            $emp=DB::table('employee')
            ->select('employee.*','bank_detail.bank_name','bank_detail.branch_name','bank_detail.account_no','bank_detail.ifsc_code','branch.name as b_name')
            ->leftjoin('bank_detail','bank_detail.emp_id','=','employee.id')
            ->leftjoin('branch','branch.id','=','employee.bid')
            ->where('employee.status','!=','R')
        	->where('employee.aid','=',$aid)
            ->get();
    		$data=login::all();
        return redirect('employeelist')->with(compact('data','emp'));

    	}
    	}

    }
    function add_desg1()
    {
        $msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);
    	// print_r($req->input());
    	# code...
    }
    function branchlist()
    {
    	$aid=Session::get('aid');
    	
     
        $data=login::all();
          $dept=DB::table('branch')
        ->select('branch.*','working_day.name as w_name')
        ->leftjoin('working_day','working_day.id','branch.working_day')
        ->where('branch.status','!=','R')
        ->where('branch.aid','=',$aid)
        ->get();
        $work_day=DB::table('working_day')
        ->select('*')
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->get();
        return View::make('branchlist', compact('data','dept','work_day'));
    
    }
    function add_branch(Request $req)
    {
    	$aid=Session::get('aid');
    	
        $timestamps=true;
        // print_r($req->input());
        $check1=DB::table('branch')
        ->select('*')
        ->where('name','=',$req->dept_name)
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->count();
        if($check1>0)
        {
            return redirect()->back()->with('alert',$req->dept_name.' already exist..!!');
        }else{
            $dept= new branch;
           $dept->aid=Session::get('aid');
        $dept->name=$req->dept_name;
        $dept->working_day=$req->work_day;
        $dept->status='A';
        $result=$dept->save();
        if($result)
        {
        $data=login::all();
        $dept=DB::table('branch')
        ->select('branch.*','working_day.name as w_name')
        ->leftjoin('working_day','working_day.id','branch.working_day')
        ->where('branch.status','!=','R')
        ->where('branch.aid','=',$aid)
        ->get();
        return redirect('branchlist')->with(compact('data','dept'));
        // return View::make('department', compact('data','dept'));
        }else{
            print_r($result);
        }
    }
    }
    function update_branch(Request $req,$id)
    {
        $result=branch::where('id',$id)->update(array('name'=>$req->name,'working_day'=>$req->work_day,'updated_at'=>date('Y-m-d H:i:s')));
        if($result)
        {
            return redirect('branchlist');
        }
    }

    function bank_detail(Request $req)
    {	
    	$aid=Session::get('aid');
    	
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
    		$bank1->aid=Session::get('aid');
    		$bank1->emp_id=$req->id;
    		$bank1->bank_name=$req->bank_name;
    		$bank1->branch_name=$req->branch_name;
    		$bank1->account_no=$req->account_no;
    		$bank1->ifsc_code=$req->ifsc_code;
    		$bank=$bank1->save();
    		// $bank=
    	}
    	if($bank)
    	{
    		$emp=DB::table('employee')
            ->select('employee.*','bank_detail.bank_name','bank_detail.branch_name','bank_detail.account_no','bank_detail.ifsc_code','branch.name as b_name')
            ->leftjoin('bank_detail','bank_detail.emp_id','=','employee.id')
            ->leftjoin('branch','branch.id','=','employee.bid')
            ->where('employee.status','!=','R')
        	->where('employee.aid','=',$aid)
            ->get();
            $data=login::all();
        return redirect('employeelist')->with(compact('data','emp'));
    	}else{

    	}
    }

    function delete1(Request $req)
    
    {
    	$aid=Session::get('aid');
    	
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

					return redirect('employeelist')->with(compact('data','emp'));
				}elseif($req->type=='department')
				{
					$data=login::all();
					$dept=DB::table($req->type)
					->select('*')
					->where('status','!=','R')
        			->where('aid','=',$aid)
					->get();
					return redirect('department')->with(compact('data','dept'));
				}elseif($req->type=='branch')
				{
					$data=login::all();
					$dept=DB::table('branch')
					->select('*')
					->where('status','!=','R')
        			->where('aid','=',$aid)
					->get();
					return redirect('branchlist')->with(compact('data','dept'));
				}
                elseif($req->type=='working_day')
                {
                    $data=login::all();
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
                return redirect('working_day')->with(compact('data','emp','work_day'));
                }
                 elseif($req->type=='holiday_list')
                {
                return redirect('holiday_day')->with('success','Deleted..!!');
                }else{
                return redirect($req->type)->with('success','Deleted..!!');

                }
            }
    }
    function Upt_Employee(Request $req)
    {
    	$aid=Session::get('aid');
    	
    	// $upt=DB::table('employee')
    	$upt=employee::where('id',$req->id)
    	->update(array('bid'=>$req->branch,'emp_name'=>$req->emp_name,'joining_date'=>$req->joining_dt,'dob'=>$req->dob,'designation'=>$req->desig,'department'=>$req->dept,'gender'=>$req->gender, 'marital_status'=>$req->marital_st, 'email_p'=>$req->email_p, 'username'=>$req->username, 'password'=>$req->pwd, 'phone_number'=>$req->ph_number, 'pan_no'=>$req->pan_no, 'aadhar_no'=>$req->aadhar_no, 'current_add'=>$req->current_add, 'permanent_add'=>$req->permanent_add,'updated_at'=>date('Y-m-d H:i:s')));
    	if($upt)
    	{
    		$emp=DB::table('employee')
            ->select('employee.*','bank_detail.bank_name','bank_detail.branch_name','bank_detail.account_no','bank_detail.ifsc_code','branch.name as b_name')
            ->leftjoin('bank_detail','bank_detail.emp_id','=','employee.id')
            ->leftjoin('branch','branch.id','=','employee.bid')
            ->where('employee.status','!=','R')
        	->where('employee.aid','=',$aid)
            ->get();
            $data=login::all();
        return redirect('employeelist')->with(compact('data','emp'));
    	}
    }
    function change_status(Request $req)
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
    function emp_filter(Request $req)
    {
    	$aid=Session::get('aid');
    	
    	// return $req->all();
        // return view('employeelist');
        $data=login::all();
    	// $emp=employee::all();
    	if(is_null($req->from_dt) && is_null($req->to_dt))
    	{
    		$emp=DB::table('employee')
            ->select('employee.*','bank_detail.bank_name','bank_detail.branch_name','bank_detail.account_no','bank_detail.ifsc_code','branch.name as b_name')
            ->leftjoin('bank_detail','bank_detail.emp_id','=','employee.id')
            ->leftjoin('branch','branch.id','=','employee.bid')
            ->where([
            	['employee.status','!=','R'],
            	['employee.aid','=',$aid]
            ],)
            ->get();
    	}
    	else{	
        $emp=DB::table('employee')
            ->select('employee.*','bank_detail.bank_name','bank_detail.branch_name','bank_detail.account_no','bank_detail.ifsc_code','branch.name as b_name')
            ->leftjoin('bank_detail','bank_detail.emp_id','=','employee.id')
            ->leftjoin('branch','branch.id','=','employee.bid')
            ->where([
            	['employee.status','!=','R'],
            	['employee.joining_date','>=',$req->from_dt],
            	['employee.joining_date','<=',$req->to_dt],
            	['employee.aid','=',$aid],
            ])
            ->get();
        }
        return View::make('employeelist', compact('data','emp'));
    }
    function prof_detail(Request $req)
    {
    	$aid=Session::get('aid');
    	
    	$upt=employee::where('id',$req->id)
    	->update(array('CTC'=>$req->ctc, 'supervisor'=>$req->supervisor,'updated_at'=>date('Y-m-d H:i:s')));
    	if($upt)
    	{
    		$emp=DB::table('employee')
            ->select('employee.*','bank_detail.bank_name','bank_detail.branch_name','bank_detail.account_no','bank_detail.ifsc_code','branch.name as b_name')
            ->leftjoin('bank_detail','bank_detail.emp_id','=','employee.id')
            ->leftjoin('branch','branch.id','=','employee.bid')
            ->where('employee.status','!=','R')
        	->where('aid','=',$aid)
            ->get();
            $data=login::all();
        return redirect('employeelist')->with(compact('data','emp'));
    	}
    }
}