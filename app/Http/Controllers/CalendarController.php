<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Role;
use App\Models\User;

class CalendarController extends Controller
{
    public function index()
    {
        return view('admin.calendar'  , [
            'teachers' => User::whereRelation('roles' , 'id' , '=' , '2')->get(),
            'roles' =>Role::all(),
            'groupes' =>Groupe::all(),
        ]);
    }
}
