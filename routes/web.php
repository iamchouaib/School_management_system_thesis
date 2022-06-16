<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncesController;
use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\GroupesController;
use App\Http\Controllers\GuardiansController;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SeancesController;
use App\Http\Controllers\SecretaryController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\SemsterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\Signature_control;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeamController;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Models\Attendance;
use App\Models\Guardian;
use App\Models\Justification;
use App\Models\Seance;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;

/*** DARK MODE AND COLORS ***/
Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

Route::get('/', function () {
    $teachers = \App\Models\User::with('modules', 'profile')->whereRelation('roles', 'name', '=', 'teacher')->paginate(3);
    return view('home', ['teachers' => $teachers]);
});

/*** PARENT SESSION (AUTH)  ***/
Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'index')->name('login.index')->middleware('guest:guardian');
    Route::post('login', 'store')->name('login.check');
    Route::get('register', 'show')->name('register.index');
    Route::post('register', 'register')->name('register.store');
});


Route::post('logout', [AuthController::class , 'logout'])->name('logout')->middleware('auth:guardian');


/*** PARENT  ***/
Route::middleware('auth:guardian')->name('parent.')->group(function () {




    Route::get('/parent', [ParentsController::class, 'index'])->name('dashboard-overview-1');
    Route::get('students', [StudentsController::class, 'index'])->name('students.index');
    Route::get('attendance/{student}', [StudentsController::class, 'show'])->name('attendance');
    Route::post('attendance/{id}', [AttendancesController::class, 'justification'])->name('attendance.store');
    Route::get('add-student', [StudentsController::class, 'create'])->name('students.create');
    Route::post('add-student', [StudentsController::class, 'store'])->name('students.store');


    /*calendar*/

    Route::get('schedule', [ScheduleController::class, 'index'])->name('schedule.index');

    /*  show seances  */

    Route::get('show-seance/{id}', [SeancesController::class, 'show_old_seance']
    );


});


