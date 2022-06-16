<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function grade()
    {
       return  $this->belongsTo(Grade::class);
    }

    public function groups()
    {
       return  $this->hasMany(Groupe::class);
    }

    public function modules()
    {
        return  $this->hasMany(Module::class);
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
