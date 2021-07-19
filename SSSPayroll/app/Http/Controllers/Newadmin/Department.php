<?php

namespace App\Http\Controllers\Newadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Department extends Controller
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
    public function index()
    {
        return view('newadmin/pages/admin/departments/departments');
    }

    // public function leaves()
    // {
    //     return view('newadmin/pages/leaves');
    // }
}
