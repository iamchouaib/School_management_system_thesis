<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Guardian;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        $result = [];

        $colors = ['#264653', '#2a9d8f', '#e9c46a', '#f4a261', '#e76f51'];
        $i = 0;

        foreach (Event::withCount('users', 'guardians')->get() as $event) {

            $result [] = [
                'id' => $event->id,
                'title' => $event->title . ' - to -' . $event->users_count . ' - team - and Guardians : ' . $event->guardians_count,
                'start' => Carbon::parse($event->start_date)->toDateTimeString(),
                'end' => Carbon::parse($event->end_date)->toDateTimeString(),
                'color' => $colors[$i]
            ];
            $i = ($i+1)%5;
        }


        return $result;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
      $att = $request->validate([
          'title' => 'required' ,
          'roles' => 'required' ,
      ]);

     $event = Event::find( Event::insertGetId($request->except('roles' , 'groupes')));

      if (in_array('you' , $request->roles)){

          $event->users()->attach(auth()->user()->id);

      }

      if (in_array('guardian' , $request->roles)){

          if ($request->groupes !== null){
              $guardians = Student::whereIn('groupe_id' ,[1,2,4])->get()->map->guardian_id;
              $event->guardians()->attach($guardians);
          }else{
              $event->guardians()->attach(Guardian::all());
          }

      }



      if (in_array(2 , $request->roles)){
          $teachers = User::whereRelation('roles' , 'name' , 'teacher')->get();
          $event->users()->attach($teachers);
      }

        if (in_array(3 , $request->roles)){
            $secretaries = User::whereRelation('roles' , 'name' , 'secretary')->get();
            $event->users()->attach($secretaries);
        }



    return $result [] = [
        'id' =>$event->id,
        'title' => $event->title,
        'start' => Carbon::parse($event->start_date)->toDateTimeString(),
        'end' => Carbon::parse($event->end_date)->toDateTimeString(),
        'color' => '#1e40af',
    ];


    }

    public function show(Event $event)
    {
        //
    }

    public function edit(Event $event)
    {
        //
    }

    public function update(Request $request, Event $event)
    {
        //
    }

    public function destroy(Event $event)
    {
        $event->delete();
    }
}
