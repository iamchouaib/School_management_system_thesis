<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LoggedIn
{
    public function handle($request, Closure $next)
    {
        if (!is_null(request()->user())) {
            $roles = Auth::user()->roles;
            if ($roles->contains('name', 'admin')) {
                return redirect('u/admin');
            } elseif ($roles->contains('name', 'teacher')) {
                return redirect('u/teacher');
            }elseif ($roles->contains('name' , 'secretary')){
                return redirect('/u/secretary');
            }
        } else {
            return $next($request);
        }
    }
}
