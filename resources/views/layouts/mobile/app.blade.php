<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>{{ $title ?? 'Mobile App' }}</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    
    <!-- DNS Prefetch untuk external resources -->
    <link rel="dns-prefetch" href="https://ajax.googleapis.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://unpkg.com">
    <link rel="dns-prefetch" href="https://cdn.amcharts.com">
    
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    @vite([
        'resources/css/app.css',
        'resources/css/mobile/style.css',
        'resources/css/mobile/styleform.css',
        'resources/js/app.js'
    ])

    @stack('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    
    @php
        $general_setting = $general_setting ?? null;
        $scheme = optional($general_setting)->mobile_theme_scheme ?? 'brand';
        $colors = [
            // TailAdmin Primary Brand Color
            'brand' => [
                'bg_body' => '#f2f7ff',
                'bg_nav' => '#ffffff',
                'color_nav' => '#3641f5',
                'color_nav_active' => '#2a31d8',
                'bg_indicator' => '#3641f5',
                'color_nav_hover' => '#465fff',
            ],
            // TailAdmin Success Green
            'green' => [
                'bg_body' => '#ecfdf3',
                'bg_nav' => '#ffffff',
                'color_nav' => '#027a48',
                'color_nav_active' => '#039855',
                'bg_indicator' => '#027a48',
                'color_nav_hover' => '#12b76a',
            ],
            // TailAdmin Blue Light
            'blue' => [
                'bg_body' => '#f0f9ff',
                'bg_nav' => '#ffffff',
                'color_nav' => '#026aa2',
                'color_nav_active' => '#0086c9',
                'bg_indicator' => '#026aa2',
                'color_nav_hover' => '#0ba5ec',
            ],
            // TailAdmin Error Red
            'red' => [
                'bg_body' => '#fef3f2',
                'bg_nav' => '#ffffff',
                'color_nav' => '#b42318',
                'color_nav_active' => '#d92d20',
                'bg_indicator' => '#b42318',
                'color_nav_hover' => '#f04438',
            ],
            // TailAdmin Theme Purple
            'purple' => [
                'bg_body' => '#f5f4ff',
                'bg_nav' => '#ffffff',
                'color_nav' => '#7a5af8',
                'color_nav_active' => '#6c54e6',
                'bg_indicator' => '#7a5af8',
                'color_nav_hover' => '#8e7bff',
            ],
            // TailAdmin Warning Orange
            'orange' => [
                'bg_body' => '#fffaeb',
                'bg_nav' => '#ffffff',
                'color_nav' => '#b54708',
                'color_nav_active' => '#dc6803',
                'bg_indicator' => '#b54708',
                'color_nav_hover' => '#f79009',
            ],
            // Dark mode with brand accent
            'dark' => [
                'bg_body' => '#1a2231',
                'bg_nav' => '#252d3a',
                'color_nav' => '#f9fafb',
                'color_nav_active' => '#465fff',
                'bg_indicator' => '#465fff',
                'color_nav_hover' => '#3641f5',
            ],
        ];
        $c = $colors[$scheme] ?? $colors['green'];
        
        function hexToRgb($hex) {
            $hex = str_replace("#", "", $hex);
            if(strlen($hex) == 3) {
                $r = hexdec(substr($hex,0,1).substr($hex,0,1));
                $g = hexdec(substr($hex,1,1).substr($hex,1,1));
                $b = hexdec(substr($hex,2,1).substr($hex,2,1));
            } else {
                $r = hexdec(substr($hex,0,2));
                $g = hexdec(substr($hex,2,2));
                $b = hexdec(substr($hex,4,2));
            }
            return "$r, $g, $b";
        }
    @endphp
    
    <style>
        :root {
            --bg-body: {{ $c['bg_body'] }};
            --bg-nav: {{ $c['bg_nav'] }};
            --color-nav: {{ $c['color_nav'] }};
            --color-nav-rgb: {{ hexToRgb($c['color_nav']) }};
            --color-nav-active: {{ $c['color_nav_active'] }};
            --color-nav-active-rgb: {{ hexToRgb($c['color_nav_active']) }};
            --bg-indicator: {{ $c['bg_indicator'] }};
            --color-nav-hover: {{ $c['color_nav_hover'] }};
        }
        
        /* Apply background to body if needed, currently set in :root usually consumed by body style */
        body {
            background-color: var(--bg-body);
        }
        
        /* Dynamic Theme Overrides */
        .bg-primary {
            background-color: var(--color-nav) !important;
        }

        .btn-primary {
            background-color: var(--color-nav) !important;
            border-color: var(--color-nav) !important;
        }

        .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
            background-color: var(--color-nav-active) !important;
            border-color: var(--color-nav-active) !important;
        }
        
        .text-primary {
            color: var(--color-nav) !important;
        }

        .historicontent {
            display: flex;
            justify-content: space-between;
            padding: 20px
        }

        .historibordergreen {
            border: 1px solid var(--color-nav) !important;
        }

        .historiborderred {
            border: 1px solid rgb(171, 18, 18);
        }

        /* FAB Button Overrides */
        .fab-button .fab {
            background-color: var(--color-nav) !important;
        }
        
        .fab-button .fab:hover,
        .fab-button .fab:active {
            background-color: var(--color-nav-active) !important;
        }

        .fab-button .dropdown-menu .dropdown-item {
            background-color: var(--color-nav) !important;
        }

        .fab-button .dropdown-menu .dropdown-item:hover,
        .fab-button .dropdown-menu .dropdown-item:active {
            background-color: var(--color-nav-active) !important;
        }

        /* Nav Tabs Overrides */
        .nav-tabs.style1 .nav-item .nav-link.active {
            color: var(--color-nav) !important;
        }
        
        .nav-tabs.style1 .nav-item .nav-link {
            color: var(--color-nav);
            opacity: 0.7;
        }
        
        /* Card Text Override */
        .card-body {
            color: var(--color-nav);
        }

        .historidetail1 {
            display: flex;
        }

        .historidetail2 h4 {
            margin-bottom: 0;
        }



        .datepresence {
            margin-left: 10px;
        }

        .datepresence h4 {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 0;
        }

        .timepresence {
            font-size: 14px;
        }
    </style>
    {{-- <style>
        .selectmaterialize,
        textarea {
            display: block;
            background-color: transparent !important;
            border: 0px !important;
            border-bottom: 1px solid #9e9e9e !important;
            border-radius: 0 !important;
            outline: none !important;
            height: 3rem !important;
            width: 100% !important;
            font-size: 16px !important;
            margin: 0 0 8px 0 !important;
            padding: 0 !important;
            color: #495057;

        }

        textarea {
            height: 80px !important;
            color: #495057 !important;
            padding: 20px !important;
        }
    </style> --}}
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    @yield('header')

    <!-- App Capsule -->
    <div id="appCapsule">
        @yield('content')
    </div>
    <!-- * App Capsule -->


    @include('layouts.mobile.bottomNav')


    @include('layouts.mobile.script')




</body>

</html>
