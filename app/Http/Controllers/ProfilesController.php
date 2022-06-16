<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index()
    {
        return view('pages.update-profile' , [
            'profile' => auth()->user()->profile,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Profile $profile)
    {
        //
    }

    public function edit(Profile $profile)
    {
        //
    }

    public function update(Request $request)
    {
        $file = $request->file('image');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);

       $profile = Profile::where('user_id', $request->profile)->first();

        $profile->image = $filename;

        return $profile->save();

    }

    public function destroy(Profile $profile)
    {
        //
    }
}
