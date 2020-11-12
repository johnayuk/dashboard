<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name','last_name', 'condition', 'doctor_assigned', 'ward', 'phone',
    ];
}


