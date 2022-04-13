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



    <!-- Styles -->
    <link href="{{ asset('frontend/css/boostrap5.css') }}" rel="stylesheet">
</head>
<body>
    <div class="body-wrapper">
        @include('layouts.inc.sidebar')
        <!-- partial -->
        <div class="main-wrapper mdc-drawer-app-content">
          <!-- partial:partials/_navbar.html -->
            @include('layouts.inc.adminnav')
            <div class="page-wrapper mdc-toolbar-fixed-adjust">
                @yield('content')
                @include('layouts.inc.adminfooter')
            </div>
        </div>
    </div>
     <!-- Scripts -->
     {{-- <script src="{{ asset('admin/js/core/bootstrap.bundle.min.js') }}" defer></script> --}}

</body>
</html>
