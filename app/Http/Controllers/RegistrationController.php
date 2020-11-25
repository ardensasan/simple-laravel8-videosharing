<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create(){
        return view('pages.signup');
    }

    public function store(Request $request){
        $this->validate($request,array(
            'name' => 'required|max:200',
            'email' => 'required|email|max:200|unique:users',
            'password' => 'required|min:8|max:200|confirmed',
        ));
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        session()->flash('success','Successfully registered');
        return redirect()->route('home');
    }
}
