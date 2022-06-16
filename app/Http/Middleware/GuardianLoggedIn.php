<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GuardianLoggedIn
{
    public function handle($request, Closure $next)
    {
        if (!is_null(request()->user())) {

            return redirect('/');

        } else {
            return $next($request);
        }
    }
}
