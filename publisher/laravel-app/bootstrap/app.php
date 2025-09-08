<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
//        web: __DIR__.'/../routes/web.php',
//        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
//        apiPrefix: 'api/',
        then: function () {
            /****DEFAULT******/
            Route::middleware('api')->prefix('api')->group(base_path('routes/api.php'));
            /****SITE****/
            Route::middleware('api')->prefix('api/site')->group(base_path('routes/site.php'));
            /****ADMIN****/
            Route::middleware('api')->prefix('api/admin')->group(base_path('routes/admin/jewellery.php'));
            Route::middleware('api')->prefix('api/admin')->group(base_path('routes/admin/insert.php'));
            Route::middleware('api')->prefix('api/admin')->group(base_path('routes/admin/properties.php'));
            Route::middleware('api')->prefix('api/admin')->group(base_path('routes/admin/bracelet_props.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
