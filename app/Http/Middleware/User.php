<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'DONATUR') {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->role == 'ADMIN') {
            return redirect('/Admin-Rs');
        } else {
            return redirect('/');
        }
    }
}
