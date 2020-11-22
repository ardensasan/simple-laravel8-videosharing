@extends('main')
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="video" id="" accept="video/*">
            <hr>
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control">
            <label for="description">Description:</label>
            <textarea name="description" id="" cols="30" rows="10" maxlength="2000" class="form-control"></textarea>
            <br>
            <button type="submit" class="btn btn-primary"> Upload</button>
        </form>
    </div>
</div>
@stop
