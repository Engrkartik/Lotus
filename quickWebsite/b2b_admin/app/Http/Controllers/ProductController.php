<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\product_img;
use App\Models\product;
use App\Models\set_details;
use App\Models\set_details_whole;
use App\Models\prod_attribute;
use DB;
use Session;
class ProductController extends Controller {

	public function __construct() {

	}

	public function index() {
		
        $item=DB::table('product')
                ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img and prod_img.aid=".Session::get('aid')." ORDER BY prod_img.id ASC LIMIT 1) as img_url"))
                ->where([['product.aid','=',Session::get('aid')],['product.status','!=','R']])
                ->orderBy('product.id','DESC')
                ->get();
		return view('B2Cadmin/Product/productlist')->with(compact('item'));

	}

	public function addproduct() {
		print_r(Session::get('aid'));
		$category=DB::table('category')->where([['aid','=',Session::get('aid')],['status','=','A'],['parent_id','=','0']])->get();
		$brand=DB::table('brand')->where([['aid','=',Session::get('aid')],['status','=','A']])->get();
		return view('B2Cadmin/Product/addproduct')->with(compact('category','brand'));

	}
	public function get_subcat(Request $req)
    {
        DB::enableQueryLog();
        $sub_cat=DB::table('category')->where([['parent_id','=',$req->cat],['aid','=',Session::get('aid')],['status','=','A']])->get();
        $att_type=DB::table('attributes')->where([['status','=','A'],['att_id','=',0]])
        ->where(function($query)
        {
            $query->where('aid','=',Session::get('aid'))
            ->orWhere('aid','=',0);
        })
        ->get();
        $html='';
        $type_html='';
        if($att_type->count()>0)
        {
        $type_html.="<option value=''>Select Option</option>";
            foreach ($att_type as $key => $value) {
                    $type_html .="<option value=".$value->id.">".$value->att_name."</option>";
            }
        }else {
            $type_html .="<option value=''>No Type</option>";
        }
        if($sub_cat->count()>0)
        {
        $html.="<option value=''>Select Option</option>";
            foreach ($sub_cat as $key => $value) {
                // if($value->id==$req->sub_cat)
                // {
                // $html .="<option value=".$value->id." selected='selected'>".$value->title."</option>";
                // }else {
                    $verify=product::where([['id','=',$req->item],['sub_cat','=',$value->id]])->get();
                    if ($verify->count()>0) {
                        $html .="<option value=".$value->id." selected='selected'>".$value->title."</option>";
                    }else
                    {
                    $html .="<option value=".$value->id.">".$value->title."</option>";
                    }
                // }
            }
        }else {
            $html .="<option value=''>No Sub Category</option>";
        }
        return response()->json(['html'=>($html),'status'=>'true','type_html'=>$type_html]);
    }

	public function editproduct($id,$img_id) {
        $item=DB::table('product')
        ->select('product.*',DB::raw("(SELECT prod_img.img_url FROM prod_img WHERE prod_img.img_id=product.img and prod_img.aid=".Session::get('aid')." ORDER BY prod_img.id ASC LIMIT 1) as img_url"),DB::raw("(SELECT color FROM `set_details` where aid=".Session::get('aid')." and pid=product.id) as color"),DB::raw("(SELECT size FROM `set_details` where aid=".Session::get('aid')." and pid=product.id) as size"))
        ->where([['product.aid','=',Session::get('aid')],['product.status','!=','R'],['product.id','=',$id]])
        ->orderBy('product.id','DESC')
        ->get();
        $category=DB::table('category')->where([['aid','=',Session::get('aid')],['status','=','A'],['parent_id','=','0']])->get();
		$brand=DB::table('brand')->where([['aid','=',Session::get('aid')],['status','=','A']])->get();
		$img=DB::table('prod_img')->where([['img_id','=',$img_id],['aid','=',Session::get('aid')]])->get();
		$attribute=DB::table('prod_attribute')
        ->leftjoin('product','product.att_id','prod_attribute.att_id')
        ->select('prod_attribute.sub_cat as type','prod_attribute.attribute as sub_type')
        ->where([['product.id','=',$id],['product.aid','=',Session::get('aid')]])->get();
		return view('B2Cadmin/Product/editproduct')->with(compact('item','category','brand','img','attribute'));

    }
    
    public function updateproduct(Request $req,$id)
    {
        print_r($req->all());
        $chk_pro=product::where('id','=',$id)->get();
        // print_r($chk);
        if($chk_pro[0]->img==0)
        {
            $chk=product_img::where('aid','=',Session::get('aid'))
                ->orderBy('img_id','DESC')
                ->take(1)
                ->get();
                $img_id=$chk->count()>0?($chk[0]->img_id)+1:1;
        }else {
            $img_id=$chk_pro[0]->img;
        }

        if ($chk_pro[0]->att_id==0) {
            $chk_att=prod_attribute::where('aid','=',Session::get('aid'))
                        ->orderBy('att_id','DESC')
                        ->take(1)
                        ->get();
                        $att_id=$chk_att->count()>0?($chk_att[0]->att_id)+1:1;
        }else {
            $att_id=$chk_pro[0]->att_id;
        }

        if(isset($req->firstproductimg))
                {
                    $upfile=$req->firstproductimg;
                foreach ($upfile as $key => $value) {
                    $imageName = time() . $key . '.' . $value->getClientOriginalExtension();
					print_r($imageName);
                    $value->move('public/images/item', $imageName);
                    //prod img insertion
                    $insert=new product_img;
                    $insert->img_id=$img_id;
                    $insert->img_url='public/images/item/'.$imageName;
                    $insert->date=date('Y-m-d H:i:s');
                    $insert->aid=Session::get('aid');
                    $result=$insert->save();
                }
                }
                 
                    if(isset($req->att))
                    {
                        $chk_att=prod_attribute::where('att_id','=',$att_id)->delete();
                        // $att_id=$chk_att->count()>0?($chk_att[0]->att_id)+1:1;
                        for ($i=0; $i <sizeof($req->att) ; $i++) {    
                        $att=new prod_attribute;
                        $att->aid=Session::get('aid');
                        $att->att_id=$att_id;
                        $att->cat_id=$req->category;
                        $att->sub_cat=$req->att[$i];
                        $att->attribute=$req->sub_att[$i];
                        $att->status='A';
                        $sv=$att->save();
                        }
                    }
                $resultF=product::where('id','=',$id)->update(array(
                'title'=>$req->productname,'item_name'=>$req->productname,'cat_id'=>$req->category,
                'sub_cat'=>$req->subcategory,'brand'=>$req->brand,'descrpt'=>$req->productdesc,
                'img'=>$img_id,'att_id'=>$att_id));
                if($resultF)
                {
                    if (isset($req->color) || isset($req->size)) {
                        $dele=DB::table('set_details')->where([['aid','=',Session::get('aid')],['pid','=',$id]])->delete();
                        $chk_set=DB::table('set_details')->where('aid','=',Session::get('aid'))
                        ->orderBy('set_id','DESC')
                        ->take(1)
                        ->get(); 
                        $set_id=$chk_set->count()>0?($chk_set[0]->set_id)+1:1;
                            $set=new set_details;
                            $set->aid=Session::get('aid');
                            $set->set_id=$set_id;
                            $set->pid=$id;
                            $set->color=$req->color;
                            $set->size=$req->size;
                            $set->date=date('Y-m-d');
                            $set->status='A';
                            $final=$set->save();
                        }
                }
                    if($resultF)
                    {
                    return redirect('product_list')->with('success','Updated Successfully..!!');
                } else {
                    return redirect('product_list')->with('error','Try Again..!!');
                }
                
    }

	public function save_product(Request $req)
	{
		print_r($req->all());
		$upfile=$req->firstproductimg;
		// for ($i=0; $i <sizeof($upfile) ; $i++) { 
		// 	# code...
		// 	print_r($upfile[$i]);
		// }
		// $upfile=$req->file('multprodimg');
		// print_r($upfile);
		$img_id=0;
		$att_id=0;
        
                if(isset($req->firstproductimg))
                {
                    $chk=product_img::where('aid','=',Session::get('aid'))
                ->orderBy('img_id','DESC')
                ->take(1)
                ->get();
                $img_id=$chk->count()>0?($chk[0]->img_id)+1:1;
                foreach ($upfile as $key => $value) {
                    $imageName = time() . $key . '.' . $value->getClientOriginalExtension();
					print_r($imageName);
                    $value->move('public/images/item', $imageName);
                    //prod img insertion
                    $insert=new product_img;
                    $insert->img_id=$img_id;
                    $insert->img_url='public/images/item/'.$imageName;
                    $insert->date=date('Y-m-d H:i:s');
                    $insert->aid=Session::get('aid');
                    $result=$insert->save();
                }
                }
                 
                    if(isset($req->att))
                    {
                        $chk_att=prod_attribute::where('aid','=',Session::get('aid'))
                        ->orderBy('att_id','DESC')
                        ->take(1)
                        ->get();
                        $att_id=$chk_att->count()>0?($chk_att[0]->att_id)+1:1;
                        for ($i=0; $i <sizeof($req->att) ; $i++) {    
                        $att=new prod_attribute;
                        $att->aid=Session::get('aid');
                        $att->att_id=$att_id;
                        $att->cat_id=$req->category;
                        $att->sub_cat=$req->att[$i];
                        $att->attribute=$req->sub_att[$i];
                        $att->status='A';
                        $sv=$att->save();
                        }
                    }
                $insert2=new product;
                $insert2->aid=Session::get('aid');
                $insert2->title=$req->productname;
                $insert2->item_name=$req->productname;
                $insert2->cat_id=$req->category;
                $insert2->sub_cat=$req->subcategory;
                $insert2->brand=$req->brand;
                $insert2->descrpt=$req->productdesc;
                $insert2->img=$img_id;
                $insert2->att_id=$att_id;
                $resultF=$insert2->save();
                if($resultF)
                {
                    if (isset($req->color) || isset($req->size)) {
                        $chk_set=DB::table('set_details')->where('aid','=',Session::get('aid'))
            ->orderBy('set_id','DESC')
            ->take(1)
            ->get(); 
                    $set_id=$chk_set->count()>0?($chk_set[0]->set_id)+1:1;
                            $set=new set_details;
                            $set->aid=Session::get('aid');
                            $set->set_id=$set_id;
                            $set->pid=$insert2->id;
                            $set->color=$req->color;
                            $set->size=$req->size;
                            $set->date=date('Y-m-d');
                            $set->status='A';
                            $final=$set->save();
                        }
                }
                    if($resultF)
                    {
                    return redirect('product_list')->with('success','Added Successfully..!!');
                } else {
                    return redirect('product_list')->with('error','Try Again..!!');
                }
                
                
	}
    public function sub_att(Request $req)
    {
        DB::enableQueryLog();
        $att_type=DB::table('attributes')->where([['status','=','A'],['att_id','=',$req->type]])
        ->where(function($query)
        {
            $query->where('aid','=',Session::get('aid'))
            ->orWhere('aid','=',0);
        })
        ->get();
        $type_html='';
        if($att_type->count()>0)
        {
        $type_html.="<option value=''>Select Option</option>";
            foreach ($att_type as $key => $value) {
                    $type_html .="<option value=".$value->id.">".$value->att_name."</option>";
            }
        }else {
            $type_html .="<option value=''>No Type</option>";
        }
        
        return response()->json(['status'=>'true','type_html'=>$type_html]);
    }    
    
    public function show_colorSize(Request $req)
    {
        $color_chk=set_details::where([['aid','=',Session::get('aid')],['pid','=',$req->item_id]])
        ->get();
        // $size_chk=DB::table('product')
        // ->select(DB::raw("(SELECT size FROM `set_details` where aid=".Session::get('aid')." and pid=product.id) as size"))
        // ->where([['product.aid','=',Session::get('aid')],['product.status','=','A'],['product.id','=',$req->item_id]])
        // ->orderBy('product.id','DESC')
        // ->get();
        $html_color='';
        $html_size='';
        $html_table='';
        $color=json_decode($color_chk[0]->color);
        $sizes=json_decode($color_chk[0]->size);
        $size=str_replace('[','',str_replace('"','',str_replace(']','',$color_chk[0]->size)));
        // $size=$size_chk[0]->size;
        if($color_chk->count()>0)
        {
            if(empty($color))
            {
            $html_color='<span style="text-align:center;color:black;">No Color Listed..!!</span>';
            }else
            {
                for ($i=0; $i <sizeof($color) ; $i++) { 
                    
                    $html_color.='<div class="colorcircle mr-2" style="background-color:'.$color[$i].'"></div>';
                }
            }
            if ($size=='') {
            $html_size='<span style="text-align:center;color:black;">No Size Listed..!!</span>';
            }
            else {
                $html_size='<span style="text-align:center;color:black;">'.$size.'</span>';
            }
            
            // $html_table.='<table class="table"><thead><tr><th>#</th><th>Color</th><th>Size</th><th>Quantity</th></tr></thead><tbody>';
            
            if (($size!='') && (empty($color))) 
            {
                for ($j=0; $j <sizeof($sizes) ; $j++) { 
                    $html_table.='<div class="row1">
                    <div class="column1">
                      <div class="card1">
                        <small>No Color Added..!!</small>
                        <p style="color: black;">'.$sizes[$j].'</p><br>
                        <input type="number" class="form-control" min="0" disabled>
                      </div>
                    </div></div>'; 
                }
            }
            elseif (($size=='') && (!empty($color))) 
            {
                for ($j=0; $j <sizeof($color) ; $j++) { 
                    $html_table.='<div class="row1">
                    <div class="column1">
                      <div class="card1">
                      <div class="colorcircle mr-2" style="background-color:'.$color[$j].'"></div>
                        <small>No Size Added..!!</small><br>
                        <input type="number" class="form-control" min="0" disabled>
                      </div>
                    </div></div>'; 
                }
            }
             elseif(($size!='') && (!empty($color))) {
                for ($j=0; $j <sizeof($color) ; $j++) { 
                    $html_table.='<div class="row1">';
                    for ($k=0; $k <sizeof($sizes) ; $k++) { 
                        $html_table.='<div class="column1">
                      <div class="card1">
                      <div class="colorcircle mr-2" style="background-color:'.$color[$j].'"><input type="hidden" value="'.$color[$j].'" name="color[]"></div>
                      <p style="color: black;">'.$sizes[$k].'<input type="hidden" value="'.$sizes[$k].'" name="size[]"></p><br>
                      <input type="number" class="form-control" min="0" value="0" name="qty[]">
                      </div>
                    </div>'; 
                    }
                    $html_table.='</div>';
                }
            }

            // $html_table.='</tbody></table>';
                 
        }else {
            $html_color='<span style="text-align:center;color:black;">No Color Listed..!!</span>';
            $html_size='<span style="text-align:center;color:black;">No Size Listed..!!</span>';
        }
        return response()->json(['color'=>$html_color,'size'=>$html_size,'table'=>$html_table]);
        // return response()->json(['color'=>$html_color]);
    }
    public function create_set(Request $req)
    {
        print_r($req->all());
        $chk=set_details_whole::where([['aid','=',Session::get('aid')],['pid','=',$req->product]])->orderBy('id','DESC')->get();
        $chk2=set_details_whole::where('aid','=',Session::get('aid'))->orderBy('id','DESC')->get();
        $s_id=$chk->count()>0?$chk[0]->s_id:($chk2->count()>0?($chk2[0]->s_id)+1:1);
        $set_id=$chk->count()>0?($chk[0]->set_id)+1:1;
        for ($i=0; $i <sizeof($req->color) ; $i++) 
        {     
            $ins=new set_details_whole;
            $ins->aid=Session::get('aid');
            $ins->s_id=$s_id;
            $ins->set_id=$set_id;
            $ins->pid=$req->product;
            $ins->color=$req->color[$i];
            $ins->size=$req->size[$i];
            $ins->wsp=$req->price;
            $ins->mrp=$req->price;
            $ins->qty_set=$req->qty_set;
            $ins->gst=$req->tax;
            $ins->qty=$req->qty[$i];
            $result=$ins->save();
        }
        if($result)
        {
            return redirect('/product_list')->with('success','Set has been created..!!');
        }else {
            return redirect('/product_list')->with('error','Try again..!!');
        }

    }

    public function view_set($id)
    {
        $set=DB::table('set_details_whole')
        ->leftjoin('product','set_details_whole.pid','product.id')
        ->select('set_details_whole.*','product.item_name as item_name')
        ->where([['set_details_whole.aid','=',Session::get('aid')],['set_details_whole.pid','=',$id]])->groupBy('set_details_whole.set_id')->get();
        return view('B2Cadmin/Product/view_set')->with(compact('set'));
    }

    static public function get_set_detail($set_id,$s_id)
    {
        $set=DB::table('set_details_whole')
        ->leftjoin('product','set_details_whole.pid','product.id')
        ->select('set_details_whole.*','product.item_name as item_name')
        ->where([['set_details_whole.aid','=',Session::get('aid')],['set_details_whole.set_id','=',$set_id],['set_details_whole.s_id','=',$s_id]])->get();
        return $set;
    }

    public function update_set(Request $req,$set_id,$pid)
    {
        print_r($req->all());
        // for ($i=0; $i <sizeof($req->color) ; $i++) 
        // { 
        //     $chk=set_details_whole::where([['aid','=',Session::get('aid')],['pid','=',$pid],['color','=',$req->color[$i]],['size','=',$req->size[$i]]])
        //         ->update(array('qty'=>$req->qty[$i]))
        //         ->get();
        // }
        // if($chk)
        // {
        //     return redirect('')
        // }
        
    }

    public function change_status(Request $req)
    {
        // print_r($req->all());
        $upd=product::where('id','=',$req->product_id)->update(array('status'=>$req->st));
        if($upd)
        {
            return response()->json(['status'=>true,'data'=>($req->st=='A')?'Product Activated..!!':'Product De-Activated..!!']);
        }else {
            return response()->json(['status'=>false,'data'=>'Try again..!!']);
        }
    }
}
