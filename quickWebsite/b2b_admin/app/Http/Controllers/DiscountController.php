<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\discount;
use App\Models\product;
use App\Models\category;
use Session;
use DB;
class DiscountController extends Controller
{
    //
    public function discount()
    {
        $discount=DB::table('discount as A')
        ->select('A.*',DB::raw("(SELECT COUNT(B.pid) FROM discount as B WHERE A.disc_id=B.disc_id) as item_count"))
        ->where([['A.aid','=',Session::get('aid')],['A.status','=','A']])->groupBy('A.disc_id')->orderBy('A.disc_id','DESC')->get();

        $cat_prod=DB::table('product')
        ->leftjoin('category','category.id','product.cat_id')
        ->select('category.*')
        ->where([['category.aid','=',Session::get('aid')],['category.status','=','A'],['product.status','=','A']])
        ->DISTINCT('category.title')
        ->orderBy('category.title','ASC')
        ->get();
        return view('B2Cadmin/Discount/discount')->with(compact('discount','cat_prod'));
    }

    public function add_discount(Request $req)
    {
        // print_r($req->selected_item[0]);
        $chk=discount::where([['aid','=',Session::get('aid')],['disc_name','=',$req->discount_name],['status','=','A']])->get();
        if($chk->count()>0)
        {
            return redirect('/discount')->with('error',$req->discount_name.' already exist..!!');
        }else {
            $chk_d=discount::where('aid','=',Session::get('aid'))->orderBy('id','DESC')->limit(1)->get();
            $disc_id=$chk_d->count()>0?($chk_d[0]->disc_id)+1:1;
            if($req->selected_item==null)
            {
                $dis=new discount;
                $dis->disc_id=$disc_id;
                $dis->aid=Session::get('aid');
                $dis->disc_name=$req->discount_name;
                $dis->disc_type=$req->disc_type;
                $dis->disc=$req->disc;
                $dis->from_dt=$req->start_dt;
                $dis->to_dt=$req->end_dt;
                $result=$dis->save();
            }else
            {
                $item=json_decode($req->selected_item);
                for ($i=0; $i <sizeof($item) ; $i++) 
                { 
                    $dis=new discount;
                    $dis->disc_id=$disc_id;
                    $dis->aid=Session::get('aid');
                    $dis->pid=$item[$i];
                    $dis->disc_name=$req->discount_name;
                    $dis->disc_type=$req->disc_type;
                    $dis->disc=$req->disc;
                    $dis->from_dt=$req->start_dt;
                    $dis->to_dt=$req->end_dt;
                    $result=$dis->save();
                }
            }
            if ($result) {
                return redirect('/discount')->with('success',$req->discount_name.' Created..!!');
            }else {
                return redirect('/discount')->with('error','Try Again..!!');
            }
        }
       
    }

    public function update_discount(Request $req,$id)
    {
        
        // print_r($req->input('discount_name'.$id));
        print_r($req->all());
        $result=false;
        if($req->selected_item=='[]')
        {
            $del=discount::where('disc_id','=',$id)->delete();
            $dis=new discount;
            $dis->disc_id=$id;
            $dis->aid=Session::get('aid');
            $dis->disc_name=$req->input('discount_name'.$id);
            $dis->disc_type=$req->input('disc_type'.$id);
            $dis->disc=$req->input('disc'.$id);
            $dis->from_dt=$req->input('start_dt'.$id);
            $dis->to_dt=$req->input('end_dt'.$id);
            $result=$dis->save();
        }else
        {
            $item=json_decode($req->selected_item);
            // print_r(sizeof($item));
            // $del=discount::where('disc_id','=',$id)->delete();
            if(sizeof($item)>0)
            {
                $del=discount::where('disc_id','=',$id)
                ->delete();
            }
            for ($i=0; $i <sizeof($item) ; $i++) 
            { 
                $dis=new discount;
                $dis->disc_id=$id;
                $dis->aid=Session::get('aid');
                $dis->pid=$item[$i];
                $dis->disc_name=$req->input('discount_name'.$id);
                $dis->disc_type=$req->input('disc_type'.$id);
                $dis->disc=$req->input('disc'.$id);
                $dis->from_dt=$req->input('start_dt'.$id);
                $dis->to_dt=$req->input('end_dt'.$id);
                $result=$dis->save();
               
            }
        }
        if ($result) {
          
            return redirect('/discount')->with('success',$req->discount_name.' Updated..!!');
        }else {
            return redirect('/discount')->with('error','Try Again..!!');
        }
           
    }
    static public function cat_prod($cat_id,$disc_id)
    {
         $cat=DB::table('category')
        ->leftjoin('product','category.id','product.cat_id')
        ->select('category.title as cat_name','product.item_name as item_name','product.id as item_id',DB::raw("(SELECT IF((SELECT COUNT(id) FROM discount WHERE product.id=discount.pid and disc_id='".$disc_id."')>0,'Yes','No') ) as avl_disc"))
        ->where([['category.aid','=',Session::get('aid')],['category.status','=','A'],['product.status','=','A'],['category.id','=',$cat_id]])
        ->orderBy('category.title','ASC')
        ->get();
        return $cat;
    }

    public function check_discount(Request $req)
    {
        $st='';
        $dt='';
        $from=$req->start_dt;
        $to=$req->end_dt;
        if($req->item==null)
        {
            $st=false;
            $dt='';
        }
        else
        {
            $st=false;
            for ($i=0; $i <sizeof($req->item) ; $i++) 
            { 
                $chk=DB::table('discount')->where([['discount.aid','=',Session::get('aid')],['discount.pid','=',$req->item[$i]],['discount.status','=','A']])
                ->leftjoin('product','product.id','discount.pid')
                ->select('product.item_name')
                ->where(function($main_q) use ($from,$to){
                    $main_q->where([['discount.from_dt','<=',$from],['discount.to_dt','>=',$to]])
                    ->Orwhere(function($main_q1) use($from,$to){
                        $main_q1->OrwhereBetween('discount.from_dt',[$from,$to]);
                    })
                    ->Orwhere(function($main_q2) use($from,$to){
                        $main_q2->OrwhereBetween('discount.to_dt',[$from,$to]);
                    });
                });
                if (isset($req->disc)) {
                    $chk=$chk->where('discount.disc_id','!=',$req->disc);
                }
                $chk=$chk->get();
                if($chk->count()>0)
                {
                    $st=true;
                    $dt=$chk[0]->item_name;
                }
            }
        }
        return response()->json(['status'=>$st,'data'=>$dt]);
    }

    static public function get_item($disc_id)
    {
        $cat=DB::table('discount')->where([['discount.aid','=',Session::get('aid')],['discount.disc_id','=',$disc_id]])
        ->leftjoin('product','product.id','discount.pid')
        ->leftjoin('category','category.id','product.cat_id')
        ->select('product.item_name','category.title as cat_name','category.id as cat_id')
        ->groupBy('category.title')
        ->orderBy('category.title','ASC')
        ->get();
        $data=[];
        foreach ($cat as $key => $value) {
            $item=DB::table('discount')->where([['category.id','=',$value->cat_id],['discount.aid','=',Session::get('aid')],['discount.disc_id','=',$disc_id]])
            ->leftjoin('product','product.id','discount.pid')
            ->leftjoin('category','category.id','product.cat_id')
            ->select('product.item_name','category.title as cat_name')
            ->orderBy('category.title','ASC')
            ->get();
            $items=[];
            foreach ($item as $keys => $values) {
                $items[]=$values->item_name;
            }
            $data[]=array('cat'=>$value->cat_name,
                        'item'=>json_encode($items));
        }
        return json_encode($data);
    }

}
