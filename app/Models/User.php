<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes; 

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'phone', 'email', 'image' ,'role', 'password',
    // ];

    protected $guarded=[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


   

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }

   

    
        protected $table = "users";
      
        

    
    public function appointments()
    {
      return $this->hasMany('App\Models\Appointment');
    }

    public function doctors()
    {
      return $this->hasMany('App\Models\Doctor');
    }

    public function admins()
    {
      return $this->hasMany('App\Models\Admin');
    }


    // public function getPostsCountAttribute(){
    //     return $this->appointment()->count();
    // }


//     protected $fillable =[
//         'first_name','last_name','image', 'email', 'specialization'
//   ];

// protected $fillable = [
//     'name','last_name', 'condition', 'doctor_id', 'ward', 'phone',
// ];

}