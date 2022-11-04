<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function  __construct()
    { 
        $this->middleware('guest')->except('logout'); 
    }

    public function login(Request $request){
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $user = $request->username;
        $credential = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if($user == 'admin'){
            if(Auth::attempt($credential))
            {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }
            return back()->with('status', 'error')->with('message', 'error');
        }
        return back();
    }

    public function logout(){
        Auth::logout();
        session_start();
        session_destroy();

        return redirect()->route('login');
    }

    // public function postLogin(Request $request){
    //     $username = strip_tags($request->username);
    //     $password = strip_tags($request->password);

    //     if(empty($username)){
    //         return redirect()->route('login')->with('status', 'error')->with('message', 'Kolom username harus di isi');
    //     }
    // }
}
