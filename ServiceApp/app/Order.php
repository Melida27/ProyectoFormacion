<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'date_order',
        'date_service',
        'status_order',
        'fk_user',
        'fk_technical',
        'fk_service',
        'fk_address',
        'description',
        'fk_score'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function service(){
    	return $this->belongsTo('App\Service');
    }

    public function address(){
    	return $this->belongsTo('App\Address');
    }

    public function score(){
    	return $this->belongsTo('App\Score');
    }
}
