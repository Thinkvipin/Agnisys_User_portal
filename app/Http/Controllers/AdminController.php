<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Closure;
use App\company;
use App\issues;
use App\notification;
use App\User;
use App\employees;
use App\managers;
use App\fogbugzapis;
use App\usertracks;
use App\sessions;
use Illuminate\Support\Facades\View;
use Session;
use League\Csv\Reader;
use Mail;
use App\Mail\mailController;
require(getcwd() . '/mail.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use DateTime;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    
    public function Fogbugzlogoff($request){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = array();
        $headers[] = "Content-Type: application/json; charset=utf-8";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);

        return $result;
    }
    
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // fogbugz API logout & token delete from database 
        $TodayDate = date('Y-m-d');
        $fogbugzapis = fogbugzapis::select('*')->
                            where('login_time','<',$TodayDate)->
                            get();      
        foreach($fogbugzapis as $fogbugzapi){
            $apitoken = $fogbugzapi->token;
            $apitokenid = $fogbugzapi->id;
            $apilogintime = $fogbugzapi->login_time;
            $apilogintime = date('Y-m-d', strtotime($apilogintime)); 
            if($apilogintime < $TodayDate ){
                fogbugzapis::where('id',$apitokenid)->delete();
                $url = "https://agnisys.fogbugz.com/api.asp?cmd=logoff&token=".$apitoken;
                $result = $this->Fogbugzlogoff($url); 
            }
        }
        // end of Fogbugz api script
        
        //echo Auth::guard('web')->check();exit;
        // Get the currently authenticated user...
        $user = Auth::user();
        setcookie('uid',$user->id,time() + (86400 * 1), "/");
        setcookie('userAuth','AgnisysUser',time() + (86400 * 1), "/");
        if($user->status != 1 || $user->role == 'Subscriber' || $user->role == 'subscriber' ){
        
            Auth::logout();
            Session::flush();
            
            if($user->role == 'Subscriber' || $user->role == 'subscriber')
                session()->flash('alert-danger', 'You can login after verification');
            else
                session()->flash('alert-danger', 'You are unauthorized');
            return redirect('/');
        }
        // Get the currently authenticated user's ID...
        $id = Auth::id();
        $company = company::select('*')->where('id',$user->cid)->get();


        $issues = issues::select('*')->where('cid',$company[0]->id)->get();
        
        $TotlIssues = 0;
        $TotlActive = 0;
        foreach($issues as $issue){
            if($issue->status != 'Closed'){
                $TotlActive++;
            }
            $TotlIssues++;
        }  
        
        $notifications = notification::select('*')->where('cid',$company[0]->id)->get();
        $TotlNotifications = 0;
        
        // $result = $this->fogBugz("https://agnisys.com/wp-json/logon",'{
        //     "email": "Anupam@agnisys.com",
        //     "password": "secret456$"
        //   }');

        // dd("break");
        /**
         * fogBugz login
         */
        // $result = $this->fogBugz("https://agnisys.fogbugz.com/api/logon",'{
        //     "email": "Marcom@agnisys.com",
        //     "password": "1_agnisys##"
        //   }');
        // // dd($result);
        // if(!$result){
        //     return dd("Fogbuz Slow internet error (please refresh) !!");
        // }
        // $fb_login = json_decode($result);
        
        // $token = NULL;
        
        // try{
        //     $token = $fb_login->data->token;
        // }
        // catch(Exception $e){
        //     dd('Fogbugz login error');
        // }
        
        if(isset($_GET['passwordrest'])){
            $data = Session::all();
            $token = '';
        }
        else{
            $data = Session::all();
            $token = $data['fogbugz'];
            
            
        }
        
       
        if($token != ''){
        
        /**
         * fogBugz Cases
         */
            $result = $this->fogBugz("https://agnisys.fogbugz.com/api/listCases",'{
                
                "token": "'.$token.'",
                "cols": ["ixBug", "sTitle", "sCustomerEmail", "fOpen", "sTicket","ixCategory","sCategory","sPersonAssignedTo","dtOpened","ixStatus","ixPriority","sStatus","sPriority"],
                "max": 150
                }');
            $fb_cases = json_decode($result);
            // dd($result);
        }
        
        else{
            $result = $this->fogBugz("https://agnisys.fogbugz.com/api/logon",'{
                "email": "Marcom@agnisys.com",
                "password": "1_agnisys##"
              }');
            // dd($result);
            if(!$result){
                return dd("Fogbuz Slow internet error (please refresh) !!");
            }
            $fb_login = json_decode($result);
            
            $token = NULL;
            
            try{
                $token = $fb_login->data->token;
                Session(['fogbugz' => $token]);
            }
            catch(Exception $e){
                dd('Fogbugz login error');
            }
            $result = $this->fogBugz("https://agnisys.fogbugz.com/api/listCases",'{
                
                "token": "'.$token.'",
                "cols": ["ixBug", "sTitle", "sCustomerEmail", "fOpen", "sTicket","ixCategory","sCategory","sPersonAssignedTo","dtOpened","ixStatus","ixPriority","sStatus","sPriority"],
                "max": 150
                }');
            
            
            $fb_cases = json_decode($result);
        }
        /**
         *  fetching latest 2 issues
         */
        $issues = issues::select('*')->where('cid',$company[0]->id)->orderBy('id','DESC')->limit(2)->get();
        /**
         *  fetching all users
         */
        $users = User::select('name','username')->where('cid',$company[0]->id)->where('type','e')->get();
        /**
         * fetching notification latest one
         */
        $notifications = notification::select('*')->
                            where('type','alert')->
                            // where('companies','LIKE', '%'.$company[0]->id.'%')->
                            orderBy('id','DESC')->
                            get();
        /**
         * fetching the agnisys global notifications
         */
        $globalNoti = notification::select('*')->                            
                            where('type','danger')->
                            orderBy('id','DESC')->
                            limit(1)->get();
        $data = [
            'username' => $user->name,
            'company'  => $company[0]->name,
            'domain'  => $company[0]->domain,
            'userType' => $user->type,
            'logo'     => $company[0]->logo,
        ];
        
        
        // $userlogid = Session::get('userlogid');
        // $userlog = usertracks::select('*')->where('id', $userlogid )->get();
        // $userurl = $userlog[0]->url;
        
        // $trackurl = url()->full();
        // $userurllog = $userurl.", ".$trackurl;
        //     usertracks::where('id',$userlogid)
        //             ->update(['url' => $userurllog]);
        
        
        
        
        Session([
            'username'    => $user->name,
            'userMail'    => $user->email,
            'uid'         => $id,
            'role'        => $user->role,
            'company'     => $company[0]->name,
            'domain'     => $company[0]->domain,
            'logo'        => $company[0]->logo,
            'userType'    => $user->type,
            'refId'       => $user->ref_id,
            'cid'         => $company[0]->id,
            'issues'      => $issues,
            'TotalIssues' => $TotlIssues,
            'TotalActive' => $TotlActive,
            'TotalNotifications' => $TotlNotifications,
            'key'         => $token,
            
        ]);
    
        

        if(!$fb_cases){
            dd("fogbuz Error unable to login !!");
        }
        //dd(Session::all());
        // for super user
        // Mail::to($data['email'])->send(new WelcomeMail($user));

        // Registered User update to subscriber in 30 days
        $RegUsers = User::select('id','created_at')->where('role','Registered')->get();
        foreach($RegUsers as $reguser)
        {
            $RegCreated_At = $reguser->created_at;
            $RegNewDate = date("d-M-Y", strtotime($RegCreated_At));
            $RegDatethirtyDays = date('d-M-Y', strtotime($RegNewDate. ' + 30 days'));
            $CurrentDate = date("d-M-Y");
            if(strtotime($CurrentDate) > strtotime($RegDatethirtyDays)){
                
                User::where('id',$reguser->id)->update(
                            array(
                                "role" => "Subscriber",
                            )
                        );
            } 
        }
        
      
        
        
        
        
    

        /* For Wp Login */  
        $ciphering = "AES-128-CTR"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 

        // Non-NULL Initialization Vector for encryption  & Store the encryption key 
        $encryption_iv = '1142727464368974'; 
        $encryption_key = "iYWg65.p*?Dw()&Ssk%!<zEW/-AQ:a+S)RR>MrS7o2}rs2=nq|*U{_4Et{WfPk1}"; 

        // Use openssl_encrypt() function to encrypt the data 
        $encryption_email = openssl_encrypt($user->email, $ciphering, $encryption_key, $options, $encryption_iv); 

        $wp_user_data = [
            'email' =>  $user->email,
            'eid'   =>  $encryption_email,
            'id'    =>  $id,
            'token' =>  time(),
        ];

        
        

        $page =1;
        if($user->id == 450)
            return view('admin.superAdmin.superAdmin',compact('page','data','fb_cases','issues','users','notifications','globalNoti','wp_user_data','RegUsers'));
        
        return view('admin.index',compact('page','data','fb_cases','issues','users','notifications','globalNoti','wp_user_data'));
        
        
        
    }
    
    /**
     * Profile
     */
    public function profile(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        if(!isset($data['cid'])){
            return redirect('/');
        }

        $user = User::select('*')->where('id',$data['uid'])->get();
        
        // if($data['userType'] == 'e'){
            $refData = employees::select('*')->where('id',$data['refId'])->get();
        // }
        // else{
        //     $refData = managers::select('*')->where('id',$data['refId'])->get();
        // }
        
        $page = 12;
        if($data['role'] == 'Admin')
            return view('admin.superAdmin.user-profile',compact('page','data','user','refData'));
        
        return view('admin.profile',compact('page','data','user','refData'));
    }
    /**
     * profile update
     */
    public function profileUpdate(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        if(!isset($data['cid'])){
            return redirect('/');
        }
        $mailData = $request;
        $mailData['userEmail'] = $data['userMail'];
        User::where('id',$request['uid'])->update(
            array(
                "username" => $request['email'],
                "email"    => $request['email'],
                "name"     => $request['fname']." ".$request['lname'],
            )
        );
        if (isset($request['password']) && !empty($request['password'])) {
            
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => "https://lms.agnisys.com/wp-json/v1/passwordUpdate/",
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => "",
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_TIMEOUT => 30,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => "POST",
            //     CURLOPT_POSTFIELDS => array('email'=> $request['email'],'password' => $request['password']),
            // ));
            // $response = curl_exec($curl);
            // $err = curl_error($curl);
            // curl_close($curl);
            
            
            $mailData['pass'] = $request['password'];
            User::where('id',$request['uid'])->update(
                    array(
                        "password" =>  Hash::make($request['password']) ,
                    )
                );
            Mail::send(['html'=>'admin.mails.passwordUpdate'],['data'=>$mailData],function($message)use($mailData){
                $message->to($mailData->userEmail,'')->subject('Password update notification');
                $message->from('no-reply@agnisys.com');
            });
        }
        if(Session::get('userType') == 'e'){
            employees::where('id',$request['refId'])->update(
                array(
                    "first_name" => $request['fname'],
                    "last_name"    => $request['lname'],
                )
            );
        }
        else{
            managers::where('id',$request['refId'])->update(
                array(
                    "first_name" => $request['fname'],
                    "last_name"    => $request['lname'],
                )
            );
        }
        session()->flash('alert-success', 'Profile updated successfully');
        if($data['cid'] == 2204)
            return redirect(route('profile'));      
    
        return redirect(route('profile'));
    }
    /**
     *  All cases
     */
    public function allCases(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        if(!isset($data['cid'])){
            return redirect('/');
        }
        /**
         * fogBugz Cases
         */
        
            $result = $this->fogBugz("https://agnisys.fogbugz.com/api/listCases",'{
            
            "token": "'.$data['key'].'",
            "cols": ["ixBug", "sTitle", "sCustomerEmail", "fOpen", "sTicket","ixCategory","sCategory","sPersonAssignedTo","dtOpened","ixStatus","ixPriority","sStatus","sPriority"],
            
            }');
        
            $obj = json_decode($result);
        
        
        //dd($obj);

        $page =4;
        if($data['role'] == 'Admin')
            return view('admin.superAdmin.allCases',compact('page','data','obj'));
        return view('admin.allCases',compact('page','data','obj'));
        
    }

    public function singleCase($id){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        if(!isset($data['cid'])){
            return redirect('/');
        }
        /**
         * fogBugz Cases
         */
        $result = $this->fogBugz("https://agnisys.fogbugz.com/api/listCases",'{
            
            "token": "'.$data['key'].'",
            "cols": ["ixBug", "sTitle","sTicket", "sCategory","sPersonAssignedTo","dtOpened","ixStatus","ixPriority","sStatus","sPriority"],
            
            }');
        $obj = json_decode($result);
        return view('admin.singleCase',compact('data','obj'));
    }
    /**
     *  All employees
     */
    public function allEmployees(){
        
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        if(!isset($data['cid'])){
            return redirect('/');
        }
        
        $employees = User::select('*')->where('cid',$data['cid'])->where('type','e')->get();
        
        $employeesAll = User::select('*')->where('status',1)->get();
         //dd($employees);
        $result = $this->fogBugz("https://agnisys.fogbugz.com/api/listPeople",'{

            "token": "'.$data['key'].'",
            }');
        
        $obj = json_decode($result);
        $page = 7;
        if($data['cid'] == 2204)
            return view('admin.superAdmin.employee-all',compact('page','data','employeesAll'));
        return view('admin.allEmployees',compact('page','data','employees','obj'));
    }
    /**
     * add Employee CSV
     */
    public function addEmployeeCSV(Request $request)
    {
        // dd($request);
        // dd($request->csvFile);
        $csv = Reader::createFromPath($request->csvFile, 'r');
        $csv->setHeaderOffset(0);

        // $header = $csv->getHeader(); //returns the CSV header record
        $records = $csv->getRecords(); //returns all the CSV records as an Iterator object

         //returns the CSV document as a string

        dd($csv->getHeader());
        // dd($csv->getRecords());
    }
    /**
     * request employee 
     */
    public function requestedEmployee(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        
        $employeesAll = User::select('*')->where('request',1)->get();
        $cmps = company::select('*')->get();
        $page = 7;
        if($data['cid'] == 2204)
            return view('admin.superAdmin.employee-request',compact('page','data','employeesAll','cmps'));
        
    }
    /**
     *  Add Employee
     */
    public function addEmployee(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $company = company::select('*')->orderBy('name','asc')->get();
        $cp = company::select('*')->where('id',$data['cid'])->get();
        $page = 7;
        if($data['cid'] == 2204)
            return view('admin.superAdmin.employee-add',compact('page','data','company'));
        
        return view('admin.addEmployee',compact('page','data','cp'));
    }
    /**
     *  Add Employee Db
     */
    public function addEmployeeDb(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $company = company::select('*')->get();
        $page = 7;
        // dd($request);
        $u=User::select('id')->where('email',$request->email)->get()->first();
        if(@$u->id >0 ){
            session()->flash('alert-danger', 'User already exist');
            return redirect(route('allEmployee_s'))->with(compact('page'));
        }
            if($request['type'] == 'e'){
                $emp = employees::create([
                    'first_name' => $request['fname'],
                    'last_name' => $request['lname'],
                    'type' => $request['type'],
                    'cid' => $request['cid'],
                    'dob' => '2012-12-12',
                    
                ]);
                $empId = employees::select('id')->orderBy('id', 'desc')->limit(1)->get();
                //$users = DB::table('users')->select('id','name','email')->get();
            }
            else{
                $emp = managers::create([
                    'first_name' => $request['fname'],
                    'last_name' => $request['lname'],
                    'type' => $request['type'],
                    'cid' => $request['cid'],
                    'dob' => '2012-12-12',
                ]);
                $empId = managers::select('id')->orderBy('id','desc')->limit(1)->get();
            }
    
        if($data['cid'] == 2204){
            User::create([
                'name' => $request['fname']." ".$request['lname'],
                'email' => $request['email'],
                'username' => $request['email'],
                'password' => Hash::make($request['password']),
                'company' => 'N/A',
                'type' => $request['type'],
                'cid' => $request['cid'],
                'role' => $request['role'],
                'ref_id' => $empId[0]->id,
                'status' => 1,
            ]);
        }
        else{
            User::create([
                'name' => $request['fname']." ".$request['lname'],
                'email' => $request['email'],
                'username' => $request['email'],
                'password' => Hash::make($request['password']),
                'company' => 'N/A',
                'type' => $request['type'],
                'cid' => $request['cid'],
                'role' => $request['role'],
                'ref_id' => $empId[0]->id,
                'status' => 0,
                'request' => 1,
            ]);
        }
        
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => "https://lms.agnisys.com/wp-json/v1/UserAdd",
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => "",
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_TIMEOUT => 30,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => "POST",
            //     CURLOPT_POSTFIELDS => array('first_name'=> $request['fname'],'password' => $request['password'],'last_name' =>$request['lname'],'email'=> $request['email'],'role'=>$request['role']),
            // ));
            // $response = curl_exec($curl);
            // $err = curl_error($curl);
            // curl_close($curl);
        
        // include('https://agnisys.com/portal_website.php');
        // $useremail = $request['email'];
        // $role = $request['role'];
        // roleChange($useremail,$role);
        
        if($data['cid'] == 2204){
            session()->flash('alert-success', 'User added successfully');
            return redirect(route('allEmployee_s'))->with(compact('page'));
        }
        session()->flash('alert-success', 'User request sent successfully');
        return redirect('/')->with(compact('page'));
    }
    /**
     *  edit employee
     */
    public function editEmployee($id){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $user = User::select('*')->where('id',$id)->get();
        
        
        if($user[0]->type == 'e' || $user[0]->type == 'm'){
            $E_data = employees::select('*')->where('id',$user[0]->ref_id)->get();
        }
        else{
            $E_data = managers::select('*')->where('id',$user[0]->ref_id)->get();

        }
        $companies = \App\company::select('*')->orderBy('name','asc')->get();
        $page = 7;
        
        
        
        if($data['cid'] == 2204)
            return view('admin.superAdmin.employee-edit',compact('page','data','E_data','user','companies'));
        return view('admin.editEmployee',compact('page','data','E_data','user'));
        
    }
    /**
     * edit employee Db
     */
    public function editEmployeeDb(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        // dd($request);
        $user = User::select('*')->where('id',$request['id'])->get();
        // dd($request);
       

            if($request['type'] == 'e' || $user[0]->type == 'm'){
                $emp = employees::where('id',$user[0]->ref_id)->update([
                    'first_name' => $request['fname'],
                    'last_name' => $request['lname'],
                    'cid'   => $request->cid,
                ]);
                $empId = employees::select('id')->orderBy('id', 'desc')->limit(1)->get();
                //$users = DB::table('users')->select('id','name','email')->get();
            }
            else{
                $emp = managers::where('id',$user[0]->ref_id)->update([
                    'first_name' => $request['fname'],
                    'last_name' => $request['lname'],
                    'cid'   => $request->cid,
                ]);
                $empId = managers::select('id')->orderBy('id','desc')->limit(1)->get();
            }
            

            User::where('id',$user[0]->id)->update([
                'name' => $request['fname']." ".$request['lname'],
                'email' => $request['email'],
                'cid'   => $request->cid,
                'role' => $request->role,
                'username' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
            //$request->role
            // $email=$request['email'];
            // $url = 'https://agnisys.com/custom_url1';
            // $data1 = "role=".$request->role;
            // $data1 = "role=".$request->role."&email=".$email."";
            // $postdata = $data1;
            
            // $ch = curl_init($url);
            // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            // curl_setopt($ch, CURLOPT_POST, 1);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            // //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            // $result = curl_exec($ch);
            // curl_close($ch);
            // $userRole = $request->role;
            
            // updated code 
            
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => "https://lms.agnisys.com/wp-json/v1/UserRoleUpdate/",
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => "",
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_TIMEOUT => 30,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => "POST",
            //     CURLOPT_POSTFIELDS => array('email'=> $request['email'],'role' => $request->role),
            // ));
            // $response = curl_exec($curl);
            // $err = curl_error($curl);
            // curl_close($curl);
            
            
            if (isset($request['password']) && !empty($request['password'])) {
            
                // $curl = curl_init();
                // curl_setopt_array($curl, array(
                //     CURLOPT_URL => "https://lms.agnisys.com/wp-json/v1/passwordUpdate/",
                //     CURLOPT_RETURNTRANSFER => true,
                //     CURLOPT_ENCODING => "",
                //     CURLOPT_MAXREDIRS => 10,
                //     CURLOPT_TIMEOUT => 30,
                //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                //     CURLOPT_CUSTOMREQUEST => "POST",
                //     CURLOPT_POSTFIELDS => array('email'=> $request['email'],'password' => $request['password']),
                // ));
                // $response = curl_exec($curl);
                // $err = curl_error($curl);
                // curl_close($curl);
                
            }
           
            
            
            
            session()->flash('alert-success', 'User updated successfully');
            $page = 7;
        if($data['cid'] == 2204)
            return redirect(route('allEmployee_s'))->with(compact('page'));
        
        return redirect(route('allEmployees'))->with(compact('page'));
    }
    /**
     * delete employee
     */
    public function deleteEmployee($id){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $user = User::select('*')->where('id',$id)->get();
        
        if($data['userType'] == 'm'){
            if($user[0]->type == 'e'){
                employees::where('id',$user[0]->ref_id)->delete();
            }
            else{
                managers::where('id',$user[0]->ref_id)->delete();
            }

            User::where('id',$id)->delete();
            
            // $email = $user[0]->email;
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => "https://lms.agnisys.com/wp-json/v1/deleteUser/",
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => "",
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_TIMEOUT => 30,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => "POST",
            //     CURLOPT_POSTFIELDS => array('email'=> $email),
            // ));
            // $response = curl_exec($curl);
            // $err = curl_error($curl);
            // curl_close($curl);
            
            
        }

        session()->flash('alert-success', 'User removed successfully');
        $page = 7;
        if($data['cid'] == 2204)
            return redirect(route('allEmployee_s'))->with(compact('page'));
        return redirect(route('allEmployees'))->with(compact('page'));
    }
    /**
     * User Request delete All employee
     */
    public function userRequestDeleteAll(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $ids = $request->ids;
            
            $ids = explode(",",$ids);
            $size = sizeof($ids);
            for($i = 0;$i < $size; $i++){
                $user = User::select('*')->where('id',$ids[$i])->get();
                employees::where('id',$user[0]->ref_id)->delete();
                User::where('id',$ids[$i])->delete();
                $email = $user[0]->email;
                // $curl = curl_init();
                // curl_setopt_array($curl, array(
                //     CURLOPT_URL => "https://lms.agnisys.com/wp-json/v1/deleteUser/",
                //     CURLOPT_RETURNTRANSFER => true,
                //     CURLOPT_ENCODING => "",
                //     CURLOPT_MAXREDIRS => 10,
                //     CURLOPT_TIMEOUT => 30,
                //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                //     CURLOPT_CUSTOMREQUEST => "POST",
                //     CURLOPT_POSTFIELDS => array('email'=> $email),
                // ));
                // $response = curl_exec($curl);
                // $err = curl_error($curl);
                // curl_close($curl);
            }
        
    
    
        return response()->json(['success'=>"Products Deleted successfully."]);
    }

    /**
     * disable employee 
     */
    public function disableEmployee($id){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $user = User::select('*')->where('id',$id)->get();

        
        User::where('id',$id)->update(
            array(
                'status' => 0,
                'request' => 1,
            )
        );
        session()->flash('alert-success', 'User diabled successfully');
        $page = 7;
        if($data['cid'] == 2204)
            return redirect(route('allEmployee_s'))->with(compact('page'));
        return redirect(route('allEmployees'))->with(compact('page'));

    } 
    /**
     * enable Employee
     */
    public function enableEmployee($id){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $user = User::select('*')->where('id',$id)->get();

        
        User::where('id',$id)->update(
            array(
                'status' => 1,
                'request' => 0,
            )
        );
        session()->flash('alert-success', 'User enabled successfully');

        $edata['type'] = 'auth_user';
        $edata['name'] = $user[0]->name;
        $edata['email'] = $user[0]->email;

        Mail::send(['html' => 'admin.mails.signup'], $edata, function ($message) use($user) {
            $message->to($user[0]->email, '')->subject('Agnisys Registration');
            $message->from('marcom@agnisys.com', 'Marcom');
        });
        
        $page = 7;
        if($data['cid'] == 2204)
            return redirect(route('allEmployee_s'))->with(compact('page'));
        return redirect(route('allEmployees'))->with(compact('page'));

    } 
    /**
     *  users
     */
    public function userData($cid){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $user = User::select('name','id')->where('cid',$data['cid'])->get();
        return view('userData',compact('data','user'));
    }
    /**
     * check session
     */
    public function checkSession(){
        // $data = Session::all();         
        // if(!isset($data['cid'])){  
        //     return  0; 
        // }
        // else{
        //     return 1;
        // }
        
        // if (Auth::user()) {   // Check is user logged in
        //     return 1;

        // } else {
        //     return 0;
        // }
        // return 'fuck';
    }
    /**
     * merge
     */
     public function merge(Request $request){
         
         dd("abc");
         
     }
    /**
     * Support
     */
    public function support(Request $request){

        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $mailData = $request;
        $mailData['userMail'] = $data['userMail'];
        $mailData['company'] = $data['company'];
        $mailData['name']   = $data['username'];
        
        $url = route('home');
        $imageName ="";
            if(isset($request['extraFile'])){
                $image = $request->file('extraFile');
                $imageName = "file_".time().'_'.$this->random_().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images'),$imageName);
                
            }
            
            $mailData['file'] = $url.'/public/images/'.$imageName;
            // // $url.'/public/images/'.$imageName
            if($imageName == ''){
               $mailData['file'] = ''; 
            }
            
        
        /**
         * sending mail 
         */
        // Mail::send(['html' => 'admin.mails.support'], ['data' => $mailData], function ($message) use ($mailData) {
        //     $message->to('support@agnisys.com', '')->subject($mailData->topic);
        //     // $message->to('sidd5sci@gmail.com','')->subject($mailData->topic);
        //     $message->attach($mailData['file']);
        //     $message->from($mailData['userMail'], $mailData['company']);
        // });

        try {

            $email = new PHPMailer();
            $email->isHTML(true);
            $email->SetFrom($mailData['userMail'], $mailData['company']); //Name is optional
            $email->Subject   = $mailData->topic;
            $email->Body      = view('admin.mails.support', ['data' => $mailData])->render();;
            $email->AddAddress( 'support@agnisys.com' );

            $file_to_attach = $mailData['file'];
            $email->AddAttachment( $file_to_attach , $mailData['file'] );

            $email->Send();
        } catch( Exception $e ) {

            echo $e->getMessage();

        }
        
        session()->flash('alert-success', 'Message sent successfully');
        
        return redirect()->back();
    }
    /**
     *  fogBugz api 
     */
    public function fogBugz($request,$data){
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = array();
        $headers[] = "Content-Type: application/json; charset=utf-8";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);

        return $result;
    }
    /**
     *  fogBugz api 
     */
    // public function fogBugz($request,$data){
    //     // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
    //     $ch = curl_init();

    //     curl_setopt($ch, CURLOPT_URL, $request);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //     curl_setopt($ch, CURLOPT_POST, 1);

    //     $headers = array();
    //     $headers[] = "Content-Type: application/json; charset=utf-8";
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    //     $result = curl_exec($ch);
    //     if (curl_errno($ch)) {
    //         echo 'Error:' . curl_error($ch);
    //     }
    //     curl_close ($ch);

    //     return $result;
    // }

    /**
     * Upload
     */
    public function uploadImage(Request $request){
        $image = $request->file('file');
        // $imageName = $image->getClientOriginalName();
        $imageName = "file_".time().'_'.$this->random_().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'),$imageName);
        
        // $imageUpload = new upload;
        // $imageUpload->img = $imageName;
        // $imageUpload->save();
        // $env = file_get_contents('.env');

        $url = route('home');
        return response()->json(['location'=> $url.'/public/images/'.$imageName]);
    }
    
    
    /**
     *  Random
     */
    public function random_(){
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        // shuffle the result
        $string = str_shuffle($pin);
        return $string;
    }
    //pages call from wordpress static pages
    public function static_pages15(){
        $data = Session::all();         
        // if(!isset($data['cid'])){             
        //  return redirect('/');         }
        if(!isset($data['cid'])){
            return redirect('/');
        }
        $page = 15;
        return view('download-software',compact('page','data'));
    }
    public function static_pages17(){

        $data = Session::all();         
        // if(!isset($data['cid'])){             
        //  return redirect('/');         }
        if(!isset($data['cid'])){
            return redirect('/');
        }
        $page = 17;
        return view('agnisys-webinar',compact('page','data'));
    }
    public function static_pages19(){
        $data = Session::all();         
        // if(!isset($data['cid'])){             
        //  return redirect('/');         }
        if(!isset($data['cid'])){
            return redirect('/');
        }
        $page = 15;
        return view('old-dashboard',compact('page','data'));
    }
    public function static_pages20(){
        $data = Session::all();         
        // if(!isset($data['cid'])){             
        //  return redirect('/');         }
        if(!isset($data['cid'])){
            return redirect('/');
        }
        $page = 15;
        return view('troubleshooting-tool-installation',compact('page','data'));
    }
    public function static_pages16(){
        $data = Session::all();           
        if(!isset($data['cid'])){
            return redirect('/');
        }
        $page = 16;
        return view('IDesignSpec-videos',compact('page','data'));
    }
    public function static_pages21(){
        $data = Session::all();           
        if(!isset($data['cid'])){
            return redirect('/');
        }
        $page = 21;
        return view('Chatbot-Page',compact('page','data'));
    }
    
    public function user_logs(){
         $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        if(!isset($data['cid'])){
            return redirect('/');
        }
        
        // $userlogs = usertracks::select('*')->get();
        $userlogs = usertracks::select('*')->get();
        
        $page = 18;
        if($data['cid'] == 2204)
            return view('admin.superAdmin.user-track',compact('page','data','userlogs'));
    }
    public function exportExcel(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        if(!isset($data['cid'])){
            return redirect('/');
        }
        // $userlogs = usertracks::select('*')->get();
        $userlogs = usertracks::select('email', 'login_time', 'logout_time','url')->get();
        $page = 19;
        if($data['cid'] == 2204)
            return Excel::download(new UsersExport($userlogs), 'userlogs.xlsx');
            // return view('admin.superAdmin.excel-data',compact('page','data','userlogs'));
            
        
    } 
    public function pdfaccess($pdf){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        
        $file = 'new_pdf_files/' . $pdf . '.pdf';
        
        
        if (file_exists($file)) {

            $headers = [
                'Content-Type' => 'application/pdf'
            ];

            return response()->download($file, 'Test File', $headers, 'inline');
        } else {
            abort(404, 'File not found!');
        }
        
    }

    

}