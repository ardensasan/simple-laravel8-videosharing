@if(session()->has('success'))
    <div class="alert alert-success" role="alert" style="margin-top:20px">
        <strong>Success: </strong> {{session()->get('success')}}
    </div>
@endif
@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <strong>Errors: </strong>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>
@endif
