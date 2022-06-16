<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    public function index()
    {
        return view('admin.modules.home', [
            'modules' => Module::with('users')->paginate(10),
            'teachers' => User::whereRelation('roles' , 'name' , 'teacher')->get(),
            'sections' => Section::all(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $att = $request->validate([
            'name'=>'required' ,
            'priority' => 'required',
            'section_id' => 'required' ,
        ]);


       $module =  Module::create($request->except('teachers'));

       if ($request->teachers){
           $module->users()->attach($request->teachers);
       }


    }

    public function show(Module $module)
    {
        //
    }

    public function edit(Module $module)
    {
        //
    }

    public function update(Request $request, Module $module)
    {

       $ids =  $module->users->map->id->toArray();

        $module->users()->detach(array_diff($ids , $request->teachers));
         $module->users()->attach(array_diff($request->teachers , $ids));


    }

    public function destroy(Module $module)
    {
        //
    }
}
