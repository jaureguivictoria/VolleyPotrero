<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('layout.head')
    </head>
    <body>
        @include('layout.navbar')
        @yield('content')
        @include('layout.footer')
    </body>
</html>
