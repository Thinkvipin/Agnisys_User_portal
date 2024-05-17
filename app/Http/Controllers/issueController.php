<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\issues;
use App\comments;
use App\User;
use App\company;
use App\notification;
use Illuminate\Support\Facades\View;
Use Session;
use Mail;

class issueController extends Controller
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
    public function companyIssue($id){
        
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $cid = \App\company::select('id')->where('name',$id)->get()->first();
        $issues = issues::select('*')->where('cid',$cid->id)->get();
        $users = User::select('name','username','id','email')->where('cid',$data['cid'])->get();
        $companies = \App\company::select('*')->orderBy('name','asc')->get();

        $page =3;
        return view('admin.superAdmin.issue-all-company',compact('page','data','issues','users','companies'));
    }
    public function allCompanyIssue(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $issues = issues::select('*')->get();
        $users = User::select('name','username','id','email')->where('cid',$data['cid'])->get();
        $companies = \App\company::select('*')->orderBy('name','asc')->get();

        $page =3;
        return view('admin.superAdmin.issue-all-company',compact('page','data','issues','users','companies'));
    }
    public function all(){
        
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $issues = issues::select('*')->where('cid',$data['cid'])->get();
        $users = User::select('name','username','id','email')->where('cid',$data['cid'])->get();
        $page = 3;
        return view('admin.issues',compact('page','data','issues','users'));
    }

    public function active(){
        
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $issues = issues::select('*')->where('cid',$data['cid'])->get();
        $users = User::select('name','username','id','email')->where('cid',$data['cid'])->get();
        
        $page=3;
        return view('admin.issuesActive',compact('page','data','issues','users'));
    }
    /**
     * public update issue
     */
    public function updateStatus(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        issues::where('id',$request['id'])->update([
            'status' => $request['status'],
        ]);
        
        session()->flash('alert-success', 'Issue status updated successfully');
        $page = 3;
        return redirect()->back()->with(compact('page'));
    }
    /**
     * public update issue
     */
    public function updateLabel(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        issues::where('id',$request['id'])->update([
            'label' => $request['label'],
        ]);
        session()->flash('alert-success', 'Issue label updated successfully');
        $page = 3;
        return redirect()->back()->with(compact('page'));
    }
    /**
     * public update issue
     */
    public function updatePriority(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        issues::where('id',$request['id'])->update([
            'priority' => $request['priority'],
        ]);
        session()->flash('alert-success', 'Issue priority updated successfully');
        $page = 3;
        return redirect()->back()->with(compact('page'));
    }
    /**
     * public update issue
     */
    public function updateAssignees(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        issues::where('id',$request['id'])->update([
            'assigns' => serialize($request['user']),
        ]);
        session()->flash('alert-success', 'Issue Assignees updated successfully');
        $page = 3;
        return redirect()->back()->with(compact('page'));
    }

    public function singleIssueAdmin($id,$cid){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        
        $comments = comments::select('*')->where('cid',$cid)->where('issue_id',$id)->get();
        $issueData = issues::select('*')->where('id',$id)->get();
        $users = User::select('username','id','email')->where('cid',$data['cid'])->get();
        
        $page =3;
        if($data['cid'] == 2204)
            return view('admin.superAdmin.issue-single',compact('page','data','issueData','comments','users'));
        
        return view('admin.singleIssue',compact('page','data','issueData','comments','users'));
    }


    public function singleIssue($id){

        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        
        // $comments = comments::select('*')->where('cid',$data['cid'])->where('issue_id',$id)->get();
        $comments = comments::select('*')->where('issue_id',$id)->get();
        $issueData = issues::select('*')->where('id',$id)->get();
        $users = User::select('username','id','email')->where('cid',$data['cid'])->get();
        $page =3;
        
        return view('admin.singleIssue',compact('page','data','issueData','comments','users'));
    }

    public function addComment(Request $request){
        //dd($request);
        
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        /**
         * mentioning
         */
        $tags = explode("@",$request->mentionUser);
        //dd($tags);

        $d= '[';
        
        foreach($tags as $tag){
            $id = User::select('id')->where('username',$tag)->get();
            
            if($tag != ""){
                //dd(json_encode($id));
                $d .= '{ "id":'.$id[0]->id.', "mark":"unread"},';
            }
        }
        $d .=']';
        /**
         *  removing the extra , from the end
         */
        $d = substr_replace($d, '', -2, 1);
        
        /**
         * storeing the new comment
         */
        $c = new comments;
        $c->cid      = $data['cid'];
        $c->uid      = $data['uid'];
        $c->username = $data['username'];
        $c->issue_id = $request->issueId;
        $c->comment  = $request->commentText;
        $c->save();
        
        session()->flash('alert-success', 'Issue comment added successfully');
        $page = 3;
        return redirect()->route('issue', ['id' => $request->issueId])->with(compact('page'));
        return redirect()->action('issueController@singleIssue');

        //return view('admin.singleIssue',compact('data','issueData','comments'));
    }

    public function add(Request $request){

        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $mailData = $request;
        /**
         * mentioning
         */
        $tags = explode("@",$request->mentionUser);
        $d= '[';
        $u = [];
        foreach($tags as $tag){
            $id = User::select('id')->where('username',$tag)->where('cid',$data['cid'])->get();
            
            if($tag != ""){
                //dd(json_encode($id));
                $d .= '{ "id":'.$id[0]->id.', "mark":"unread"},';
                $u[] = $id[0]->id;
            }
        }
        $d .=']';
        $u[] = $data['uid'];
        /**
         *  removing the extra , from the end
         */
        $d = substr_replace($d, '', -2, 1);
        /**
         * Storing issue to database
         */
        $i = new issues;
        $i->topic = $request->topic;
        $i->label = $request->label;
        $i->uid   = $data['uid'];
        $i->leader   = $data['uid'];
        $i->cid   = $data['cid'];
        $i->assigns = serialize($u);
        $i->priority = $request->priority;
        $i->status  = $request->status;
        $i->save();
        /**
         * fetching the issue 
         */
        $issues = issues::select('id')->orderby('id','desc')->take(1)->get();
        /**
         *  storing first comment 
         */
        $c = new comments;
        $c->cid      = $data['cid'];
        $c->uid      = $data['uid'];
        $c->username = $data['username'];
        $c->issue_id = $issues[0]->id;
        $c->comment  = $request->commentText;
        $c->save();
        /**
         * Sending notifications to mentioned users
         */
        $n = new notification;
        $n->title = "You have been assigned in a Issue";
        $n->text  = $request->commentText;
        $n->uid   = $data['uid'];
        $n->cid   = $data['cid'];
        $n->assignees = $d;
        $n->type  = 'issue';
        $n->save();
        /**
         * sending mails
         */
        $mailData['assignees'] = $u;
        $mailData['uid'] = $data['uid'];
        $mailData['cid'] = $data['cid'];
        $mailData['company'] = $data['company'];
        $mailData['issueId'] = $issues[0]->id;
    // foreach($u as $user){
    //     Mail::send(['text'=>'admin.mails.support'],['name'=>$data->username,'data'=>$mailData],function($message)use($mailData,$user){
    //         $message->to($,'Agnisys')->subject($mailData->topic);
    //         $message->from('user@agnisys.com');
    //     });
    // }

        session()->flash('alert-success', 'Issue added successfully');
        $page = 3;

        $user = Auth::user();
        $id = Auth::id();
        $company = company::select('*')->where('id', $user->cid)->get();
        $issues = issues::select('*')->where('cid', $company[0]->id)->get();
        $TotlIssues = 0;
        $TotlActive = 0;
        foreach ($issues as $issue) {
            if ($issue->status != 'Closed') {
                $TotlActive++;
            }
            $TotlIssues++;
        }
        Session([
            'TotalIssues' => $TotlIssues,
            'TotalActive' => $TotlActive
        ]);
        
        return redirect()->route('allIssue')->with(compact('page'));
    }
}

