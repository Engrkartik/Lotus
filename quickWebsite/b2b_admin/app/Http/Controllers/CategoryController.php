<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Session;
use DB;

class CategoryController extends Controller
{
    //
    public function category() {
        $category=category::where([['aid','=',Session::get('aid')],['parent_id','=',0],['status','!=','R']])
        ->orderBy('id','DESC')
        ->get();
		return view('B2Cadmin/Categories/category')->with(compact('category'));
	}
	
	public function subcategory() {
		return view('B2Cadmin/Categories/subcategory');
    }

    public function addcategory(Request $req)
    {
        // print_r($req->all());
        $category=category::where([['aid','=',Session::get('aid')],['parent_id','=',0],['status','!=','R'],['title','=',$req->category_name]])->get();
        if($category->count()>0)
        {
            return redirect('/categories')->with('error',$req->category_name.' Already Exist..!!');
        }else
        {
		$upfile=$req->category_image;
        print_r(sizeof($upfile));
        foreach ($upfile as $key => $value) {
            $imageName = time() . $key . $value->getClientOriginalName();
            print_r($imageName);
            $value->move('public/images/category', $imageName);
            $cat=new category;
            $cat->aid=Session::get('aid');
            $cat->title=$req->category_name;
            $cat->img='images/category/'.$imageName;
            $cat->date=date('Y-m-d h:i:s');
            $cat->parent_id='0';
            $cat->status='A';
            $cat->remark='';
            $result=$cat->save();
            if($result)
            {
                return redirect('/categories')->with('success','Category Created..!!');
            }else {
                return redirect('/categories')->with('error','Try Again..!!');
            }
        }
    }

    }

    public function updatecategory(Request $req,$id)
    {
        // print_r($req->all());
        if(isset($req->category_image))
        {
		    $upfile=$req->category_image;
            $imageName = time() . $upfile->getClientOriginalName();
            // print_r($imageName);
            $upfile->move('public/images/category', $imageName);
            $path='images/category/'.$imageName;
            $result=category::where('id','=',$id)
            ->update(array('title'=>$req->category_name,'img'=>$path));
        }else {
            $result=category::where('id','=',$id)
            ->update(array('title'=>$req->category_name));
        }
        if($result)
        {
            return redirect('/categories')->with('success','Category Updated..!!');
        }else {
            return redirect('/categories')->with('error','Try Again..!!');
        }
    }

    static public function sub_cat($id)
    {
        $category=category::where([['aid','=',Session::get('aid')],['parent_id','=',$id],['status','!=','R']])
        ->orderBy('id','DESC')
        ->get();        
        if($category->count()>0)
        {
            foreach ($category as $key => $value) {
                $sub_cat[]=array($value->title);
            }
            return json_encode($sub_cat);
        }
        else
        {
            $sub_cat[]=array('----');
            return json_encode($sub_cat);
        }
    }

    public function addsubcategory(Request $req)
    {
        // print_r($req->all());
        $category=category::where([['aid','=',Session::get('aid')],['parent_id','=',$req->main_cat],['status','!=','R'],['title','=',$req->subcategory_name]])->get();
        if($category->count()>0)
        {
            return redirect('/categories')->with('error',$req->subcategory_name.' Already Exist..!!');
        }else
        {
            $upfile=$req->subcategory_image;
            print_r(sizeof($upfile));
            foreach ($upfile as $key => $value) {
                $imageName = time() . $key . $value->getClientOriginalName();
                print_r($imageName);
                $value->move('public/images/category', $imageName);
                $cat=new category;
                $cat->aid=Session::get('aid');
                $cat->title=$req->subcategory_name;
                $cat->img='images/category/'.$imageName;
                $cat->date=date('Y-m-d h:i:s');
                $cat->parent_id=$req->main_cat;
                $cat->status='A';
                $cat->remark='';
                $result=$cat->save();
                if($result)
                {
                    return redirect('/categories')->with('success','Sub-Category Created..!!');
                }else {
                    return redirect('/categories')->with('error','Try Again..!!');
                }
            }
        }
    }

    public function get_subcatImg(Request $req)
    {
        $category=category::where('id','=',$req->cat)->get();
        return response()->json(['html'=>($category[0]->img),'status'=>'true']);
    }
    public function updatesubcategory(Request $req)
    {
        // print_r($req->all());
        if(isset($req->category_image))
        {
		    $upfile=$req->category_image;
            $imageName = time() . $upfile->getClientOriginalName();
            // print_r($imageName);
            $upfile->move('public/images/category', $imageName);
            $path='images/category/'.$imageName;
            $result=category::where('id','=',$req->subcategory_name)
            ->update(array('title'=>$req->new_subcategory_name,'img'=>$path));
        }else {
            $result=category::where('id','=',$req->subcategory_name)
            ->update(array('title'=>$req->new_subcategory_name));
        }
        if($result)
        {
            return redirect('/categories')->with('success','Sub-Category Updated..!!');
        }else {
            return redirect('/categories')->with('error','Try Again..!!');
        }
    }
}
