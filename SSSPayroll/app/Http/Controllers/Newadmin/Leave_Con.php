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
use App\Models\leave_type;
use App\Models\leaves;
use Carbon\Carbon;
use DB;
use Session;
use Redirect;
use View;
use compact;

class Leave_Con extends Controller
{
     public function emp_leaves_detail($value='')
    {
        $aid=Session::get('aid');
        $emp=DB::table('employee')
        ->select('employee.*','branch.name as b_name','bank_detail.bank_name','bank_detail.branch_name','bank_detail.account_no','bank_detail.ifsc_code')
        ->leftjoin('bank_detail','bank_detail.emp_id','=','employee.id')
        ->leftjoin('branch','branch.id','employee.bid')
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
    
    return view::make('newadmin/pages/admin/leaves/leaves')->with(compact('emp','branch','dept','desg'));
        
    }
    public function leaves_detail(Request $req)
    {
        print_r($req->all());
        $chk=leaves::where([['name','=',$req->name],['status','!=','R']])->count();
        if($chk>0)
        {
            return redirect('leave-list')->with('error',$req->name.' Already Exist..!!');
            
        }else
        {
            $depart='';
            $dept_arr=array();
            $desg_arr=array();
            if(!isset($req->departments) && isset($req->branches))
            {
                    $dept=department::whereIn('bid',$req->branches)->where('aid','=',Session::get('aid'))->get();
                    foreach ($dept as $key => $value) {
                        array_push($dept_arr,$value->id);
                    }
            }else
            {
                for ($i=0; $i <sizeof($req->departments); $i++) { 
                    array_push($dept_arr,$req->departments[$i]);                    
                }
            }
            if(!isset($req->designation) && isset($req->branches))
            {
                    $desg=designation::where('aid','=',Session::get('aid'))->get();
                    foreach ($desg as $key => $value) {
                        array_push($desg_arr,$value->name);
                    }
            }else {
                for ($i=0; $i <sizeof($req->designation); $i++) { 
                    array_push($desg_arr,$req->designation[$i]);                    
                }

            }
        $leave= New leaves;
        $leave->aid=SESSION::get('aid');
        $leave->name=$req->name;
        $leave->leave_effect=$req->inlineRadioOptions;
        $leave->effect_type=$req->leavedate;
        $leave->effect=$req->numberofdays;
        $leave->carry_forward=$req->cf_select;
        $leave->carry_forward_treatment=$req->treatmentofleaves;
        $leave->max_carry_forward=$req->m_cfinput;
        $leave->max_leave=$req->m_input;
        $leave->max_leave_effect=$req->m_select;
        $leave->branch=json_encode($req->branches);
        $leave->department=json_encode($dept_arr);
        $leave->designation=json_encode($desg_arr);
        $leave->status='A';
        $result=$leave->save();
            // print_r(json_encode($dept_arr));
        if($result)
        {
            return redirect('leave-list')->with('success','Leave Created Successfully..!!');
        }else{
            echo $result;
        }
    }
    }
    public function update_leave(Request $req,$id)
    {
        $dept_arr=array();
        $desg_arr=array();
        if(!isset($req->departments) && isset($req->branches))
        {
                $dept=department::whereIn('bid',$req->branches)->where('aid','=',Session::get('aid'))->get();
                foreach ($dept as $key => $value) {
                    array_push($dept_arr,$value->id);
                }
        }else
        {
            for ($i=0; $i <sizeof($req->departments); $i++) { 
                array_push($dept_arr,$req->departments[$i]);                    
            }
        }
        if(!isset($req->designation) && isset($req->branches))
        {
                $desg=designation::where('aid','=',Session::get('aid'))->get();
                foreach ($desg as $key => $value) {
                    array_push($desg_arr,$value->name);
                }
        }else {
            for ($i=0; $i <sizeof($req->designation); $i++) { 
                array_push($desg_arr,$req->designation[$i]);                    
            }

        }
        $result=DB::table('leaves')->where('id','=',$id)
        ->update(array('name'=>$req->name
        ,'leave_effect'=>$req->inlineRadioOptions
        ,'effect_type'=>$req->leavedate
        ,'effect'=>$req->numberofdays
        ,'carry_forward'=>$req->cf_select
        ,'carry_forward_treatment'=>$req->treatmentofleaves
        ,'max_carry_forward'=>$req->m_cfinput
        ,'max_leave'=>$req->m_input
        ,'max_leave_effect'=>$req->m_select
        ,'branch'=>json_encode($req->branches)
        ,'department'=>json_encode($dept_arr)
        ,'designation'=>json_encode($desg_arr)
        ,'updated_at'=>date('Y-m-d h:i:s')
    ));
        // $leave->status='A';
        // ->update(array('name'=>$req->name,'type'=>$req->type, 'effected_from'=>$req->effect_from,'effected_to'=>$req->effect_to,
        // 'no_of_leave'=>$req->no_leave,'carry_forward'=>$req->c_input,'max_leave_applied'=>$req->m_input,'max_leave_effected_on'=>$req->m_select,
        // 'weekend_count'=>($req->weekend=='')?'off':$req->weekend,'holiday_count'=>($req->holiday=='')?'off':$req->holiday,
        // 'branch'=>json_encode($req->branches),'department'=>json_encode($req->departments),'designation'=>json_encode($req->designation),
        // 'status'=>'A','updated_at'=>date('Y-m-d h:i:s')));
        
        if($result)
        {
            return redirect('leave-list')->with('success',$req->name.' Leave Updated Successfully..!!');
        }else{
            echo $result;
        }
    }
    public function leavessetting()
    {
        $aid=Session::get('aid');
        $branch=branch::where('aid','=',$aid)
        ->where('status','!=','R')
        ->get();
        $dept=department::where('department.aid','=',$aid)
        ->select('branch.name as b_name','department.*')
        ->leftjoin('branch','branch.id','department.bid')
        ->where('department.status','!=','R')
        ->get();
        $desg=DB::table('designation')
        ->select('*')
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->get();
        $leave=leaves::where([['aid','=',SESSION::get('aid')],['status','!=','R']])->get();
        return view::make('/newadmin/pages/admin/leaves/leavessetting')->with(compact('branch','dept','desg','leave'));
    }
    public function view_leave($id)
    {

        $aid=Session::get('aid');
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
        $leave=leaves::where([['id','=',$id],['status','!=','R']])->get();
        return view::make('/newadmin/pages/admin/leaves/view_leaves')->with(compact('branch','dept','desg','leave'));
    }
    public function leavelist() 
    {
        $branch=branch::where([['aid','=',SESSION::get('aid')],['status','=','A']])->get();
        $dept=department::where('department.aid','=',Session::get('aid'))
        ->select('branch.name as b_name','department.*')
        ->leftjoin('branch','branch.id','department.bid')
        ->where('department.status','!=','R')
        ->get();
        $desg=designation::where([['aid','=',SESSION::get('aid')],['status','=','A']])->get();
        $leave=leaves::where([['aid','=',SESSION::get('aid')],['status','!=','R']])->get();

        return view::make('/newadmin/pages/admin/leaves/leavelist')->with(compact('leave','branch','dept','desg'));
    }
    public function editleave($id) 
    {
        $aid=Session::get('aid');
        $branch=branch::where('aid','=',$aid)
        ->where('status','!=','R')
        ->get();
        $dept=department::where('department.aid','=',$aid)
        ->select('branch.name as b_name','department.*')
        ->leftjoin('branch','branch.id','department.bid')
        ->where('department.status','!=','R')
        ->get();
        $desg=DB::table('designation')
        ->select('*')
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->get();
        $leave=leaves::where([['aid','=',SESSION::get('aid')],['status','!=','R'],['id','=',$id]])->get();

        return view::make('/newadmin/pages/admin/leaves/edit_leave')->with(compact('leave','branch','dept','desg'));
    }
    public function filter_leave(Request $req)
    {
        $aid=SESSION::get('aid');
        print_r($req->all());
        $leave=leaves::where('aid','=',$aid);
        if($req->branch!='00')
        {
            $leave=$leave->where('branch','like','%'.$req->branch.'%');
        }
        if($req->department!='00')
        {
            $leave=$leave->where('department','like','%'.$req->department.'%');
        }
        if($req->designation!='00')
        {
            $leave=$leave->where('designation','like','%'.$req->designation.'%');
        }
        if($req->status!='00')
        {
            $leave=$leave->where('status','=',$req->status);
        }
        // if (($req->branch!='00') && ($req->department!='00') && ($req->designation!='00') && ($req->status!='00')) {
        // $leave=leaves::where([['aid','=',$aid],['branch','like','%'.$req->branch.'%'],['department','like','%'.$req->department.'%'],['designation','like','%'.$req->designation.'%'],['status','=',$req->status]])->get();
            
        // }elseif(($req->branch!='00') && ($req->department=='00') && ($req->designation=='00') && ($req->status=='00'))
        // {
        // $leave=leaves::where([['aid','=',$aid],['branch','like','%'.$req->branch.'%']])->get();

        // }elseif(($req->branch!='00') && ($req->department!='00') && ($req->designation=='00') && ($req->status=='00'))
        // {
        // $leave=leaves::where([['aid','=',$aid],['branch','like','%'.$req->branch.'%'],['department','like','%'.$req->department.'%']])->get();
            
        // }elseif(($req->branch=='00') && ($req->department!='00') && ($req->designation=='00') && ($req->status!='00'))
        // {
        // $leave=leaves::where([['aid','=',$aid],['department','like','%'.$req->department.'%']])->get();
            
        // }elseif(($req->branch=='00') && ($req->department!='00') && ($req->designation!='00') && ($req->status!='00'))
        // {
        // $leave=leaves::where([['aid','=',$aid],['department','like','%'.$req->department.'%'],['designation','like','%'.$req->designation.'%']])->get();
            
        // }elseif(($req->branch=='00') && ($req->department=='00') && ($req->designation!='00') && ($req->status!='00'))
        // {
        // $leave=leaves::where([['aid','=',$aid],['designation','like','%'.$req->designation.'%']])->get();   
        // }elseif (($req->branch!='00') && ($req->department!='00') && ($req->designation!='00') && ($req->status=='00')) 
        // {
        // $leave=leaves::where([['aid','=',$aid],['branch','like','%'.$req->branch.'%'],['department','like','%'.$req->department.'%'],['designation','like','%'.$req->designation.'%']])->get();
        // }elseif (($req->branch!='00') && ($req->department=='00') && ($req->designation!='00') && ($req->status=='00')) 
        // {
        // $leave=leaves::where([['aid','=',$aid],['branch','like','%'.$req->branch.'%'],['designation','like','%'.$req->designation.'%']])->get();
        // }elseif (($req->branch!='00') && ($req->department=='00') && ($req->designation=='00') && ($req->status!='00')) 
        // {
        // $leave=leaves::where([['aid','=',$aid],['branch','like','%'.$req->branch.'%'],['status','=',$req->status]])->get();
        // }elseif (($req->branch!='00') && ($req->department=='00') && ($req->designation!='00') && ($req->status!='00')) 
        // {
        // $leave=leaves::where([['aid','=',$aid],['branch','like','%'.$req->branch.'%'],['designation','like','%'.$req->designation.'%'],['status','=',$req->status]])->get();
        // }elseif (($req->branch=='00') && ($req->department!='00') && ($req->designation!='00') && ($req->status!='00')) 
        // {
        // $leave=leaves::where([['aid','=',$aid],['department','like','%'.$req->department.'%'],['designation','like','%'.$req->designation.'%'],['status','=',$req->status]])->get();
        // }elseif (($req->branch!='00') && ($req->department=='00') && ($req->designation!='00') && ($req->status!='00')) 
        // {
        // $leave=leaves::where([['aid','=',$aid],['branch','like','%'.$req->branch.'%'],['designation','like','%'.$req->designation.'%'],['status','=',$req->status]])->get();
        // }elseif (($req->branch=='00') && ($req->department!='00') && ($req->designation=='00') && ($req->status!='00')) 
        // {
        // $leave=leaves::where([['aid','=',$aid],['department','like','%'.$req->department.'%'],['status','=',$req->status]])->get();
        // }elseif (($req->branch=='00') && ($req->department=='00') && ($req->designation!='00') && ($req->status!='00')) 
        // {
        // $leave=leaves::where([['aid','=',$aid],['designation','like','%'.$req->designation.'%'],['status','=',$req->status]])->get();
        // }elseif (($req->branch=='00') && ($req->department=='00') && ($req->designation=='00') && ($req->status!='00')) 
        // {
        // $leave=leaves::where([['aid','=',$aid],['status','=',$req->status]])->get();
        // }elseif (($req->branch!='00') && ($req->department=='00') && ($req->designation!='00') && ($req->status=='00')) 
        // {
        // $leave=leaves::where([['aid','=',$aid],['branch','like','%'.$req->branch.'%'],['designation','like','%'.$req->designation.'%']])->get();
        // }else{
        // $leave=leaves::where([['aid','=',$aid],['status','!=','R']])->get();

        // }
        $leave=$leave->get();
        $dept=department::where('aid','=',$aid)
        ->where('status','!=','R')
        ->get();
        $desg=DB::table('designation')
        ->select('*')
        ->where('status','!=','R')
        ->where('aid','=',$aid)
        ->get();
        $branch=branch::where('aid','=',$aid)
        ->where('status','!=','R')
        ->get();
        return view::make('/newadmin/pages/admin/leaves/leavelist')->with(compact('leave','branch','dept','desg'));

    }
   public function empleaverequest_view()
   {
    return view('newadmin/pages/admin/leaves/leaverequest');

   }

   public function add_leaverequest()
   {
    return view('newadmin/pages/admin/leaves/add_leave_request');

   }

   public function edit_leaverequest()
   {
    return view('newadmin/pages/admin/leaves/edit_leave_request');

   }

   // add manual leaves (Admin)
  
   public function manual_leave()
   {
    return view('newadmin/pages/admin/leaves/manual_leave');

   }

   public function add_manual_leave()
   {
    return view('newadmin/pages/admin/leaves/add_manual_leave');

   }

   public function editManual_leave()
   {
    return view('newadmin/pages/admin/leaves/edit_manual_leave');

   }
 

 // outdoor manual entry (admin)
  public function outdoorManual()
   {
    return view('newadmin/pages/admin/outdoor_entry');

   }
   public function addOutdoorManual()
   {
    return view('newadmin/pages/admin/add_outdoor_entry');

   }

   public function editOutdoorManual()
   {
    return view('newadmin/pages/admin/edit_outdoor_entry');

   }
}
