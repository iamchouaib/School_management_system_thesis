<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static first()
 */
class Module extends Model
{

    use HasFactory;
protected $guarded = [];

    public function groupes()
    {
        return $this->belongsToMany(Groupe::class, 'sessions')
            ->using(Session::class)
            ->as('session');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
