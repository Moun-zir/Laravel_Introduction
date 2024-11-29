<?php

use App\Http\Middleware\Admin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Enregistrement du middleware avec un alias 'admin'
        $middleware->alias([
            'admin' => Admin::class, // Utilisez un tableau pour enregistrer l'alias
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
