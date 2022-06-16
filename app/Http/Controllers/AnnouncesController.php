<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use Illuminate\Http\Request;

class AnnouncesController extends Controller
{
    public function index()
    {
        return view('admin.announce');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        if ($request->title == null){

            throw new \Exception('please inter valid data ');

        }

        $att = $request->validate([
            'title' => 'required',
            'content' =>'required'
        ]);
        $att['user_id'] = auth()->user()->id;

       Announce::create($att);
return redirect()->route('team.admin.index')->with('status' , 'yr ads added');

    }

    public function show(Announce $announce)
    {
        //
    }

    public function edit(Announce $announce)
    {
        //
    }

    public function update(Request $request, Announce $announce)
    {
        //
    }

    public function destroy(Announce $announce)
    {
        //
    }
}
