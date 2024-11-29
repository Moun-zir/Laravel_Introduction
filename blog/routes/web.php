<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Page d'accueil
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Routes protégées par middleware d'authentification
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Articles
    Route::get('/articles', function () {
        return Inertia::render('Articles/Index'); // Correspond à une vue Vue.js dans js/Pages/Articles/Index.vue
    })->name('articles');

    Route::get('/articles/create', function () {
        return Inertia::render('Articles/Create'); // Correspond à js/Pages/Articles/Create.vue
    })->name('articles.create');

    Route::get('/articles/{id}', function ($id) {
        return Inertia::render('Articles/Show', ['id' => $id]); // Correspond à js/Pages/Articles/Show.vue
    })->name('articles.show');
});
