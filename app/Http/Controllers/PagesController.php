<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myvideos(){
        Paginator::useBootstrap();
        $videos = $videos = Video::orderBy('created_at','desc')->where('user_id',Auth::id())->paginate(10);
        return view('pages.myvideos')->with('videos',$videos);
    }

    public function profile(){
        $user = User::find(Auth::id());
        return view('pages.profile')->with('user',$user);
    }
}