/*** users team ***/
Route::prefix('u/')->name('team.')->group(function () {


    /*** Sessions Auth ***/
    Route::controller(SessionsController::class)->group(function () {
        //login user = {admin , secretary , teacher }
        Route::get('login', 'index')->middleware('guest')->name('login');
        Route::post('login', 'store')->middleware('guest')->name('store');
        //logout
        Route::post('/logout', 'destroy')->middleware('auth')->name('logout');

    });

    Route::middleware('auth')->group(function () {

        /*** ADMIN  ***/
        Route::prefix('admin/')->middleware('user:admin')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('admin.index');

            /* USERS CRUD  */
            Route::controller(TeamController::class)->group(function () {
                Route::get('users', 'index')->name('admin.users');
                Route::get('add-user', 'create')->name('admin.add-user');
                Route::get('users/edit/{user}', 'edit')->name('admin.edit-user')
                    ->where('user', '[0-9]+');
                Route::post('users/edit/{user}', 'update')->name('admin.update-user');
                Route::post('add-user', 'store')->name('admin.store');
                Route::post('delete', 'destroy')->name('admin.destroy');
            });

            /* GRADES CRUD  */
            Route::get('/grades', [GradesController::class, 'index'])->name('grades.index');

            /* MODULE CRUD  */
            Route::get('modules', [ModulesController::class, 'index'])->name('modules.index');
            Route::post('module/{module}', [ModulesController::class, 'update'])->name('module.update');
            Route::post('module/', [ModulesController::class, 'store'])->name('module.save');

            /* GROUPE CRUD  */
            Route::get('group/{groupe}', [GroupesController::class, 'index'])->name('manage.group');
            Route::post('group/{groupe}', [GroupesController::class, 'update'])->name('add.sessions');


            /* CALENDAR */
            Route::get('calendar', [CalendarController::class, 'index'])->name('admin.calendar');

            /* PARENT CRUD  */
            Route::get('parents/request', [GuardiansController::class, 'index_request'])->name('admin.accept.guardian');
            Route::post('parents/request/{guardian}', [GuardiansController::class, 'destroy'])->name('admin.parents.destroy');
            Route::post('parents/accept/{guardian}', [GuardiansController::class, 'accept'])->name('admin.parents.destroy');
            Route::get('parents', [GuardiansController::class, 'index'])->name('admin.parents.index');

            /* RESOURCES   */
            Route::get('resources', [SalesController::class, 'index'])->name('admin.sales.index');


            /* Semester */

            Route::get('create-semester' , [SemsterController::class ,'index'])->name('semester');
            Route::post('create-semester' , [SemsterController::class ,'store'])->name('admin.semester.store');

        }
        );

        /*** TEACHER  ***/
        Route::prefix('teacher/')->name('teacher.')->middleware('user:teacher')->group(function () {
            Route::controller(TeacherController::class)->group(function () {
                Route::get('/', 'showSeance')->name('today');
                Route::get('/modules', 'index')->name('modules');
                Route::get('/schedule', 'schedule')->name('schedule');
                Route::get('/session/{session}/seances', 'show')->name('seances');
            });


            Route::get('/seance/{seance}/show', [SeancesController::class, 'show'])->name('seance.current');
            Route::post('/seance/{seance}/save', [SeancesController::class, 'store'])->name('seance.save');
            Route::post('/seance/{seance}', [AttendancesController::class, 'store'])->name('seance.attendance');
            Route::post('save-text-book/{id}', [SeancesController::class, 'save_textBook'])->name('save-text-book');




            /* les notes (grade) */

            Route::get('grade-students/', [NotesController::class, 'index'])->name('grade-students');
            Route::post('grade-students/{id}', [NotesController::class, 'store'])->name('grade-students.store');

        });



        /*** SECRETARY  ***/
        Route::prefix('secretary/')->name('secretary.')->middleware('user:secretary')->group(function () {
            Route::get('/', [SecretaryController::class, 'index']);

            Route::get('absences', [AttendancesController::class, 'index'])->name('absences.index');
            Route::post('absences/accept/{id}', [AttendancesController::class, 'accept'])->name('absences.accept');
            Route::post('absences/decline/{id}', [AttendancesController::class, 'decline'])->name('absences.decline');

            /* register student*/
            Route::get('inscription', [StudentsController::class, 'register'])->name('students.inscription');

            /* Report cards */

            Route::get('report-cards', [NotesController::class, 'report'])->name('notes.report');
            Route::get('report-cards/{id}/show', [NotesController::class, 'show'])->name('notes.show');

            /* STUDENT INFORMATION */
            Route::get('students-information', [StudentsController::class, 'getAll'])->name('students-information');


        });


        /*** REST  ***/
        /* ANNOUNCE CRUD  */
        Route::get('announce', [AnnouncesController::class, 'index'])->name('admin.announce');
        Route::post('announce', [AnnouncesController::class, 'store'])->name('admin.announce.store');


    });
});


Route::get('show-seance/{id}', [SeancesController::class, 'show_old_seance'])->name('seances.show_old_seance');



/* Certification */
Route::get('certification/{id}', [StudentsController::class, 'getCert'])
    ->name('certification');

Route::get('pdf/{id}', [\App\Http\Controllers\PdfController::class, 'index']);


Route::get('u/profile', [ProfilesController::class, 'index'])->middleware('auth')->name('profile');
Route::post('u/profile', [ProfilesController::class, 'update'])->middleware('auth')->name('profile.update');


Route::get('test/', function () {
//
    return view('test');
})->name('test');


Route::get('notify/{id}', function ($id) {

    $guardian = Guardian::find(401);
    $array = [
        'title' => $guardian->name . 'must justify Absence for your child',
        'body' => 'Justify Absence',
        'text' => 'In the rule of our school . your sun must justify her absence ',
        'url' => '/parent/justification',
        'content' => 'thank you ' . 'smart shcool ' . auth()->user()->name,
    ];

    Notification::send($guardian, new App\Notifications\UserNotification($array));

    return back();
});




Route::get('calendar', function () {
    return view('calendar');
});


Route::get('signature-pad', [Signature_control::class, 'index'])->name('signature-pad');
Route::post('signature-pad', [Signature_control::class, 'store'])->name('signature_control.store');


/* Student Profile */

Route::get('student/{id}' , [StudentsController::class , 'profile'])->name('students.profile');
