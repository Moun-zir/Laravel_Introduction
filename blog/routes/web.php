<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index']);
Route::get('/contact-us', [PagesController::class, 'contact']);
Route::get('/about-us', [PagesController::class, 'about']);
Route::get('/articles', [ArticlesController::class, 'index']);
Route::get('/show-article/{id}', [ArticlesController::class, 'show']);
Route::get('/articles/create', [ArticlesController::class, 'create']);
Route::post('/articles/create', [ArticlesController::class, 'store']);
Route::get('article/{article}/edit', [ArticlesController::class, 'edit']);
Route::patch('/article/{article}/edit', [ArticlesController::class, 'update']);
Route::delete('article/{article}/delete', [ArticlesController::class, 'delete']);
// Route::get('show-article/{article}', [ArticlesController::class, 'show']);
