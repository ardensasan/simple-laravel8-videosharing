@extends('main')
@section('stylesheets')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@stop
@section('content')
<br>
<br>
<div class="row">
    <div id="flash-message">
    </div>
    <br>
    <div class="col-md-6 offset-md-3">

            <div class="form-group row">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <label for="name" class="col-sm-2 col-form-label">Name: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control-plaintext" disabled id="name" value="{{$user->name}}">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-primary btn-sm" id="editName"><i class="fa fa-pencil"></i></button>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email: </label>
                <div class="col-sm-8">
                    <input type="email" class="form-control-plaintext" disabled id="email" value="{{$user->email}}">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-primary btn-sm" id="editEmail"><i class="fa fa-pencil"></i></button>
                </div>
            </div>
            <hr>
            <button id="submit" class="btn btn-danger btn-block">Delete Account</button>
    </div>
</div>
@stop
@section('javascript')
<script type="text/javascript">
var done = false;
function editName(){
    $("#name").prop("disabled", false);
    $("#name").prop("readonly", false);
    $("#name").removeClass("form-control-plaintext");
    $("#name").addClass("form-control");
    $("#name").focus();
    let _name = $('#name').val();
    $('#name').val('');
    $('#name').val(_name)
}

function editEmail(){
    $("#email").prop("disabled", false);
    $("#email").prop("readonly", false);
    $("#email").removeClass("form-control-plaintext");
    $("#email").addClass("form-control");
    $("#email").focus();
    let _email = $('#email').val();
    $('#email').val('');
    $('#email').val(_email)
}


$(document).ready(function() {
    $("#name").bind('blur keyup',function(e) {
        if (e.type === 'blur' || e.keyCode === 13){
        $("#name").prop("disabled", true);
        $("#name").prop("readonly", true);
        $("#name").removeClass("form-control");
        $("#name").addClass("form-control-plaintext");
        updateProfile();
        }
    });
});

$(document).ready(function() {
    $("#email").bind('blur keyup',function(e) {
        if (e.type === 'blur' || e.keyCode === 13){
        $("#email").prop("disabled", true);
        $("#email").prop("readonly", true);
        $("#email").removeClass("form-control");
        $("#email").addClass("form-control-plaintext");
        updateProfile();
        }
    });
});

$('#editEmail').click(function(){
    editEmail();
});

$('#editName').click(function(){
    editName();
});

$( "#submit" ).click(function() {
    let _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax(
    {
        url: "/userdelete",
        type:"POST",
        data:{
            _token: _token,
         },
        success:function(){
            window.location.href = "../";
        }
    });
});

function updateProfile(){
    if(!done){
        done = true;
        let _token = $('meta[name="csrf-token"]').attr('content');
        let _name = $('#name').val();
        let _email = $('#email').val();
        $.ajax(
        {
            url: "/update",
            type:"POST",
            data:{
                _token: _token,
                email: _email,
                name: _name,
            },
            success:function(){
                window.location.href = "/profile";
            },
            error:function(){
                window.location.href = "/profile";
            }
        });
    }
}

</script>
@stop

