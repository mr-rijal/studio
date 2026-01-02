<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__.'/../routes/web.php',
            __DIR__.'/../routes/auth.php',
            __DIR__.'/../routes/tenant.php',
            __DIR__.'/../routes/superadmin/web.php',
            __DIR__.'/../routes/superadmin/auth.php',
        ],
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo(function ($request) {
            if ($request->routeIs('s.*')) {
                return route('s.login', absolute: false);
            } else {
                return route('login', absolute: false);
            }
        })->redirectUsersTo(function ($request) {
            if ($request->routeIs('s.*')) {
                return route('s.dashboard', absolute: false);
            } else {
                return route('dashboard', absolute: false);
            }
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
