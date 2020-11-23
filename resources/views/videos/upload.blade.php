@extends('main')
@section('content')
<br>
<br>
<div class="row">
    <div class="col-md-8 offset-md-2">
        <form action="{{route('upload.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="video" id="" accept="video/*" required>
            <hr>
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" required>
            <label for="description">Description:</label>
            <textarea name="description" id="" cols="30" rows="10" maxlength="2000" class="form-control"></textarea>
            <br>
            <button type="submit" class="btn btn-primary"> Upload</button>
        </form>
    </div>
</div>
@stop
