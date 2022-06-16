<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Textbook extends Model
{
    protected $guarded = [];


    public function seances()
    {
       return  $this->belongsTo(Seance::class);
    }
}
