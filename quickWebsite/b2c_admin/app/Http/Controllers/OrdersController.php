<?php

namespace App\Http\Controllers;

use View;

class OrdersController extends Controller {
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

	public function order() {
		return view('B2Cadmin/Orders/orders');
	}


	
	
}