<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Module;
use App\Models\Role;
use App\Models\Sale;
use App\Models\Section;
use App\Models\Session;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class GroupesController extends Controller
{
    public function index(Groupe $groupe)
    {

        return view('admin.management.session.home', [
            'group' => $groupe,
            'modules' => Module::where('section_id', '=', $groupe->section_id)->get(),
            'teachers' => Module::find(request('module') ?? 1)->users,
            'sales' => Sale::all(),
        ]);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Groupe $groupe)
    {
        //
    }

    public function edit(Groupe $groupe)
    {

    }

    public function update(Request $request, Groupe $groupe)
    {
        $result = [];


        //verification
        if (Session::where([
            'groupe_id' => $groupe->id,
            'duration' => Carbon::parse($request->duration)->toTimeString() ,
            'day' => $request->day,
        ])->exists()) {


            throw new \Exception('This Session is Invalid cause There is another session');
        }

        //create session
        $sessionId = Session::insertGetId(array_merge($request->except('_token' , 'duration'), [
            'semester_id' => 1,
            'groupe_id' => $groupe->id,
            'duration' => Carbon::parse($request->duration)->toTimeString(),
            'created_at' => now(),

        ]));

//find semester
        $session = Session::find($sessionId);

        $s = $session->semester;

        //creation seances auto
        $date2 = \Carbon\Carbon::make($s->date_to);
        $date1 = \Carbon\Carbon::make($s->date_in);

        $dateDay = $date1->dayOfWeek;
        $dateDay2 = $session->day;
        $first_seance_date = $date1;

        if ($dateDay2 > $dateDay) {
            $first_seance_date = $date1->addDays($dateDay2 - $dateDay);
        } else if ($dateDay2 < $dateDay) {
            $first_seance_date = $date1->addDays(6 - $dateDay + 1 + $dateDay2);

        }

        $nbrOfWeeks = $date2->diffInWeeks($date1);
        for ($i = 0; $i < $nbrOfWeeks; $i++) {
            $seance = $session->seances()->create([
                'nb_week' => $i + 1,
                'seance_date' => $first_seance_date->addWeek(),
            ]);

        }

        //creation notes of students empty

        $session->students()->attach($groupe->students);

        $seance = $session->seances()->first();

        //return
//        $start = \Carbon\Carbon::parse($seance->seance_date)->addHours(\Carbon\Carbon::parse($session->duration)->diffInHours('00:00:00'));
//        return [
//                'id' =>$session->id,
//                'title' => 'last added ' ,
//                'start' => $start->toDateTimeString() ,
//                'end' => $start->addHours(2)->toDateTimeString(),
//                'color' => '#04AA6D',
//            ];

        $colors = ['#264653', '#2a9d8f', '#e9c46a', '#f4a261', '#e76f51'];
        $i = 0;
        foreach ($session->seances as $seance) {
            $start = \Carbon\Carbon::parse($seance->seance_date)->addHours(\Carbon\Carbon::parse($session->duration)->diffInHours('00:00:00'));
            $result [] = [
                'id' =>$seance->id,
                'title' => \request('teacher') ? $session->module->name . ' - (' . $session->groupe->name . ' - ' . $session->session_type . ') '
                    : $session->module->name . ' - (' . $session->groupe->name . ' - ' . $session->session_type . ') ' . $session->user->name
                ,
                'start' => $start->toDateTimeString(),
                'end' => $start->addHours(2)->toDateTimeString(),
                'color' => $colors[$i],
            ];
        }

        return $result;

    }

    public function destroy(Groupe $groupe)
    {
        //
    }


    public function groupesBySection($id)
    {
       $groupes = Groupe::withCount('students' , 'modules')->whereRelation('section' ,'id' , $id)->get();

        return response()->json($groupes);
    }

    public function groupesByModule($id)
    {
        $groupes = Module::find($id)->groupes  ;

        return response()->json($groupes);
    }



    private function week_between_two_dates(mixed $date1, mixed $date2)
    {

        $first = DateTime::createFromFormat('m/d/Y', $date1);
        $second = DateTime::createFromFormat('m/d/Y', $date2);
        if ($date1 > $date2) return $this->week_between_two_dates($date2, $date1);
        return floor($first->diff($second)->days / 7);


    }

}
