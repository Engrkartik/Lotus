<?php

namespace App\Http\Controllers\Newadmin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\employee;
use Session;
use DB;
use redirect;
class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $req)
    {
        $check1=DB::table('admin')
        ->where('phone_number','=',$req->username)
        ->where('password','=',$req->password)
        ->select('*')
        ->get();
        // $check1=login::all();
        $check2=$check1->first();
        $check=$check1->count();
        
        // print_r($check1);
        if($check>0)
        {
            // print_r($check);
            Session::put('aid',$check2->id);
            Session::put('name',$check2->company_name);
            if(!empty(Session::get('aid')))
            {
            
                return redirect('/home'); 

            }

        }else{
            $check_emp=DB::table('employee')
            ->where('emp_code','=',$req->username)
            ->where('password','=',$req->password)
            ->select('*')
            ->get();
            if($check_emp->count()>0)
            {
                foreach ($check_emp as $key => $value) {
                    Session::put('emp_id',$value->id);
                    Session::put('aid',$value->aid);
                    Session::put('name',$value->emp_name);

                }
                
            if(!empty(Session::get('aid')) && !empty(Session::get('emp_id')))
            {
                print_r(Session::get('aid'));
                print_r(Session::get('emp_id'));
                return redirect('/home'); 

            }
            }
             return redirect('/')->with('error', 'User does not exist! Please contact to admin.');
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect('/');

    }
     public function register()
    {
        return view('/newadmin/pages/register');
    }
}
