<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class UserAuthenticatedMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        foreach ($roles as $role){
            if ($request->user()->roles->contains('name', $role)) {
                return $next($request);
            }
        }


        abort('403');
    }
}
