<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['destroy','update']);
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

    public function update(Request $request){
        $this->validate($request,array(
            'name' => 'required|max:200',
            'email' => 'required|email|max:200|unique:users,email,'.Auth::id(),
        ));
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        session()->flash('success','Account successfully updated');
    }

    public function destroy(){
        $user = User::find(Auth::id());
        $user->delete();
        session()->flash('success','Account successfully deleted');
    }
}
