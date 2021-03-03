<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $guarded=[];

    protected $table = "appointments";



    public function user()
    {
     return $this->belongsTo('App\Models\User');
    }

    public function doctor()
    {
     return $this->belongsTo('App\Models\Doctor','doctor_id');
    }

    
}