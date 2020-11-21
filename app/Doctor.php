<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Patient;

class Doctor extends Model
{
        //  protected $fillable =[
        // 'first_name','last_name','image', 'email', 'specialization'
        // ];
        protected $guarded=[];


        public function patients(){
            return $this->hasMany('App\Patient');
        }

        public function department(){
            return $this->belongsTo('App\Department');
        }
}