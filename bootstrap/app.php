<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\CheckLoginMiddleware;
use App\Http\Middleware\AdminMiddleware;;

//Media
use Spatie\MediaLibrary\MediaLibraryServiceProvider;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php', 
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withProviders([
        MediaLibraryServiceProvider::class,
    ])
    ->withMiddleware(function (Middleware $middleware){
        $middleware->alias([
            'user.status' => UserMiddleware::class,
            'user.check-login' => CheckLoginMiddleware::class,
            'admin.check-login' => AdminMiddleware::class,
        ]);
    })->create();
