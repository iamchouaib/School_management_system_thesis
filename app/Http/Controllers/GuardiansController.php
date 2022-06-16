<?php

namespace App\Http\Controllers;

use App\Models\guardian;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class GuardiansController extends Controller
{
    public function index_request()
    {
         $guardians = Guardian::withCount('students')->where('isActive' , null)->paginate(10);

       return view('admin.parent.home' , ['parents' => $guardians]);
    }

    public function index()
    {
        return view('admin.parent.show');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(guardian $guardian)
    {
        //
    }

    public function edit(guardian $guardian)
    {
        //
    }

    public function update(Request $request, guardian $guardian)
    {
        //
    }

    public function destroy(Guardian $guardian)
    {
        return $guardian;
    }

    public function accept(Guardian $guardian){
//         $guardian->isActive = true;
//        $guardian->save();



        $array = [
            'title' => $guardian->name,
            'body' =>  'acceptinak',
            'text' => 'some' ,
            'url' => '/google',
            'content' => 'khatima',
        ];

        Notification::send($guardian , new UserNotification($array) );



    }
}
