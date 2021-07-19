<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\EndUser;
use App\Models\OTP;
use Carbon\Carbon;
use GuzzleHttp\Client;
use ourcodeworld\NameThatColor\ColorInterpreter;

use Session;
use DB;
use redirect;
use View;
use compact;

class Login extends Controller
{
    //
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

    public function profile1()
    {
                    // Session::put('aid','21');
    	if(session()->has('uid'))
    	{
            $aid = Session::get('uid');
            $user = EndUser::where('id','=',$aid)->first();
            $name = $user->name;

    		$html = '<a href="edit-profile">
                 <div class="sidenav-profile">
		         <div class="user-profile"><img src="img/bg-img/group.png" alt=""></div>
		        <div class="user-info">
		          <h6 class="user-name mb-0">'.$name.'</h6>
		          </div>
		      </div>
              </a>
		      <ul class="sidenav-nav ps-0">
              <li><a href="faqs">FAQs</a></li>
              <li><a href="help">Help & Support</a></li>
              <li><a href="contact">Contact</a></li>
              <li><a href="about-us">About Us</a></li>
              <li><a href="#">Term of Use</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a class="btn btn-danger" href="/quickWebsite/b2c/public/logout" id="sidebarbtn"><i class="lni lni-power-switch" style="padding-right: 9px;"></i>Log Out</a></li>


                <!-- <li><a href="/quickWebsite/b2c/public/"><i class="lni lni-home"></i>Home</a></li>
		        <li><a href="profile"><i class="lni lni-user"></i>My Profile</a></li>
		        <li><a href="feedback"><i class="lni lni-comments"></i>Feedback Us</a></li>-->
		         <li><a class="btn btn-danger" href="/quickWebsite/b2c/public/logout" id="sidebarbtn"><i class="lni lni-power-switch" style="padding-right: 9px;"></i>Sign Out</a></li>

		      </ul>
		      <!-- <div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-left"></i></div>-->';
		}
		else{
			$html='<ul class="sidenav-nav ps-0">
            <li><a href="faqs">FAQs</a></li>
              <li><a href="help">Help & Support</a></li>
              <li><a href="contact">Contact</a></li>
              <li><a href="about-us">About Us</a></li>
              <li><a href="#">Term of Use</a></li>
              <li><a href="#">Privacy Policy</a></li>
                <!-- <li><a href="/quickWebsite/b2c/public/"><i class="lni lni-home"></i>Home</a></li> -->
                <li><a class="btn btn-success" href="/quickWebsite/b2c/public/login" id="sidebarbtn"><i class="lni lni-power-switch" style="padding-right: 9px;"></i>Sign In</a></li>
				</ul>
      <!-- <div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-left"></i></div>-->';
		}
        
    // $html = "value";
    // return View::make('header',compact('html'));
      return  $html;

    }
    public function check_login(Request $req)
    {	
        $mobile = $_POST['mobile'];
        Session::put('mobile',$mobile);
    	$check1=DB::table('users')
        ->where('mobile','=',$mobile)
        ->select('*')
        ->get();
        // $check1=login::all();
        $check2=$check1->first();
        $check=$check1->count();
        
        // print_r($check1);
        if($check>0)
        {

    	$otp=mt_rand(1000,9999);
			if(!empty($mobile))
			{
			    $chk=OTP::where('MOBILE_NO','=',$mobile)->count();
			  if($chk>0)
			  {
                $user = OTP::where('MOBILE_NO',$mobile)->update(['OTP'=>$otp]);
			  }else{
                $user = new OTP;
                $user->MOBILE_NO = $mobile;
                $user->OTP = $otp;
                $user->save();
			 }
			  // echo "INSERT INTO `otp`(`MOBILE_NO`, `OTP`, `GENERATED_ON`) VALUES ('$userid','$otp','$dj')";
			// $sms="Dear Customer,\n$otp is you one time password(OTP). Please enter the OTP to proceed.\nTeam Saraogi Super Sales Pvt. Ltd.";
			// $sms=urlencode($sms);
			// $stringUrl = "http://mobicomm.dove-sms.com/mobicomm/submitsms.jsp?user=SSSWEB&key=ee8e045d46XX&mobile=$mobile&message=$sms&senderid=SLOTUS&accusage=6&entityid=1201159195401169497&tempid=1207162399163619133";
			// file_get_contents ($stringUrl);
            // $client = new Client();
            // $res = $client->post($stringUrl);
            // $res = $client->request('GET', $stringUrl);
            // echo $res->getStatusCode();
            // die();
		// $isError = 0;
  //       $errorMessage = true;

  //       //Your message to send, Adding URL encoding.
  //       $message = urlencode("Welcome to SSS , Your OTP is : $otp");
     

  //       //Preparing post parameters
  //       $postData = array(
  //           'authkey' => $this->API_KEY,
  //           'mobiles' => $mobileNumber,
  //           'message' => $message,
  //           'sender' => $this->SENDER_ID,
  //           'route' => $this->ROUTE_NO,
  //           'response' => $this->RESPONSE_TYPE
  //       );
     
  //       $url = "http://mobicomm.dove-sms.com/mobicomm/submitsms.jsp?user=SSSWEB";
     
  //       $ch = curl_init();
  //       curl_setopt_array($ch, array(
  //           CURLOPT_URL => $url,
  //           CURLOPT_RETURNTRANSFER => true,
  //           CURLOPT_POST => true,
  //           CURLOPT_POSTFIELDS => $postData
  //       ));
     
     
  //       //Ignore SSL certificate verification
  //       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  //       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     
     
  //       //get response
  //       $output = curl_exec($ch);
     
  //       //Print error if any
  //       if (curl_errno($ch)) {
  //           $isError = true;
  //           $errorMessage = curl_error($ch);
  //       }
  //       curl_close($ch);
  //       if($isError){
  //           return array('error' => 1 , 'message' => $errorMessage);
  //       }else{
  //           return array('error' => 0 );
  //       }

			}
		}else{
            $otp="mobile";
        }
        return $otp;
        // return view('login');
    }

