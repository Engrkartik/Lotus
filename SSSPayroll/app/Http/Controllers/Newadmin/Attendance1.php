<?php

namespace App\Http\Controllers\Newadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\login;
use App\Models\employee;
use App\Models\branch;
use App\Models\working_days;
use App\Models\attendances;
use App\Models\department;
use App\Models\designation;
use App\Models\leaves;
use App\Models\leave_details;
use App\Models\attendance_history;
use Carbon\Carbon;
use DB;
use Session;
use Redirect;
use View;
use compact;

class Attendance1 extends Controller
{
    function attendance(Request $req)
    {
        $aid=Session::get('aid');
    	 $data=login::all();
    	// $emp=employee::all();
        // $emp=DB::table('employee')
        //     ->select('employee.*','branch.name as b_name','working_day.week1 as week1','working_day.addon_week as addon_week','working_day.addon_day as addon_day')
        //     ->leftjoin('branch','branch.id','employee.bid')
        //     ->leftjoin('working_day','working_day.bid','branch.id')
        //     ->where('employee.status','!=','R')
        //     ->where('employee.aid','=',$aid)
        //     ->orderby('employee.emp_code','ASC')
        //     ->get();
        $emp=employee::where([['status','=','A'],['aid','=',$aid]])->get();
        $branch=branch::where('aid','=',$aid)
        ->where('status','!=','R')
        ->get();
        $dept=DB::table('department')
        ->select('department.*','branch.name as b_name')
        ->leftjoin('branch','branch.id','department.bid')
        ->where('department.aid','=',$aid)
        ->where('department.status','!=','R')
        ->get();
        $desg=designation::where('aid','=',$aid)
        ->where('status','!=','R')
        ->get();
        return View::make('newadmin/pages/admin/attendance/attendance', compact('data','emp','branch','dept','desg'));
    }
    
