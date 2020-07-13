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

    public function services(){
    	return $this->belongsTo('App\Service');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
