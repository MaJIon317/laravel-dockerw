<!DOCTYPE html>
<html lang="ru">
    <head>
        <base href="{{ route('admin.dashboard') }}">
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
        <title>@yield('title')</title>
 
        @vite('resources/css/admin/style.css')
    </head>
    <body class="sb-nav-fixed">
        @sectionMissing('header_hidden')
            <x-admin.header />
        @endif

        @yield('content')

        @sectionMissing('header_hidden')
            @include('admin.partials.footer')
        @endif

        @vite('resources/js/admin/script.js')
    </body>
</html>