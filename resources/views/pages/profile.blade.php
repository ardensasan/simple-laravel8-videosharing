@extends('main')
@section('stylesheets')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@stop
@section('content')
<br>
<br>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <form action="{{route('user.delete')}}" method="POST">
            <div class="form-group row">
                @csrf
                <label for="name" class="col-sm-2 col-form-label">Name: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" value="{{$user->name}}">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-primary btn-sm" id="editName"><i class="fa fa-pencil"></i></button>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email: </label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" value="{{$user->email}}">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-primary btn-sm" id="editEmail"><i class="fa fa-pencil"></i></button>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-danger btn-block">Delete Account</button>
        </form>
    </div>
</div>
@stop
@section('javascript')
<script type="text/javascript">
$('#editEmail').click(function(){
    alert('editemail');
});

$('#editName').click(function(){

});

</script>
@stop

