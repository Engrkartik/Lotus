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
use App\Models\shift;
use App\Models\rules;
use App\Models\shift_history;
use App\Models\shift_break;
use Carbon\Carbon;
use DB;
use DateTime;
use Session;
use Redirect;
use View;
use compact;

class Shift_Con extends Controller
{
     public function index()
    {
        return view('/newadmin/pages/admin/shift/shift');
    }
    public function shiftcheck()
    {
        return view('/newadmin/pages/admin/shift/shiftcheck');
    }
    // EDIT SHIFT
    public function editshift($id)
    {
        $rule_shift=DB::table('shift')
        ->leftjoin('rules','rules.rule_id','shift.id')
        ->select('rules.id','rules.rule_id','rules.type','rules.ruleday','rules.rulestatus','rules.rulereport','rules.ruleafterbefore','rules.shift_time','rules.status','shift.id as shift_id','shift.aid','shift.shift_name','shift.shift_type','shift.shift_in','shift.shift_out','shift.full_day','shift.half_day','shift.grace_time','shift.overtime_min','shift.overtime_max','shift.wo_holi_overtime','shift.status as shift_status')
        ->where([['shift.aid','=',SESSION::get('aid')],['shift.id','=',$id],['rules.type','=','shift']])
        ->get();
        $rule_break=DB::table('break')
        ->leftjoin('rules','rules.rule_id','break.id')
        ->select('rules.id','rules.rule_id','rules.type','rules.ruleday','rules.rulestatus','rules.rulereport','rules.ruleafterbefore','rules.shift_time','rules.status','break.break_name','break.break_duration','break.break_start','break.break_end','break.status as shift_status')
        ->where([['break.aid','=',SESSION::get('aid')],['break.shift_id','=',$id],['rules.type','=','break']])
        ->get();
        $shift=shift::where([['shift.aid','=',SESSION::get('aid')],['shift.id','=',$id]])->get();
        $break=shift_break::where([['break.aid','=',SESSION::get('aid')],['break.shift_id','=',$id]])->get();
        return view('/newadmin/pages/admin/shift/editshift')->with(compact('rule_shift','shift','rule_break','break'));
    }

     // EDIT SHIFT
     public function shiftcalender($dt,$type)
     {
        //  print_r($dt);
         $aid=SESSION::get('aid');
         $week_array=array();
        $weeks= date('W',strtotime($dt));
        $years=date('Y',strtotime($dt));
            function getStartAndEndDate($week, $year) 
            {
            $dto = new DateTime();
            $ret=array();
            $dto->setISODate($year, $week);
            $ret1['week_start'] = $dto->format('Y-m-d');
            array_push($ret,$ret1['week_start']);
            $dto->modify('+6 days');
            $ret1['week_end'] = $dto->format('Y-m-d');
            array_push($ret,$ret1['week_end']);
            return $ret;
            }
            if($type=='week')
            {
            $week_array = getStartAndEndDate($weeks,$years);
            }elseif($type=='day')
            {
            $ret=array();
            $ret1['week_start'] = $dt;
            array_push($ret,$ret1['week_start']);
            $ret1['week_end'] = $dt;
            array_push($ret,$ret1['week_end']);
            $week_array= $ret;
            }
            // $start=date('d',strtotime($week_array['week_start']));
            // $end=date('d',strtotime($week_array['week_end']));
            print_r($week_array);
            $from=$week_array[0];
            $to=$week_array[1];
        $shift=DB::table('shift')
        ->distinct('shift_history.emp_id')
        ->select('shift.*','shift_history.emp_id','employee.emp_name as emp_name')
        ->leftjoin('shift_history','shift_history.shift_id','shift.id')
        ->leftjoin('employee','employee.id','shift_history.emp_id')
        ->where(function($main_q) use ($from,$to){
            $main_q->where([['shift_history.effect_from','<=',$from],['shift_history.effect_to','>=',$to]])
            ->Orwhere(function($main_q1) use($from,$to){
                $main_q1->OrwhereBetween('shift_history.effect_from',[$from,$to]);
            })
            ->Orwhere(function($main_q2) use($from,$to){
                $main_q2->OrwhereBetween('shift_history.effect_to',[$from,$to]);
            });
        })
        ->where('shift.aid','=',$aid)
        ->groupBy('shift_history.emp_id')
        ->get();
        $shift_all=shift::where([['aid','=',$aid],['status','=','A']])->get();
        $emp=employee::where([['aid','=',$aid],['status','=','A']])->get();
        $branch=branch::where([['aid','=',$aid],['status','=','A']])->get();
        $dept=DB::table('department')->where([['department.aid','=',$aid],['department.status','=','A']])
            ->select('department.*','branch.name as b_name')
            ->leftjoin('branch','branch.id','department.bid')
            ->get();
        $desg=designation::where([['aid','=',$aid],['status','=','A']])->get();
         return view('/newadmin/pages/admin/shift/shiftcalender')->with(compact('shift','week_array','shift_all','emp','branch','dept','desg'));
     }

