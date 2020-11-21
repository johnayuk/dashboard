<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    protected $guarded = [];


    public function department(){
        return $this->belongsTo('App\Department');
    }
}
