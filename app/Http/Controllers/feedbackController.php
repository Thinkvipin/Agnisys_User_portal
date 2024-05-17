<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\feedback;
use App\company;
use App\User;
use Mail;
class feedbackController extends Controller
{
    /**
     * feedback
     */
    public function feedback(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $page = 11;
        return view('admin.feedback',compact('page','data'));
    }
    /**
     *  send feedback
     */
    public function sendFeedback(Request $request){
        

        $f = new feedback;
        $f->topic       = $request['topic'];
        $f->message     = $request['message'];
        $f->type        = $request['ftype'];
        $f->cid         = $request['cid'];
        $f->uid         = $request['uid'];
        $f->save();

        $users = User::select('*')->where('id', $request['uid'])->get();

        $edata['email'] = $users[0]->email;
        $edata['type'] = 'feedback';
        $edata['msg'] = $request['message'];
        $edata['topic'] = $request['topic'];
        $edata['ftype'] = $request['ftype'];

        Mail::send(['html' => 'admin.mails.signup'], $edata, function ($message) {
            $message->to('marcom@agnisys.com', '')->subject('New Feedback Submitted');
            $message->from('marcom@agnisys.com', 'Marcom');
        });

        $page =11;
        session()->flash('alert-success', 'Feedback sent successfully');
        return redirect(route('dashboard'))->with(compact('page'));
    }
    /**
     * view all
     */
    public function viewAll(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $feeds = feedback::select('*')->orderby('id','DESC')->get();
        $companies = company::select('*')->get();
        $users = User::select('*')->get();

        $page = 11;
        return view('admin.superAdmin.feedback-all',compact('page','data','feeds','companies','users'));
    }
}
