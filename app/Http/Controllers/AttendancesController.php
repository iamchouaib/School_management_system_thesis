<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Justification;
use App\Models\Seance;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendancesController extends Controller
{
    public function index()
    {

        $justifications = Justification::with('attendance')
            ->where('accepted', 0)
            ->whereNot('justification_path', null)->get();

        $student = [];
        foreach ($justifications as $justification){
            $student[] = Student::with('guardian' , 'groupe')->where('id', $justification->attendance->student_id)->first();

        }

        $justificationsAll = Justification::with('attendance')
            ->where('accepted', 0)
            ->where('justification_path', null)->get();

        $studentAll = [];
        foreach ($justificationsAll as $justification){
            $student[] = Student::with('guardian' , 'groupe')->where('id', $justification->attendance->student_id)->first();

        }


        return view('secretary.absents', [
            'justifications' => $justifications,
            'justificationsAll' => $justificationsAll,
            'student' => $student,
            'studentAll' => $studentAll
        ]);
    }

    public function store(Seance $seance)
    {


        $seance->students()->attach(request('students'));

        /* UPDATE STATE */
        $students = Student::whereIn('id', request('students'));

        $students->get()->map(function ($student) use ($seance) {


            if ($student->attendance) {
                Attendance::with('seance')
                    ->where('seance_id', $seance->id)
                    ->where('student_id', $student->id)
                    ->get()
                    ->map(function ($att) {
                        $att->justification()->create([
                            'created_at' => now(),
                        ]);
                    });

            }
        });


        $students->update(['attendance' => 0]);


    }

    public function accept($id)
    {
       $jus =  Justification::where('id' , $id)->first();
           $jus->accepted = 1 ;
       $jus->save();

       $s = Student::where( 'id' , request('student_id'))->first();

           $s->attendance = 1;
           $s->save();

       return back()->with('status' , 'accepted in success');

    }
    public function decline( $id)
    {

        $jus =  Justification::find($id);
        $jus->justification_path = null ;
        $jus->save();

        return back()->with('status' , 'declined in success');

        //send notification

        //end

    }

    /* parent justification */

    public function justification(Request $request , $id)
    {

        $request->validate([
            'file' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf,docx|max:1024' ,
        ]);

        $justification = Justification::findOrFail($id);


        $path = $request->file('file')->store('public/justifications' );
        $justification->justification_path = $path;
        $justification->remarks = $request->remarks;
        $justification->save();

        return back()->with('status'  , 'waiting to approved');


    }



}
