<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\employees;
use App\managers;
use App\company;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use App\Rules\Captcha;


class RegisterController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    // override the method
    // public function showRegistrationForm() {
    //     $companies = company::all();
    
    //     return view ('auth.register', compact('companies'));
    // }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'g-recaptcha-response' => new Captcha(),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
     

    protected function create(array $data)
    {
    //     $useremail = $data['email'];
    //     $excludeemail = 'gmail';
	   // if(preg_match("/".$excludeemail."/", $useremail) !== false){
	   //    //echo ('NO you are not the right person');
	   //    return redirect('https://lms.agnisys.com/user-account/');
	   // }

	    if($data['birthday'] == ''){ 
          if(preg_match('(gmail|yahoo|hotmail)', $data['email']) === 0) { 
            $cid = 0;
            // $cmp = company::findOrDo($id,function(){
            //       return 0;
            //     });
            
            $cmp = company::select('*')->where('name','like','%'.$data['company'].'%')->get();
            
            
    
    	    // die($Company_name);
    	    
    	    
            // if($cmp){
            //     $Company_name = $cmp[0]->name;
            //     $cid = $cmp[0]->id;
                
            // }
            
            // else{
                
            //     company::create([
            //         'name' => $data['company'],
            //         'domain' => '',
            //         'address' => '',
            //         'phone' => '',
            //         'logo'  => '',
            //         'finance_contact' => '',
            //         'technical_contact' => '',
            //         'license_sw_contact' => '',
                    
            //         ]);
            //     $cmp = company::select('id')->orderBy('id', 'desc')->limit(1)->get();
            //     $cid = $cmp[0]->id;
            // }
            
            if($data['type'] == 'e'){
                $emp = employees::create([
                    'first_name' => $data['fname'],
                    'last_name' => $data['lname'],
                    'type' => $data['type'],
                    'cid' => $cid,
                    'dob' => '2012-12-12',
                ]);
                $empId = employees::select('id')->orderBy('id', 'desc')->limit(1)->get();
                //$users = DB::table('users')->select('id','name','email')->get();
            }
            else{
                $emp = managers::create([
                    'first_name' => $data['fname'],
                    'last_name' => $data['lname'],
                    'type' => $data['type'],
                    'cid' => $cid,
                    'dob' => '2012-12-12',
                ]);
                $empId = managers::select('id')->orderBy('id','desc')->limit(1)->get();
            }
            //Console::info('sgsdsgsg');
            
            // die("2");
           
            Mail::send(['html' => 'admin.mails.signup'], ['type' => 'user'], function ($message) use($data) {
                $message->to($data['email'], '')->subject('New User Registration');
                $message->from('marcom@agnisys.com', 'Marcom');
            });
            
    
            
            Mail::send(['html' => 'admin.mails.signup'], ['type' => 'admin', 'name' => $data['fname'], 'email' => $data['email'], 'company' => $data['company'] ], function ($message) {
                $message->to('marcom@agnisys.com', '')->cc(['neena@agnisys.com'])->subject('New User Registration');
                $message->from('marcom@agnisys.com', 'Marcom');
            });
           
                $fname=$data['fname'];
                $lname=$data['fname'];
                $email=$data['email'];
                $password=$data['password'];
                
                // $curl = curl_init();
                // curl_setopt_array($curl, array(
                //     CURLOPT_URL => "https://lms.agnisys.com/wp-json/v1/UserRegister",
                //     CURLOPT_RETURNTRANSFER => true,
                //     CURLOPT_ENCODING => "",
                //     CURLOPT_MAXREDIRS => 10,
                //     CURLOPT_TIMEOUT => 30,
                //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                //     CURLOPT_CUSTOMREQUEST => "POST",
                //     CURLOPT_POSTFIELDS => array('first_name'=> $fname,'password' => $password,'last_name' =>$lname,'email'=> $email ),
                // ));
                // $response = curl_exec($curl);
                // $err = curl_error($curl);
                // curl_close($curl);
                
                
                
               
            return User::create([
                'name' => $data['fname']." ".$data['lname'],
                'email' => $data['email'],
                'username' => $data['email'],
                'company' => $data['company'],
                'password' => Hash::make($data['password']),
                'type' => $data['type'],
                'cid' => $cid,
                'ref_id' => $empId[0]->id, 
                'role' => $data['role'],
                'status' => 1,
                //7021913377
            ]);
          }
          else{
            echo ('Use the company email to register this application');
          }
        }
        else{
            echo ('Oops! You are not allowed to access this application');
        }
    }
}
