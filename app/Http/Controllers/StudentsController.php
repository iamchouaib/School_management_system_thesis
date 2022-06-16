<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Guardian;
use App\Models\Justification;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use function PHPUnit\Framework\throwException;

class StudentsController extends Controller
{
    public function index()
    {

        return view('parent.students.home', data: [
            'students' => Student::where('guardian_id', '=', auth('guardian')->id())
                ->get(),
        ]);
    }

    public function create()
    {
        $grades = Grade::with('sections')->get();
        return view('parent.students.create', compact('grades'));
    }


    public function store(Request $request)
    {


        if (Student::where('name' , $request->name)
            ->exists()) {
            throw new \Exception('student already exist');
        }

        $attributes = $request->validate([
            'name' => 'required',
            'section' => 'required',
        ]);


        Student::create([
            'guardian_id' => auth('guardian')->user()->id,
            'name' => $request->name,
            'gender' => $request->gender,
            'birthday' => Carbon::parse($request->birthday),
            'section_id' => $request->section,
            'status' => false,
        ]);

    }

    /* parent attendance */
    public function show(Student $student)
    {




         $justification =  Justification::with('attendance')
        ->whereRelation('attendance' , 'student_id' ,$student->id)
            ->where('accepted' , 0 )->first();


        /* RETURN ALL ABSENTS */

        $absences = Attendance::with('seance.session.module')
            ->where('student_id', $student->id)
            ->get();


        return view('parent.attendance', [
            'absence' => $absences,
            'justification' => $justification,
            'student' => $student,
        ]);
    }

    public function edit(Student $student)
    {
        //
    }

    public function update(Request $request, Student $student)
    {
        //
    }

    public function destroy(Student $student)
    {
        //
    }


    public function approval(Request $request, Student $student)
    {
        //
    }

    public function register()
    {

        return view('secretary.inscription', [
            'students' => Student::with('guardian', 'section')->where('status', false)->get(),
        ]);

    }


    public function getByGroup($id)
    {
        return Student::with('guardian')->where('groupe_id' , $id)->get();
    }

    public function getAll()
    {
        return view('test');
    }

    public function getCert($id)
    {
        $student = Student::find($id);

        return view('secretary.certification' ,
            ['student' => $student]);
    }


    public function profile($id)
    {

        $student = Student::with('guardian' , 'groupe.section.grade')->find($id);
        return view('student.profile' ,

        ['student' => $student]

        );
    }

}
