<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Array_;

class TeamController extends Controller
{

    public function index()
    {
        $users = User::search(request('search'))->query( function ($query) {
            $query->with('roles' , 'profile' , 'modules');
        })->orderBy('name')->paginate(request('perPage') ?? 5);


        return view('admin.Users.home', [
            'users' => $users,
            'roles' => Role::all('id' , 'name')
        ]);

    }

    public function create()
    {
        return view('admin.Users.add', [

        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'role' => 'required',
            'gender' => 'required',
            'active' => 'required',
        ]);

        $pass = Str::random(8);
        $attributes['password'] = $pass;

        $user = User::create($attributes);
        $user->roles()->attach($attributes['role']);


        $user->profile()->save(new Profile);

//   Profile::create(['user_id' => $user->id]);

        return ['password' => $pass];

//send password to email  ==== to Do
    }

    public function edit(User $user)
    {
        return view('admin.Users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {


        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'role' => 'required',
            'gender' => 'required',
        ]);



        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;

     $oldRoles = [];
        foreach ($user->roles as $role){
            $oldRoles [] = $role->id;
        }
        $newRoles = $request->role;

     $user->roles()->detach(array_diff($oldRoles , $newRoles));

        foreach ($newRoles as $newRole) {
            $user->roles()->updateOrCreate(['id' => $newRole]);

     }

        $user->save();
        return redirect(route('team.admin.users'))->with('status', 'update success');

    }


    public function destroy()
    {
        User::find(request('id'))->delete();
        return redirect(route('team.admin.users'))->with('status', 'deleted success');
    }
}

