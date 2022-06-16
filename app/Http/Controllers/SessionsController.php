<?php

namespace App\Http\Controllers;


use App\Http\Request\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function index()
    {
        return view('session.main' , ['layout' => 'login']);
    }


    public function store(LoginRequest $request)
    {

        if (!auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            throw new \Exception('Wrong email or password.');
        }

        session()->regenerate();


//        return redirect('/u/')->with('status', 'welcome back');

//
        $roles = Auth::user()->roles;
        if ($roles->contains('name', 'admin')) {
            return 'admin';
        } elseif ($roles->contains('name', 'teacher')) {
            return 'teacher';
        }elseif ($roles->contains('name' , 'secretary')){
            return  'secretary';
        }

    }

    public function destroy()
    {
        Auth::logout();
        return redirect(route('team.login'));
    }
}

