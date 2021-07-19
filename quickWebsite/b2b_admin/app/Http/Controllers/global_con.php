<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Session;
use DB;
class global_con extends Controller
{
    //
    public function delete($id,$page,$model)
    {
        $del=DB::table($model)->where([['id','=',$id],['aid','=',Session::get('aid')]])->update(array('status'=>'R'));
        if($del)
        {
            return redirect('/'.$page)->with('success','Deleted Successfully..!!');
        }else {
            return redirect('/'.$page)->with('error','Try Again..!!');
        }
    }
    public function delete2($id,$page,$model)
    {
        $del=DB::table($model)->where([['disc_id','=',$id],['aid','=',Session::get('aid')]])->update(array('status'=>'R'));
        if($del)
        {
            return redirect('/'.$page)->with('success','Deleted Successfully..!!');
        }else {
            return redirect('/'.$page)->with('error','Try Again..!!');
        }
    }
}
