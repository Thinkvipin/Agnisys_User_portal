<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\license;
use App\product;
use App\company;
use App\User;
use DB;


class licenseController extends Controller
{

    public function home(Request $redirect_to) {

        $data = Session::all();
        if(!isset($data['cid'])){
            return view('welcome');
            
        } else {
            
            return redirect('dashboard');
        }

    }

    public function allWorking(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         } 
        
        $licensesAll = license::select('*')->where('status',1)->get();
        $products = product::select('*')->get();
        $companies = company::select('*')->orderBy('name','asc')->get();
        $users = User::select('*')->get();
        
        $page = 8;
        return view('admin.superAdmin.license-all1',compact('page','data','licensesAll','products','users','companies'));
        
    }
    /**
     *  all not @status = 0
     */
    // public function all(){
    //     $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

    //     $licenses = license::select('*')->where('cid',$data['cid'])->get();
    //     $licensesAll = license::select('*')->where('status',0)->get();
    //     $products = product::select('*')->get();
    //     $companies = \App\company::select('*')->orderBy('name','asc')->get();
    //     $users = \App\User::select('*')->get();
    //     $page = 8;
    //     if($data['role'] == 'Admin')
    //         return view('admin.superAdmin.licenses-all',compact('page','data','users','companies','licensesAll','products'));
    //     return view('admin.allLicense',compact('page','data','licenses','products'));
    // }
    public function all(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $licenses = license::select('*')->where('cid',$data['cid'])->get();
        $licensesAll = license::select('*')->where('status',0)->get();
        $products = product::select('*')->get();
        $companies = \App\company::select('*')->orderBy('name','asc')->get();
        $users = \App\User::select('*')->get();
        $page = 8;
        if($data['role'] == 'Admin')
            return view('admin.superAdmin.licenses-all',compact('page','data','users','companies','licensesAll','products'));
        return view('admin.allLicense',compact('page','data','licenses','products'));
    }
    /**
     *  delete
     */
    public function delete($id){
        license::where('id',$id)->delete();

        session()->flash('alert-success', 'License deleted successfully');
        $page = 8;
        return redirect()->back()->with(compact('page'));
    }
    /**
     * edit
     */
    public function edit($id){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $license = license::select('*')->where('id',$id)->get();

        $company = company::select('*')->where('id',$license[0]->cid)->get();
        $user   = User::select('*')->where('id',$license[0]->uid)->get();
        $selectedproduct = product::select('name')->whereIn('id',unserialize($license[0]->pid))->get();
        $products  = product::select('*')->get();
        $pods = json_encode(app('App\Http\Controllers\productController')->multilevelItem(0,0));
        
        $page = 8;
        return view('admin.superAdmin.license-edit',compact('page','data','license','company','user','pods','products','selectedproduct'));
    }
    /**
     * edit Db
     */
    public function editDb(Request $request){
        
        // dd($request);
        if(isset($request->licenseFile)){
            $licenseFile = $request->file('licenseFile');
            $input['imagename'] = time().'_'.$this->random_().'.'.$licenseFile->getClientOriginalExtension();
            $destinationPath = public_path('/license_files');
            $licenseFile->move($destinationPath,$input['imagename']);
        }
        
        license::where('id',$request->id)->update(
            [ 
                "license_key"   => $request->key,
                "cid"           => $request->cid,
                "pid"           => $request->pid,
                "start_date"    => $request->date,
                "type"          => $request->type_,
                "duration"      => $request->duration,
                "type1"         => $request->type1,
                "status"        => 1,
                "file"          =>  (isset($request->licenseFile)?$input['imagename']:''), 
            ]
        );
        // dd($request);
        session()->flash('alert-success', 'Licenses updated successfully');
        
        $page = 8;
        return redirect(route('dashboard'))->with(compact('page'));
    }
    /**
     * get
     */
    public function licenseRequest(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $products = product::select('*')->get();
        $pods = json_encode(app('App\Http\Controllers\productController')->multilevelItem(0,0));
        $page = 8;
        return view('admin.requestLicense',compact('page','data','products','pods'));
    }
    /**
     * post
     */
    public function licenseRequestDb(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        //dd($request);
        // $now = date("Y-m-d h:i:s",time());
        $expire = $request->to;
        
        // $diff = abs(strtotime($expire) - strtotime($today));
        // $years = floor($diff / (365*60*60*24));  
        // $duration = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));  
        $now = new \DateTime(); // current datetime
        $count = count($request->expiryDate);
        $duration = [];
        $duration = $request->expiryDate;
        
        
        $futureDate = [];
        for($i = 0;$i < $count;$i++){
            if($duration[$i] == 'Two weeks'){
                $now = new \DateTime(); // current datetime
                $twoWeeks = new \DateInterval('P2W'); // 2 weeks interval
                $futureDateTwoWeeks = $now->add($twoWeeks); // calculate future date
                $futureDate[] = $futureDateTwoWeeks->format('Y-m-d'); // output the future date in a formatted string
            }
            else if($duration[$i] == 'One month'){
                $now = new \DateTime(); // current datetime
                $oneMonth = new \DateInterval('P1M'); // interval of 1 month
                $futureDateOneMonth = $now->add($oneMonth);
                $futureDate[] = $futureDateOneMonth->format('Y-m-d'); // output the future date
            }
            else if($duration[$i] == 'One year'){
                $now = new \DateTime(); // current datetime
                $oneYear = new \DateInterval('P1Y'); // interval of 1 year
                $futureDateOneYear = $now->add($oneYear);
                $futureDate[] = $futureDateOneYear->format('Y-m-d'); // output the future date
                
            }
            else if($duration[$i] == 'Three years'){
                $now = new \DateTime(); // current datetime
                $threeYears = new \DateInterval('P3Y'); // interval of 3 years
                $futureDateThreeYears = $now->add($threeYears);
                $futureDate[] = $futureDateThreeYears->format('Y-m-d'); // output the future date
            }
            else{
                
            }
         
        }

        
        if($request->type_ == 'ALM'){
            $uuid = $request->uuid;
        }
        else{
            $uuid = $request->hostid;
        }

        
        $f = new license;
        $f->cid = $request->cid;
        $f->uid = $request->uid;
        $f->pid = serialize($request->pid);
        $f->type1 = $request->type_;
        $f->uuid = $uuid;
        $f->duration   =  serialize($request->expiryDate);
        $f->quantity   = serialize($request->quantity);
        // $f->validity_date = date_format(date_create(str_replace('/', '-', $futureDate)), 'Y-m-d');
        $f->validity_date = serialize($futureDate);
        $f->status = 0;
        $f->save();
        
        session()->flash('alert-success', 'Licenses request sent successfully');
        $page = 8;
        return redirect(route('dashboard'))->with(compact('page'));
    } 
    /**
     * 
     */
    public function view($id){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }


        $license = license::select('*')->where('id',$id)->get();
        $product = product::select('name')->where('id',@$license[0]->pid)->get();
        $company = company::select('name')->where('id',@$license[0]->cid)->get();
        $user = User::select('*')->where('id',@$license[0]->uid)->get();
        // $products  = product::select('*')->get();
        // dd($license);
        $page = 8;
        return view('admin.superAdmin.license-view',compact('page','data','license','company','user','product'));
    }
    /**
     * 
     */
    public function licenseResponse($id){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $license = license::select('*')->where('id',$id)->where('status',0)->get();
        $product = product::select('name')->whereIn('id',unserialize($license[0]->pid))->get();
        $company = company::select('name')->where('id',@$license[0]->cid)->get();
        $user = User::select('*')->where('id',@$license[0]->uid)->get();
        
        // dd($license);
        $page = 8;
        return view('admin.superAdmin.license-response',compact('page','data','license','product','company','user'));
    }
    /**
     * 
     */
    public function licenseIssue(){

        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $companies = company::select('*')->orderBy('name','asc')->get();
        $users     = User::select('*')->get();
        $products  = product::select('*')->get();
        $pods = json_encode(app('App\Http\Controllers\productController')->multilevelItem(0,0));
        $page = 8;
        return view('admin.superAdmin.license-issue',compact('page','data','companies','users','products','pods'));
    }
    /**
     * 
     */
    public function licenseIssueDb(Request $request){
        
        $input['imagename'] = "";
        if(isset($request['licenseFile'])){
            $licenseFile = $request->file('licenseFile');
            $input['imagename'] = time().'_'.$this->random_().'.'.$licenseFile->getClientOriginalExtension();
            $destinationPath = public_path('/license_files');
            $licenseFile->move($destinationPath,$input['imagename']);
        }
        
        $today = date("Y-m-d h:i:s",time());
        $expire = $request->to;
        
        $diff = abs(strtotime($expire) - strtotime($today));
        $years = floor($diff / (365*60*60*24));  
        $duration = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));  
        
        
        $now = new DateTime(); // current datetime
        if($request->expiryDate == 'Two weeks' ){
            $timeinterval = new DateInterval('P2W'); // 2 weeks interval
            
        }else if($request->expiryDate == 'One month' ){
            $timeinterval = new DateInterval('P1M'); // interval of 1 month
        }
        else if($request->expiryDate == 'One year' ){
            $timeinterval = new DateInterval('P1Y'); // interval of 1 year
        }
        else if($request->expiryDate == 'Three years' ){
            $timeinterval = new DateInterval('P3Y'); // interval of 3 years
        }
        
        
        
        $futureDate = $now->add($timeinterval); // calculate future date
        
        $futureDate->format('Y-m-d H:i:s'); // output the future date in a formatted string
        
        
        
        
        
        $f = new license;
        $f->license_key  = $request->key;
        $f->cid = $request->cid;
        $f->uid = "";
        $f->pid = serialize($request->pid);
        $f->start_date = $today;
        $f->type = $request->type_;
        $f->type1 = $request->type1;
        $f->duration   = $duration;
        $f->validity_date = serialize($request->expiryDate);
        $f->quantity = serialize($request->quantity);
        $f->status = 1;
        $f->file = $input['imagename'];
        $f->save();
        
        session()->flash('alert-success', 'Licenses issued successfully');
        $page = 8;
        return redirect(route('dashboard'))->with(compact('page'));

    }
    /**
     * 
     */
    public function licenseResponseDb(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $today = date("Y-m-d h:i:s",time());
        $input['imagename'] = "";
        if(isset($request['licenseFile'])){
            $licenseFile = $request->file('licenseFile');
            $input['imagename'] = time().'_'.$this->random_().'.'.$licenseFile->getClientOriginalExtension();
            $destinationPath = public_path('/license_files');
            $licenseFile->move($destinationPath,$input['imagename']);
        }

        $f = license::where('id',$request->id)->update([
            "license_key"   => $request->key,
            "start_date"    => $today,
            "duration"      => $request->duration,
            "type"          => $request->type_,
            "type1"         => $request->type1,
            "quantity"      => serialize($request->quantity),
            "validity_date" => serialize($request->to),
            "file"          => $input['imagename'],
            'status'        => 1,

        ]);
        
        session()->flash('alert-success', 'Licenses request completed successfully');
        $page = 8;
        return redirect(route('allLicenseRequest'))->with(compact('page'));
    } 
    /**
     * 
     */
    public function viewAllRequest(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $ftps = license::select('*')->where('status',0)->get(); 
        $page = 8;
        return view('admin.superAdmin.ftp-requests',compact('page','data','ftps'));
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

    public function getlicencefile(Request $request) {

        $data = Session::all(); 
        if(!isset($data['cid'])) { 
            return redirect('/');
        } else {
            // print_r($data);
        }

        $company_name = $request->company_name;
        $customer_name = $request->company_name;
        $uuid =  !empty($request->key) ? trim($request->key) : 'nill';
        $nodelock = 'yes';
        // if($request->type1 == 'ALM – Open short term'){
        // 	$nodelock  = 'Y';
        // }
        // else if($request->type1 == 'ALM – Node locked'){
        // 	$nodelock  = 'Y';
        // }else if($request->type1 == 'ALM – Floating'){
        // 	$nodelock = '';
        // }
        // else{
        // 	$nodelock = '';
        // }
        // $nodelock = 'y';


        try {
            if( !empty($request->expirydatearray) ) {
                    //  $expiry_date = str_replace('/', '-', $request->to);
                    // $expiry_date = date_format(date_create($request->to), "d-m-Y");
                $request->expirydatearray;
            } else {
                // $expiry_date = date_format(date_create($request->date), "d-m-Y");
                $request->expirydatearray;
            }
        } catch(Exception $e) {
            $output = array('status' => false, 'msg' => 'Please enter valid expiry date');
        }

        // $request->pid = unserialize($request->pid);
        $expiry_date = explode(',',$request->expirydatearray);
        
        $quantity = explode(',',$request->quantity);

        

        if( empty($output) ) {

            if( !empty($company_name) ) {
                //Initialise the cURL var
                $ch = curl_init();

                //Get the response from cURL
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                if(strpos($request->type1, 'Flex') !== false){
                    //Set the Url
                    //ec2-54-82-227-113.compute-1.amazonaws.com:8089/getFlexData
                    // http://ids.agnisys.com/licserver/getFlexData 
                    curl_setopt($ch, CURLOPT_URL, 'http://ec2-54-82-227-113.compute-1.amazonaws.com:8089/getFlexData');
                    //making sample file
                    $file = getcwd() . '/public/licenseInfo.txt';
                }
                if(strpos($request->type1, 'ALM') !== false){
                    //Set the Url
                   //ec2-54-82-227-113.compute-1.amazonaws.com:8089/getFlexData
                //   http://ids.agnisys.com/licserver/getData
                    curl_setopt($ch, CURLOPT_URL, 'http://ec2-54-82-227-113.compute-1.amazonaws.com:8089/getData');
                    //making sample file
                    $file = getcwd() . '/public/' . uniqid() . '.txt';
                }
                

                

                $licFileData = array(
                    'commnets' => '############# AGNISYS LICENSE FILE #############',
                    'server_id' => 'SERVER_UUID  ' . $uuid,
                    'port'      => 'PORT       2464',
                );

                // if( !empty($request->pid) && !empty($request->to) ) {
                if(!isset($request->id)){

                    $products_lic = product::whereIn('id', $request->pid)->get();
                    $p = 0;
                    if( count($products_lic) > 0 ) {

                        foreach ($products_lic as $key => $value) {
                            $expiry_date[$p] = date_format(date_create($expiry_date[$p]), "d-m-Y");

                            if($value->alm != ''){
                                $name = $value->alm;
                            }
                            else{
                                $name = $value->name;
                            }
                            $feature = '';
                            if(strpos($value->name, 'Professional') !== false){
                                $feature = 'CHECK IDS_TEMPLATES AMBA AVALON OCP PROPRIETARY AMBA_AXI AMBA3AHBLITE AMBA_APB WB XRSL IPXACT SYSTEMRDL CMSIS VERILOG SV VHDL UVM OVM VMM ERM IVSEXCELOUT PERL_DS PYTHON_DS SVHEADER CHEADER HTML SVG PDF CSHARP IDS_TURBO PROPERTY_HINT PYTHON_API RTL_SYSC UVM_SYSC VP_SYSC CUSTOM_XML CUSTOMCSV TCL_API';
                            }
                            else if(strpos($value->name, 'Advanced') !== false){
                                $feature = 'CHECK IDS_TEMPLATES AMBA AVALON OCP PROPRIETARY AMBA_AXI AMBA3AHBLITE AMBA_APB WB XRSL IPXACT SYSTEMRDL CMSIS VERILOG SV VHDL UVM OVM VMM ERM IVSEXCELOUT PERL_DS PYTHON_DS SVHEADER CHEADER MISRAC HTML SVG PDF ROWO MBD ALIAS LOCK COUNTER SCS PARAM ADVD PREPROCESSOR DATASHEET SIGNALS SYSTEMC VHDLALT2 CSHARP SHAREPOINT IDS_TURBO PROPERTY_HINT RTL_SYSC UVM_SYSC VP_SYSC CUSTOM_XML INTERRUPT CONSTRAINT CUSTOM_CIRCUIT SHADOW INDIRECT CPP CUSTOMCSV FIFO STRUCT AMBAAXI4FULL HTMLALT2 WORDDATASHEET PYTHON_API WORD VELOCITY TCL_API';
                            }
                            else if(strpos($value->name, 'SoC') !== false){
                                $feature = 'CHECK IDS_TEMPLATES AMBA AVALON OCP PROPRIETARY AMBA_AXI AMBA3AHBLITE AMBA_APB WB XRSL IPXACT SYSTEMRDL CMSIS VERILOG SV VHDL UVM OVM VMM ERM IVSEXCELOUT PERL_DS PYTHON_DS SVHEADER CHEADER MISRAC HTML SVG PDF ROWO MBD ALIAS LOCK COUNTER SCS PARAM ADVD PYTHON_API PREPROCESSOR DATASHEET SIGNALS SYSTEMC VHDLALT2 CSHARP SHAREPOINT IDS_TURBO PROPERTY_HINT RTL_SYSC UVM_SYSC VP_SYSC CUSTOM_XML INTERRUPT CONSTRAINT CUSTOM_CIRCUIT SHADOW INDIRECT CPP CUSTOMCSV FIFO STRUCT AMBAAXI4FULL FORMAL ARV I2C SPI HTMLALT2 WORDDATASHEET VELOCITY TCL_API WORD OUT_THIRD_PARTY_D IDS_DIFF YAML TRACEABILITY CDC CRC';
                            }
                            else if(strpos($value->name, 'Editor') !== false){
                                $feature = 'CHECK IDS_TEMPLATES AMBA AVALON OCP PROPRIETARY AMBA_AXI AMBA3AHBLITE AMBA_APB WB PREPROCESSOR PROPERTY_HINT';
                            }
                            else if(strpos($value->name, 'ISS-pro') !== false){
                                $feature = 'SEQUENCE SEQUENCE_HTML SEQUENCE_FIRMWARE SEQUENCE_MATLAB SEQUENCE_UVM SEQUENCE_CSV SEQUENCE_VERILOG SEQUENCE_TCL SEQUENCE_PSS';
                            }
                            else if(strpos($value->name, 'ISS-adv') !== false){
                                $feature = 'SEQUENCE SEQUENCE_HTML SEQUENCE_FIRMWARE SEQUENCE_MATLAB SEQUENCE_UVM SEQUENCE_CSV SEQUENCE_VERILOG SEQUENCE_TCL SEQUENCE_PSS SEQUENCE_ML';
                            }
                            else{
                                $feature = 'CHECK IDS_TEMPLATES AMBA AMBA_APB AMBA_AXI AMBA3AHBLITE AVALON OCP PROPRIETARY WB CHEADER CUSTOMCSV ERM HTML IDS_TURBO IPXACT IVSEXCELOUT OVM PDF PERL_DS PYTHON_DS SV SVG SVHEADER SYSTEMRDL UVM VERILOG VHDL VHDLALT2 VMM WORD2007 WORD2010 XRSL ADVD ALIAS CONSTRAINT COUNTER FIFO INDIRECT INTERRUPT LOCK MBD PARAM PREPROCESSOR PROPERTY_HINT ROWO SCS SHADOW SHAREPOINT SIGNALS STRUCT CPP SYSTEMC EXCEL VELOCITY MISRAC OUT_THIRD_PARTY_D C_API ARV FORMAL';
                            }


                            $productData[] = PHP_EOL . 'PRODUCT    ' . str_replace(' ', '', $name) . '  '.$quantity[$p].'  ' .'  '. $expiry_date[$p].'  '. '    WAN' . PHP_EOL . 'FEATURE    '.$feature;
                            $p++;
                        }
                        
                    } else {
                        $output = array(
                            'status' => false,
                            'msg'    => 'No products found'
                        );
                    }
                } else {

                    if( !empty($request->id) ) {
                        $users = DB::table('licenses')
                            ->join('users', 'licenses.uid', '=', 'users.id')
                            ->join('companies', 'licenses.cid', '=', 'companies.id')
                            ->select('users.*', 'companies.name as cname')
                            ->where('licenses.id', $request->id)
                            ->get();

                        if( count($users) > 0 ) {
                            $customer_name = $users[0]->email;
                            $company_name = $users[0]->cname;
                        }
                    }
                     $request->pid = unserialize($request->pid);
                    // $products_lic = explode(',', $request->products);
                    $products_lic = product::whereIn('id', $request->pid)->get();
                    $p = 0;
                    if( count($products_lic) > 0 ) {

                        foreach ($products_lic as $key => $value) {


                            $expiry_date[$p] = date_format(date_create($expiry_date[$p]), "d-m-Y");
                            if( !empty($value) ) {

                                if($value->alm != ''){
                                    $name = $value->alm;
                                }
                                else{
                                    $name = $value->name;
                                }
                                $feature = '';
                            if(strpos($value->name, 'Professional') !== false){
                                $feature = 'CHECK IDS_TEMPLATES AMBA AVALON OCP PROPRIETARY AMBA_AXI AMBA3AHBLITE AMBA_APB WB XRSL IPXACT SYSTEMRDL CMSIS VERILOG SV VHDL UVM OVM VMM ERM IVSEXCELOUT PERL_DS PYTHON_DS SVHEADER CHEADER HTML SVG PDF CSHARP IDS_TURBO PROPERTY_HINT PYTHON_API RTL_SYSC UVM_SYSC VP_SYSC CUSTOM_XML CUSTOMCSV TCL_API';
                            }
                            else if(strpos($value->name, 'Advanced') !== false){
                                $feature = 'CHECK IDS_TEMPLATES AMBA AVALON OCP PROPRIETARY AMBA_AXI AMBA3AHBLITE AMBA_APB WB XRSL IPXACT SYSTEMRDL CMSIS VERILOG SV VHDL UVM OVM VMM ERM IVSEXCELOUT PERL_DS PYTHON_DS SVHEADER CHEADER MISRAC HTML SVG PDF ROWO MBD ALIAS LOCK COUNTER SCS PARAM ADVD PREPROCESSOR DATASHEET SIGNALS SYSTEMC VHDLALT2 CSHARP SHAREPOINT IDS_TURBO PROPERTY_HINT RTL_SYSC UVM_SYSC VP_SYSC CUSTOM_XML INTERRUPT CONSTRAINT CUSTOM_CIRCUIT SHADOW INDIRECT CPP CUSTOMCSV FIFO STRUCT AMBAAXI4FULL HTMLALT2 WORDDATASHEET PYTHON_API WORD VELOCITY TCL_API';
                            }
                            else if(strpos($value->name, 'SoC') !== false){
                                $feature = 'CHECK IDS_TEMPLATES AMBA AVALON OCP PROPRIETARY AMBA_AXI AMBA3AHBLITE AMBA_APB WB XRSL IPXACT SYSTEMRDL CMSIS VERILOG SV VHDL UVM OVM VMM ERM IVSEXCELOUT PERL_DS PYTHON_DS SVHEADER CHEADER MISRAC HTML SVG PDF ROWO MBD ALIAS LOCK COUNTER SCS PARAM ADVD PYTHON_API PREPROCESSOR DATASHEET SIGNALS SYSTEMC VHDLALT2 CSHARP SHAREPOINT IDS_TURBO PROPERTY_HINT RTL_SYSC UVM_SYSC VP_SYSC CUSTOM_XML INTERRUPT CONSTRAINT CUSTOM_CIRCUIT SHADOW INDIRECT CPP CUSTOMCSV FIFO STRUCT AMBAAXI4FULL FORMAL ARV I2C SPI HTMLALT2 WORDDATASHEET VELOCITY TCL_API WORD OUT_THIRD_PARTY_D IDS_DIFF YAML TRACEABILITY CDC CRC';
                            }
                            else if(strpos($value->name, 'Editor') !== false){
                                $feature = 'CHECK IDS_TEMPLATES AMBA AVALON OCP PROPRIETARY AMBA_AXI AMBA3AHBLITE AMBA_APB WB PREPROCESSOR PROPERTY_HINT';
                            }
                            else if(strpos($value->name, 'ISS-pro') !== false){
                                $feature = 'SEQUENCE SEQUENCE_HTML SEQUENCE_FIRMWARE SEQUENCE_MATLAB SEQUENCE_UVM SEQUENCE_CSV SEQUENCE_VERILOG SEQUENCE_TCL SEQUENCE_PSS';
                            }
                            else if(strpos($value->name, 'ISS-adv') !== false){
                                $feature = 'SEQUENCE SEQUENCE_HTML SEQUENCE_FIRMWARE SEQUENCE_MATLAB SEQUENCE_UVM SEQUENCE_CSV SEQUENCE_VERILOG SEQUENCE_TCL SEQUENCE_PSS SEQUENCE_ML';
                            }
                            else{
                                $feature = 'CHECK IDS_TEMPLATES AMBA AMBA_APB AMBA_AXI AMBA3AHBLITE AVALON OCP PROPRIETARY WB CHEADER CUSTOMCSV ERM HTML IDS_TURBO IPXACT IVSEXCELOUT OVM PDF PERL_DS PYTHON_DS SV SVG SVHEADER SYSTEMRDL UVM VERILOG VHDL VHDLALT2 VMM WORD2007 WORD2010 XRSL ADVD ALIAS CONSTRAINT COUNTER FIFO INDIRECT INTERRUPT LOCK MBD PARAM PREPROCESSOR PROPERTY_HINT ROWO SCS SHADOW SHAREPOINT SIGNALS STRUCT CPP SYSTEMC EXCEL VELOCITY MISRAC OUT_THIRD_PARTY_D C_API ARV FORMAL';
                            }
                                $productData[] = PHP_EOL . 'PRODUCT    ' . str_replace(' ', '', $name)  . '  '.$quantity[$p].'  ' .'  '. $expiry_date[$p].'  '. '    WAN' . PHP_EOL . 'FEATURE    '.$feature;

                            }
                            $p++;
                            
                        }

                        if( empty($productData) ) {
                            $output = array(
                                'status' => false,
                                'msg'    => 'No products found'
                            );
                        }

                    } else {
                        $output = array(
                            'status' => false,
                            'msg'    => 'No products found'
                        );
                    }
                }

                if( empty($output) ) {

                    if(strpos($request->type1, 'ALM') !== false){
                        $line_ending = "################################################";

                        $samplefile = fopen($file, "w") or die("Unable to open file!");
                        fwrite($samplefile, implode(PHP_EOL, $licFileData));
                        fwrite($samplefile, PHP_EOL . implode(PHP_EOL, $productData));
                        fwrite($samplefile, PHP_EOL . $line_ending);

                        fclose($samplefile);

                        //ending creating file

                        $curlFile = curl_file_create($file);

                        //Create a POST array with the file in it
                        $postData = array(
                            'customer_name' => $customer_name,
                            'company_name' => $company_name,
                            'nodelock'  => 'yes',
                            'file' => $curlFile,
                        );
                    }
                    if(strpos($request->type1, 'Flex') !== false){
                        
                        
                        // $products_lic = explode(',', $request->products);
                        $products_lic = product::whereIn('id', $request->pid)->get();
                        $p = 0;
                        if( count($products_lic) > 0 ) {

                            $licFileData2 = '';
                            foreach ($products_lic as $key => $value) {
                                if($value->flex != ''){
                                    $name = $value->flex;
                                }
                                else{
                                    $name = $value->name;
                                }

                                $expiry_date[$p] = date_format(date_create($expiry_date[$p]), "d-M-Y");
                                $licFileData2 .= $value->flex.",".$quantity[$p].",".$expiry_date[$p]. PHP_EOL; 

                                $p++;

                            }
                        }
                        else {
                            $output = array(
                                'status' => false,
                                'msg'    => 'No products found'
                            );
                        }
                        if($request->type1 == 'Flex – Node locked'){
                            $licenseType = 'NODELOCK';

                        }
                        else if($request->type1 == 'Flex – Floating'){
                            $licenseType = 'FLOATING';
                        }
                        // $licFileData2 = 'IDSWord-soc,2,12-jan-2021' . PHP_EOL .  'IDSWord-adv,1,12-dec-2021';

                        $samplefile = fopen($file, "w") or die("Unable to open file!");
                        fwrite($samplefile, PHP_EOL . $licFileData2);

                        fclose($samplefile);

                        //ending creating file
                        
                        $curlFile = curl_file_create($file);

                        //Create a POST array with the file in it
                        $postData = array(
                            'customer_name' => $company_name,
                            'hostID' => $uuid,
                            'LicenseType'  => $licenseType,
                            'file' => $curlFile,
                        );
                    }

                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
                    // Execute the request
                    $response = curl_exec($ch);

                    if ($response === false) {
                        $output = array('status' => false, 'msg' => curl_error($ch));
                    } else {
                        $output = array('status' => true, 'data' => $response);
                    }

                    unlink($file);
                }
                
            } else {
                $output = array('status' => false, 'msg' => 'Company name is required');
            }
        }

        echo json_encode($output);

    }
    


}
