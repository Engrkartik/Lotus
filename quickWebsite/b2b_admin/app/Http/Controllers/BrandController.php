<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\brand;
use Session;
use DB;
class BrandController extends Controller
{
    public function brand()
    {
        $brand=brand::where([['aid','=',Session::get('aid')],['status','=','A']])->orderBy('id','DESC')->get();
        return view('B2Cadmin/Brand/brand')->with(compact('brand'));
    }
    
    public function add_brand(Request $req)
    {
        // print_r($req->all());
        $brand=brand::where([['aid','=',Session::get('aid')],['name','=',$req->brand_name],['status','=','A']])->get();
        if($brand->count()>0)
        {
            return redirect('/brand')->with('error',$req->brand_name.' Already Exist..!!');
        }else
        {
            $upfile=$req->brand_image;
            print_r(sizeof($upfile));
            foreach ($upfile as $key => $value) 
            {
                $imageName = time() . $key . $value->getClientOriginalName();
                print_r($imageName);
                $value->move('public/images/brand', $imageName);
                $cat=new brand;
                $cat->aid=Session::get('aid');
                $cat->name=$req->brand_name;
                $cat->img_url='images/brand/'.$imageName;
                $cat->date=date('Y-m-d h:i:s');
                $cat->status='A';
                $cat->remark='';
                $result=$cat->save();
                if($result)
                {
                    return redirect('/brand')->with('success','Banner Created..!!');
                }else {
                    return redirect('/brand')->with('error','Try Again..!!');
                }
            }
        }
    }

    public function update_brand(Request $req,$id)
    {
        // print_r($req->all());
        $path='';
            if(isset($req->brand_image))
            {
            $upfile=$req->brand_image;
            $imageName = time() .$upfile[0]->getClientOriginalName();
            // print_r($imageName);
            $upfile[0]->move('public/images/brand', $imageName);
            $path='images/brand/'.$imageName;
            }
            if(!empty($path))
            {
                $result=brand::where('id','=',$id)->update(array('img_url'=>'images/brand/'.$imageName,'name'=>$req->brand_name));
            }else {
                $result=brand::where('id','=',$id)->update(array('name'=>$req->brand_name));
            }
            if($result)
                {
                    return redirect('/brand')->with('success','Banner Updated..!!');
                }else {
                    return redirect('/brand')->with('error','No Changes..!!');
                }
    }
    
}
