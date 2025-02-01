<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->role !== 'ADMIN' && Auth::user()->role !== 'CUSTOMER')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
