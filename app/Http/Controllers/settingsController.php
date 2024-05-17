<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class settingsController extends Controller
{
    public function index(){

        $data = Session::all();
        //dd($data);
        return view('admin.settings',compact('data'));
    }

    public function update(){
        //$data = Session::all();
        return view('admin.settings');
    }
}
