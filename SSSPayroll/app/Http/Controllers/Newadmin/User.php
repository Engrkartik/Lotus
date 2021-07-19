<?php

namespace App\Http\Controllers\Newadmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use App\Http\Requests;
// use App\Http\Controllers\Controller;

class User extends Controller
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

    // public function index()
    // {
    //     echo"Working";
    // }

    /**
     * SHOWS EMPLOYEES  IN BLOCK.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function employee()
    {
        return view('newadmin/pages/admin/employees/employees');
    }

    /**
     * SHOWS EMPLOYEES LIST.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function employeelist()
    {
        return view('newadmin/pages/admin/employees/employeeslist');
    }

     public function permissions()
    {
        return view('newadmin/pages/admin/permission');
    }

    
}