     //get shift

    static public function get_shift($val,$shift_id,$emp_id)
     {
        $aid=SESSION::get('aid');
        $ret=array();
         $shift=DB::table('shift')
         ->select('shift.shift_name as shift_name','shift.shift_in as shift_in','shift.shift_out as shift_out')
         ->leftjoin('shift_history','shift_history.shift_id','shift.id')
         ->where([['shift.aid','=',$aid],['shift.status','!=','R'],['shift_history.emp_id','=',$emp_id]])
         ->where([['shift_history.effect_from','<=',$val],['shift_history.effect_to','>=',$val]])
         ->get();
       
         if($shift->count()>0)
         {
            for ($i=0; $i < sizeof($shift); $i++) { 
                array_push($ret,$shift[$i]);
            }
             $obj=json_encode(array_column($ret,'shift_name'));
             $obj1=json_encode(array_column($ret,'shift_in'));
             $obj2=json_encode(array_column($ret,'shift_out'));
            return [$obj.' ( '.$obj1.' - '.$obj2.' ) '];

         }

        //  }
     }
    // SHIFT LIST
    public function shiftlist(Request $req)
    {
        $aid=SESSION::get('aid');
        // print_r($req->all());
        $branch=branch::where([['aid','=',$aid],['status','!=','R']])->get();
        $dept=DB::table('department')->where([['department.aid','=',$aid],['department.status','!=','R']])
        ->leftjoin('branch','branch.id','department.bid')
        ->select('department.*','branch.name as b_name')
        ->get();
        $desg=designation::where([['aid','=',$aid],['status','!=','R']])->get();
        $emp=employee::where([['aid','=',$aid],['status','!=','R']])->get();
        if(empty($req->all()))
        {
        $shift=shift::where([['aid','=',$aid],['status','!=','R']])->get();
        return view('/newadmin/pages/admin/shift/shiftlist')->with(compact('shift','branch','dept','desg','emp'));

        }else {
            print_r($req->all());
            $emp_arr=array();
            $arr1=$req->branches;
            $arr2=$req->departments;
            $arr3=$req->designations;
            $shift_arr=array();
            $dept_arr=array();
            $desg_arr=array();
           
            if((!isset($req->branches)) && (!isset($req->departments)) && (!isset($req->designations)))
            {
                $shift=shift::where([['aid','=',$aid],['status','!=','R']])->get();
                return view('/newadmin/pages/admin/shift/shiftlist')->with(compact('shift','branch','dept','desg','emp'));
            }
            else
                {
                    $query=DB::table('employee')
                    ->select('id')
                    ->where([['aid','=',$aid],['status','!=','R']]);
                    if(isset($req->departments))
                    {
                      
                        $query->whereIn('dept_id',$req->departments);
                        
                    }
                    if(isset($req->designations))
                    {
                        $desg1=DB::table('designation')
                        ->select('name')
                        ->where([['aid','=',$aid],['status','!=','R']])
                        ->whereIn('id',$req->designations)->get();
                        for ($i=0; $i <sizeof($desg1); $i++) { 
                            array_push($desg_arr,$desg1[$i]);
                        }
                        $arr12= json_encode(array_column($desg_arr,'name'));
                        print_r($arr12);

                        $query->whereIn('designation',json_decode($arr12));
                    }
                    if(isset($req->branches))
                    {
                       $query->whereIn('bid',$req->branches);
                    }
                        $emp1=$query->get();
                    }
            for ($i=0; $i <sizeof($emp1) ; $i++) { 
                array_push($emp_arr,$emp1[$i]);
            }
            $arr= json_encode(array_column($emp_arr,'id'));
            $shift=DB::table('shift')
            ->select('shift.*','employee.emp_name as emp_name')
            ->where([['shift.aid','=',$aid],['shift.status','!=','R'],['employee.status','=','A']])
            ->leftjoin('shift_history','shift_history.shift_id','shift.id')
            ->leftjoin('employee','employee.id','shift_history.emp_id')
            ->whereIn('shift_history.emp_id',json_decode($arr))
            ->groupBy('shift.id')
            ->get();
            for ($i=0; $i <sizeof($shift) ; $i++) { 
                array_push($shift_arr,$shift[$i]);
            }
            // print_r($shift_arr);
            // print_r($arr11);
            return view('/newadmin/pages/admin/shift/shiftlist')->with(compact('shift','branch','dept','desg','emp','arr1','arr2','arr3'));
    }
}
    public function saveshift(Request $req)
    {
        print_r($req->all());
        // $p=0;
        // $tt='ruleday_'.$i;

        // print_r($req->$i);
       
        $shift=New shift;
        $shift->aid=SESSION::get('aid');
        $shift->shift_name=$req->name;
        $shift->shift_type=$req->type;
        $shift->shift_in=$req->punch_in;
        $shift->shift_out=$req->punch_out;
        $shift->full_day=$req->full_day_hr;
        $shift->half_day=$req->half_day_hr;
        $shift->overtime_min=$req->min_overtime;
        $shift->overtime_max=$req->max_overtime;
        $shift->wo_holi_overtime=$req->overtime_as_weekoff;
        $shift->grace_time=$req->grace_time;
        $result=$shift->save();
        if($result)
        {
            if(isset($req->b_name))
            {
                for ($j=0; $j <sizeof($req->b_name) ; $j++) { 
                    $brk= New shift_break;
                    $brk->shift_id=$shift->id;
                    $brk->aid=SESSION::get('aid');
                    $brk->break_name=$req->b_name[$j];
                    $brk->break_duration=$req->b_duration[$j];
                    $brk->break_start=$req->b_start[$j];
                    $brk->break_end=$req->b_end[$j];
                    $brk->status='A';
                    $results= $brk->save();
                    $ruleday='ruleday_'.$j;
                    $rulestatus='rulestatus_'.$j;
                    $rulereport='rulereport_'.$j;
                    $ruleafterbefore='ruleafterbefore_'.$j;
                    $time='time_'.$j;
                    $t_type='t_type_'.$j;
                    // print_r($tt);
                    if(isset($req->$ruleday))
                    {
                        // print_r($req->$tt);
                        for($i=0; $i< sizeof($req->$ruleday);$i++) { 
                            $rule= New rules;
                            $rule->rule_id=$brk->id;
                            $rule->type=$req->$t_type[$i];
                            $rule->ruleday=$req->$ruleday[$i];
                            $rule->rulestatus=$req->$rulestatus[$i];
                            $rule->rulereport=$req->$rulereport[$i];
                            $rule->ruleafterbefore=$req->$ruleafterbefore[$i];
                            $rule->shift_time=$req->$time[$i];
                            $result2=$rule->save();
                        }
                    }
                   
                }
            }
            if(isset($req->ruleday))
            {
                    for($i=0; $i<sizeof($req->ruleday);$i++) { 
                        $rule= New rules;
                        $rule->rule_id=$shift->id;
                        $rule->type=$req->t_type[$i];
                        $rule->ruleday=$req->ruleday[$i];
                        $rule->rulestatus=$req->rulestatus[$i];
                        $rule->rulereport=$req->rulereport[$i];
                        $rule->ruleafterbefore=$req->ruleafterbefore[$i];
                        $rule->shift_time=$req->time[$i];
                        $result1=$rule->save();
                    }
                }

            if($result)
            {
                return redirect('shift-list');
            }
        }
    }
    public function filter_shift(request $req)
    {
        $html='';
        if($req->type=='dept_'.$req->id)
        {
        $dept=DB::table('department')
        ->select('department.*','branch.name as b_name')
        ->leftjoin('branch','branch.id','department.bid')
        ->where([['department.aid','=',SESSION::get('aid')],['department.status','=','A']])
        ->whereIN('department.bid',$req->branch)->get();
            
            foreach ($dept as $key => $value) {
                $html.='<option value="'.$value->id.'">'.$value->name.'<i> ('.$value->b_name.') </i></option>';
            }
        }
        elseif(($req->type=='emp_'.$req->id) && (!empty($req->branch)))
        {
            $emp=DB::table('employee')
            ->select('employee.*')
            ->whereIN('employee.dept_id',$req->dept)
            ->where([['employee.aid','=',SESSION::get('aid')],['employee.status','=','A']])
            ->whereIN('employee.bid',$req->branch)
            ->get();
            foreach ($emp as $key => $value) {
                // for ($i=0; $i <sizeof($req->dept) ; $i++) { 
                //     if(($value->dept_id)==($req->dept[$i]))
                //     {
                        $html.='<option value="'.$value->id.'">'.$value->emp_name.'<br><i> ('.$value->designation.') </i></option>';
                    // }
                // }
                
            }
        }elseif(($req->type=='emp_'.$req->id) && (empty($req->branch)))
        {
        $emp=DB::table('employee')
            ->select('employee.*')
            ->whereIN('employee.dept_id',$req->dept)
            ->where([['employee.aid','=',SESSION::get('aid')],['employee.status','=','A']])
            ->get();
            foreach ($emp as $key => $value) {
                // for ($i=0; $i <sizeof($req->dept) ; $i++) { 
                //     if(($value->dept_id)==($req->dept[$i]))
                //     {
                        $html.='<option value="'.$value->id.'">'.$value->emp_name.'<br><i> ('.$value->designation.') </i></option>';
                    // }
                // }
                
            }
        }
            
        return response()->json(['data'=>$html,'status'=>'true']);
    }
  
