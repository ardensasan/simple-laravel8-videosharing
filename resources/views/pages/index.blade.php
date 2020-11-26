@extends('main')
@section('content')
<br>
@if(count($videos) > 0)
<div class="card">
    <div class="card-body">
        @foreach($videos as $video)
        <div class="row justify-content-start">
            <div class="col-3">
                <img src="{{route('videos.thumbnail',$video->thumbnail)}}" alt="">
            </div>
            <div class="col-4">
                <h5>{{$video->title}}</h5>
                <p>{{$video->user->name}}</p>
                <p>{{$video->description}}</p>
                <p>{{$video->created_at->format('F d, Y')}}</p>
            </div>
            <a href="{{route('videos.watch',$video->url)}}" class="stretched-link"></a>
        </div>
        <hr>
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
