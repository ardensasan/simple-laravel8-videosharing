<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partials._header')
    <title>Document</title>
</head>
<body>
    @include('partials._nav')
    <div class="container">
        @include('partials._messages')
        @yield('content')
    </div>

@include('partials._javascript')
</body>
</html>



