<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceUser extends Model
{
    protected $table = 'user_service';

    protected $fillable = [
        'fk_user',
        'fk_service'
    ];
}
