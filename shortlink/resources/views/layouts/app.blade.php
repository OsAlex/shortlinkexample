<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Styles -->
    @stack('headcontent')
    <link href="{{ mix('css/external.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @stack('style')
</head>
<body class="flat-green">
    <div id="app" class="app-container">
        <div class="row content-container">
            <div class="col-sm-3">
                @if (Auth::user())
                    @include('layouts.sidebar')
                @endif
            </div>
            <!-- Main Content -->
            <div class="col-sm-9 container">
                <div class="side-body" style="padding-top: 10px;">
                    @yield('page_header')
                    <div class="container">
                        @include('layouts.flash-message')
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('extscripts')

</body>
</html>
