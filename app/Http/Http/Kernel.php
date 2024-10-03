<?php

namespace App\Http\Http;

use Symfony\Component\HttpKernel\HttpKernel;

class Kernel extends HttpKernel
{
    protected array $middlewareAliases = [
        'jwt.auth' => \App\Http\Middleware\JwtMiddleware::class,
    ];

}
