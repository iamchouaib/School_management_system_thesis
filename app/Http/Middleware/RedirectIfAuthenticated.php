<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {

            if (Auth::guard($guard)->check()) {
                if ($guard == 'guardian') {
                    return redirect('/');
                } else {
                    $roles = Auth::user()->roles;
                    if ($roles->contains('name', 'admin')) {
                        return redirect('u/admin');
                    } elseif ($roles->contains('name', 'teacher')) {
                        return redirect('u/teacher');
                    } elseif ($roles->contains('name', 'secretary')) {
                        return redirect('/u/secretary');
                    }
                }
            }
        }

        return $next($request);
    }
}
