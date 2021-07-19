<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\attribute;
use Session;
use DB;
class AttributeController extends Controller
{
    //
    public function attribute()
    {
        $attribute=attribute::where([['att_id','=','0'],['status','=','A']])
        ->where(function ($query)
        {
            $query->where('aid','=',Session::get('aid'))
                  ->orWhere('aid','=','0');
        })
        ->get();
        return view('B2Cadmin/Attribute/attribute')->with(compact('attribute'));
    }

    static public function get_att($att_id)
    {
        $att_array=array();
        $attribute=attribute::where([['att_id','=',$att_id],['status','=','A']])
        ->where(function ($query)
        {
            $query->where('aid','=',Session::get('aid'))
                  ->orWhere('aid','=','0');
        })
        ->get();

        foreach ($attribute as $key => $value) {
            array_push($att_array,$value->att_name);
        }
        return json_encode($att_array);
    }

    public function add_attribute(Request $req)
    {
        // print_r($req->all());
        $chk=attribute::where([['att_name','=',$req->attribute],['att_id','=',$req->attribute_name],['status','=','A']])
        ->where(function ($query)
        {
            $query->where('aid','=',Session::get('aid'))
                  ->orWhere('aid','=','0');
        })
        ->get();
        if($chk->count()>0)
        {
            return redirect('/attributes')->with('error',$req->attribute.' already exist..!!');
        }else {
            print_r($req->all());
            $att=new attribute;
            $att->aid=Session::get('aid');
            $att->att_name=$req->attribute;
            $att->att_id=$req->attribute_name;
            $result=$att->save();
            if($result)
            {
            return redirect('/attributes')->with('success',$req->attribute.' created successfully..!!');
            }else {
                return redirect('/attributes')->with('error','Try again..!!');
            }
        }
    }

    public function add_att(Request $req)
    {
        // print_r($req->all());
        $chk=attribute::where([['att_name','=',$req->attribute],['att_id','=','0'],['status','=','A']])
        ->where(function ($query)
        {
            $query->where('aid','=',Session::get('aid'))
                  ->orWhere('aid','=','0');
        })
        ->get();
        if($chk->count()>0)
        {
            return redirect('/attributes')->with('error',$req->attribute.' already exist..!!');
        }else {
            print_r($req->all());
            $att=new attribute;
            $att->aid=Session::get('aid');
            $att->att_name=$req->attribute;
            $att->att_id='0';
            $result=$att->save();
            if($result)
            {
            return redirect('/attributes')->with('success',$req->attribute.' created successfully..!!');
            }else {
                return redirect('/attributes')->with('error','Try again..!!');
            }
        }
    }

    public function get_attribute(Request $req)
    {
        $att=attribute::where([['att_id','=',$req->id],['status','=','A']])
        ->where(function ($query)
        {
            $query->where('aid','=',Session::get('aid'))
                ->orWhere('aid','=','0');
        })
        ->get();
        $att1='<option value="">Select Attribute</option>';
        foreach ($att as $key => $value) {
            $att1.='<option value="'.$value->att_name.'">'.$value->att_name.'</option>';
        }
        return response()->json(['att'=>$att1]);
    }
    public function edit_attribute(Request $req,$id,$type)
    {
        // print_r($req->all());
        if ($type=='sub') {
            $result=attribute::where([['att_id','=',$req->id],['att_name','=',$req->attribute]])->update(array('att_name'=>$req->rename_att));
        } else {
            $result=attribute::where('id','=',$req->id)->update(array('att_name'=>$req->rename_attD));
        }
        
        if($result)
        {
        return redirect('/attributes')->with('success','Updated successfully..!!');
        }else {
            return redirect('/attributes')->with('error','Try again..!!');
        }
    }
}
