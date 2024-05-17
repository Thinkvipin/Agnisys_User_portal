<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\notification;
use App\team;
use Illuminate\Support\Facades\View;
Use Session;
class teamController extends Controller
{
    public function all(){
        $data = Session::all();
        
        $teams = team::select('*')->where('cid',$data['cid'])->get();
        // $teams_ = team::select('*')->where('cid',$data['cid'])->get();
        $users = User::select('name','username','id')->where('cid',$data['cid'])->where('type','e')->get();

        return view('admin.allteams',compact('data','teams','users'));
        
    }
    /**
     * create team
     */
    public function create(){

        $data = session::all();

        $users = User::select('name','username','id')->where('cid',$data['cid'])->where('type','e')->get();

        return view('admin.createTeam',compact('data','users'));
    }
    /**
     * create team Db
     */
    public function createDb(Request $request){

        $data = session::all();
        $t  = new team;
        $t->name = $request['name'];
        $t->tag  = $request['tag'];
        $t->work = $request['work'];
        $t->cid  = $data['cid'];
        $t->assigned_to = serialize($request['assignees']);
        $t->save();

        return redirect(route('allTeams'));
    }
    /**
     * edit team
     */
    public function editTeam($id){
        $data = session::all();

        $team = team::select('*')->where('id',$id)->get();

        $users = User::select('name','username','id')->where('cid',$data['cid'])->where('type','e')->get();

        return view('admin.editTeam',compact('data','team','users'));
    }
    /**
     * edit team Db
     */
    public function editTeamDb(Request $request){
        $data = session::all();
        
        team::where('id',$id)->update(
            array(
                'name' => $request['name'],
                'tag'  => $request['tag'],
                'work' => $request['work'],
                'assigned_to' => $request['assignees'],
            )
        );
        
        return redirect(route('allTeams'));
    }
    /**
     * delete Team
     */
    public function deleteTeam($id){

        team::where('id',$id)->delete();

        // dd($id);
        return redirect(route('allTeams'));
    }

}
