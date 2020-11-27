<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Video Stream</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="col-md-7 offset-md-2">
            <div class="input-group">
                <input type="text" id="term" class="form-control">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" id="search" type="button">Search</button>
                </div>
             </div>
        </div>
      @if(Auth::check())
      <ul class="nav navbar-nav ml-auto">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> My Account</a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('user.profile')}}">Profile</a>
                  <a class="dropdown-item" href="{{route('upload.show')}}">Upload</a>
                  <a class="dropdown-item" href="{{route('pages.myvideos')}}">My Videos</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{route('user.logout')}}">Logout</a>
                </div>
            </li>
        </ul>
        @else
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="sign-in"><strong>Sign In</strong></a></li>
            <li class="nav-item"><a class="nav-link" href="sign-up"><strong>Sign Up</strong></a></li>
        </ul>
        @endif
    </div>
</nav>
