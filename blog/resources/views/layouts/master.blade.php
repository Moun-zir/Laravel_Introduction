<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
        <h1>Laravel 101</h1>
        <a href="/contact-us">Contactez-nous</a>
        <title>@yield('title')</title>
        <a href="/articles">Articles</a>
        @yield('content')
    </body>
</html>