<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static withCount(string $string)
 * @method static findOrFail(mixed $param)
 * @method static find(mixed $type_id)
 */
class TypeOfSale extends Model
{
    protected $guarded = [];


    public function sales()
    {
        return $this->hasMany(Sale::class);

    }
}
