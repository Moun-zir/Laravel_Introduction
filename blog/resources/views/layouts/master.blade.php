<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Laravel</title>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Barre de navigation -->
    <nav class="bg-blue-400 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <div class="text-white font-bold text-xl">
            <a href="https://laravel.com/docs/11.x" class="hover:text-blue-200 font-serif text-base transition">
                Laravel 101
            </a>
        </div>
        <!-- Liens de navigation -->
        <div class="flex items-center space-x-6">
            <a href="/contact-us" class="text-white hover:text-blue-200 text-base font-serif transition">Contactez-nous</a>
            <a href="/articles" class="text-white hover:text-blue-200 text-base font-serif transition">Articles</a>
            @can('create', 'App\Models\Article')
                <a href="/articles/create" class="bg-blue-700 text-white px-3 py-2 rounded-lg hover:bg-blue-800 text-sm font-serif transition">
                    Créer un article
                </a>
            @endcan
            @guest
                <a href="{{ route('register') }}" class="text-white hover:text-blue-200 text-sm font-serif transition">Créer un compte</a>
                <a href="{{ route('login') }}" class="text-white hover:text-blue-200 text-sm font-serif transition">Login</a>
            @endguest
            @auth
                <a href="{{ route('profile') }}" class="bg-blue-700 text-white px-3 py-2 rounded-lg hover:bg-blue-800 text-sm font-serif transition">
                    Votre profil
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline-flex items-center">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded-lg hover:bg-blue-800 text-sm font-serif transition">
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">@yield('title')</h1>
        <div>
            @yield('article')
            @yield('content')
            @include('messages.allMessages')
        </div>
    </div>
</body>
</html>
