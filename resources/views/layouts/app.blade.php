<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ config('app.name', 'MiDigitalLife') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap/bootstrap.css') }}">
    <!-- =============== FONTAWESOME STYLES ===============-->
    <link rel="stylesheet" href="{{ asset('css/vendor/fontawesome/css/font-awesome.min.css') }}">
    <!-- =============== 3RD PARTY STYLES ===============-->
    <link rel="stylesheet" href="{{ asset('css/3rdparty/pikaday/pikaday.css') }}">
    <!-- =============== CUSTOM STYLES ===============-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- =============== CSRF Token ===============-->
    <meta name="csrf-token" content="{{ csrf_token() }}">    
</head>
<body>
    <div class="container" id="app">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>{{ config('app.name', 'Laravel') }}</h3>
                @yield('content')
        </div>
    </div>

    <!-- Scripts -->
   
</body>
</html>
