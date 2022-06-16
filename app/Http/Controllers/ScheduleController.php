<?php

namespace App\Http\Controllers;

use App\Models\Student;

class ScheduleController extends Controller
{
    public function index()
    {


        $students = Student::where('guardian_id' ,  auth('guardian')->user()->id)
            ->where('status' , true)->get();
       return view('parent.schedule' ,
       [
           'students' => $students,

       ]);
    }
}
