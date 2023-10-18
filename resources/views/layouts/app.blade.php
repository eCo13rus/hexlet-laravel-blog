<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hexlet Blog - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container mt-4">
        <a href="{{ route('home') }}">Главная</a>
        <a href="{{ route('articles.index') }}">Статьи</a>
        <a href="{{ route('about') }}">О нас</a>
        <a href="{{ route ('articles.create') }}">Создать статью</a>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <h1>@yield('header')</h1>
        <div>
            @yield('content')
        </div>
    </div>
</body>

</html>