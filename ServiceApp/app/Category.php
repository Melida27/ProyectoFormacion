<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name_category', 
        'image'
    ];

    public function services(){
    	return $this->hasOne('App\Service');
    }
}
