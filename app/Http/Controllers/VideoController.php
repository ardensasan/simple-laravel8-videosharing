<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Routing\ResponseFactory;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use App\Models\Video;
use Illuminate\Pagination\Paginator;
use App\Helpers\VideoStream as VideoStream;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','search','watch','show','thumbnail']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();
        $videos = Video::orderBy('created_at','desc')->paginate(10);
        return view('pages.index')->with('videos',$videos);
    }

    public function thumbnail($thumbnail)
    {
        return Storage::disk('local')->get('public\thumbnails\\'.$thumbnail);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'video' => 'required|mimes:mp4,mov,ogg,wmv,webm,mpg,mpeg,avi',
            'title' => 'required|max:250',
            'description' => 'max:2000'
        ));

        $hash = $request->video->hashName();
        $url = substr($hash, 0, strrpos($hash, "."));

        $_image = $url.".jpg";
        $_video = $url.".mp4";

        $video = $request->video;

        $cmd = "ffmpeg -i $video -c:v libx264 $_video"; //convert uploaded video to mp4
        shell_exec($cmd);

        $size = "250x145"; //thumbnail size
        $timeStamp = 1; //video timestamp
        $cmd = "ffmpeg -i $video -an -ss $timeStamp -s $size $_image"; //generate thumbnail
        shell_exec($cmd);

        $video = Storage::disk('local_public')->get($_video); //get video from public folder
        Storage::disk('local')->put('public\videos\\'.$_video, $video); //copy to storage folder
        Storage::disk('local_public')->delete($_video); //delete original file from public folder

        $image = Storage::disk('local_public')->get($_image); //get image from public folder
        Storage::disk('local')->put('public\thumbnails\\'.$_image, $image); //copy to storage folder
        Storage::disk('local_public')->delete($_image); //delete original file from public folder

        $video = new Video;
        $video->video = $_video;
        $video->title = $request->title;
        $video->description = $request->description;
        $video->url = $url;
        $video->thumbnail = $_image;
        $video->user_id = Auth::id();
        $video->save();
        session()->flash('success', "Video uploaded successfully");
        return redirect()->route('videos.details',$url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        $video = Video::where('url',$url)->first();
        $path = Storage::path('public/videos/'.$video->video);
        $stream = new VideoStream($path);
        return $stream->start();
    }

    public function details($url){
        $video = Video::where('url',$url)->first();
        return view('videos.details')->with('video',$video);
    }

    public function watch($url)
    {
        $video = Video::where('url',$url)->first();
        return view('videos.view')->with('video',$video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function search($term){
        Paginator::useBootstrap();
        $videos = Video::orderBy('created_at','desc')->where('title', 'LIKE', "%$term%")->orWhere('description', 'LIKE', "%$term%")->paginate(10);
        return view('videos.results')->with('videos',$videos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $this->validate($request,array(
                '_title' => 'required|min:1|max:250',
                '_description' => 'max:2000'
        ));
        $video = Video::find($request->_id);
        $video->title = $request->_title;
        $video->description = $request->_description;
        $video->save();
        session()->flash('success', "Video updated successfully");
        return redirect()->route('videos.details',$video->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
