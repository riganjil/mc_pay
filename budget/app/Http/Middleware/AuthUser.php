<?php

namespace App\Http\Middleware;

//use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Closure;

class AuthUser
{
    public function handle($request, Closure $next)
    {
        if (empty(session('user'))) {
            return redirect('/login');
        }

        return $next($request);
    }
}
