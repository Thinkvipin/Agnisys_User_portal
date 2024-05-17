<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\ftp;
use App\User;
use App\company;

class ftpController extends Controller
{

    public function allWorking(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $ftpAll = ftp::select('*')->where('status',1)->get();
        $companies = company::select('*')->orderBy('name','asc')->get();
        $users = User::select('*')->get();
        $page = 10;
        return view('admin.superAdmin.ftp-all1',compact('page','data','ftpAll','companies','users'));
    }


    public function delete($id){
        ftp::where('id',$id)->delete();
        session()->flash('alert-success', 'FTP/SFTP deleted successfully');
        $page = 10;
        return redirect(route('allFtpWorking'))->with(compact('page'));
    }


    public function all(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $ftps = ftp::select('*')->where('cid',$data['cid'])->get();
        $ftpAll = ftp::select('*')->where('status',0)->get();
        $companies = company::select('*')->orderBy('name','asc')->get();
        $users = User::select('*')->get();
        $page = 10;
        if($data['role'] == 'Admin')
            return view('admin.superAdmin.ftp-all',compact('page','data','ftpAll','companies','users'));
        return view('admin.allFTP',compact('page','data','ftps'));
    }
    /**
     * get
     */
    public function ftpRequest(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $page = 10;
        return view('admin.requestFtp',compact('page','data'));
    }
    /**
     * post
     */
    public function ftpRequestDb(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $f = new ftp;
        $f->cid = $request->cid;
        $f->uid = $request->uid;
        $f->status = 0;
        $f->save();
        session()->flash('alert-success', 'FTP/SFTP request sent successfully');
        $page = 10;
        return redirect(route('dashboard'))->with(compact('page'));
    } 


    public function ftpView($id){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $ftp = ftp::select('*')->where('id',$id)->get();
        $company = company::select('name')->where('id',$ftp[0]->cid)->get();

        $page = 10;
        return view('admin.superAdmin.ftp-view',compact('page','data','ftp','company'));
    }


    public function ftpResponse($id){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $ftp = ftp::select('*')->where('id',$id)->get();
        $company = company::select('name')->where('id',$ftp[0]->cid)->get();

        $page = 10;

        return view('admin.superAdmin.ftp-response',compact('page','data','ftp','company'));
    }


    public function ftpResponseDb(Request $request){

        ftp::where('id',$request->id)->update([
                    "ftp_url"      => $request->url,
                    "ftp_username" => $request->username,
                    "ftp_pass"     => $request->pass,
                    "ftp_port"     => $request->port,
                    'status'       => 1,
                    'uid'          => "",
                ]);
        
        session()->flash('alert-success', 'FTP/SFTP assigned successfully');
        $page = 10;
        return redirect(route('allFtpWorking'))->with(compact('page'));
    } 


    public function assignFtpRequest(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        ftp::where('cid',$request->cid)
                ->where('uid',$request->uid)
                ->where('status',0)->update([
                    "ftp_url"      => $request->url,
                    "ftp_username" => $request->username,
                    "ftp_pass"     => $request->pass,
                    "ftp_port"     => $request->port,
                ]);
        session()->flash('alert-success', 'FTP/SFTP assigned successfully');
        $page = 10;
        return redirect(route('dashboard'))->with(compact('page'));
    } 
 
    public function viewAllRequest(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $ftps = ftp::select('*')->where('status',0)->get();
        $page = 10;
        return view('admin.superAdmin.ftp-requests',compact('page','data','ftps'));
    }


    public function create(){
        $companies = \App\company::select('*')->get();
        $users = \App\User::select('*')->where('role','customer')->get();
        $page = 10;
        return view('admin.superAdmin.ftp-create',compact('page','companies','users'));
    }


    public function createDB(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $f = new ftp;
        $f->cid = $request->cid;
        $f->uid = "";
        $f->ftp_url      = $request->url;
        $f->ftp_username = $request->username;
        $f->ftp_pass     = $request->pass;
        $f->ftp_port     = $request->port;
        $f->status = 1;
        $f->save();
        
        // dd($f);
        session()->flash('alert-success', 'FTP/SFTP created successfully');
        $page = 10;
        return redirect(route('allFtpWorking'))->with(compact('page'));
    }
}
