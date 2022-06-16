<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DarkModeController extends Controller
{
    public function switch()
    {
        if (!auth()->check()){
            abort('403');
        }
        auth()->user()->profile->update(
            ['dark_mode' => !auth()->user()->profile->dark_mode]
        );
//        session([
//            'dark_mode' => session()->has('dark_mode') ? !session()->get('dark_mode') : true
//        ]);

        return back();
    }
}
