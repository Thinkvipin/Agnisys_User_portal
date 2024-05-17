<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;
use App\company;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;


class companyController extends Controller
{
    public function authorise(Request $request){
        

	    $return = array();
	    $return['status'] = false;
        $email = (isset($request['email']) && !empty($request['email'])) ? $request['email'] : '';
        $wp_user_id = (isset($request['wp_user_id']) && !empty($request['wp_user_id'])) ? $request['wp_user_id'] : '';
        $user = User::where('email', '=', $email)->first();
        $user->password = Hash::make($request['password']);
        $user->save(); 
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
           $return['status'] = true;
            $return['email'] = Auth::user()->email;
            $return['pass'] = $request['password'];
            $return['id'] = Auth::user()->id;
            // Authentication passed...
            //return redirect()->intended('dashboard');
        }

        //Auth::login($user, true);
        //Auth::loginUsingId($user->id, true);
        //Auth::guard('web')->login($user);        

        /*if($email && $wp_user_id && Auth::check()){   
           $return['status'] = true;
            $return['email'] = Auth::user()->email;
            $return['id'] = Auth::id();
        }*/


	    echo json_encode($return);
        exit;

    }

    public function profile(){

        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $company = company::select('*')->where('id',$data['cid'])->get();
        // $licenses = \App\license::leftJoin('products',function($join){
        //     $join->on('products.id','=','licenses.pid');
        // })->select('licenses.*','products.name')->where('licenses.cid',$data['cid'])->get();
        $licenses = \App\license::select('*')->where('cid',$data['cid'])->get();
        $products = \App\product::select('*')->get();
        
        $users = \App\User::where('cid',$data['cid'])->get();
        
       
        
        // dd($licenses);
        $page = 18;
        if($data['role'] == 'Admin')
            return view('admin.superAdmin.company-profile',compact('page','data','company'));
        
        
        return view('admin.companyProfile',compact('page','data','company','licenses','users','products'));
    }
    /**
     * all Company 
     */
    public function allCompany(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $company = company::select('*')->get();
        
        $page =2;
        return view('admin.superAdmin.company-all',compact('page','data','company'));

    }
    /**
     * get products 
     */
    public function getProducts($cid){
        $pids = \App\license::select('pid')->where('cid',$cid)->get();
        $products = [];
        foreach($pids as $pid){
               $products[] = \App\product::select('name')->where('id',$pid[0]->pid)->get(); 
        }
    }
    /**
     *  delete company
     */
    public function deleteCompany($id){
        company::where('id',$id)->delete();
        session()->flash('alert-success', 'Company deleted successfully');

        $page =2;
        return redirect(route('allCompany'))->with(compact('page'));
    }
    /**
     *  edit company
     */
    public function editCompany($id){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $company = company::select('*')->where('id',$id)->get();
        
        $page =2;
        return view('admin.superAdmin.company-edit',compact('page','data','company'));
    }
    /**
     *  edit company Db
     */
    public function editCompanyDb(Request $request){


        if(isset($request['logo'])){
            $licenseFile = $request->file('logo');
            $input['imagename'] = time().'_'.$this->random_().'.'.$licenseFile->getClientOriginalExtension();
            $destinationPath = public_path('/logo_files');
            $licenseFile->move($destinationPath,$input['imagename']);
            company::where('id',$request['id'])->update(
                array(
                    'logo' => $input['imagename'],
                ));
        } 
        if($request['phone'] == ''){
           $request['phone'] = ''; 
        }
        // dd($request);
        company::where('id',$request['id'])->update(
            array(
                'name' => $request['name'],
                'domain' => $request['domain'],
                'address' => $request['address'],
                'phone' => $request['phone'],
                'finance_contact' => $request->fContact,
                'technical_contact' => $request->techContact,
                'license_sw_contact' => $request->swContact,
            )
        );
        session()->flash('alert-success', 'Company updated successfully');
        return redirect()->back();
    }
    /**
     *  add company
     */
    public function addCompany(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $page =2;
        return view('admin.superAdmin.company-add',compact('page','data'));
    }
    /**
     *  add company Db
     */
    public function addCompanyDb(Request $request){

        $input['imagename'] = '';
        if(isset($request['logo'])){
            $licenseFile = $request->file('logo');
            $input['imagename'] = time().'_'.$this->random_().'.'.$licenseFile->getClientOriginalExtension();
            $destinationPath = public_path('/logo_files');
            $licenseFile->move($destinationPath,$input['imagename']);
        }

        // dd($request);
        $c = new company;
        $c->name = $request['name'];
        $c->domain = $request['domain'];
        $c->address = $request['address'];
        if($request['phone'] != ''){
            $c->phone   = $request['phone'];
        }
        else{
           $c->phone = ''; 
        }
        
        $c->finance_contact = $request->fContact;
        $c->technical_contact = $request->techContact;
        $c->license_sw_contact = $request->swContact;
        $c->logo = $input['imagename'];
        $c->save();

        session()->flash('alert-success', 'Company added successfully');
        return redirect(route('allCompany'));
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
    public function getList(Request $request){

        $list = \App\company::select('name')->whereIn('id',[$request->cmps])->get();
            
        $clist = '';
        foreach($list as $l){
            $clist .= $l->name.',';
        }
        


        return $clist;
    }
}
