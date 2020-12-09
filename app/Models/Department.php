<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;


class Department extends Model
{
    protected $guarded=[];
    


public function doctors(){
    return $this->hasMany('App\Models\Doctor');
}


public function nurses(){
    return $this->hasMany('App\Models\Nurse');
}


}
