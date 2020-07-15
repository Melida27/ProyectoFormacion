<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
     protected $table = 'notes';

    protected $fillable = [
        'note',
        'fk_order'
    ];

    public function order(){
    	return $this->belongsTo('App\Order');
    }

    public function notes(){
    	return $this->hasMany('App\Note');
    }
}