    public static function att_report1($id,$dt){
        $aid=Session::get('aid');
        $dt=date('Y-m-d',strtotime($dt));
        $holiday=DB::table('holiday_list')
        ->leftjoin('holiday_group','holiday_group.id','holiday_list.holiday_group')
        ->leftjoin('branch','branch.holiday_group','holiday_group.id')
        ->leftjoin('employee','employee.bid','branch.id')
        ->where([['employee.id','=',$id],['holiday_list.holiday_date','=',$dt]])
        ->get();
        // print_r($holiday);
        if($holiday->count()>0)
        {
            return ['fa fa-calendar-times-o text-holiday','H'];
        }else {
            $week=date('l',strtotime($dt));
            $week_off=DB::table('working_day')
            ->leftjoin('employee','employee.working_plan','working_day.id')
            ->where([['employee.id','=',$id],['working_day.week1','like','%'.$week.'%']])
            ->get();
            if($week_off->count()>0)
            {
                $leave=DB::table('attendance')
            ->leftjoin('employee','employee.id','attendance.emp_id')
            ->where([['employee.id','=',$id],['attendance.punch_type','=','L'],['attendance.punch_time','like','%'.$dt.'%'],['attendance.status','=','A']])
            ->get();
            if($leave->count()>0)
            {
                return ['fa fa-universal-access text-info','L'];
            }else
            {
                $shift=DB::table('shift')
                ->select('shift.shift_name as shift_name','shift.shift_in as shift_in','shift.shift_out as shift_out','shift.full_day as full_day','shift.shift_type as shift_type')
                ->leftjoin('shift_history','shift_history.shift_id','shift.id')
                ->where([['shift.aid','=',$aid],['shift.status','!=','R'],['shift_history.emp_id','=',$id]])
                ->where([['shift_history.effect_from','<=',$dt],['shift_history.effect_to','>=',$dt]])
                ->get();
                if($shift->count()>0)
                {
                // foreach ($shift as $key => $value) {
                    $in_time=DB::table('attendance')->where([['attendance.emp_id','=',$id],['attendance.punch_time','LIKE','%'.$dt.'%'],['attendance.punch_type','=','IN'],['attendance.status','=','A']])
                    ->orderBy('attendance.punch_time','ASC')
                    ->get();
                    $out_time=DB::table('attendance')->where([['attendance.emp_id','=',$id],['attendance.punch_time','LIKE','%'.$dt.'%'],['attendance.punch_type','=','OUT'],['attendance.status','=','A']])
                    ->orderBy('attendance.punch_time','DESC')
                    ->get();
                // }
                if($in_time->count()>0)
                {
                    $in_time=(new self)->minutes(date('H:i:s',strtotime($in_time[0]->punch_time)));
                    // $out_time=(new self)->minutes(date('H:i:s',strtotime($out_time[0]->punch_time)));
                    $shift_in_time=(new self)->minutes($shift[0]->shift_in);
                    if($shift[0]->shift_type=='Time-Based')
                    {
                    $diff=((new self)->minutes($shift[0]->shift_out))-((new self)->minutes($shift[0]->shift_in));
                    // $diff=((new self)->minutes($shift[0]->shift_in))+($min);
                    // $shift_out_time=floor($min / 60).':'.($min -   floor($min / 60) * 60);
                    }else
                    {
                        $diff=((new self)->minutes($shift[0]->full_day));
                        // $shift_out_time=floor($min / 60).':'.($min -   floor($min / 60) * 60);
                    }
                    $shift_out_time=(new self)->minutes($shift[0]->shift_out);
                    if ($in_time<=$shift_in_time) 
                    {
                        if($out_time->count()>0)
                        {
                            $out_time=(new self)->minutes(date('H:i:s',strtotime($out_time[0]->punch_time)));
                            if(($out_time-$in_time)>=$diff)
                            {
                                return ['fa fa-check text-success','P'];
                            }else
                            {
                                // return [$out_time.'-'.$in_time.'-'.$diff,'P'];
                                return ['fa fa-circle-o-notch text-duty','P'];
                            }
                        }
                        else
                            {
                                return ['fa fa-clock-o text-warning','P'];
                            }
                    }
                    else
                    {
                        return ['fa fa-circle-o-notch text-duty','P'];
                    }
                }
                elseif($out_time->count()>0)
                {
                    return ['fa fa-circle-o-notch text-duty','P'];
                }else
                {
                    return ['fa fa-close text-danger','A'];
                }
            }
                else
                {
                    return ['fa fa-close text-danger','A'];
                }
            }
            }else
            {
                return ['fa fa-dot-circle-o text-purple','A'];
            }
        }
       
    }
    public static function activity($e_id,$date,$order,$type)
    {
        $val=0;
        $diff=0;
        $time_in=0;
        $time_out=0;
        $hours=0;
        $i=0;
        $i2=0;
        $chk='';
        $diff_over=0;
        $aid=SESSION::get('aid');
        $act=DB::table('attendance')->where([['attendance.emp_id','=',$e_id],['attendance.punch_time','LIKE','%'.$date.'%'],['attendance.punch_type','=',$type],['attendance.status','=','A']])
        ->orderBy('attendance.punch_time',$order)
        ->take(1)
        ->get();
        $shift=DB::table('shift')
        ->select('shift.id as shift_id','shift.shift_in as shift_in','shift.shift_out as shift_out','shift.overtime_min as min','shift.overtime_max as max')
        ->leftjoin('shift_history','shift_history.shift_id','shift.id')
        ->where([['shift.aid','=',$aid],['shift.status','!=','R'],['shift_history.emp_id','=',$e_id]])
        ->where([['shift_history.effect_from','<=',$date],['shift_history.effect_to','>=',$date]])
        ->get();

        $history=DB::table('attendance')
        ->select('*')
        ->where([['attendance.emp_id','=',$e_id],['attendance.status','=','A']])
        ->where(function($query){
            $query->where('attendance.punch_type','=','IN')
                ->Orwhere('attendance.punch_type','=','OUT');
        })
        ->where(function($qtt) use($date)
        {
            $qtt->where('attendance.punch_time','LIKE',$date.'%');
        })
        ->orderBy('attendance.punch_time','ASC')
        ->get();
          
        
        foreach ($shift as $key => $value) {
            $break=DB::table('break')
            ->select('*')
            ->where([['shift_id','=',$value->shift_id],['aid','=',$aid],['status','!=','R']])
            ->orderBy('break_duration','DESC')
            ->take(1)
            ->get();
            //overtime
        $overtime_last=DB::table('attendance')
        ->select('*')
        ->where([['attendance.emp_id','=',$e_id],['attendance.status','=','A']])
        ->where(function($query){
            $query->where('attendance.punch_type','=','IN')
                ->Orwhere('attendance.punch_type','=','OUT');
        })
        ->where(function($qtt) use($date)
        {
            $qtt->where('attendance.punch_time','LIKE',$date.'%');
        })
        ->orderBy('attendance.punch_time','DESC')
        ->take(1)
        ->get();
        foreach ($overtime_last as $key1 => $value1) {
            $shift_time=(new self)->minutes(date('H:i:s',strtotime($value->shift_out)));
            $punch_time=(new self)->minutes(date('H:i:s',strtotime($value1->punch_time)));
            $over_min=(new self)->minutes(date('H:i:s',strtotime($value->min=='NULL'?$value->max:$value->min)));
            if($value->min!='NULL' || $value->max!='NULL')
            {            
                if($punch_time>$shift_time)
                {
                    $diff_overtime=round($punch_time-$shift_time,0);
                    if($diff_overtime>=$over_min)
                    {
                        $diff_over=floor($diff_overtime / 60).':'.($diff_overtime -   floor($diff_overtime / 60) * 60);
                    }else
                    {
                        $diff_over=0;
                    }
                }
            }else {
                if($punch_time>$shift_time)
                {
                    $diff_overtime=round($punch_time-$shift_time,0);
                    $diff_over=floor($diff_overtime / 60).':'.($diff_overtime -   floor($diff_overtime / 60) * 60);
                }
                else
                {
                    $diff_over=0;

                }
            }
       
        }
        //
            //break
            foreach ($break as $item => $value1) {
                $st=$date.' '.$value1->break_start;
                $end=$date.' '.$value1->break_end;
            $chk=DB::table('attendance')
            ->select('*')
            ->where([['attendance.emp_id','=',$e_id],['attendance.status','=','A']])
            ->where(function($query){
                $query->where('attendance.punch_type','=','IN')
                    ->Orwhere('attendance.punch_type','=','OUT');
            })
            ->where(function($qtt) use($st,$end)
            {
                $qtt->where('attendance.punch_time','>=',$st)
                    ->where('attendance.punch_time','<=',$end);
            })
            ->orderBy('attendance.punch_time','ASC')
            ->get();
            foreach ($chk as $key => $value) {
                $i2=$chk->count();
                $i++;
                if($chk[0]->punch_type=='IN')
                {
                }else
                {
                   if($value->punch_type=='OUT')
                   {
                       $out=$date.' '.date('H:i:s',strtotime($value->punch_time));
                       $time_out=(new self)->minutes(date('H:i:s',strtotime($value->punch_time)));
                      
                   }else
                   {
                    $time_in=(new self)->minutes(date('H:i:s',strtotime($value->punch_time)));
                   }
                   if($time_in>0 && $time_out>0)
                   {
                        $diff=$time_in - $time_out;
                        $time_in=0;
                        $time_out=0;
                        $val+=$diff;
                   }else {
                       if(($i==$chk->count()) && ($chk[$i-1]->punch_type=='OUT'))
                       {
                        $chk2=DB::table('attendance')
                        ->select('*')
                        ->where([['attendance.emp_id','=',$e_id],['attendance.status','=','A']])
                        ->where(function($query){
                            $query->where('attendance.punch_type','=','IN');
                        })
                        ->where(function($qtt) use($out)
                        {
                            $qtt->where('attendance.punch_time','>=',$out);
                        })
                        ->orderBy('attendance.punch_time','ASC')
                        ->take(1)
                        ->get();
                        foreach($chk2 as $item=>$data)
                        {
                        $time_in=(new self)->minutes(date('H:i:s',strtotime($data->punch_time)));
                        $diff=$time_in - $time_out;
                        $time_in=0;
                        $time_out=0;
                        $val+=$diff;
                        }
                       }
                   } 
                   $hours = floor($val / 60).':'.($val -   floor($val / 60) * 60);
                }
            }
            }
        }
        
        return [$act,$hours,$history,$diff_over];
    }
    function att_branch(Request $req)
    {
        $aid=Session::get('aid');
        $data=login::all();
        if(($req->yr_mon=="") && ($req->bid>0))
         {
        $emp=DB::table('employee')
            ->select('employee.*')
            ->where([
                    ['employee.aid','=',$aid],
                    ['employee.bid','=',$req->bid],
                    ['employee.status','!=','R']
                ],)
            ->orderby('employee.emp_code','ASC')
            ->get();
        }
        elseif(($req->yr_mon!="") && ($req->bid=='00'))
         {
            $from=$req->yr_mon.'-01';
            $to=$req->yr_mon.'-31';
            $emp=DB::table('employee')
            ->select('employee.*')
            ->leftjoin('attendance','attendance.emp_id','employee.id')
            ->where([
                    ['employee.aid','=',$aid],
                    ['attendance.punch_time','>=',$from],
                    ['attendance.punch_time','<=',$to],
                    ['employee.status','!=','R'],
                    ['attendance.status','=','A']
                ],)
            ->orderby('employee.emp_code','ASC')
            ->get();
         }else
         {
            $from=$req->yr_mon.'-01';
            $to=$req->yr_mon.'-31';
            $emp=DB::table('employee')
            ->select('employee.*')
            ->leftjoin('attendance','attendance.emp_id','employee.id')
            ->where([
                    ['employee.aid','=',$aid],
                    ['employee.bid','=',$req->bid],
                    ['attendance.punch_time','>=',$from],
                    ['attendance.punch_time','<=',$to],
                    ['employee.status','!=','R'],
                    ['attendance.status','=','A']
                ],)
            ->orderby('employee.emp_code','ASC')
            ->get();
         }
        $branch=branch::where('aid','=',$aid)
        ->where('status','!=','R')
        ->get();
        // $html = view('newadmin/pages/attendance/attendance', compact('data','emp','branch'))->render();
        if($emp->count()>0)
        {
            return response()->json(['bid'=>$req->bid,'status'=>true,'mon'=>$req->yr_mon]);
        }else
        {
            return response()->json(['bid'=>$emp->count(),'status'=>false]);
        }
       
    }
     function attendance_f($id,$val,$dept,$desg)
    {
        $aid=Session::get('aid');
         $data=login::all();
        // $emp=employee::all();
        $emp=employee::where([['employee.status','=','A'],['employee.aid','=',$aid]])
        ->orderby('employee.id','ASC')
        ->groupBy('employee.id');

         if($id!='00' && $id!='all')
         {
            $emp=$emp->where('bid','=',$id);
         }
         if($dept!='00')
         {
            $emp=$emp->where('dept_id','=',$dept);
         }
         if($desg!='00')
         {
            $emp=$emp->where('designation','=',$desg);
         }
         $emp=$emp->get();
        $branch=branch::where('aid','=',$aid)
        ->where('status','!=','R')
        ->get();
        $dept=DB::table('department')
        ->select('department.*','branch.name as b_name')
        ->leftjoin('branch','branch.id','department.bid')
        ->where('department.aid','=',$aid)
        ->where('department.status','!=','R')
        ->get();
        $desg=designation::where('aid','=',$aid)
        ->where('status','!=','R')
        ->get();
        // print_r($emp);
        return View::make('newadmin/pages/admin/attendance/attendance', compact('data','emp','branch','dept','desg'));
    }
    // public static function get_weekdays($bid)
    // {
    //     $weekdays=DB::table('working_day')->select('*')->where([['bid','=',$bid],['status','=','A']])->first();
    //     return ['week1',$weekdays];
    // }

