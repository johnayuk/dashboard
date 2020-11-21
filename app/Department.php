<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;


class Department extends Model
{
    protected $guarded=[];
    


public function doctors(){
    return $this->hasMany('App\Doctor');
}


public function nurses(){
    return $this->hasMany('App\Nurse');
}


}
