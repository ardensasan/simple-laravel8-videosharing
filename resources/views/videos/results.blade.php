@extends('main')
@section('content')
<br>
@if(count($videos) > 0)
<div class="card">
    <div class="card-body">
        @foreach($videos as $video)
        <div class="card" style="border:none;">
            <div class="row justify-content-start">
                <div class="col-3">
                    <img src="{{route('videos.thumbnail',$video->thumbnail)}}" alt="">
                </div>
                <div class="col-4">
                    <h5>{{$video->title}}</h5>
                    <p>{{$video->user->name}}</p>
                    <p>{{$video->description}}</p>
                    <p>Uploaded:&nbsp;&nbsp;{{$video->created_at->format('F d, Y')}}</p>
                </div>
            </div>
            <a href="{{route('videos.details',$video->url)}}" class="stretched-link"></a>
            <hr>
        </div>
        @endforeach
    </div>
</div>
@else
<p><center>No Search Results</center></p>
@endif

<div class="row">
    <div class="col-md-12 offset-md-4">
        <br>
            {!! $videos->links() !!}
    </div>
</div>
@stop
