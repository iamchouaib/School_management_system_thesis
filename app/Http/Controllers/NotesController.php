<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Groupe;
use App\Models\Note;
use App\Models\Session;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\Group;

class NotesController extends Controller
{
    public function index()
    {


        $sessions = Session::with('groupe', 'module')->where('user_id', auth()->user()->id)->get();


        return view('teacher.grade',
            ['session' => $sessions,
                'students' => Session::find(97)->students,
            ]);

    }

    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {


        for ($i = 0; $i < count($request->students); $i++) {

            Note::where('session_id', $id)
                ->where('student_id', $request->students[$i])->update([
                    'evaluation' => $request->evaluations[$i] ?? 0,
                    'note_td' => $request->note_tds[$i] ?? 0,
                    'task' => $request->tasks[$i] ?? 0,
                    'note' => (($request->evaluations[$i] + $request->note_tds[$i]) + ($request->tasks[$i] * 3)) / 5,
                ]);

        }

        return back()->with('status', 'ok');


    }

    public function show($id)
    {

        $student = Student::with('section.modules', 'guardian', 'sessions')->find($id);

        $moy = 0;
        $somePrio = 0;
        foreach ($student->sessions as $subject) {
            $moy += ($subject->note->note * $subject->module->priority);
            $somePrio += $subject->module->priority;
        }

        if ($somePrio != 0 ){
            $moy = $moy / $somePrio;
        }else{
            $moy = 0;
        }



        return view('secretary.report.show',
            ['student' => $student,
            'moy' => $moy]);
    }

    public function edit(Note $note)
    {
        //
    }

    public function update(Request $request, Note $note)
    {
        //
    }

    public function destroy(Note $note)
    {
        //
    }

    public function gradesBySession($id)
    {
        return Session::where('id', $id)->first()->students;
    }

    public function report()
    {
        return view('secretary.report', [
            'grades' => Grade::get(['id', 'name', 'description']),

        ]);


    }


}
