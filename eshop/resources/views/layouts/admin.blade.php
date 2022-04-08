<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


<!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
         <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

        <!-- CSS Files -->
        <link href="../admin/css/nucleo-icons.css" rel="stylesheet">
        <link href="../admin/css/nucleo-svg.css" rel="stylesheet">
  <link id="pagestyle" href="../admin/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('frontend/css/boostrap5.css') }}" rel="stylesheet">
</head>
<body class="g-sidenav-show  bg-gray-200">
    @include('layouts.inc.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.inc.adminnav')
        <div class="content container-fluid py-4">
            @yield('content')
            @include('layouts.inc.adminfooter')
        </div>
    </main>
     <!-- Scripts -->
     <script src="{{ asset('admin/js/core/bootstrap.bundle.min.js') }}" defer></script>
     <script src="{{ asset('admin/js/core/popper.min.js') }}" defer></script>
     <script src="{{ asset('admin/js/core/bootstrap.min.js') }}" defer></script>
     <script src="{{ asset('admin/js/plugins/perfect-scrollbar.min.js') }}" defer></script>
     <script src="{{ asset('admin/js/plugins/smooth-scrollbar.min.js') }}" defer></script>
     <script src="{{ asset('admin/js/plugins/chartjs.min.js') }}" defer></script>
     <script src="{{ asset('admin/js/plugins/material-dashboard.min.js?v=3.0.2') }}" defer></script>
     <script src="https://buttons.github.io/buttons.js" defer></script>
    @yield('script')
</body>
</html>
