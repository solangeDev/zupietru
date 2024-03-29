<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('admin/img/icon57.png') }}" sizes="57x57">
    <link rel="apple-touch-icon" href="{{ asset('admin/img/icon72.png') }}" sizes="72x72">
    <link rel="apple-touch-icon" href="{{ asset('admin/img/icon76.png') }}" sizes="76x76">
    <link rel="apple-touch-icon" href="{{ asset('admin/img/icon114.png') }}" sizes="114x114">
    <link rel="apple-touch-icon" href="{{ asset('admin/img/icon120.png') }}" sizes="120x120">
    <link rel="apple-touch-icon" href="{{ asset('admin/img/icon144.png') }}" sizes="144x144">
    <link rel="apple-touch-icon" href="{{ asset('admin/img/icon152.png') }}" sizes="152x152">
    <link rel="apple-touch-icon" href="{{ asset('admin/img/icon180.png') }}" sizes="180x180">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">

    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href="{{ asset('admin/css/plugins.css') }}">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">

    <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->
    @if (!Auth::guest() && Auth::user()->theme)
    <link id="theme-link" rel="stylesheet" href="{{ asset('admin/css/themes/'.Auth::user()->theme) }}">
    @endif

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="{{ asset('admin/css/themes.css') }}">
    <!-- END Stylesheets -->

    <!-- iCheck -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css"> --}}

    @yield('css')
    @yield('css2')

    <!-- Modernizr (browser feature detection library) -->
    <script src="{{ asset('admin/js/vendor/modernizr.min.js') }}"></script>
</head>