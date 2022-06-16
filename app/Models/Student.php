<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static first()
 */
class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

    public function seances()
    {
        return $this->belongsToMany(Seance::class, 'attendances')
            ->as('attendance');

    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public function sessions()
    {
        return $this->belongsToMany(Session::class, 'notes', 'student_id', 'session_id')
            ->withPivot('note_td', 'task', 'evaluation', 'note')
            ->as('note')
            ->using(Note::class);
    }

    public function section()
    {
        return $this->belongsTo( Section::class );
    }


}
