<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    //
    public function index(){
    	$msg = "hello";
    	return response()->json(array('msg'=> $msg), 200);
    }
}