    public function shift_emp(Request $req)
    {
        $con='';
        $emp='';
        $arr=array();
        $emp_arr=array();
        // print_r($req->type);
        DB::enableQueryLog();

        if($req->type=='new')
        {
            if(isset($req->dept))
            {
                $con="employee.dept_id";
                $emp=$req->dept;
            }
            if(isset($req->branch))
            {
                $con="employee.bid";
                $emp=$req->branch;
            }
            if(isset($req->emp))
            {
                $con="employee.id";
                $emp=$req->emp;
            }
            $to=$req->to_dt;
            $from=$req->from_dt;
            $emp_r=DB::table('shift_history')
            ->select('employee.emp_name','employee.id')
            ->leftjoin('employee','employee.id','shift_history.emp_id')
            ->whereIn($con,$emp)
            ->where(function($main_q) use ($from,$to){
                $main_q->where([['shift_history.effect_from','<=',$from],['shift_history.effect_to','>=',$to]])
                ->Orwhere(function($main_q1) use($from,$to){
                    $main_q1->OrwhereBetween('shift_history.effect_from',[$from,$to]);
                })
                ->Orwhere(function($main_q2) use($from,$to){
                    $main_q2->OrwhereBetween('shift_history.effect_to',[$from,$to]);
                });
            })
            ->groupBy('shift_history.emp_id')
            ->get();
            $html='';
            if($emp_r->count()>0)
            {
            // $emp_id=json_encode($req->emp);
                foreach ($emp_r as $key => $value) 
                {    
                    $name=$value->emp_name;
                    $id=$value->id;
                        $html.='<div class="col-md-3">';
                        $html.='<label for="new_emp'.$id.'"><input type="checkbox" id="new_emp'.$id.'" name="new_emp[]" value="'.$id.'">';
                        $html.=$name;
                        $html.='</label><br>';
                        $html.='</div>';
                        
                }
                return response()->json(['html'=>json_encode($html),'status'=>'false']);
            }
            else {
                    $emp=DB::table('employee')
                    ->select('employee.id')
                    ->whereIn($con,$emp)
                    ->where('employee.status','=','A')
                    ->get();
                    foreach ($emp as $key => $value) {
                    // echo $value->emp_id;
                    $shift=New shift_history;
                    $shift->emp_id=$value->id;            
                    $shift->shift_id=$req->shift_id;  
                    $shift->effect_from=$req->from_dt;   
                    $shift->effect_to=$req->to_dt;   
                    $result=$shift->save(); 
                    $result=1;
                    } 
                    return response()->json(['html'=>$emp1->count(),'status'=>'true']);
                }
        }
        else {
            $query=DB::table('employee')
                    ->select('id')
                    ->where([['aid','=',SESSION::get('aid')],['status','!=','R']]);
            if($req->type=='branch')
            {
                $query=$query->whereIN('bid',$req->emp);
                if(!empty($req->val)){
                $query=$query->whereNOTIN('id',$req->val);
                }
            }elseif($req->type=='dept')
            {
                $query=$query->whereIN('dept_id',$req->emp);
                if(!empty($req->val)){
                    $query=$query->whereNOTIN('id',$req->val);
                    }
            }elseif($req->type=='emp')
            {
                $query=$query->whereIN('id',$req->emp);
            }
            $query=$query->get();
            for ($i=0; $i <sizeof($query) ; $i++) { 
                array_push($emp_arr,$query[$i]->id);
            }
            $arr= $emp_arr;
            $val1=$req->to_dt;
            $val2=$req->from_dt;
            for ($i=0; $i <sizeof($arr); $i++) { 
                $emp1=DB::table('shift_history')
            ->where('shift_history.emp_id','=',$arr[$i])
            ->where(function($query1) use ($val2){
                $query1->where('shift_history.effect_from','<=',$val2)
            ->Orwhere('shift_history.effect_from','>=',$val2);
            })           
            ->where(function($query) use ($val1){
                $query->where('shift_history.effect_to','<=',$val1)
            ->Orwhere('shift_history.effect_to','>=',$val1);
            })
            ->delete();
            $shift=New shift_history;
            $shift->emp_id=$arr[$i];            
            $shift->shift_id=$req->shift_id;  
            $shift->effect_from=$req->from_dt;   
            $shift->effect_to=$req->to_dt;   
            $result=$shift->save(); 
            }
            // if(($req->type=='branch') || ($req->type=='dept'))
            // {
            //     $emp0=DB::table('shift_history')
            //     ->whereIN('shift_history.emp_id',$req->val)
            //     ->where('shift_history.effect_from','=',$req->from_dt)
            //     ->where('shift_history.effect_to','=',$req->to_dt)
            //     ->delete();
            // }
            return response()->json(['html'=>$emp_arr,'status'=>'true']);

        }
    }
    public function update_shift(Request $req,$id)
    {
        $upt=DB::table('shift')->where('id','=',$id)
        ->update(array('aid'=>SESSION::get('aid'),
       'shift_name'=>$req->name,
       'shift_type'=>$req->type,
       'shift_in'=>$req->punch_in,
       'shift_out'=>$req->punch_out,
       'full_day'=>$req->full_day_hr,
       'half_day'=>$req->half_day_hr,
       'overtime_min'=>$req->min_overtime,
       'overtime_max'=>$req->max_overtime,
       'wo_holi_overtime'=>$req->overtime_as_weekoff,
       'grace_time'=>$req->grace_time,
       'break_name'=>$req->b_name,
       'break_duration'=>$req->b_duration,
       'break_start'=>$req->b_start,
       'break_end'=>$req->b_end,'updated_at'=>date('Y-m-d H:i:s')));
       if($upt)
       {
           $del=rules::where('rule_id','=',$id)->delete();
           if(isset($req->ruleday))
           {
               for($i=0; $i<sizeof($req->ruleday);$i++) { 
                   $rule= New rules;
                   $rule->rule_id=$id;
                   $rule->type=$req->t_type[$i];
                   $rule->ruleday=$req->ruleday[$i];
                   $rule->rulestatus=$req->rulestatus[$i];
                   $rule->rulereport=$req->rulereport[$i];
                   $rule->ruleafterbefore=$req->ruleafterbefore[$i];
                   $rule->shift_time=$req->time[$i];
                   $result1=$rule->save();
               }
           }
           return redirect('shift-list')->with('success','Updated Successfully..!!');
       }
       else {
            return redirect('shift-list')->with('error','Something Went Wrong.Please Try Again..!!');

       }
    }
    public function filter_calender(Request $req,$dt,$type)
    {
        // print_r($req->all());
        // print_r($type);
        $emp_arr=array();
        $arr1=$req->branch;
        $arr2=$req->dept;
        $arr3=$req->desg;
        $shift_arr=array();
        $dept_arr=array();
        $desg_arr=array();
        $aid=SESSION::get('aid');
        $query=DB::table('employee')
                    ->select('id')
                    ->where([['aid','=',$aid],['status','!=','R']]);
                    if(!empty($req->dept))
                    {
                        $query->where('dept_id','=',$req->dept);
                        
                    }
                    if(!empty($req->desg))
                    {
                        // $desg1=DB::table('designation')
                        // ->select('name')
                        // ->where([['aid','=',$aid],['status','!=','R']])
                        // ->where('id','=',$req->desg)->get();
                        // for ($i=0; $i <sizeof($desg1) ; $i++) { 
                        //     array_push($desg_arr,$desg1[$i]);
                        // }
                        // $arr12= json_encode(array_column($desg_arr,'name'));
                        $query->where('designation','=',$req->desg);
                    }
                    if(!empty($req->branch))
                    {
                       $query->where('bid','=',$req->branch);
                    }
                        $emp1=$query->get();
                    // print_r($emp1);
            for ($i=0; $i <sizeof($emp1) ; $i++) { 
                array_push($emp_arr,$emp1[$i]);
            }
            $arr= json_encode(array_column($emp_arr,'id'));
            // print_r($arr);
           
            $week_array=array();
            function getStartAndEndDate($week, $year) 
            {
            $dto = new DateTime();
            $ret=array();
            $dto->setISODate($year, $week);
            $ret1['week_start'] = $dto->format('Y-m-d');
            array_push($ret,$ret1['week_start']);
            $dto->modify('+6 days');
            $ret1['week_end'] = $dto->format('Y-m-d');
            array_push($ret,$ret1['week_end']);
            return $ret;
            }
            $mont='';
            $yer='';
            $ddd='';
            $dj='';
            if($type=='week')
            {
                if(!empty($req->month))
            {
                $mont=$req->month;
            }else {
                $mont=date('m',strtotime($dt));
            }
            if(!empty($req->year))
            {
                $yer=$req->year;
            }else {
                $yer=date('Y',strtotime($dt));
            }
            if(!empty($req->date))
            {
                $ddd=$req->date;
                $dj=$yer.'-'.$mont.'-'.$ddd;

            }else {
                $dj=$yer.'-'.$mont.'-'.date('d',strtotime($dt));
            }
                $weeks= date('W',strtotime($dj));
                $years=date('Y',strtotime($dj));
                print_r($dj);
                // print_r($years);
            $week_array = getStartAndEndDate($weeks,$years);
            // print_r($week_array);
            }
            elseif($type=='day')
            {
                if(!empty($req->month))
                {
                    $mont=$req->month;
                }else {
                    $mont=date('m',strtotime($dt));
                }
                if(!empty($req->year))
                {
                    $yer=$req->year;
                }else {
                    $yer=date('Y',strtotime($dt));
                }
                if(!empty($req->date))
                {
                    $ddd=$req->date;
                    $dj=$yer.'-'.$mont.'-'.$ddd;
    
                }else {
                    $dj=$yer.'-'.$mont.'-'.date('d',strtotime($dt));
                }
            $ret=array();
            $ret1['week_start'] = $dj;
            array_push($ret,$ret1['week_start']);
            $ret1['week_end'] = $dj;
            array_push($ret,$ret1['week_end']);
            $week_array= $ret;
            }
            // print_r($week_array);
            $to=$week_array[1];
            $shift=DB::table('shift')
            ->select('shift.*','employee.emp_name as emp_name','employee.id as emp_id')
            ->leftjoin('shift_history','shift_history.shift_id','shift.id')
            ->leftjoin('employee','employee.id','shift_history.emp_id')
            ->whereIn('shift_history.emp_id',json_decode($arr));
            if(!empty($req->shift))
            {
                // $shift=$shift->where([['shift_history.effect_from','<=',$week_array[0]],['shift.aid','=',$aid],['shift.status','!=','R'],['shift.id','=',$req->shift]]);
                $shift=$shift->where([['shift.aid','=',$aid],['shift.status','!=','R'],['shift.id','=',$req->shift]]);
            }else
            {
                // $shift=$shift->where([['shift_history.effect_from','>=',$week_array[0]],['shift.aid','=',$aid],['shift.status','!=','R']]);
                $shift=$shift->where([['shift.aid','=',$aid],['shift.status','!=','R']]);
            }
            // $shift=$shift->where(function($query) use ($to){
            //     $query->where('shift_history.effect_to','<=',$to)
            // ->Orwhere('shift_history.effect_to','>=',$to);
            // });

            $shift=$shift->get();
            // if($req->shift!='')
            // {
                // print_r($shift);
            // }else {
            //     print_r('error');
            // }
            $shift_all=shift::where([['aid','=',$aid],['status','=','A']])->get();
            $emp=employee::where([['aid','=',$aid],['status','=','A']])->get();
            $branch=branch::where([['aid','=',$aid],['status','=','A']])->get();
            $dept=DB::table('department')->where([['department.aid','=',$aid],['department.status','=','A']])
            ->select('department.*','branch.name as b_name')
            ->leftjoin('branch','branch.id','department.bid')
            ->get();
            $desg=designation::where([['aid','=',$aid],['status','=','A']])->get();
            // print_r($arr1);
            $mont=$mont;
            $yer=$yer;
            $date=$ddd;
            $s_name=$req->shift;
            // print_r($shift);
             return view('/newadmin/pages/admin/shift/shiftcalender')->with(compact('shift','week_array','shift_all','emp','branch','dept','desg','arr1','arr2','arr3','mont','yer','date','s_name'));
            // return view('/newadmin/pages/admin/shift/shiftlist')->with(compact('shift','branch','dept','desg','emp','arr1','arr2','arr3'));
    }
}