    // ATTENDANCE BULK EDIT
    public function attendance_edit(Request $req)
    {
        // print_r($req->all());
        $branch=branch::where([['aid','=',Session::get('aid')],['status','!=','R']])->get();
        $leave=leaves::where([['aid','=',Session::get('aid')],['status','!=','R']])->get();
        $dept=DB::table('department')
        ->select('department.*','branch.name as b_name')
        ->leftjoin('branch','branch.id','department.bid')
        ->where([['department.aid','=',Session::get('aid')],['department.status','!=','R']])
        ->get();
        $desg=designation::where([['aid','=',Session::get('aid')],['status','!=','R']])->get();
        $emp=DB::table('employee as A')
        ->select('A.*','branch.name as b_name','department.name as dept_name','B.emp_name as report_to')
        ->leftjoin('branch','branch.id','A.bid')
        ->leftjoin('employee as B','B.id','A.reporting_manager')
        ->leftjoin('department','department.id','A.dept_id')
        ->where([['A.aid','=',Session::get('aid')],['A.status','=','A']])
        ->groupBy('A.id');
        $arr1=$req->branches;
        $arr2=$req->departments;
        $arr3=$req->designation;
        $arr4=$req->c_date;
        $arr5=$req->checkin;
        $arr6=$req->checkout;
        $arr7=$req->isabsent;
        if(isset($req->branches))
        {
            $emp=$emp->whereIn('A.bid',$req->branches);
        }
        if(isset($req->departments))
        {
            $emp=$emp->whereIn('A.dept_id',$req->departments);
        }
        if(isset($req->designation))
        {
            $emp=$emp->whereIn('A.designation',$req->designation);
        }
       
        if($req->isabsent=='on')
        {
            $from=$req->c_date;
            $emp=$emp->whereNotIn('A.id',function($query) use($from)
            {
                $query->select('attendance.emp_id')
                ->from('attendance')
                ->where([['attendance.punch_time','LIKE',$from.'%'],['attendance.status','=','A']])
                ->groupBy('attendance.emp_id');
            });
        }else
        {
            if($req->ispresent=='on')
            {
            if(!empty($req->c_date))
            {
                $emp=$emp->leftjoin('attendance','attendance.emp_id','A.id')
                         ->where([['attendance.punch_time','LIKE',$req->c_date.'%'],['attendance.status','=','A']]);
            }
            }
        if(!empty($req->checkin))
        {
            $from=$req->c_date;
            $emp=$emp->where(function($q) use($from)
            {
                $q->select('attendance.punch_time')->from('attendance')
                ->where([['attendance.punch_time','LIKE',$from.'%'],['attendance.punch_type','=','IN'],['attendance.status','=','A']])
                ->whereColumn('attendance.emp_id','A.id')
                ->take(1)
                ->orderBy('attendance.punch_time','ASC');
            },'>=',$req->c_date.' '.$req->checkin.':00');
            $emp=$emp->where(function($q2) use($from)
            {
                $q2->from('attendance')->select('punch_time')
                ->where([['attendance.punch_time','LIKE',$from.'%'],['attendance.punch_type','=','IN'],['attendance.status','=','A']])
                ->whereColumn('attendance.emp_id','A.id')
                ->take(1)
                ->orderBy('attendance.punch_time','ASC');
            },'<=',$req->c_date.' '.'23:59:00');
        }
        if(!empty($req->checkout))
        {
            $from=$req->c_date;
            $emp=$emp->where(function($q) use($from)
            {
                $q->from('attendance')->select('attendance.punch_time')
                ->where([['attendance.punch_time','LIKE',$from.'%'],['attendance.punch_type','=','OUT'],['attendance.status','=','A']])
                ->whereColumn('attendance.emp_id','A.id')
                ->take(1)
                ->orderBy('attendance.punch_time','ASC');
            },'>=',$req->c_date.' '.'00:00:00');
            $emp=$emp->where(function($q2) use($from)
            {
                $q2->from('attendance')->select('attendance.punch_time')
                ->where([['attendance.punch_time','LIKE',$from.'%'],['attendance.punch_type','=','OUT'],['attendance.status','=','A']])
                ->whereColumn('attendance.emp_id','A.id')
                ->take(1)
                ->orderBy('attendance.punch_time','ASC');
            },'<=',$req->c_date.' '.$req->checkout.':00');
        }
    }
        $emp=$emp->get();
        // print_r($emp);
        return view('newadmin/pages/admin/attendance/attendanceedit')->with(compact('leave','branch','dept','desg','emp','arr1','arr2','arr3','arr4','arr5','arr6','arr7'));
 
    }
    function minutes($time){
        $time = explode(':', $time);
        // return $time;
        return ($time[0]*60) + ($time[1]) + ($time[2]/60);
        }
    public function filter_dept(Request $req)
    {
            $html='';
            $dept=DB::table('department')
            ->select('department.*','branch.name as b_name')
            ->leftjoin('branch','branch.id','department.bid')
            ->where([['department.aid','=',SESSION::get('aid')],['department.status','=','A']])
            ->whereIN('department.bid',$req->branch)->get();
                $style='';
                foreach ($dept as $key => $value) {
                    if($req->arr2!='NULL') 
                    {
                        for($i=0;$i< sizeof($req->arr2);$i++)
                        {
                             if($req->arr2[$i]==($value->id)) 
                             {
                                 $style='selected="selected"'; 
                             }else {
                                 $style='';
                             }
                        }
                    $html.='<option value="'.$value->id.'" '.$style.'>'.$value->name.'<i> ( '.$value->b_name.' ) </i></option>';
                                        
                    }else{
                        $html.='<option value="'.$value->id.'">'.$value->name.'<i> ( '.$value->b_name.' ) </i></option>';
                    }
                    // $html.='<option value="'.$value->id.'" @for($i=0;$i< sizeof($arr2);$i++) @if($arr2[$i]==($value->id)) selected="selected" @endif @endfor>'.$value->name.'<i> ( '.$value->b_name.' ) </i></option>';
                    // $html.='<option value="'.$value->id.'">'.$value->name.'<i> ( '.$value->b_name.' ) </i></option>';
                }
        return response()->json(['data'=>$html,'status'=>'true']);
    }
    public function update_attendance_edit(Request $req)
    {
        if($req->type=='leave')
        {
            if(!empty($req->leave))
            {
                $duplicate=array();
                $zero_bal=array();
                $duplicate=[];
                $zero_bal=[];
                for ($i=0; $i <sizeof($req->emp) ; $i++) 
                { 
                    $from=$req->cdate;
                    $to=$req->cdate;
                    $emp_bal_chk=leave_details::where('emp_id','=',$req->emp[$i])
                    ->where(function($main_q) use ($from,$to){
                        $main_q->where([['from_date','<=',$from],['to_date','>=',$to]])
                        ->Orwhere(function($main_q1) use($from,$to){
                            $main_q1->OrwhereBetween('from_date',[$from,$to]);
                        })
                        ->Orwhere(function($main_q2) use($from,$to){
                            $main_q2->OrwhereBetween('to_date',[$from,$to]);
                        });
                    })->get();
                    if($emp_bal_chk->count()>0)
                    {
                        foreach ($emp_bal_chk as $key => $value) {
                            array_push($duplicate,$value->name);
                        }

                    }
                else
                {
                    $emp_name='';
                    $leave_bal=0;
                    $leave_taken=0;
                    $emp_det=employee::where('id','=',$req->emp[$i])->get();
                    $emp_bal=leave_details::where([['emp_id','=',$req->emp[$i]],['leave_type','=',$req->leave]])
                    ->orderBy('id','DESC')
                    ->take(1)
                    ->get();
                    if($emp_bal->count()>0)
                    {
                        foreach ($emp_det as $key => $value) 
                        {
                            $emp_name=$value->emp_name;
                        }
                        foreach ($emp_bal as $key => $value) 
                        {
                            $leave_bal=$value->leave_bal;
                            $leave_taken=$value->leave_taken;
                        }
                    }
                    else 
                    {
                        foreach ($emp_det as $key => $value) 
                        {
                            $emp_name=$value->emp_name;
                        
                            $emp_bal=leaves::where([['id','=',$req->leave],['branch','LIKE','%'.$value->bid.'%'],['department','LIKE','%'.$value->dept_id.'%'],['designation','LIKE','%'.$value->designation.'%']])
                            ->get();

                            foreach ($emp_bal as $key => $value) 
                            {
                                $leave_bal=$value->max_leave;
                            }
                        }
                    }
                    if($emp_bal->count()>0)
                    {
                        $insert=new leave_details;
                        $insert->aid=Session::get('aid');
                        $insert->emp_id=$req->emp[$i];           
                        $insert->name=$emp_name;           
                        $insert->leave_type=$req->leave;           
                        $insert->leave_bal=$leave_bal-1;          
                        $insert->leave_taken=$leave_taken+1;          
                        $insert->no_of_leaves=1;          
                        $insert->from_date=$req->cdate;          
                        $insert->to_date=$req->cdate;    
                        $insert->status='Accept';    
                        $insert->remark=$req->remark;
                        $result=$insert->save();    
                        if(!$result)
                        {
                        return response()->json(['status'=>'false']); 
                        break;
                        }
                        else 
                        {
                            $att=new attendances;
                            $att->aid=Session::get('aid');
                            $att->emp_id=$req->emp[$i];
                            $att->punch_type='L';
                            $att->punch_time=date('Y-m-d H:i:s',strtotime($req->cdate));
                            $result2=$att->save();
                            if($result2)
                            {
                                $his=new attendance_history;
                                $his->aid=Session::get('aid');
                                $his->emp_id=$req->emp[$i];
                                $his->update_by=session()->has('emp_id')?Session::get('emp_id'):0;
                                $his->update_type='L';
                                $his->update_row=$att->id;
                                $his->remark=$req->remark;
                                $result3=$his->save();
                            }
                        }
                    }else
                    {
                        array_push($zero_bal,$emp_name);
                    }
                }
            }
                $data=array();
                $data=array('duplicate'=>$duplicate,
                            'zero'=>$zero_bal,);
                    if(sizeof($duplicate)>0 || sizeof($zero_bal)>0)
                    {
                        return response()->json(['status'=>'dupl','data'=>json_encode($data)]); 
                    }else
                    {
                    return response()->json(['status'=>'true']); 
                    }
                    
            }
        }elseif($req->type=='mark_p_a')
        {
            //present 
            if($req->attendance=='Present' )
            {
                $emp_chk=array();
                for ($i=0; $i <sizeof($req->emp) ; $i++) 
                { 
                    $shift=DB::table('shift')
                    ->select('shift.shift_name as shift_name','shift.shift_in as shift_in','shift.shift_out as shift_out','shift.shift_type as shift_type','shift.full_day as full_day','shift.half_day as half_day')
                    ->leftjoin('shift_history','shift_history.shift_id','shift.id')
                    ->where([['shift.aid','=',Session::get('aid')],['shift.status','!=','R'],['shift_history.emp_id','=',$req->emp[$i]]])
                    ->where([['shift_history.effect_from','<=',$req->cdate],['shift_history.effect_to','>=',$req->cdate]])
                    ->get();
                    foreach ($shift as $key => $value) 
                    {
                        
                            
                       
                        if($req->duration=='full')
                        {
                            
                            if($value->shift_type=='Time-Based')
                            {
                            $min=((new self)->minutes($value->shift_out))-((new self)->minutes($value->shift_in));
                            $min=((new self)->minutes($value->shift_in))+($min);
                            $new_time=floor($min / 60).':'.($min -   floor($min / 60) * 60);
                            }else
                            {
                                $min=((new self)->minutes($value->shift_in))+((new self)->minutes($value->full_day));
                                $new_time=floor($min / 60).':'.($min -   floor($min / 60) * 60);
                            }
                            $att_chk_in=attendances::where([['emp_id','=',$req->emp[$i]],['punch_type','=','IN'],['attendance.status','=','A']])
                            ->whereDate('punch_time','=',$req->cdate)
                            ->whereTime('punch_time','<=',$value->shift_in)
                            ->orderBy('punch_time','ASC')
                            ->take(1)
                            ->get();
                            $att_chk_out=attendances::where([['emp_id','=',$req->emp[$i]],['punch_type','=','OUT'],['attendance.status','=','A']])
                                ->whereDate('punch_time','=',$req->cdate)
                                ->whereTime('punch_time','>=',$new_time)
                                ->orderBy('punch_time','DESC')
                                ->take(1)
                                ->get();
                            if($att_chk_in->count()==0)
                            {
                                $att=new attendances;
                                $att->aid=Session::get('aid');
                                $att->emp_id=$req->emp[$i];
                                $att->punch_type='IN';
                                $att->punch_time=$req->cdate.' '.$value->shift_in;
                                $result2=$att->save();
                                if($result2)
                                {
                                    $his=new attendance_history;
                                    $his->aid=Session::get('aid');
                                    $his->emp_id=$req->emp[$i];
                                    $his->update_by=session()->has('emp_id')?Session::get('emp_id'):0;
                                    $his->update_type='IN';
                                    $his->update_row=$att->id;
                                    $his->remark=$req->remark;
                                    $result3=$his->save();
                                }     
                            }
                                
                            if($att_chk_out->count()==0 )
                            {
                                $att=new attendances;
                                $att->aid=Session::get('aid');
                                $att->emp_id=$req->emp[$i];
                                $att->punch_type='OUT';
                                $att->punch_time=$req->cdate.' '.$new_time;
                                $result2=$att->save();
                                if($result2)
                                {
                                    $his=new attendance_history;
                                    $his->aid=Session::get('aid');
                                    $his->emp_id=$req->emp[$i];
                                    $his->update_by=session()->has('emp_id')?Session::get('emp_id'):0;
                                    $his->update_type='OUT';
                                    $his->update_row=$att->id;
                                    $his->remark=$req->remark;
                                    $result3=$his->save();
                                }     
                            }
                            $upd=attendances::where([['emp_id','=',$req->emp[$i]],['attendance.status','=','A']])
                            ->whereDate('punch_time','=',$req->cdate)
                            ->whereTime('punch_time','>',$value->shift_in)
                            ->whereTime('punch_time','<',$new_time)
                            ->update(array('status'=>'R'));
                        }
                        //1st half present
                        elseif($req->duration=='1sthalf')
                        {
                            if($value->shift_type=='Time-Based')
                            {
                            $min=((new self)->minutes($value->shift_out))-((new self)->minutes($value->shift_in));
                            $min=((new self)->minutes($value->shift_in))+($min/2);
                            $new_time=floor($min / 60).':'.($min -   floor($min / 60) * 60);
                            }else
                            {
                                $min=((new self)->minutes($value->shift_in))+((new self)->minutes($value->half_day));
                                $new_time=floor($min / 60).':'.($min -   floor($min / 60) * 60);
                            }
                            $att_chk_in=attendances::where([['emp_id','=',$req->emp[$i]],['punch_type','=','IN'],['attendance.status','=','A']])
                            ->whereDate('punch_time','=',$req->cdate)
                            ->whereTime('punch_time','<=',$value->shift_in)
                            ->orderBy('punch_time','ASC')
                            ->take(1)
                            ->get();
                            $att_chk_out=attendances::where([['emp_id','=',$req->emp[$i]],['punch_type','=','OUT'],['attendance.status','=','A']])
                                ->whereDate('punch_time','=',$req->cdate)
                                ->whereTime('punch_time','>=',$new_time)
                                ->orderBy('punch_time','DESC')
                                ->take(1)
                                ->get();
                            //if no entry of 1st half IN
                            if($att_chk_in->count()==0)
                            {
                                $att=new attendances;
                                $att->aid=Session::get('aid');
                                $att->emp_id=$req->emp[$i];
                                $att->punch_type='IN';
                                $att->punch_time=$req->cdate.' '.$value->shift_in;
                                $result2=$att->save();
                                if($result2)
                                {
                                    $his=new attendance_history;
                                    $his->aid=Session::get('aid');
                                    $his->emp_id=$req->emp[$i];
                                    $his->update_by=session()->has('emp_id')?Session::get('emp_id'):0;
                                    $his->update_type='IN';
                                    $his->update_row=$att->id;
                                    $his->remark=$req->remark;
                                    $result3=$his->save();
                                }     
                            }
                            //if no entry of OUT
                            if($att_chk_out->count()==0)
                            {
                                $att=new attendances;
                                $att->aid=Session::get('aid');
                                $att->emp_id=$req->emp[$i];
                                $att->punch_type='OUT';
                                $att->punch_time=$req->cdate.' '.$new_time;
                                $result2=$att->save();
                                if($result2)
                                {
                                    $his=new attendance_history;
                                    $his->aid=Session::get('aid');
                                    $his->emp_id=$req->emp[$i];
                                    $his->update_by=session()->has('emp_id')?Session::get('emp_id'):0;
                                    $his->update_type='OUT';
                                    $his->update_row=$att->id;
                                    $his->remark=$req->remark;
                                    $result3=$his->save();
                                }     
                            }
                            //if whole day is present but 1st half is present
                            else
                            {
                                $att=new attendances;
                                $att->aid=Session::get('aid');
                                $att->emp_id=$req->emp[$i];
                                $att->punch_type='OUT';
                                $att->punch_time=$req->cdate.' '.$new_time;
                                $result2=$att->save();
                                if($result2)
                                {
                                    $his=new attendance_history;
                                    $his->aid=Session::get('aid');
                                    $his->emp_id=$req->emp[$i];
                                    $his->update_by=session()->has('emp_id')?Session::get('emp_id'):0;
                                    $his->update_type='OUT';
                                    $his->update_row=$att->id;
                                    $his->remark=$req->remark;
                                    $result3=$his->save();
                                }   
                                $upd=attendances::where([['emp_id','=',$req->emp[$i]],['attendance.status','=','A']])
                                ->where('id','!=',$att->id)
                                ->whereDate('punch_time','=',$req->cdate)
                                ->whereTime('punch_time','>',$new_time)
                                ->update(array('status'=>'R'));
                            }

                        }
                        elseif($req->duration=='2ndhalf')
                        {
                            if($value->shift_type=='Time-Based')
                            {
                            $min=((new self)->minutes($value->shift_out))-((new self)->minutes($value->shift_in));
                            $min=((new self)->minutes($value->shift_in))+($min/2);
                            $new_time=$value->shift_out;
                            $new_time_t=floor($min / 60).':'.($min -   floor($min / 60) * 60);
                            }else
                            {
                                $min_t=((new self)->minutes($value->shift_in))+((new self)->minutes($value->half_day));
                                $new_time_t=floor($min_t / 60).':'.($min_t -   floor($min_t / 60) * 60);

                                $min=((new self)->minutes($value->shift_in))+((new self)->minutes($value->full_day));
                                $new_time=floor($min / 60).':'.($min -   floor($min / 60) * 60);
                            }
                            $att_chk_in=attendances::where([['emp_id','=',$req->emp[$i]],['punch_type','=','IN'],['attendance.status','=','A']])
                            ->whereDate('punch_time','=',$req->cdate)
                            ->whereTime('punch_time','<=',$new_time_t)
                            ->orderBy('punch_time','ASC')
                            ->take(1)
                            ->get();
                            $att_chk_out=attendances::where([['emp_id','=',$req->emp[$i]],['punch_type','=','OUT'],['attendance.status','=','A']])
                                ->whereDate('punch_time','=',$req->cdate)
                                ->whereTime('punch_time','>=',$new_time)
                                ->orderBy('punch_time','DESC')
                                ->take(1)
                                ->get();
                            //if no entry of 1st half IN
                            if($att_chk_out->count()==0)
                            {
                                $att=new attendances;
                                $att->aid=Session::get('aid');
                                $att->emp_id=$req->emp[$i];
                                $att->punch_type='OUT';
                                $att->punch_time=$req->cdate.' '.$new_time;
                                $result2=$att->save();
                                if($result2)
                                {
                                    $his=new attendance_history;
                                    $his->aid=Session::get('aid');
                                    $his->emp_id=$req->emp[$i];
                                    $his->update_by=session()->has('emp_id')?Session::get('emp_id'):0;
                                    $his->update_type='OUT';
                                    $his->update_row=$att->id;
                                    $his->remark=$req->remark;
                                    $result3=$his->save();
                                }     
                            }
                            //if no entry of IN
                            if($att_chk_in->count()==0)
                            {
                                $att=new attendances;
                                $att->aid=Session::get('aid');
                                $att->emp_id=$req->emp[$i];
                                $att->punch_type='IN';
                                $att->punch_time=$req->cdate.' '.$new_time_t;
                                $result2=$att->save();
                                if($result2)
                                {
                                    $his=new attendance_history;
                                    $his->aid=Session::get('aid');
                                    $his->emp_id=$req->emp[$i];
                                    $his->update_by=session()->has('emp_id')?Session::get('emp_id'):0;
                                    $his->update_type='IN';
                                    $his->update_row=$att->id;
                                    $his->remark=$req->remark;
                                    $result3=$his->save();
                                }     
                            }
                            //if whole day is present but 1st half is present
                            else
                            {
                                $att=new attendances;
                                $att->aid=Session::get('aid');
                                $att->emp_id=$req->emp[$i];
                                $att->punch_type='IN';
                                $att->punch_time=$req->cdate.' '.$new_time_t;
                                $result2=$att->save();
                                if($result2)
                                {
                                    $his=new attendance_history;
                                    $his->aid=Session::get('aid');
                                    $his->emp_id=$req->emp[$i];
                                    $his->update_by=session()->has('emp_id')?Session::get('emp_id'):0;
                                    $his->update_type='IN';
                                    $his->update_row=$att->id;
                                    $his->remark=$req->remark;
                                    $result3=$his->save();
                                }   
                                $upd=attendances::where([['emp_id','=',$req->emp[$i]],['attendance.status','=','A']])
                                ->where('id','!=',$att->id)
                                ->whereDate('punch_time','=',$req->cdate)
                                ->whereTime('punch_time','<',$new_time)
                                ->update(array('status'=>'R'));
                            }

                        }
                                // foreach ($att_chk_in as $keys => $values) 
                                // {
                                    array_push($emp_chk,$att_chk_out->count());
                                // }
                        
                    }
                }
                return response()->json(['status'=>'true','data'=>json_encode($emp_chk)]);
            }
            //end present
            //absent
            else if($req->attendance=='absent' )
            {
                $emp_chk=array();
                for ($i=0; $i <sizeof($req->emp) ; $i++) 
                { 
                    $shift=DB::table('shift')
                    ->select('shift.shift_name as shift_name','shift.shift_in as shift_in','shift.shift_out as shift_out','shift.shift_type as shift_type','shift.full_day as full_day','shift.half_day as half_day')
                    ->leftjoin('shift_history','shift_history.shift_id','shift.id')
                    ->where([['shift.aid','=',Session::get('aid')],['shift.status','!=','R'],['shift_history.emp_id','=',$req->emp[$i]]])
                    ->where([['shift_history.effect_from','<=',$req->cdate],['shift_history.effect_to','>=',$req->cdate]])
                    ->get();
                    foreach ($shift as $key => $value) 
                    {
                        
                        if($req->duration=='full')
                        {
                            $upd=attendances::where([['emp_id','=',$req->emp[$i]],['attendance.status','=','A']])
                            ->whereDate('punch_time','=',$req->cdate)
                            ->get();
                            foreach ($upd as $keyss => $data) 
                            {
                                $update=attendances::where('id','=',$data->id)
                                ->update(array('status'=>'R'));
                                if($update)
                                {
                                    $his=new attendance_history;
                                        $his->aid=Session::get('aid');
                                        $his->emp_id=$data->emp_id;
                                        $his->update_by=session()->has('emp_id')?Session::get('emp_id'):0;
                                        $his->update_type='A';
                                        $his->update_row=$data->id;
                                        $his->remark=$req->remark;
                                        $result3=$his->save();
                                }                            
                            }

                           
                        }
                       // 1st half present
                        elseif($req->duration=='1sthalf')
                        {
                            if($value->shift_type=='Time-Based')
                            {
                            $min=((new self)->minutes($value->shift_out))-((new self)->minutes($value->shift_in));
                            $min=((new self)->minutes($value->shift_in))+($min/2);
                            $new_time=floor($min / 60).':'.($min -   floor($min / 60) * 60);
                            // $min1=((new self)->minutes($value->shift_out));
                            $new_time_t=$value->shift_out;
                            }else
                            {
                                $min=((new self)->minutes($value->shift_in))+((new self)->minutes($value->half_day));
                                $new_time=floor($min / 60).':'.($min -   floor($min / 60) * 60);
                                $min1=((new self)->minutes($value->shift_in))+((new self)->minutes($value->full_day));
                                $new_time_t=floor($min1 / 60).':'.($min1 -   floor($min1 / 60) * 60);
                            }
                            $upd=attendances::where('emp_id','=',$req->emp[$i])
                            ->whereDate('punch_time','=',$req->cdate)
                            ->whereTime('punch_time','<=',$new_time)
                            ->get();
                            array_push($emp_chk,$new_time_t);
                            $att=new attendances;
                            $att->aid=Session::get('aid');
                            $att->emp_id=$req->emp[$i];
                            $att->punch_type='IN';
                            $att->punch_time=$req->cdate.' '.$new_time;
                            $result2=$att->save();
                            if($result2)
                            {
                                $his=new attendance_history;
                                $his->aid=Session::get('aid');
                                $his->emp_id=$req->emp[$i];
                                $his->update_by=session()->has('emp_id')?Session::get('emp_id'):0;
                                $his->update_type='IN';
                                $his->update_row=$att->id;
                                $his->remark=$req->remark;
                                $result3=$his->save();
                            }
                            foreach ($upd as $keyss => $data) 
                            {
                                $update=attendances::where('id','=',$data->id)
                                ->whereTime('punch_time','<',$new_time)
                                ->update(array('status'=>'R'));
                                $update2=attendances::where('emp_id','=',$data->emp_id)
                                ->whereTime('punch_time','>',$new_time)
                                ->update(array('status'=>'A'));
                                if($update)
                                {
                                    $his=new attendance_history;
                                        $his->aid=Session::get('aid');
                                        $his->emp_id=$data->emp_id;
                                        $his->update_by=session()->has('emp_id')?Session::get('emp_id'):0;
                                        $his->update_type='A';
                                        $his->update_row=$data->id;
                                        $his->remark=$req->remark;
                                        $result3=$his->save();
                                }
                                
                            }

                        }
                        elseif($req->duration=='2ndhalf')
                        {
                            if($value->shift_type=='Time-Based')
                            {
                            $min=((new self)->minutes($value->shift_out))-((new self)->minutes($value->shift_in));
                            $min=((new self)->minutes($value->shift_in))+($min/2);
                            //mid time
                            $new_time=floor($min / 60).':'.($min -   floor($min / 60) * 60);
                            // $min1=((new self)->minutes($value->shift_out));
                            $new_time_t=$value->shift_out;
                            }else
                            {
                                $min=((new self)->minutes($value->shift_in))+((new self)->minutes($value->half_day));
                            //mid time
                                $new_time=floor($min / 60).':'.($min -   floor($min / 60) * 60);
                                $min1=((new self)->minutes($value->shift_in))+((new self)->minutes($value->full_day));
                                $new_time_t=floor($min1 / 60).':'.($min1 -   floor($min1 / 60) * 60);
                            }
                            $upd=attendances::where('emp_id','=',$req->emp[$i])
                            ->whereDate('punch_time','=',$req->cdate)
                            ->whereTime('punch_time','>',$new_time)
                            ->get();
                            array_push($emp_chk,$new_time_t);
                            $att=new attendances;
                            $att->aid=Session::get('aid');
                            $att->emp_id=$req->emp[$i];
                            $att->punch_type='OUT';
                            $att->punch_time=$req->cdate.' '.$new_time;
                            $result2=$att->save();
                            if($result2)
                            {
                                $his=new attendance_history;
                                $his->aid=Session::get('aid');
                                $his->emp_id=$req->emp[$i];
                                $his->update_by=session()->has('emp_id')?Session::get('emp_id'):0;
                                $his->update_type='OUT';
                                $his->update_row=$att->id;
                                $his->remark=$req->remark;
                                $result3=$his->save();
                            }
                            foreach ($upd as $keyss => $data) 
                            {
                                $update=attendances::where('id','=',$data->id)
                                ->where('punch_time','>',$new_time)
                                ->update(array('status'=>'R'));
                                $update2=attendances::where('emp_id','=',$data->emp_id)
                                ->whereTime('punch_time','<=',$new_time)
                                ->update(array('status'=>'A'));
                                if($update)
                                {
                                    $his=new attendance_history;
                                        $his->aid=Session::get('aid');
                                        $his->emp_id=$data->emp_id;
                                        $his->update_by=session()->has('emp_id')?Session::get('emp_id'):0;
                                        $his->update_type='A';
                                        $his->update_row=$data->id;
                                        $his->remark=$req->remark;
                                        $result3=$his->save();
                                }
                               
                            }

                        }
                      
                        
                    }
                }
                return response()->json(['status'=>'true','data'=>json_encode($emp_chk)]);
            }
            //end absent
        }
        else
        {
        return response()->json(['status'=>$req->all()]);
        }
    }
}
