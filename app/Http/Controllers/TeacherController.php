<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Groupe;
use App\Models\Module;
use App\Models\Seance;
use App\Models\Session;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {


        return view('teacher.home', data: [
            'modules' => auth()->user()->modules,
//        'sessions' => Session::with('semester')->withCount('seances')
//                ->where([
//                    'user_id' => auth()->user()->id,
//                    'module_id' => request('module_id')
//                ])->get()
        ]);
    }

    public function today()
    {
        return view('teacher.today');
    }


      /*    schedule  */

    public function schedule(){

        return view('teacher.schedule' , [
            //
        ]);
    }

    public function getSchedule()
    {
        $result =[];

        $user = auth()->user();
        $sessions = $user->sessions;


            $colors = ['#264653', '#2a9d8f', '#e9c46a', '#f4a261', '#e76f51'];
            $i = 0;
            foreach ($sessions as $session) {
                foreach ($session->seances as $seance) {
                    $start = \Carbon\Carbon::parse($seance->seance_date)->addHours(\Carbon\Carbon::parse($session->duration)->diffInHours('00:00:00'));
                    $result [] = [
                        'id' => $seance->id,
                        'title' => $session->module->name . ' - (' . $session->groupe->name . ' - ' . $session->session_type . ') ',
                        'start' => $start->toDateTimeString(),
                        'end' => $start->addHours(2)->toDateTimeString(),
                        'color' => $colors[$i],
                    ];
                }
                $i = ($i + 1) % (count($colors));

            }

            foreach ($user->events as $event) {
                $result [] = [
                    'id' => $event->id,
                    'title' => 'event : ' . $event->title,
                    'start' => Carbon::parse($event->start_date)->toDateTimeString(),
                    'end' => Carbon::parse($event->end_date)->toDateTimeString(),
                    'color' => '#1e40af',

                ];
            }

            return $result;


    }





    public function show(Session $session)
    {
        return view('teacher.seances', [
            'seances' => $session->seances()->paginate(5),
        ]);
    }

    public function showSeance()
    {
//        $seances = Session::where('user_id', auth()->user()->id)
//            ->get()->map(function ($session) {
//                return $session->seances;
//            })
//            ->map(function ($seance) {
//                return $seance
//                    ->where('seance_date', '=', now()->toDateString())
//                    ->where('isDone', '=', 1);
//            });


        $sessions = Session::with('seances')->where('user_id', auth()->id())
            ->where('day', '=', now()->dayOfWeek)->get();
        $seances = Seance::with('session.module' ,'session.groupe')->where('seance_date', now()->toDateString())
            ->whereIn('session_id', $sessions->map(function ($session) {
                return $session->id;
            })->toArray())->get();

        //find groupe


        return view('teacher.seance', [
            'seances' => $seances,
        ]);


    }






}
