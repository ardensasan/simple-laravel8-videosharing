@extends('main')
@section('stylesheets')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@stop
@section('content')
<div id="flash-message">
</div>
<br>
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
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <table class="table table-sm" style="table-layout:fixed;">
                <thead>
                    <th width="150"></th>
                    <th width ="650"></th>
                    <th></th>
                </thead>
                <tbody>
                    <tr>
                        <th>URL: </th>
                        <td colspan="2"><input type="text" readonly class="form-control" id="staticEmail" value="{{URL('/watch'.'/'.$video->url)}}"></td>
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
                                <p style="white-space: pre-line">{{$video->description}}</p>
                            </div>
                        </td>
                        <td><button class="btn btn-primary btn-sm" id="editDescription"><span class="fa fa-pencil" aria-hidden="true"></span></button></td>
                    </tr>
                </tbody>
            </table>
            <div class="col-md-4 offset-md-4">
                <button class="btn btn-danger btn-block" id="delete">Delete Video</button>
            </div>
        </div>
    </div>
</div>
@stop
@section('javascript')
<script type="text/javascript">
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
            update();
          }
     });
  });

  $("#editTitle").click(function(){
    edtitTitle();
});

$("#editDescription").click(function(){
    editDescription();
});

$("#delete").click(function(){
    if(confirm("Delete this video?")){
        let _id = "<?php echo $video->id; ?>";
        window.location.href = '../delete/'+_id;
    }
});


function editDescription(){
    let _description = $('#description').val();
    $("#description").prop("hidden", false);
    $('#description').val('');
    $('#description').val(_description);
    $("#description").focus();
    document.getElementById('descDiv').innerHTML ="";
}

$(document).ready(function() {
     $("#description").bind('blur keyup',function(e) {
          if (e.type === 'blur' || (e.keyCode === 13 && !e.shiftKey)){
            $("#description").prop("hidden", true);
            document.getElementById('descDiv').innerHTML = '<p style="white-space: pre-line">' + $('#description').val();+'</p>';
            update();
          }
     });
  });


function update(){
    let _token = $('meta[name="csrf-token"]').attr('content');
    let _description = $('#description').val();
    let _title = $('#title').val();
    let _id = {!! json_encode($video->id) !!};
    $.ajax(
    {
        url: "/details",
        type:"POST",
        data:{
            _token: _token,
            _title: _title,
            _description: _description,
            _id: _id
         },
        success:function(response){
            document.getElementById('flash-message').innerHTML = "";
            document.getElementById('flash-message').innerHTML = '<div class="alert alert-success" role="alert" style="margin-top:20px"><strong>Success: </strong> Successfully updated video details</div>';
        },
        error:function(response){
            let errors = $.parseJSON(response.responseText);
            alert(errors.message);
            location.reload();
        }
    });
}


</script>

<style type="text/css">
    table {
      border:none;
    }

    .table td, .table th {
        padding: none;
        vertical-align: center;
        border-top: none;
    }

    .table thead th {
    vertical-align: bottom;
    border-bottom: none;
    }
    </style>
@stop
