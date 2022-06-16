<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Seance;
use App\Models\Session;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Str;

class SeancesController extends Controller
{
    public function index()
    {

        $sessionsId = User::with('sessions')->whereId(auth()->user()->id)->first()
            ->sessions->map->id;

        $sessions = Session::with('groupe')->whereIn('id', $sessionsId)->get();


        return view('teacher.seances', [
            'sessions' => $sessions,
        ]);
    }


    public function show(Seance $seance)
    {
        if ($seance->nb_week > 1) {

            $homeWork = Seance::where('session_id', $seance->session_id)
                ->where('nb_week', '=', $seance->nb_week - 1)
                ->first()->getAttributeValue('home_work');
        }


        if ($seance->seance_date !== now()->toDateString() || $seance->isDone) {
            abort('403');
        }
        $students = Student::where('groupe_id', $seance->session->groupe_id)->get(['id', 'name', 'attendance']);

        return view('teacher.seance.attendance',
            [
                'seance' => $seance,
                'students' => $students,
                'home_work' => $homeWork ?? 'this is the first Session So No Homework',
//                'layout' => 'top-menu',
            ]);


    }


    public function store(Seance $seance)
    {
        $seance->isDone = 1;
        $seance->save();

        return redirect(route('team.teacher.today'))->with('status ', 'Seance done ');

    }

    /**
     * @throws Exception
     */
    public function save_textBook(Request $request, $id)
    {

        if (Str::contains($request->textbook, 'script')) {
            throw new Exception('forbidden');
        }


        $seance = Seance::find($id);

        $seance->update(['home_work' => $request->homework ?? 'no Home work']);

        if ($seance->textbook()->exists()) {
            $seance->textbook()->update(['description' => $request->textbook ?? '']);
        }
        $seance->textbook()->create(['description' => $request->textbook ?? '']);

    }

    /**
     *
     */
    public function show_old_seance($id)
    {



        $seance = Seance::withCount('students')->where('id' , $id)->first();


        if( ! Carbon::parse($seance->seance_date)->isPast() ){
             return back()->with('status' , 'Not Yet , Come Back Later ! ');
        }

        return view('teacher.show-old-seance',
            [
                'session' => $seance,
                'text_book' => $seance->textbook?->description,
                'students' => $seance->students,
            ]);

    }
}
