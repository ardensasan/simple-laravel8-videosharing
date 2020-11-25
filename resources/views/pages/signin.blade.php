@extends('main')
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-1">
        <br>
        <br>
        <form action="{{route('user.signin')}}" method="POST">
            @csrf
            <div class="form-group row">
              <label for="email" class="col-sm-3 col-form-label">Email: </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="email" name="email" maxlength="100" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-sm-3 col-form-label">Password: </label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="password" name="password" maxlength="100" required>
                <hr>
                <button type="submit" class="btn btn-success btn-block">Sign In</button>
              </div>
            </div>
          </form>
    </div>
</div>
@stop
