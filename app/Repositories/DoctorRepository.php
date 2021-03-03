<?php

namespace App\Repositories;

use App\Models\Doctor;

class DoctorRepository
{


    public function createDoctor(array $request)
    {

        $doctor = new Doctor();
        $doctor->age= $request['age'];
        $doctor->salary = $request['salary'];
        $doctor->address = $request['address'];
        $doctor->specialization = $request['specialization'];
        $doctor->dateEmployed = $request['dateEmployed'];
        $doctor->department_id = $request['department_id'];
        $doctor->user_id = $request['user_id'];
        $doctor->city = $request['city'];
        $doctor->country = $request['country'];
        $doctor->postal_code = $request['postal_code'];

        // $doctor->password = $request['password'];

        // if ($request['image']){
        //            $image = $request['image'];
        //            $extension = $image->getClientOriginalExtension();
        //             $filename = time().'.'.$extension;
        //             $image->move('uploads/image/doctor/',$filename);
        //             $doctor->image = $filename;
            
        //         }else{
        //             return $request;
        //             $doctor->image='';
        //         }

                $doctor->save();
                return $doctor;
    }

    public function update($id)
    {
    // $doctor = Doctor::where('id',$doctorId)->firstorFail()
    // ->update(request(['first_name','last_name','email','time','specialization','department_id']));

  
    // $where = array('id' => $doctorId);
    $doctor = Doctor::where('id',$id)->first();

    $doctor->age = request('age');
    $doctor->salary = request('salary');
    $doctor->address = request('address');
    $doctor->specialization = request('specialization');
    $doctor->department_id = request('department_id');
    $doctor->dateEmployed = request('dateEmployed');
    $doctor->country = request('country');
    $doctor->postal_code = request('postal_code');
    $doctor->city = request('city');


    $doctor->save();
    return $doctor;

    }

    public function delete($id)
    {
        $appointment = Doctor::where('id',$id)->delete();
    }

}