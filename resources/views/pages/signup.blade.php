@extends('main')
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <br>
        <br>
        <form action="{{route('user.signup')}}" method="POST">
            @csrf
            <div class="form-group row">
              <label for="name" class="col-sm-3 col-form-label">Name: </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" placeholder="name">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-3 col-form-label">Email: </label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
              </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Password: </label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
            </div>

            <div class="form-group row">
                <label for="password_confirmation" class="col-sm-3 col-form-label">Confirm Password: </label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password">
                  <hr>
                  <button type="submit" class="btn btn-success btn-block">Sign Up</button>
                </div>
            </div>
          </form>
    </div>
</div>
@stop
