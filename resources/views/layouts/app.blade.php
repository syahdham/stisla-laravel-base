<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title> @yield('title', '') &mdash; {{ config('app.name') }} </title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @php
            $themes = \App\Models\BusinessSetting::whereIn('type', [
                'base_primary_color',  'event_primary_color', 'box_shadow_primary_color',
                'base_secondary_color',  'event_secondary_color', 'box_shadow_secondary_color',
                'base_success_color',  'event_success_color', 'box_shadow_success_color',
                'base_info_color',  'event_info_color', 'box_shadow_info_color',
                'base_warning_color',  'event_warning_color', 'box_shadow_warning_color',
                'base_danger_color',  'event_danger_color', 'box_shadow_danger_color',
                'base_light_color',  'event_light_color', 'box_shadow_light_color',
                'base_dark_color',  'event_dark_color', 'box_shadow_dark_color',
            ])->get(['type', 'value']);
        @endphp
        <style>
            * {
                /* Colors */
                --primary: {{ $themes->where('type', 'base_primary_color')[0]['value'] ?? '#6777ef' }};
                --secondary: {{ $themes->where('type', 'base_secondary_color')[0]['value'] ?? '#cdd3d8' }};
                --success: {{ $themes->where('type', 'base_success_color')[0]['value'] ?? '#47c363' }};
                --info: {{ $themes->where('type', 'base_info_color')[0]['value'] ?? '#3abaf4' }};
                --warning: {{ $themes->where('type', 'base_warning_color')[0]['value'] ?? '#ffa426' }};
                --danger: {{ $themes->where('type', 'base_danger_color')[0]['value'] ?? '#fc544b' }};
                --light: {{ $themes->where('type', 'base_light_color')[0]['value'] ?? '#e3eaef' }};
                --dark: {{ $themes->where('type', 'base_dark_color')[0]['value'] ?? '#191d21' }};

                /* Event */
                --primary-event: {{ $themes->where('type', 'event_primary_color')[0]['value'] ??  '#394eea' }};
                --secondary-event: {{ $themes->where('type', 'event_secondary_color')[0]['value'] ??  '#bfc6cd' }};
                --success-event: {{ $themes->where('type', 'event_success_color')[0]['value'] ??  '#3bb557' }};
                --info-event: {{ $themes->where('type', 'event_info_color')[0]['value'] ??  '#0da8ee' }};
                --warning-event: {{ $themes->where('type', 'event_warning_color')[0]['value'] ??  '#ff990d' }};
                --danger-event: {{ $themes->where('type', 'event_danger_color')[0]['value'] ??  '#fb160a' }};
                --light-event: {{ $themes->where('type', 'event_light_color')[0]['value'] ??  '#c3d2dc' }};
                --dark-event: {{ $themes->where('type', 'event_dark_color')[0]['value'] ??  '#000000' }};

                /* Box Shadow */
                --primary-box-shadow: {{ $themes->where('type', 'box_shadow_primary_color')[0]['value'] ?? '#acb5f6' }};
                --secondary-box-shadow: {{ $themes->where('type', 'box_shadow_secondary_color')[0]['value'] ?? '#e1e5e8' }};
                --success-box-shadow: {{ $themes->where('type', 'box_shadow_success_color')[0]['value'] ?? '#81d694' }};
                --info-box-shadow: {{ $themes->where('type', 'box_shadow_info_color')[0]['value'] ?? '#82d3f8' }};
                --warning-box-shadow: {{ $themes->where('type', 'box_shadow_warning_color')[0]['value'] ?? '#ffc473' }};
                --danger-box-shadow: {{ $themes->where('type', 'box_shadow_danger_color')[0]['value'] ?? '#fd9b96' }};
                --light-box-shadow: {{ $themes->where('type', 'box_shadow_light_color')[0]['value'] ?? '#e6ecf1' }};
                --dark-box-shadow: {{ $themes->where('type', 'box_shadow_dark_color')[0]['value'] ?? '#728394' }};
            }
        </style>
        <!-- General CSS Files -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/fontawesome.min.css') }}">

        @stack('styles')

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">

    </head>

    <body style="overflow: scroll">
        <div id="app">
            <div class="main-wrapper">
                <div class="navbar-bg"></div>
                <nav class="navbar navbar-expand-lg main-navbar">
                    @include('includes.topnav')
                </nav>
                <div class="main-sidebar sidebar-style-2">
                    @include('includes.sidenav')
                </div>

                <!-- Main Content -->
                <div class="main-content">
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

        @stack('scripts')

    </body>
</html>
