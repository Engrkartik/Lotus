<?php

namespace App\Http\Controllers\Newadmin;


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
     * SHOWS EMPLOYEES LIST.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function employeelist()
    {
        return view('/newadmin/pages/employees');
    }

    /**
     * SHOWS DEPARTMENTS LIST.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function departments()
    {
        return view('newadmin/pages/departments');
    }
}
