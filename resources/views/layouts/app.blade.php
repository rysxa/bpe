<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'bpe') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @if (Auth::check())
            <div class="container-scroller">
                <!-- partial:../../partials/_navbar.html -->
                @include('layouts.navbar')
                <!-- partial -->
                <div class="container-fluid page-body-wrapper">

                    <!-- partial:../../partials/_sidebar.html -->
                    @include('layouts.sidebar')
                    <!-- partial -->
                    <div class="main-panel">
                        <div class="content-wrapper">
                            @yield('content')
                        </div>
                        <!-- content-wrapper ends -->
                        <!-- partial:../../partials/_footer.html -->
                        @include('layouts.footer')
                        <!-- partial -->
                    </div>
                    <!-- main-panel ends -->
                </div>
                <!-- page-body-wrapper ends -->
            </div>
        @else
            @yield('content')
        @endif
    </div>
</body>

</html>
