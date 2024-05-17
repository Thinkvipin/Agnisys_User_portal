<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\company;
use App\issues;
use App\notification;
use App\User;
use App\employees;
use App\managers;
use App\session;
use Illuminate\Support\Facades\View;
use League\Csv\Reader;
use Mail;
use App\Mail\mailController;
use Illuminate\Support\Facades\DB;

class apiController extends Controller
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
     * check session
     */
    public function checkSession(Request $request,$uid){
        
        // Auth::loginUsingId(4);
        $ip = $request->ip();
        $data = session::select('*')->where('user_id',$uid)->get()->first();
        if($data)
            {
                Auth::loginUsingId($data->user_id);
                
                if (Auth::user()) {   // Check is user logged in
                    // dd("1");
                    return response()->json(["status" => 1, "ip"=>$ip, "data" => $data->user_id]);
        
                } else {
                    // dd("0");
                    return response()->json(["status" => 0, "ip"=>$ip]);
                }
            }
            else{
                return response()->json(["status" => 0, "ip"=>$ip]);
            }
        
        
    }
    /**
     * login
     */
    public function login(Request $request){
        $email = "anupam@agnisys.com";
        $pass = "123456";
        
        
        
    }
    
    public function merge(Request $request){
        $q = $request->cmd;
        dd($q);
        if($request->cmd == 'select'){
            $data = DB::select($q);
            return response()->json(["data" => $data]);
        }
        
    }
}