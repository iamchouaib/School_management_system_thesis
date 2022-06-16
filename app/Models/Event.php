<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $guarded  = [];

    public function users()
    {
        return $this->morphedByMany(User::class, 'eventable');
    }

    public function guardians()
    {
        return $this->morphedByMany(Guardian::class, 'eventable');
    }
}
