<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'score';

    protected $fillable = [
        'score'
    ];

    public function orders(){
    	return $this->hasMany('App\Order');
    }
}
