@extends('main')
@section('content')
<br>
<br>
<div class="row">
    <div class="col-md-10">
        <video width="853" height="480" controls>
            <source src="{{ route('videos.show', $video->url)}}" type="video/mp4">
        </video>
        <br>
        <h1><strong>{{$video->title}}</strong></h1>
        <p>{{$video->description}}</p>
        <div class="form-group row">
            <label for="url" class="col-sm-1 col-form-label">URL:</label>
            <div class="col-sm-10">
              <input type="email" readonly class="form-control" value = "{{URL('/watch').'/'.$video->url}}" id="inputEmail3">
            </div>
        </div>
    </div>
</div>
@stop

