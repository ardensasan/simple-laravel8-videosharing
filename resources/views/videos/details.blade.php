@extends('main')
@section('stylesheets')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@stop
@section('content')
<br>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h5>Video Details</h5>
        </div>
        <div class="card-body">
            <div class="col-md-8">
                <video width="853" height="480" controls>
                    <source src="{{ route('videos.show', $video->url)}}" type="video/mp4">
                </video>
                <br>
            </div>
            <br>
            <div class="col-md-10">
                <table class="table" style="table-layout:fixed;">
                    <thead>
                        <th width="150"></th>
                        <th></th>
                        <th width="10"></th>
                    </thead>
                    <tbody>
                        <tr>
                            <th>URL: </th>
                            <td><input type="text" readonly class="form-control" id="staticEmail" value="{{URL('/watch'.'/'.$video->url)}}"></td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td> <input type="text" readonly disabled  class="form-control-plaintext" id="title" name="title" value="{{$video->title}}"></td>
                            <td><button class="btn btn-primary btn-sm" id="editTitle"><span class="fa fa-pencil" aria-hidden="true"></span></button></td>
                        </tr>
                        <tr>
                            <th>Description: </th>
                            <td>
                                <textarea name="" id="description" class="form-control" hidden cols="30" rows="10"> {{$video->description}}</textarea>
                                <div id="descDiv">
                                    {{$video->description}}
                                </div>
                            </td>
                            <td><button class="btn btn-primary btn-sm" id="editDescription"><span class="fa fa-pencil" aria-hidden="true"></span></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@section('javascript')
<script>
function edtitTitle(){
    $("#title").prop("disabled", false);
    $("#title").prop("readonly", false);
    $("#title").removeClass("form-control-plaintext");
    $("#title").addClass("form-control");
    $("#title").focus();
    var val = $('#title').val();
    $('#title').val('');
    $('#title').val(val)
}

 $(document).ready(function() {
     $("#title").bind('blur keyup',function(e) {
          if (e.type === 'blur' || e.keyCode === 13){
            $("#title").prop("disabled", true);
            $("#title").prop("readonly", true);
            $("#title").removeClass("form-control");
            $("#title").addClass("form-control-plaintext");
          }
     });
  });

  $("#editTitle").click(function(){
    edtitTitle();
});

$("#editDescription").click(function(){
    edtitDescription();
});

function edtitDescription(){
    var description = "<?php echo $video->description; ?>";
    $("#description").prop("hidden", false);
    $('#description').val(description);
    document.getElementById('descDiv').innerHTML ="";
}

$(document).ready(function() {
     $("#description").bind('blur keyup',function(e) {
          if (e.type === 'blur' || e.keyCode === 13){
            $("#description").prop("hidden", true);
            document.getElementById('descDiv').innerHTML = $('#description').val();
          }
     });
  });


</script>
@stop
