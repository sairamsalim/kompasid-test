<!DOCTYPE html>
<!--
Template Name: NobleUI - Laravel Admin Dashboard Template
Author: NobleUI
Purchase: https://1.envato.market/nobleui_laravel
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ahlee University</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/favicon/apple-touch-icon.png') }}" async>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/favicon/favicon-32x32.png') }}" async>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/favicon/favicon-16x16.png') }}" async>
    <link rel="manifest" href="{{ asset('public/favicon/site.webmanifest') }}" async>
    <link rel="mask-icon" href="{{ asset('public/favicon/safari-pinned-tab.svg') }}" color="#5bbad5" async>

    <!-- plugin css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('public/assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />

    <!-- end plugin css -->

    @stack('plugin-styles')

    <!-- common css -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet" />
    <!-- end common css -->
    <style>
        @media (max-width: 991px){
            .main-wrapper .page-wrapper {
                margin-left: 0;
                width: 100%;
            }
            .sidebar {
                z-index: 999;
                margin-left: -350px;
                visibility: hidden;
            }
            .sidebar .sidebar-body {
                max-height:100%;
            }
            .sidebar-open .sidebar {
                width:320px;
            }
        }
        @media (min-width: 991px){
            .main-wrapper .page-wrapper {
                width:calc(100% - 350px);
                margin-left:350px;
                background-color:#1566BE;
            }
            .sidebar {
                width:350px;
            }
            .sidebar .sidebar-body {
                max-height:100%;
            }
        }
    </style>
    @stack('style')
</head>

<body data-base-url="{{url('/')}}">

    <script src="{{ asset('public/assets/js/spinner.js') }}"></script>

    <div class="main-wrapper" id="app">
        @include('layouts.sidebar')
        <div class="page-wrapper text-white">
            @include('layouts.header')
            <div class="row d-none d-md-block">
                <div class="col-md-6">
                    <img class="d-inline" src="{{ asset('public/images/document.png') }}" style="max-width:120px; margin-right:30px;">
                    <h2 class="d-inline">{{ $title }}</h2>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <img src="{{ asset('public/images/ahlee.png') }}" style="max-width:200px; max-height:110px;">
                </div>
            </div>
            <div class="row d-block d-sm-none" style="margin-top:60px;">
                <div class="col-md-12">
                    <img class="mx-auto text-center" src="{{ asset('public/images/ahlee.png') }}" style="max-width:200px; max-height:110px;">
                </div>
            </div>
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- base js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('public/assets/js/template.js') }}"></script>
    <!-- end common js -->
    <script>
        $('#logoutButton').on('click', function() {
            $('#logout').submit();
        });
    </script>
    @stack('custom-scripts')
</body>

</html>
