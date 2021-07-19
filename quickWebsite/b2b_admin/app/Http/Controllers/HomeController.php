<?php

namespace App\Http\Controllers;

use View;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {

	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */

	public function index() {
		return view('B2Cadmin/Dashboard/dashboard');
	}

	// public function editProfile() {
	// 	return view('edit-profile');
	// }

	public function login() {
		return view('B2Cadmin/login');
	}

	public function getotp() {
		return view('B2Cadmin/otp');
	}

	public function setupstore() {
		return view('B2Cadmin/setupstore');
	}
	
	public function bustype() {
		return view('B2Cadmin/businesstype');
	}
	
	
}