<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Request\LoginRequest;
use App\Models\Guardian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        return view('login.main', [
            'layout' => 'login'
        ]);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'email' => ['email' , 'required' , 'exists:guardians'],
            'password' => 'required',
        ]);

        if (!\Auth::guard('guardian')->attempt($data)) {
            throw new \Exception('Wrong email or password.');
        }


        return $user = User::where('email' , $request->email)->get();
    }

    public function show()
    {
        return view('parent.signup' ,

        ['layout' => 'login']

    );
    }

    public function logout()
    {
        Auth::guard('guardian')->logout();
        return redirect('login');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
           'name' => 'required' ,
           'email' => 'email|unique:guardians',
           'password' => 'required',
            'file' => 'required image',
        ]);

        Guardian::create($data);

        return back()->with('status' , 'Waiting response from Admin');

    }
}
