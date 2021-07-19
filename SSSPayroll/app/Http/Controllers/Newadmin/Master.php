<?php

namespace App\Http\Controllers\Newadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\login;
use App\Models\employee;
use App\Models\working_days;
use App\Models\holiday;
use App\Models\branch;
use App\Models\holiday_list;
use App\Models\designation;
use App\Models\department;
use Carbon\Carbon;
use DB;
use Session;
use Redirect;
use View;
use compact;

class Master extends Controller
{
 
    public function index()
    {
        $working=DB::table('working_day')
        ->select('working_day.*')
        ->where('working_day.status','!=','R')
        ->get();
        $branch=branch::where('status','!=','R')->get();
        return view::Make('newadmin/pages/admin/master/workingday')->with(compact('branch','working'));
    }

    public function holidaylist()
    {

        $aid=Session::get('aid');
        $holiday=DB::table('holiday_list')
        ->select('holiday_list.*','holiday_group.name as group_name','holiday_group.description as group_desc')
        ->leftjoin('holiday_group','holiday_group.id','holiday_list.holiday_group')
        ->where([['holiday_list.aid','=',$aid],
                 ['holiday_list.status','!=','R'],])
        ->get();
        $holiday_group=holiday::where('status','=','A')->get();
        $branch=branch::where([['status','=','A'],['aid','=',$aid]])->get();
        return view::make('newadmin/pages/admin/master/holiday')->with(compact('holiday','holiday_group','branch'));
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
             return redirect('holiday-master')->with('error', 'Group Name Already Exist..!!');
        }else
        {
        $working = new holiday;
        $working->aid=$aid;
        $working->name = $req->name;
        $working->description=$req->desc;
        $result=$working->save();
        if($result)
        {
            $b_holiday=branch::whereIn('id',$req->branches)
            ->update(array('holiday_group'=>$working->id));
        }
        // // $json=$req->week1;
             return redirect('holiday-master')->with('success', 'Created..!!');
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
             return redirect('holiday_master')->with('error', 'Holiday List Already Exist..!!');
        }else
        {
        $working = new holiday_list;
        $working->aid=$aid;
        $working->name = $req->name;
        $working->type=$req->holiday_type;
        $working->holiday_group=$req->group;
        $working->holiday_date=$req->holiday_on;
        $working->affected_from=$req->affect_from;
        $result=$working->save();
        // // $json=$req->week1;
             return redirect('holiday-master')->with('success', 'Created..!!');
    }
    }
    function update_holiday_list(Request $req,$id)
    {
        $aid=Session::get('aid');
        
       // return $id;
        $working = holiday_list::where('id','=',$id)
        ->update(array('name'=>$req->name,'type'=>$req->type,'holiday_group'=>$req->group,'holiday_date'=>$req->holiday_on,'affected_from'=>$req->affect_from,'updated_at'=>date('Y-m-d H:i:s')));
        // $result=$working->save();
        
        // // $json=$req->week1;
             return redirect('holiday-master')->with('success', 'Updated..!!');
    // }
    }
    function update_holiday_grp(Request $req,$id)
    {
        $aid=Session::get('aid');
        
       // return $id;
        $working = holiday::where('id','=',$id)
        ->update(array('name'=>$req->name,'description'=>$req->desc,'updated_at'=>date('Y-m-d H:i:s')));
     
            $b_holiday=branch::whereIn('id',$req->branches)
            ->update(array('holiday_group'=>$id));
             return redirect('holiday-master')->with('success', 'Updated..!!');
    // }
    }
    public function add_working(Request $req)
    {
        $aid=Session::get('aid');
        
        $chk=DB::table('working_day')
            ->select('*')
            ->where([
                    ['aid','=',$aid],
                    ['name','=',$req->name],
                    ['status','!=','R']
            ])
            ->count();
        if($chk>0)
        {
        return response()->json(['msg'=>'Working Plan already Created..!!','status'=>false]);
        }else
        {
        $working = new working_days;
        $working->aid=$aid;
        $working->name = $req->name;
        $working->week1=json_encode($req->week1);
        $working->addon_week=$req->addon_week;
        $working->addon_day=$req->addon_day;
        $working->addon_off_type=$req->addon_off_type;
        $result=$working->save();
        // // $json=$req->week1;
        return response()->json(['msg'=>'Added..!!','status'=>$result]);
    }
    }
    public function update_workingday(Request $req)
    {
        $aid=Session::get('aid');
        
        // $week1=json_encode($req->week1);
        $fetch=working_days::where('id','=',$req->id)->first();

        $result=working_days::where('id','=',$req->id)
        ->update(array('name'=>$req->name,'week1'=>json_encode($req->week1)=='null'?$fetch->week1:json_encode($req->week1),'addon_week'=>$req->addon_week,'addon_day'=>$req->addon_day,'addon_off_type'=>$req->addon_off_type));
        if($result)
        {
            return response()->json(['msg'=>'Success','status'=>true]);
        }else
        {
            return response()->json(['msg'=>'Failed','status'=>false]);
        }
    }

    public function branch()
    {
        $aid=Session::get('aid');
        $branch=branch::where([['status','=','A'],['aid','=',$aid]])->get();
        return view::make('newadmin/pages/admin/master/branch')->with(compact('branch'));
    }
    function add_branch(Request $req)
    {
        $aid=Session::get('aid');
        $chk=branch::where([['aid','=',$aid],['name','=',$req->name],['status','!=','R']])->count();
        if($chk>0)
        {
            return redirect('/branch-master')->with('error','Branch '.$req->name.' Already Exist..!!');
        }else
        {
            $desg=new branch;
            $desg->aid=$aid;
            $desg->name=$req->name;
            $result=$desg->save();
            if($result)
            {
            return redirect('/branch-master')->with('success','Branch '.$req->name.' Created..!!');
            }

        }
    }
    public function update_branch(Request $req,$id)
    {
        $desg=branch::where('id','=',$id)
        ->update(array('name'=>$req->name,'updated_at'=>date('Y-m-d h:i:s')));
        if($desg)
        {
            return redirect('/branch-master')->with('success','Updated Successfully..!!');
        }
    }
    public function department()
    {
        $aid=Session::get('aid');
        $branch=branch::where([['status','=','A'],['aid','=',$aid]])->get();
        $dept=DB::table('department')->select('department.*','branch.name as b_name')
        ->leftjoin('branch','branch.id','department.bid')
        ->where([['department.status','!=','R'],['department.aid','=',$aid]])
        ->get();
        return view::make('newadmin/pages/admin/master/departments')->with(compact('branch','dept'));
    }
    function add_department(Request $req)
    {
        $branch=array();
        $aid=Session::get('aid');
        $chk=DB::table('department')
        ->select('department.*','branch.name as b_name')
        ->leftjoin('branch','branch.id','department.bid')
        ->where([['department.aid','=',$aid],['department.name','=',$req->name],['department.status','!=','R']])
        ->whereIn('department.bid',$req->branches)
        ->get();
        if($chk->count()>0)
        {
            foreach ($chk as $key => $value) {
                array_push($branch,$value->b_name);
            }
            return redirect('/department-master')->with('error','Department '.$req->name.' Already Exist In '.json_encode($branch).'..!!');
        }else
        {
            for ($i=0; $i <sizeof($req->branches) ; $i++) { 
                
            $desg=new department;
            $desg->aid=$aid;
            $desg->bid=$req->branches[$i];
            $desg->name=$req->name;
            $result=$desg->save();
            # code...
        }
            if($result)
            {
            return redirect('/department-master')->with('success','Department '.$req->name.' Created..!!');
            }

        }
    }
    public function update_department(Request $req,$id)
    {
        $aid=Session::get('aid');
        $branch=array();
        for ($i=0; $i <sizeof($req->branches) ; $i++) { 
            $chk=DB::table('department')
            ->select('department.*','branch.name as b_name')
            ->leftjoin('branch','branch.id','department.bid')
            ->where([['department.aid','=',$aid],['department.name','=',$req->name],['department.status','!=','R']])
            ->whereIn('department.bid','=',$req->branches[$i])
            ->whereNotIn('department.id',$id)
            ->get();
            if($chk->count()>0)
            {
                foreach ($chk as $key => $value) {
                    array_push($branch,$value->b_name);
                }
            }else {
              
                    $desg=department::where('id','=',$id)
                    ->update(array('name'=>$req->name,'bid'=>$req->branches[$i],'updated_at'=>date('Y-m-d h:i:s')));
             
                 }
            }  
            if(sizeof($branch)>0)
            {  
            return redirect('/department-master')->with('error','Department '.$req->name.' Already Exist In '.json_encode($branch).'..!!');           
            }else {

            return redirect('/department-master')->with('success','Updated Successfully..!!');
        }
    }
    public function designation()
    {
        $desg=designation::where('status','!=','R')->get();
        return view::make('newadmin/pages/admin/master/designation')->with(compact('desg'));
    }

    public function attendancemachine()
    {
        return view('newadmin/pages/admin/master/attendancemachine');
    }
    function add_designation(Request $req)
    {
        $aid=Session::get('aid');
        $chk=designation::where([['aid','=',$aid],['name','=',$req->name],['status','!=','R']])->count();
        if($chk>0)
        {
            return redirect('/designation-master')->with('error','Designation '.$req->name.' Already Exist..!!');
        }else
        {
            $desg=new designation;
            $desg->aid=$aid;
            $desg->name=$req->name;
            $result=$desg->save();
            if($result)
            {
            return redirect('/designation-master')->with('success','Designation '.$req->name.' Created..!!');
            }

        }
    }
    public function update_designation(Request $req,$id)
    {
        $desg=designation::where('id','=',$id)
        ->update(array('name'=>$req->name,'updated_at'=>date('Y-m-d h:i:s')));
        if($desg)
        {
            return redirect('/designation-master')->with('success','Updated Successfully..!!');
        }
    }
}
