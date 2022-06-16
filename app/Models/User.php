<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Concerns\ParsesSearchPath;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

/**
 * @method static create(array $array)
 * @method static find(int $int)
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, Searchable;

    protected $fillable = [
        'name', 'email', 'password', 'gender', 'active',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


//    protected $appends = ['photo'];


//    public function getPhotoAttribute()
//    {
//        if ($this->foto !== null) {
//            return url('media/user/' . $this->id . '/' . $this->foto);
//        } else {
//            return url('media-example/no-image.png');
//        }
//    }

//search Config
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }


    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn($value) => bcrypt($value)
        );
    }

//    protected function email(): Attribute
//    {
//        return Attribute::make(
//            get: fn($value) => $value.'@smart.com',
//        );
//    }

    //relation

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function announces()
    {
        return $this->hasMany(Announce::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    //if user is teacher

    public function sessions(){
        return $this->hasMany(Session::class);
    }

    public function modules(){
        return $this->belongsToMany(Module::class , 'module_user' , 'user_id' , 'module_id');
    }

    public function events(){
        return $this->morphToMany(Event::class , 'eventable');
    }

    public function signature()
    {
        return $this->hasOne(Signature::class);
    }

}
