<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identification_user',
        'first_name',
        'second_name',
        'first_lastname',
        'second_lastname',
        'birthdate',
        'email',
        'phone',
        'civil_status',
        'gender',
        'photo',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addresses(){
        return $this->hasMany('App\Address');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function services(){
        return $this->hasOne('App\ServiceUser');
    }

    public function scopeNames($users, $q){
        if(trim($q)){
            $users->where('first_name', 'LIKE', "%$q%")
                    ->orWhere('email', 'LIKE', "%$q%")
                    ->orWhere('identification_user', 'LIKE', "%$q%");
        }
    }
}
