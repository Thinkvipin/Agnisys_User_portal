<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\notification;
use App\User;
use App\company;
use App\groups;

class notificationController extends Controller
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
    /**
     *  Employee access only
     */
    public function index(){

        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $notifications = notification::select('*')->where('cid',$data['cid'])->get();
        //// dd($notifications);
        return view('admin.notifications',compact('data','notifications'));
    } 
    /**
     *  manager access only
     */
    public function create(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $notifications = notification::select('*')->where('cid',$data['cid'])->get();
        //// dd($notifications);
        $users = User::select('name','username')->where('cid',$data['cid'])->where('type','e')->get();
        
        $groups = groups::select('*')->get();
        $ids_ = [];
        foreach($groups as $group){
            $ids = unserialize($group->companies);
            foreach($ids as $id){
                $ids_[] = $id;
            }
        }

        $page =5;
        $companies = company::select('*')->whereNotIn('id',$ids_)->orderBy('name','asc')->get();
        if($data['cid'] == 2204)
            return view('admin.superAdmin.notification-create',compact('page','data','notifications','users','companies','groups'));
        return view('admin.createNotification',compact('data','notifications','users'));
    }
    /**
     * edit notification
     */
    public function edit($id){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $notification = notification::select('*')->where('id',$id)->get();
        //// dd($notifications);
        $users = User::select('name','username')->where('cid',$data['cid'])->where('type','e')->get();
        
        $groups = groups::select('*')->get();
        $ids_ = [];
        foreach($groups as $group){
            $ids = unserialize($group->companies);
            foreach($ids as $id){
                $ids_[] = $id;
            }
        }
        $page =5;
        $companies = company::select('*')->whereNotIn('id',$ids_)->orderBy('name','asc')->get();
        if($data['cid'] == 2204)
            return view('admin.superAdmin.notification-edit',compact('page','data','notification','users','companies','groups'));

        
        return view('admin.editNotification',compact('data','notification','users'));
    }
    /**
     * edit notification Db
     */
    public function editDb(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $type_ = 'alert';
        if(!isset($request['global'])){
            $cids = [];
            if(isset($request->companies)){
                $c = explode(',',$this->itirator($request->companies));
                $cids = $request->companies;
            }
            // // dd($request);
            if(isset($request['groups'])){
                $group = groups::select('companies')->whereIn('id',$request->groups)->get();
                foreach( unserialize($group[0]->companies)  as $c){
                    $cids[] = $c;
                }
            }
            $users = User::select('*')->whereIn('cid',$cids)->get();
            /**
            *  add the new notification to database
            */
            $d = [];
            foreach($users as $u){
                $a = [
                    "id"    => $u->id,
                    "mark"  => "unread",
                ];
                $d[] = $a;
            }
            $dp = json_encode($d);

            $url = route('home');
            // http://agnisys.com/portal1/../public/images/file_1558410601_4N2215963550104.png
            notification::where('id',$request['id'])->update([
                'title' => $request->title,
                'uid'   => $data['uid'],
                'cid'   => $data['cid'],
                'type'  => $type_,
                'text'  => str_replace('<img src="../../../','<img src="'.$url.'/',$request->text),
                'assignees' => $dp,
                'companies' => serialize($cids),
                'groups'   => serialize($request->groups),
                ]);
                
        }else{
            $type_ = 'danger';
            $url = route('home');
            notification::where('id',$request['id'])->update([
                'title' => $request->title,
                'text'  => str_replace('<img src="../../../','<img src="'.$url.'/',$request->text),
                'uid'   => $data['uid'],
                'cid'   => $data['cid'],
                'type'  => $type_,
                ]);
        }
        

        
        
        // // dd($request);
        
        session()->flash('alert-success', 'Notification updated successfully');
        $page =5;
        if($data['cid'] == 2204)
            return redirect(route('all-notifications'))->with(compact('page'));
        return redirect()->back()->with('message','updated successfully');
    }
    /**
     * delete notification
     */
    public function delete($id){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        notification::where('id',$id)->delete(); 

        session()->flash('alert-success', 'Notification deleted successfully');
        $page =5;
        return redirect()->back()->with(compact('page'));
    }
    /**
     *  all notifications
     */
    public function all(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        //// dd($notifications);
        if($data['cid'] == 2204){
            $notifications = notification::select('*')
                            ->where('cid',$data['cid'])
                            ->whereIn('type',['danger','alert'])
                            ->get();
            $companies = \App\company::select('*')->get();
            $page = 5;
            return view('admin.superAdmin.notification-all',compact('page','data','notifications','companies'));
        }
        $notifications = notification::select('*')->get();
        return view('admin.allNotifications',compact('data','notifications'));
    }
    /**
     * 
     */
    public function singleNotification($id){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        
        $notifications = notification::select('*')->where('id',$id)->get();
        //// dd($notifications);
        if($notifications[0]->assignees != null && $notifications[0]->assignees != 'N;')
         {
             $not = json_decode($notifications[0]->assignees);
            foreach($not as $o){
                if($o->id == $data['uid']){
                    if($o->mark == "unread"){
                        $o->mark = "read";
                    }
                }
            }
            notification::where('id', $notifications[0]->id)->update(array('assignees'=>json_encode($not)));
        }
        
        $page =5;
        if($data['cid'] == 2204)
            return view('admin.superAdmin.notification-single',compact('page','data','notifications'));

        return view('admin.singleNotification',compact('data','notifications'));
    }
    /**
     * add new notification by super admin
     */
    public function addNew_s(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $type_ = 'alert';
        if(!isset($request['global'])){
            
            $cids = [];
            if(isset($request->companies)){
                $c = explode(',',$this->itirator($request->companies));
                $cids = $request->companies;
            }
            // // dd($request);
            if(isset($request['groups'])){
                $group = groups::select('companies')->whereIn('id',$request->groups)->get();
                foreach( unserialize($group[0]->companies)  as $c){
                    $cids[] = $c;
                }
            }
            $users = User::select('*')->whereIn('cid',$cids)->get();
            /**
            *  add the new notification to database
            */
            $d = [];
            if($users->count()>0){
                foreach($users as $u){
                    $a = [
                        "id"    => $u->id,
                        "mark"  => "unread",
                    ];
                    $d[] = $a;
                }
            }
            $dp = json_encode($d);

            $url = route('home');
            $n = new notification;
            $n->title = $request->title;
            $n->text  = str_replace('<img src="../../','<img src="'.$url.'/',$request->text);
            $n->uid   = $data['uid'];
            $n->cid   = $data['cid'];
            $n->assignees = $dp;
            $n->companies = serialize($cids);
            $n->groups    = serialize($request->groups);
            $n->type  = $type_;
            $n->save();
        }else{
            $type_ = 'danger';
            $url = route('home');
            $n = new notification;
            $n->title = $request->title;
            $n->text  = str_replace('<img src="../../','<img src="'.$url.'/',$request->text);
            $n->uid   = $data['uid'];
            $n->cid   = $data['cid'];
            $n->type  = $type_;
            $n->save();
        }
        
        session()->flash('alert-success', 'Notification created successfully');
        $page =5;
        if($data['cid'] == 2204)
            return redirect(route('all-notifications'))->with(compact('page'));
        

    }
    /**
     * 
     */
    public function addNew(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $type_ = 'alert';
        if(!isset($request['global'])){
            
            $cids = [];
            if(isset($request->companies)){
                $c = explode(',',$this->itirator($request->companies));
                $cids = $request->companies;
            }
            // // dd($request);
            if(isset($request['groups'])){
                $group = groups::select('companies')->whereIn('id',$request->groups)->get();
                foreach( unserialize($group[0]->companies)  as $c){
                    $cids[] = $c;
                }
            }
            $users = User::select('*')->whereIn('cid',$cids)->get();
            /**
            *  add the new notification to database
            */
            $d = [];
            if($users->count()>0){
                foreach($users as $u){
                    $a = [
                        "id"    => $u->id,
                        "mark"  => "unread",
                    ];
                    $d[] = $a;
                }
            }
            $dp = json_encode($d);

            $n = new notification;
            $n->title = $request->title;
            $n->text  = str_replace('<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>','',$request->text);
            $n->uid   = $data['uid'];
            $n->cid   = $data['cid'];
            $n->assignees = $dp;
            $n->companies = serialize($cids);
            $n->groups    = serialize($request->groups);
            $n->type  = $type_;
            $n->save();
        }else{
            $type_ = 'danger';

            $n = new notification;
            $n->title = $request->title;
            $n->text  = str_replace('<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>','',$request->text);
            $n->uid   = $data['uid'];
            $n->cid   = $data['cid'];
            $n->type  = $type_;
            $n->save();
        }
        
        //// dd($notifications);
        if($data['cid'] == 2204)
            return redirect(route('all-notifications'));
    }
    /**
     *  Checkbox group itrator
     */
    private function itirator($aDoor){
        $sequence = '';
        if(empty($aDoor)) {
                // echo("You didn't select any buildings.");
        } 
        else{
                $N = count($aDoor);
                //echo("You selected $N door(s): ");
                for($i=0; $i < $N; $i++){
                        // echo($aDoor[$i] . " ");
                        $sequence .= $aDoor[$i].',';
                }
        }
        $sequence = substr_replace($sequence, '', -1, 1);
        return $sequence;
    }
}
