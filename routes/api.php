<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\GroupesController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\SeancesController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeacherController;
use App\Http\Resources\StudentResource;
use App\Models\Groupe;
use App\Models\Guardian;
use App\Models\Justification;
use App\Models\Sale;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:guardian')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('student/{id}', function ($id) {
    return new \App\Http\Resources\StudentResource(Student::findOrFail($id));
});

Route::get('students', function () {


    if (!is_null(request('filters'))) {

        //        check if field is groupe
        if (\request('filters')[0]['field'] == 'groupe') {
            $results = StudentResource::collection(
                Student::with('groupe')
                    ->whereRelation('groupe', 'name', \request('filters')[0]['type'], \request('filters')[0]['value'])
                    ->orderBy(\request('sorters')[0]['field'] ?? 'name', \request('sorters')[0]['dir'] ?? 'asc')
                    ->paginate(request('size')));
        } else {
            //        check if type is like
            if (\request('filters')[0]['type'] == 'like') {
                $values = '%' . \request('filters')[0]['value'] . '%';
            }


            //do filter
            $results = StudentResource::collection(
                Student::where(\request('filters')[0]['field'], \request('filters')[0]['type'], $values ?? \request('filters')[0]['value'])
                    ->orderBy(\request('sorters')[0]['field'] ?? 'name', \request('sorters')[0]['dir'] ?? 'asc')
                    ->paginate(request('size'))
            );
        }

    } else {
        $results = StudentResource::collection(
            Student::orderBy(\request('sorters')[0]['field'] ?? 'name', \request('sorters')[0]['dir'] ?? 'asc')
                ->paginate(request('size'))
        );
    }

    return response()->json([
        'last_page' => $results->lastPage(),
        'data' => $results,
    ]);
});


/*  Guardians  */
Route::get('guardians', function () {
    if (!is_null(request('filters'))) {

        //        check if field is groupe
        if (\request('filters')[0]['field'] == 'students') {
            $results = \App\Http\Resources\GuardianResource::collection(
                \App\Models\Guardian::withCount('students')
                    ->having('students_count', \request('filters')[0]['type'], \request('filters')[0]['value'])
                    ->orderBy(\request('sorters')[0]['field'] ?? 'name', \request('sorters')[0]['dir'] ?? 'asc')
                    ->paginate(request('size')));
        } else {
            //        check if type is like
            if (\request('filters')[0]['type'] == 'like') {
                $values = '%' . \request('filters')[0]['value'] . '%';
            }


            //do filter
            $results = \App\Http\Resources\GuardianResource::collection(
                \App\Models\Guardian::where(\request('filters')[0]['field'], \request('filters')[0]['type'], $values ?? \request('filters')[0]['value'])
                    ->orderBy(\request('sorters')[0]['field'] ?? 'name', \request('sorters')[0]['dir'] ?? 'asc')
                    ->paginate(request('size'))
            );
        }

    } else {


        $results = \App\Http\Resources\GuardianResource::collection(
            \App\Models\Guardian::withCount('students')->orderBy(\request('sorters')[0]['field'] ?? 'name', \request('sorters')[0]['dir'] ?? 'asc')
                ->paginate(request('size'))
        );


    }


    return response()->json([
        'last_page' => $results->lastPage(),
        'data' => $results,
    ]);

});

//schedule
Route::get('groupe', function () {
    $result = [];

    if (request('groupe_id')) {
        $sessions = \App\Models\Session::where('groupe_id', request('groupe_id'))->get();

    } else {
        if (\request('teacher')) {
            $sessions = \App\Models\Session::where('user_id', request('teacher'))->get();
        } else {
            $sessions = \App\Models\Session::all();
        }

    }

    $colors = ['#264653', '#2a9d8f', '#e9c46a', '#f4a261', '#e76f51'];
    $i = 0;
    foreach ($sessions as $session) {
        foreach ($session->seances as $seance) {
            $start = \Carbon\Carbon::parse($seance->seance_date)->addHours(\Carbon\Carbon::parse($session->duration)->diffInHours('00:00:00'));
            $result [] = [
                'id' => $seance->id,
                'title' => \request('teacher') ? $session->module->name . ' - (' . $session->groupe->name . ' - ' . $session->session_type . ') '
                    : $session->module->name . ' - (' . $session->groupe->name . ' - ' . $session->session_type . ') ' . $session->user->name
                ,
                'start' => $start->toDateTimeString(),
                'end' => $start->addHours(2)->toDateTimeString(),
                'color' => $colors[$i],
            ];
        }
        $i = ($i + 1) % (count($colors));

    }




    return $result;

});


/*schedule events */

Route::get('/events' , [EventsController::class ,'index']);
Route::delete('/event/{event}/delete' , [EventsController::class ,'destroy']);


Route::get('schedule/teacher/{id}', function ($id) {
    $result = [];
    $user = \App\Models\User::find($id);
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
});

