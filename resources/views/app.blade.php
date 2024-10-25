<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content={description} />
        <meta name="keywords" content={keywords} />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" type="image/png" href="{{asset('assets/frontend/img/favicon.png')}}" />

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/all.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/card.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/pagination.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/SearchLayout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/AnnouncementDetail.css')}}">


        <!-- Scripts -->
        @routes
        @viteReactRefresh
        @vite(['resources/js/app.jsx', "resources/js/Pages/{$page['component']}.jsx"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia

        <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </body>
</html>