    public function chk_otp()
    {
        $mobile = $_POST['mobile'];
        $otp = $_POST['otp'];
        $user = EndUser::where('mobile','=',$mobile)->first();
        $cont=OTP::where('MOBILE_NO','=',$mobile)->where('OTP','=',$otp)->count();
        if($cont>0){
            Session::put('uid',$user->id);
            Session::put('name',$user->name);
            $success = 'success';
        }else{
            $success = 'error';
        }
        return $success;
    }

    public function login()
    {
    	return View::make('login');
    }

    public function otpConfirm(Request $req)
    {
        $mobile = Session::get('mobile');

        // return view('otp-confirm');
        // return View::make('otp-confirm', compact('mobile'));
        return View::make('otp-confirm',compact('mobile'));
    }

    public function save_registeration(Request $req)
    {	
    	$name = $_POST['username'];
      $signin = '<a href="login">Sign In</a>';
    	$data = $req->input();
    	$user = new EndUser;
        $user->name = $data['username'];
        $user->alt_no = $data['phone'];
				$user->email = $data['email'];
				$user->gender = $data['gender'];
				$user->save();
    	// $name = $_POST['username'];
    	// Session::flash('message', 'This is a message!'); 
    	return redirect()->back()->with('message', $name.' You registered Successfully, Go to login ');
    }
    public function logout()
    {
        Session::flush();
        return redirect('/');

    }

    public function updateProfile(Request $req)
    {
        $uid = Session::get('uid');
        $data = $req->input();

        // $insert = EndUser::where('id',$uid)
        //           ->update(['name'=>$req->name,'email'=>$req->email,'address'=>$req->address,'gender'=>$req->gender,'alt_no'=>$req->alt_no,'landmark'=>$req->landmark,'city'=>$req->city,'state'=>$req->state,'pincode'=>$req->pin]);
        if ($req->hasFile('image')) {
        // your code here
          $data = $req->input('image');
          $photo = $req->file('image')->getClientOriginalName();
          $destination = base_path() . '/public/img';
          $req->file('image')->move($destination, $photo);
          $insert = EndUser::where('id',$uid)
                  ->update(['name'=>$req->name,'email'=>$req->email,'address'=>$req->address,'gender'=>$req->gender,'alt_no'=>$req->alt_no,'landmark'=>$req->landmark,'city'=>$req->city,'state'=>$req->state,'pincode'=>$req->pin,'img_path'=>$photo]);
          // echo $photo;
          // die();
        }
        else{
          $insert = EndUser::where('id',$uid)
                  ->update(['name'=>$req->name,'email'=>$req->email,'address'=>$req->address,'gender'=>$req->gender,'alt_no'=>$req->alt_no,'landmark'=>$req->landmark,'city'=>$req->city,'state'=>$req->state,'pincode'=>$req->pin]);
        }
        
        // $user = EndUser::where('id','=',$aid)->get();

        // return View::make('profile', compact('user','name'));
        return redirect('/edit-profile')->with('message','Updated your profile Successfully');
    }

    public function uploadImg(Request $req)
    {
        
    }

    public function register(Request $req)
    {
        return view('register');
    }

    public function color_code()
    {
        $instance = new ColorInterpreter();

        $result = $instance->name("#f3f1f1");

        // 1. Print the human name e.g "Deep Sea"
        echo $result["name"] . "\n";

        // 2. Print the hex code of the closest color with a name e.g "#01826B"
        echo $result["hex"] . "\n";

        // 3. Print wheter the given hex code is exact as a color with a name
        //    or if it has been derived
        if($result["exact"]){
            echo "The given hex code is exact as the name";
        }else{
            echo "A similar color with a name has been picked";
        }
    }
}
