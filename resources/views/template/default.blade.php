<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name', 'Chatty')}}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('template.partial.navigation')

    <div class="container-fluid">
        @yield('content-full')
    </div>
    <div class="container">
        <div class="nav-pass">
                @include('template.partial.alert')
                @yield('content')
        </div>
    </div>
</body>
</html>