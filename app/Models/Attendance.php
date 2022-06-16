<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Attendance extends Pivot
{
    protected $guarded = [];

    protected $table = 'attendances' ;

    public function justification()
    {
        return $this->hasOne(Justification::class , 'attendance_id' , 'id');
    }

    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }
}
