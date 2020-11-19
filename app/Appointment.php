<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
      'name', 'email', 'time', 'service', 'user_id'
    ];

    // protected $gurded

    protected $table = "appointments";

    public function user()
    {
     return $this->belongsTo('App\User');
    }

    
}
