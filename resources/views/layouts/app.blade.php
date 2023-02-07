<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/detail-page.css')}}" />
</head>
<body>
    <!-- The video -->
        <div class="fullscreen-bg">
            <video
                loop
                muted
                autoplay
                poster="{{asset('assets/images/main-frame.jpg')}}"
                class="fullscreen-bg__video"
            >
                <source src="{{asset('assets/vbg.webm')}}" type="video/webm" />
                <!-- <source src="assets/vbg.mp4" type="video/mp4" /> -->
                <!-- <source src="assets/vbg.ogv" type="video/ogg" /> -->
            </video>
        </div>

        <div id="header" class="container-fluid">
            @include('includes.nav')
        </div>
        <!-- header end -->
        @yield('content')
        

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    @yield('script')
</body>
</html>
