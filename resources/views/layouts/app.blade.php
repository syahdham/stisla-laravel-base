<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title> @yield('title', '') &mdash; {{ config('app.name') }} </title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- General CSS Files -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/fontawesome.min.css') }}">

        @stack('styles')

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">

        <!-- Own CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/loading.css')}}">

    </head>

    <body style="overflow: scroll">
        <div id="app">
            <div class="main-wrapper">
                <div class="navbar-bg"></div>
                <nav class="navbar navbar-expand-lg main-navbar">
                    @include('includes.topnav')
                </nav>
                <div class="main-sidebar">
                    @include('includes.sidenav')
                </div>

                <!-- Main Content -->
                <div class="main-content">

                    <div id="loading">
                        <img id="loading-image" src="{{ asset('assets/spinner.gif') }}" alt="Loading..." />
                    </div>

                    @yield('content')
                </div>
                <footer class="main-footer">
                    @include('includes.footer')
                </footer>
            </div>
        </div>

        <!-- General JS Scripts -->
        <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ asset('assets/vendors/bootstrap/dist/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/jquery.nicescroll/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('assets/js/stisla.js') }}"></script>
        <script src="{{ asset('assets/vendors/moment.min.js') }}"></script>

        <!-- Template JS File -->
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>

        <script>
            $(window).load(function() {
                $('#loading').hide();
            });
        </script>

        @stack('scripts')

    </body>
</html>
