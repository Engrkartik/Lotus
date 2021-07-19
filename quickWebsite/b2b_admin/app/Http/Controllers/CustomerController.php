<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\district;
use DB;
use Session;
class CustomerController extends Controller
{
    public function customer()
    {
        $customer=customer::where([['aid','=',Session::get('aid')],['status','!=','R']])->orderBy('id','DESC')->get();
        $state=district::where('india','=','INDIA')->groupBy('state')->get();
        return view('B2Cadmin/Customer/customer')->with(compact('customer','state'));
    }
    public function add_customer(Request $req)
    {
        $state=district::where('india','=','INDIA')->groupBy('state')->get();
        return view('B2Cadmin/Customer/add_customer')->with(compact('state'));
    }
    public function fetch_district(Request $req)
    {
        $state=district::where([['india','=','INDIA'],['state','=',$req->state]])->get();
        $html='<option value="">Select District</option>';
        foreach ($state as $key => $value) {
            if (isset($req->district) && ($req->district==$value->district)) {
                $html.='<option value="'.$value->district.'" selected>'.$value->district.'</option>';
            }
            else {
                $html.='<option value="'.$value->district.'">'.$value->district.'</option>';
            }
        }
        return response()->json(['status'=>($state->count()>0?'true':'false'),'html'=>$html]);
    }

    public function add_cust(Request $req)
    {
        print_r($req->all());
        $path='';
        if(isset($req->firstcustomerimg))
        {
            $upfile=$req->firstcustomerimg;
            $imageName=time().$upfile[0]->getClientOriginalName();
            $upfile[0]->move('public/images/customer',$imageName);
            $path='public/images/customer/'.$imageName;
        }
        $cust=new customer;
        $cust->aid=Session::get('aid');
        $cust->OWNER_NAME=$req->customername;
        $cust->FIRM_NAME=$req->firm_name;
        $cust->BUSINESS=$req->business;
        $cust->ADDRESS=$req->address;
        $cust->COUNTRY='INDIA';
        $cust->STATE=$req->state;
        $cust->DISTRICT=$req->district;
        $cust->CITY=$req->city;
        $cust->PIN_CODE=$req->pin_code;
        $cust->CONTACT_NO=$req->mobile;
        $cust->ALT_NO=$req->alt_mobile;
        $cust->EMAIL_ID=$req->email_id;
        $cust->GST_TYPE='U';
        $cust->image=$path;
        $cust->STATUS='A';
        $result=$cust->save();
        if($result)
        {
            return redirect('/customer')->with('success',$req->firm_name.' Added Successfully..!!');
        }else {
            return redirect('/customer')->with('error','Try again..!!');
        }
    }

    public function edit_customer($id)
    {
        $customer=customer::where([['aid','=',Session::get('aid')],['status','!=','R'],['id','=',$id]])->orderBy('id','DESC')->get();
        $state=district::where('india','=','INDIA')->groupBy('state')->get();
        return view('B2Cadmin/Customer/edit_customer')->with(compact('customer','state'));    
    }
    public function edit_cust(Request $req,$id)
    {
        $path='';
        if(isset($req->firstcustomerimg))
        {
            $upfile=$req->firstcustomerimg;
            $imageName=time().$upfile[0]->getClientOriginalName();
            $upfile[0]->move('public/images/customer',$imageName);
            $path='public/images/customer/'.$imageName;
        }
        if($path!='')
        {
        $result=customer::where('id','=',$id)
        ->update(array('aid'=>Session::get('aid'),'OWNER_NAME'=>$req->customername,'FIRM_NAME'=>$req->firm_name,'BUSINESS'=>$req->business
        ,'ADDRESS'=>$req->address,'COUNTRY'=>'INDIA','STATE'=>$req->state,'DISTRICT'=>$req->district,'CITY'=>$req->city,
        'PIN_CODE'=>$req->pin_code,'CONTACT_NO'=>$req->mobile,'ALT_NO'=>$req->alt_mobile,'EMAIL_ID'=>$req->email_id,'image'=>$path));
        }else
        {
        $result=customer::where('id','=',$id)
        ->update(array('aid'=>Session::get('aid'),'OWNER_NAME'=>$req->customername,'FIRM_NAME'=>$req->firm_name,'BUSINESS'=>$req->business
        ,'ADDRESS'=>$req->address,'COUNTRY'=>'INDIA','STATE'=>$req->state,'DISTRICT'=>$req->district,'CITY'=>$req->city,
        'PIN_CODE'=>$req->pin_code,'CONTACT_NO'=>$req->mobile,'ALT_NO'=>$req->alt_mobile,'EMAIL_ID'=>$req->email_id));
        }
        if($result)
        {
            return redirect('/customer')->with('success',$req->firm_name.' Updated Successfully..!!');
        }else {
            return redirect('/customer')->with('error','Try again..!!');
        }
    }
}
