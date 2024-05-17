<?php 
// app/Http/Controllers/Auth/LoginController2.php

namespace App\Http\Controllers\Auth;
use App\User;
use App\fogbugzapis;
use App\employees;
use App\managers;
use App\company;
use App\usertracks;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Tracker;
use Session;


class LoginController2 extends Controller
{
    // public function showLoginForm()
    // {
    //     return view('auth.login2');
    // }

    // public function login(Request $request)
    // {
    //     // Add your login logic for the second login scenario here

    //     // If login is successful, redirect to a different dashboard
    //     return redirect('/dashboard2');
    // }
    public function showLoginForm()
    {
        return view('auth.login2');
    }

    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful, redirect to a different dashboard
            // return redirect('/dashboard2');
           
            $user = Auth::user();
            $userName = $user->name;
            $userEmail = $request->email;
            $value = $user." - ".$userName." - ".$userEmail;
            Session(['chatuseremail' => $request->email]);
            Session(['chatusername' => $user->name]);
            setcookie('uid',$user->id,time() + (86400 * 1), "/");
            return redirect()->route('dashboard2');
            // die("Hello");
        }

        // Authentication failed, redirect back with errors
        return redirect()->route('login2')->withInput($request->only('email'));
    }
}
