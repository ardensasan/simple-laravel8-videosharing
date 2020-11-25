@extends('main')
@section('content')
<br>
@if(count($videos) > 0)
<div class="card">
    <div class="col-md-12">
            @foreach($videos as $video)
                <div class="col-md-4">
                    {{$video->id}}
                </div>
                <div class="col-md-8 offset-md-4">
                    <h5>{{$video->title}}</h5>
                    <p>{{$video->created_at}}</p>
                    <p>{{$video->description}}</p>
                </div>
                <a href="{{route('videos.watch',$video->url)}}" class="stretched-link"></a>
            @endforeach
    </div>
</div>
<div class="row">
    <div class="col-md-12 offset-md-4">
        <br>
            {!! $videos->links() !!}
    </div>
</div>
@else
<p><center>No Search Results</center></p>
@endif
@stop
