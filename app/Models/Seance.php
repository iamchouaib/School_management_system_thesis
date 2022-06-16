<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    protected $guarded = [];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'attendances')
            ->as('attendance');
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function textbook()
    {
        return $this->hasOne(Textbook::class , 'seance_id' , 'id');
    }


}
