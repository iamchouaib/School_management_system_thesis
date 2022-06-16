<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Session extends Pivot
{

    use HasFactory;
    protected $guarded = [];


    public function user() //teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class , 'session_id' , 'id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class , 'notes' , 'session_id' , 'student_id')
            ->withPivot('note_td' , 'task' , 'evaluation' , 'note')
            ->as('note')
            ->using(Note::class);
    }



    protected $table = 'sessions';
}
