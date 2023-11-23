<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use GrahamCampbell\Throttle\Facades\Throttle;
use App;

class CustomMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $throttler = Throttle::get($request, 5, 1);
        Throttle::attempt($request);
        if (!$throttler->check()) {
            App::abort(429, 'Too many requests');
        }
        return $next($request);
    }
}
