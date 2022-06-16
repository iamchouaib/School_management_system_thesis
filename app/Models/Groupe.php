<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static first()
 */
class Groupe extends Model
{
use HasFactory;

    protected $guarded = [];

    public function sessions(){
        return $this->hasMany(Session::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'sessions')
            ->using(Session::class)
            ->as('session');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

}
