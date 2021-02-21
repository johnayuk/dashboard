<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    protected $guarded = [];


    public function department(){
        return $this->belongsTo('App\Models\Department');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}