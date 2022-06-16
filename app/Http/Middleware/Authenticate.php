<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class Authenticate
{

    public function handle($request, Closure $next , $guard = 'web')
    {
        if (!is_null(Auth::guard($guard)->user())) {
            return $next($request);
        } else {
            return redirect('login');
        }
    }
}
