<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index']);
Route::get('/contact-us', [PagesController::class, 'contact']);
Route::get('/about-us', [PagesController::class, 'about']);
Route::get('/articles', [ArticlesController::class, 'index']);
Route::get('/show-article/{id}', [ArticlesController::class, 'show']);

Route::get('/articles/create', [ArticlesController::class, 'create'])->middleware("admin");
Route::post('/articles/create', [ArticlesController::class, 'store'])->middleware("admin");

Route::get('/article/{article}/edit', [ArticlesController::class, 'edit'])->middleware('auth');
Route::patch('/article/{article}/edit', [ArticlesController::class, 'update'])->middleware('auth');
Route::delete('article/{article}/delete', [ArticlesController::class, 'delete'])->middleware('auth');

// Auth
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::get('/login', [SessionsController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [SessionsController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [SessionsController::class, 'logout'])->name('logout')->middleware('auth');

// profile
Route::get('/profile', [UserController::class, 'index'])->name('profile')->middleware('auth');
