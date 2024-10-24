<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->getMethod() == "OPTIONS") {
            return response()->json(['' => '204']);
        }

        return $next($request)
            ->header('Access-Control-Allow-Origin', 'https://camper4four.netlify.app')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Authorization, X-Requested-With');
    }
}
