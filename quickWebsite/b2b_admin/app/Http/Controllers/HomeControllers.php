<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\otp;
use view;
use DB;
use Session;
class HomeControllers extends Controller
{
    //
    public function index(Type $var = null)
    {
        return view('B2Cadmin/Dashboard/dashboard');
    }
    public function getotp()
    {
        return view('B2Cadmin/otp');
    }
    public function gen_otp(Request $req)
    {
        print_r($req->all());
        $chk=DB::table('otp')->where('MOBILE_NO','=',$req->login_mobile)->get();
        print_r($chk->count());
        if($chk->count()>0)
        {
            $otp='1234';
            // $upt=DB::table('otp')->where('MOBILE_NO','=',$req->login_mobile)->update(array('OTP'=>$otp));
            $upt=1;
        }else
        {
            $otp='1234';
            $ins=new otp;
            $ins->MOBILE_NO=$req->login_mobile;
            $ins->OTP=$otp;
            $upt=$ins->save();
        }
        print_r($upt);
        if($upt)
        {
            return redirect('/get-otp')->with('success','OTP Sent Successfully..!!')->with('mobile',$req->login_mobile);
        }else {
            return redirect('/')->with('error','Try again..!!');
        }
    }
    public function verify_otp(Request $req,$mob)
    {
        print_r($req->all());
        $otp=$req->a.''.$req->b.''.$req->c.''.$req->d;
        // $otp='1234';
        $chk=DB::table('otp')->leftjoin('admin','admin.mobile','otp.MOBILE_NO')
        ->select('admin.*')
        ->where([['admin.mobile','=',$mob],['otp.OTP','=',$otp],['admin.business_type','=','W'],['admin.status','=','A']])->get();
        if($chk->count()>0)
        {
            $chk2=DB::table('otp')->leftjoin('admin','admin.mobile','otp.MOBILE_NO')
            ->select('admin.*')
            ->where([['admin.mobile','=',$mob],['otp.OTP','=',$otp],['admin.business_type','=','W'],['admin.status','=','A']])->get();
            foreach ($chk2 as $key => $value) {
                Session::put('aid',$value->id);                
            }
            return redirect('/home');
        }else {
            return redirect('/')->with('error','Mobile Number does not register with us..!!');
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}