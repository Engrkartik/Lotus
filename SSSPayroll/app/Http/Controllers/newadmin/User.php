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

   public function companyGroup()
    {
        return view('newadmin/pages/companygroup/companygroup');
    }

    public function companyMapping()
    {
        return view('newadmin/pages/companygroup/companyMapping');
    }

     public function company()
     { 
        return view('newadmin/pages/companygroup/company'); 
    }

    public function companyLocation()
     { 
        return view('newadmin/pages/companygroup/companyLocation'); 
    }

     public function companyDepartment()
     { 
        return view('newadmin/pages/companygroup/companyDepartment'); 
    }

    public function subDepartment()
     { 
        return view('newadmin/pages/companygroup/subDepartment');
    }

    public function designation()
     { 
        return view('newadmin/pages/companygroup/designation');
    }

    public function grade()
     { 
        return view('newadmin/pages/companygroup/grade');
    }

    public function createShift()
    { 
       return view('newadmin/pages/admin/master/create_shift');
   }

   public function createLeave()
   { 
      return view('newadmin/pages/admin/master/create_leave');
  }

  public function createHoliday()
  { 
     return view('newadmin/pages/admin/master/create_holiday');
 }

 public function assignRoles()
 { 
    return view('newadmin/pages/admin/master/roles');
}

public function functionalRole()
 { 
    return view('newadmin/pages/admin/master/functionalRole');
}

public function userAdministration()
 { 
    return view('newadmin/pages/admin/master/userAdministration');
}

public function homeNew()
 { 
    return view('newadmin/pages/home2');
}
    
}
