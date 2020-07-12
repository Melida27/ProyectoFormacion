<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'working_experience';

    protected $fillable = [
        'company_name',
        'position',
        'time_experience_company',
        'description',
        'fk_curriculum'
    ];
}
