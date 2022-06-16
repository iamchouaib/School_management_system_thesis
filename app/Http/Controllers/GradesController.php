<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Groupe;
use App\Models\Section;
use App\Models\Student;

class GradesController extends Controller
{
    public function index()
    {
        return view('admin.management.show', [
                  'grades' => Grade::get(['id' , 'name' , 'description']),
        ]);
    }

    public function show(Grade $grade)
    {
//        $groups = Groupe::where('section_id', '=' , request('section') ?? 1)
//            ->withCount('students')->paginate(5);


    }
}
