<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentsController extends Controller
{
    public function     index()
    {
      return view('pages.dashboard-overview-1');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Parent $parent)
    {
        //
    }

    public function edit(Parent $parent)
    {
        //
    }

    public function update(Request $request, Parent $parent)
    {
        //
    }

    public function destroy(Parent $parent)
    {
        //
    }
}
