<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\groups;
use App\company;

class groupController extends Controller
{
    public function all(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        $groups = groups::select('*')->get();
        $companies = company::select('*')->orderBy('name','asc')->get();
        $page = 9;
        return view('admin.superAdmin.group-all',compact('page','data','groups','companies'));
    }
    
    public function create(){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        // $groups = groups::select('*')->get();
        $companies = company::select('*')->orderBy('name','asc')->get();
        $page = 9;
        return view('admin.superAdmin.group-create',compact('page','data','companies'));
    }
    
    public function createDb(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        
        $g = new groups;
        $g->name   = $request->name;
        $g->companies = serialize($request->companies);
        $g->save();
        session()->flash('alert-success', 'Group created successfully');
        $page = 9;
        return redirect(route('allGroups'))->with(compact('page'));
    }
     /**
     * edit team
     */
    public function editGroup($id){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }

        $group = groups::select('*')->where('id',$id)->get();

        $companies = company::select('name','id')->get();
        
        $page = 9;
        return view('admin.superAdmin.group-edit',compact('page','data','group','companies'));
    }
    /**
     * edit team Db
     */
    public function editGroupDb(Request $request){
        $data = Session::all();         if(!isset($data['cid'])){             return redirect('/');         }
        
        groups::where('id',$request->id)->update(
            array(
                'name' => $request->name,
                'companies' => serialize($request->companies),
            )
        );
        session()->flash('alert-success', 'Group updated successfully');
        $page = 9;
        return redirect(route('allGroups'))->with(compact('page'));
    }
    /**
     * delete Team
     */
    public function deleteGroup($id){

        groups::where('id',$id)->delete();

        // dd($id);
        session()->flash('alert-success', 'Group deleted successfully');
        $page = 9;
        return redirect(route('allGroups'))->with(compact('page'));
    }

}
