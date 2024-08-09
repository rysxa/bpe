<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'bpe') }}</title>
    @stack('styles')
    <link href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/ti-icons/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/vendor.bundle.base.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.2/datatables.min.css" rel="stylesheet">

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
    <script src="{{ asset('vendor/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.cookie.js') }}"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-2.1.2/datatables.min.js"></script>
    @stack('scripts')
    
</body>

</html>
