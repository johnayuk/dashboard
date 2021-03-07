<?php

namespace App\Repositories;

use App\Models\Nurse;

class NurseRepository
{


public function create(array $request){

        $nurse = new Nurse();

        $nurse->age = $request['age'];
        $nurse->address = $request['address'];
        $nurse->city = $request['city'];
        $nurse->country = $request['country'];
        $nurse->date_employed = $request['date_employed'];
        $nurse->specialization = $request['specialization'];
        $nurse->postal_code = $request['postal_code'];
        $nurse->salary = $request['salary'];
        $nurse->department_id = $request['department_id'];
        $nurse->user_id = $request['user_id'];
        $nurse->save();

         return $nurse;


    
    }


    public function update($id)
    {
    // $doctor = Doctor::where('id',$doctorId)->firstorFail()
    // ->update(request(['first_name','last_name','email','time','specialization','department_id']));

  
    // $where = array('id' => $doctorId);
    $nurse = Nurse::where('id',$id)->first();

    $nurse->age = request('age');
    $nurse->address = request('address');
    $nurse->city = request('city');
    $nurse->county = request('country');
    $nurse->date_employed = request('date_employed');
    $nurse->specialization = request('specialization');
    $nurse->postal_code = request('postal_code');
    $nurse->department_id = request('department_id');
    $nurse->salary = request('salary');


    $nurse->save();
    return $nurse;

    }


    public function delete($id)
    {
        $nurse = Nurse::where('id',$id)->delete();
    }

}