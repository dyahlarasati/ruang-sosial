<?php

namespace App\Http\Middleware;

use App\Donasi;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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



        if (Auth::check() && Auth::user()->role == 'ADMIN') {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'DONATUR') {
            return redirect('/');
        }
        else {
            return redirect('/');
        }
    }

    public function donasi()
    {
        return $this->hasMany(Donasi::class);
    }
}