//parent
Route::get('schedule/parent/{id}', function ($id) {
    $result = [];


    $student = \App\Models\Student::find($id);
    $sessions = $student->sessions;

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


    $user = $student->guardian;
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
});

//update schedule

Route::patch('schedule', function (Request $request) {
    \App\Models\Seance::find($request->id)->update(['seance_date' => \Carbon\Carbon::parse($request->seance_date)->toDateString()]);
});
Route::get('module/{id}', function ($id) {

    $module = \App\Models\Module::find($id);

    $teachers = $module->users;
    return response()->json($teachers);
})->name('data');


/* sales */

Route::get('type/{id}/sales', function ($id) {

    return \App\Models\TypeOfSale::findOrFail($id)->sales;

});

Route::get('sale/{id}', function ($id) {
    return Sale::findOrFail($id);
});

Route::post('/sale/store', function (Request $req) {

    //verification
    if (Sale::whereName($req->name)->exists()) {

        throw new \Exception('This Resource is already exist');
    }


    \App\Models\Sale::create([
        'name' => $req->name,
        'type_of_sale_id' => $req->type_id,
        'reserved' => 0,
    ]);
});


/* chart */


Route::get('chart/line', function () {
    $result = [];

//    data  label

    $users = User::select('id', 'created_at')
        ->get()
        ->groupBy(function ($date) {
            //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            return Carbon::parse($date->created_at)->format('m'); // grouping by months
        });

    $usermcount = [];
    $userArr = [];


    foreach ($users as $key => $value) {
        $usermcount[(int)$key] = count($value);
    }

    for ($i = 1; $i <= 12; $i++) {
        if (!empty($usermcount[$i])) {
            $userArr[] = $usermcount[$i];
        } else {
            $userArr[] = 0;
        }
    }


    $students = Student::select('id', 'created_at')
        ->get()
        ->groupBy(function ($date) {
            //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            return Carbon::parse($date->created_at)->format('m'); // grouping by months
        });

    $studentscount = [];
    $studentArr = [];

    foreach ($students as $key => $value) {
        $studentscount[(int)$key] = count($value);
    }

    for ($i = 1; $i <= 12; $i++) {
        if (!empty($studentscount[$i])) {
            $studentArr[] = $studentscount[$i];
        } else {
            $studentArr[] = 0;
        }
    }


    $result = [

        'userData' => $userArr,
        'userLabel' => "# of Team User",
        'studentData' => $studentArr,
        'studentLabel' => "# of Students",
    ];


    return $result;


});


/*   Events */

Route::post('/events/save', [EventsController::class, 'store']);


/*   Sections API   */

Route::get('/section/{id}' , [SectionsController::class , 'index']);
Route::get('/groupesBySection/{id}' , [GroupesController::class , 'groupesBySection']);


/*   Teacher Api */
Route::get('groupesByModule/{id}' , [GroupesController::class , 'groupesByModule']);
Route::get('teacher/schedule'  , [TeacherController::class ,'getSchedule']);


Route::get('gradesBySession/{id}' , [NotesController::class ,'gradesBySession']);


/* les notes */

Route::get('studentsByGroupe/{id}' ,[StudentsController::class , 'getByGroup'] );


/*delete groupe*/


Route::post('deleteGroup/{id}' , function ($id){

//    Groupe::find($id)->delete();

});

/* Login ANDROID */

Route::post('/login' , function (Request $request){



    $data = $request->validate([
        'email' => ['email' , 'required' , 'exists:guardians'],
        'password' => 'required',
    ]);

    if (!\Auth::guard('guardian')->attempt($data)) {
        return  response('Wrong email or password.' , 403);
    }


    $user = Guardian::where('email' , $request->email)->get();


    $response['user'] = Guardian::where('email' , $request->email)->first();
    $response['token'] = 'fdslfjksdfjls';

    return response(json_encode($response));
});


/* Absences  */


Route::get('/absences/{id}' , function ($id){


    $guardian = Guardian::find($id);


   $student =  $guardian->students()->first();


   $abs  = \App\Models\Attendance::with('seance.session.module')->where('student_id' , $student->id)->get();

//   $response['student'] = $student['name'];
   $response['seances'] = $abs;


    return response(json_encode($response['seances']));

});

Route::get('/justification/{id} ' , function ($id){
    $guardian = Guardian::find($id);

    $student =  $guardian->students()->first();

    $justification =  Justification::with('attendance')
        ->whereRelation('attendance' , 'student_id' ,$student->id)
        ->where('accepted' , 0 )->first();


    $response['justification'] = $justification;

    if ($justification == null){
       return response('' , 403);
    }


    return response(json_encode($response));
});



Route::post('test/{id}' , function (Request $request , $id){

 $justification = Justification::find($request->id);


    $path = $request->file('images')[0]->store('public/justifications' );



    $justification->justification_path = $path;
    $justification->remarks = $request->remar;



    $justification->save();


});

