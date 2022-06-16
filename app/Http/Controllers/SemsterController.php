<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SemsterController extends Controller
{
    public function index()
    {
       return view('admin.semester');
    }

    public function store(Request $request)
    {


        $s  = Semester::create([

            'date_in' =>Carbon::parse( $request->date_in ),
            'date_to' =>Carbon::parse( $request->date_out),

        ]);

        $s->name = 'S'.$s->id;

        $s->save();

        return back()->with('status' ,'Now Add Weekly Session');


    }
}
