<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',['except' => 'logout']);
    }

    public function create(){
        return view('pages.signin');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function login(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect('/');
        }
        return redirect()->route('user.signin')->withErrors("Invalid Credentials");
    }
}
