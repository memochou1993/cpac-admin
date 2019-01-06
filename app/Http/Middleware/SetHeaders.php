<?php

namespace App\Http\Middleware;

use Closure;

class SetHeaders
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response
            ->header('Access-Control-Allow-Origin', env('ACCESS_CONTROL_ALLOW_ORIGIN'));

        return $response;
    }
}
