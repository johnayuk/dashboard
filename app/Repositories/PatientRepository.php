<?php

namespace App\Repositories;

use App\Models\Patient;

class PatientRepository{

    public function create(array $request)
    {

        $patient = new Patient();
        $patient->name = $request['name'];
        $patient->last_name = $request['last_name'];
        $patient->condition = $request['condition'];
        $patient->doctor_id = $request['doctor_id'];
        $patient->ward = $request['ward'];
        $patient->phone = $request['phone'];

        $patient->save();

        return $patient;
    }



    public function update($id)
    {
        
        $patient = Patient::where('id',$id)->firstorFail();

        $patient->update(request(['name','last_name','condition','doctor_id','ward','phone']));
    }

    public function delete($id)
    {
        $patient = Patient::where('id',$id)->delete();
    }
}