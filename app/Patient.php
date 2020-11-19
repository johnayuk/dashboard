<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //  protected $fillable = [
    // 'name','last_name', 'condition', 'doctor_id', 'ward', 'phone',
    //  ];

    protected $guarded=[];

     public function doctor(){
         return $this->belongsTo('App\Doctor'); 
     }


}
