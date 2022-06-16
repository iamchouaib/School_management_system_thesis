<?php

namespace App\Http\Controllers;

use App\Http\Middleware\GuardianLoggedIn;
use App\Models\Announce;
use App\Models\Event;
use App\Models\Guardian;
use App\Models\Sale;
use App\Models\Student;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home',
            [
                'users_count' =>User::count(),
                'users' => User::with('roles', 'profile')
                    ->whereRelation('roles', 'name', 'admin')->paginate(5),
                'students' => Student::count(),
                'sales' => Sale::count(),
                'announces' =>Announce::paginate(3),
                'parents_count' => Guardian::count(),
                'events' => Event::with('users')->paginate(5),
                'parents' => Guardian::where('isActive' , false)->get(),
            ],

        );
    }
}
