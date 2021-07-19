<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_img;
use App\Models\product;
use DB;
use Session;
class ProductController extends Controller {

	public function __construct() {

	}

	public function index() {
		
		return view('B2Cadmin/Product/productlist');

	}

	public function addproduct() {
		print_r(Session::get('aid'));
		$category=DB::table('category')->where([['aid','=',Session::get('aid')],['status','=','A'],['parent_id','=','0']])->get();
		return view('B2Cadmin/Product/addproduct')->with(compact('category'));

	}
	public function get_subcat(Request $req)
    {
        $sub_cat=DB::table('category')->where([['parent_id','=',$req->cat],['aid','=',Session::get('aid')],['status','=','A']])->get();
        $html='';
        if($sub_cat->count()>0)
        {
        $html.="<option value=''>Select Option</option>";
            foreach ($sub_cat as $key => $value) {
                if($value->id==$req->sub_cat)
                {
                $html .="<option value=".$value->id." selected='selected'>".$value->title."</option>";
                }else {
                    $html .="<option value=".$value->id.">".$value->title."</option>";
                }
            }
        }else {
            $html .="<option value=''>No Sub Category</option>";
        }
        return response()->json(['html'=>($html),'status'=>'true']);
    }

	public function editproduct() {
		
		return view('B2Cadmin/Product/editproduct');

    }
    
    public function addproduct2() {
		
		return view('B2Cadmin/Product/addproduct2');

    }
    
    public function editproduct2() {
        
		return view('B2Cadmin/Product/editproduct2');
    }

	public function save_product(Request $req)
	{
		print_r($req->all());
		$upfile=$req->multprodimg;
		for ($i=0; $i <sizeof($upfile) ; $i++) { 
			# code...
			print_r($upfile[$i]);
		}
		// $upfile=$req->file('multprodimg');
		// print_r($upfile);
		// $chk=product_img::where('aid','=',Session::get('aid'))
        //         ->orderBy('img_id','DESC')
        //         ->take(1)
        //         ->get();
                
        //         $img_id=$chk->count()>0?($chk[0]->img_id)+1:1;
        //         foreach ($upfile as $key => $value) {
        //             $imageName = time() . $key . '.' . $value->getClientOriginalExtension();
		// 			print_r($imageName);
        // //             $value->move('public/images/item', $imageName);
        // //             //prod img insertion
        // //             $insert=new product_img;
        // //             $insert->img_id=$img_id;
        // //             $insert->img_url='public/images/item/'.$imageName;
        // //             $insert->date=date('Y-m-d H:i:s');
        // //             $insert->aid=Session::get('aid');
        // //             $result=$insert->save();
        //         }
                // $insert2=new product;
                // $insert2->aid=Session::get('aid');
                // $insert2->img=$img_id;
                // $resultF=$insert2->save();
                
	}

    public function attributesview() {
		
		return view('B2Cadmin/Product/attributes');

    }

    public function addview() {
		
		return view('B2Cadmin/Product/add');

    }
}
