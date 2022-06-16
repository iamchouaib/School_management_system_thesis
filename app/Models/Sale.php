<?php

namespace App\Models;

use App\Http\Controllers\SalesController;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    public function typeOfSale()
    {

        return $this->belongsTo(TypeOfSale::class);

    }
}
