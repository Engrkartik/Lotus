<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\banner;
use App\Models\discount;
use Session;
use DB;
class BannerController extends Controller
{
    //
    public function banner()
    {
        $banner=banner::where([['aid','=',Session::get('aid')],['status','=','A']])->get();
        $discount=discount::where([['aid','=',Session::get('aid')],['status','=','A'],['to_dt','>=',date('Y-m-d')]])->groupBy('disc_id')->get();
        return view('B2Cadmin/Banner/banner')->with(compact('banner','discount'));
    }

    public function add_banner(Request $req)
    {
        // print_r($req->all());
        $banner=banner::where([['aid','=',Session::get('aid')],['title','=',$req->banner_name],['status','=','A']])->get();
        if($banner->count()>0)
        {
            // return redirect('/banner')->with('error',$req->banner_name.' Already Exist..!!');
            $path=array();
            foreach ($banner as $key => $value) {
                $iimg=json_decode($value->img);
                for ($i=0; $i <sizeof($iimg) ; $i++) { 
                    array_push($path,$iimg[$i]);
                }
            }
            $upfile=$req->banner_image;
            foreach ($upfile as $key => $value) 
            {
                $imageName = time().$key.$value->getClientOriginalName();
                print_r($imageName);
                $value->move('public/images/banner', $imageName);
                array_push($path,'public/images/banner/'.$imageName);
            }
            $result=banner::where([['aid','=',Session::get('aid')],['title','=',$req->banner_name],['status','=','A']])->update(array('img'=>json_encode($path,TRUE)));
            if($result)
            {
                return redirect('/banner')->with('success','Banner Updated..!!');
            }else {
                return redirect('/banner')->with('error','Try Again..!!');
            }
        }else
        {
            $upfile=$req->banner_image;
            // print_r(sizeof($upfile));
            $path=array();
            foreach ($upfile as $key => $value) 
            {
                $imageName = time().$key.$value->getClientOriginalName();
                print_r($imageName);
                $value->move('public/images/banner', $imageName);
                array_push($path,'public/images/banner/'.$imageName);
            }
            // print_r($path);
                $cat=new banner;
                $cat->aid=Session::get('aid');
                $cat->title=$req->banner_name;
                $cat->img=json_encode($path,TRUE);
                $cat->date=date('Y-m-d h:i:s');
                $cat->status='A';
                $cat->remark='';
                $result=$cat->save();
                if(isset($req->discount_slab))
                {
                    for ($i=0; $i <sizeof($req->discount_slab) ; $i++) { 
                        $upd=discount::where([['disc_id','=',$req->discount_slab[$i]],['aid','=',Session::get('aid')]])
                        ->update(array('banner_id'=>$cat->id));
                    }
                }
                if($result)
                {
                    return redirect('/banner')->with('success','Banner Created..!!');
                }else {
                    return redirect('/banner')->with('error','Try Again..!!');
                }
        }
    }

    public function update_banner(Request $req,$id)
    {
        print_r($req->all());
        print_r(empty($req->deleted_img));
        $banner=banner::where([['aid','=',Session::get('aid')],['id','=',$id],['status','=','A']])->get();
        $path=array();
        if(empty($req->deleted_img))
        {
            foreach ($banner as $key => $value) {
                $iimg=json_decode($value->img);
                for ($i=0; $i <sizeof($iimg) ; $i++) { 
                    array_push($path,$iimg[$i]);
                }
            }
        }else {
            $dele=json_decode($req->deleted_img);
            foreach ($banner as $key => $value) {
                $iimg=json_decode($value->img);
                for ($i=0; $i <sizeof($iimg) ; $i++) { 
                        if(in_array($iimg[$i],$dele))
                        {
                            
                        }else {
                            array_push($path,$iimg[$i]);
                        }
                    }
                }
            }
            print_r($path);
            if(isset($req->banner_image))
            {
                $upfile=$req->banner_image;
                foreach ($upfile as $key => $value) 
                {
                    $imageName = time().$key.$value->getClientOriginalName();
                    print_r($imageName);
                    $value->move('public/images/banner', $imageName);
                    array_push($path,'public/images/banner/'.$imageName);
                }   
            }
            if(!empty($path))
            {
                $result=banner::where([['id','=',$id],['aid','=',Session::get('aid')]])->update(array('img'=>json_encode($path,TRUE)));
            }
            
            if(isset($req->discount_slabs))
            {
                $chk=discount::where([['banner_id','=',$id],['aid','=',Session::get('aid')]])->update(array('banner_id'=>'0'));
                for ($i=0; $i <sizeof($req->discount_slabs) ; $i++) { 
                        $result=discount::where([['disc_id','=',$req->discount_slabs[$i]],['aid','=',Session::get('aid')]])->update(array('banner_id'=>$id));
                    }
            }
            if($result)
                {
                    return redirect('/banner')->with('success','Banner Updated..!!');
                }else {
                    return redirect('/banner')->with('error','No Changes..!!');
                }
    }
}
