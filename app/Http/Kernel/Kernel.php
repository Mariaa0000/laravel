<?php

namespace App\Http;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
    ];

    protected $routeMiddleware = [
        // Otros middlewares...
        'validar.id' => \App\Http\Middleware\ValidarId::class,
    ];
}
