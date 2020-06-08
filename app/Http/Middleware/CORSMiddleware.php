<?php

namespace App\Http\Middleware;

use Closure;

class CORSMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Max-Age' => 3600,
            'Access-Control-Allow-Headers' => 'X-Requested-With, Origin, Authorizations, X-Csrftoken, Content-Type, Accept',
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, PATCH, DELETE',
        ];
        return $response->withHeaders($headers);
    }
}
