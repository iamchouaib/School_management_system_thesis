<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function index($id)
    {

        $sections = Section::withCount('groups')->whereRelation('grade' , 'id' , $id)->get();

        return response()->json($sections);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Section $section)
    {
        //
    }

    public function edit(Section $section)
    {
        //
    }

    public function update(Request $request, Section $section)
    {
        //
    }

    public function destroy(Section $section)
    {
        //
    }
}
