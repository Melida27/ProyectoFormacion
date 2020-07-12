<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'name_service',
        'description',
        'image',
        'fk_category'
    ];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }
}
