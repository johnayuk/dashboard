<?php

namespace App\Repositories;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class AppointmentRepository{

    public function create(array $request)
    {

        $user = Auth::user();

        $appointments = new Appointment();
        $appointments->name = $request['name'];
        $appointments->email = $request[ 'email'];
        $appointments->time = $request['time'];
        $appointments->service = $request['service'];
        $appointments->user_id = $user['id'];
        $appointments->doctor_id = $request['doctor_id'];

        
        $appointments->save();

        return  $appointments;

    }

    public function update($appointmentId)
    {
       

        $appointment = Appointment::where('id',$appointmentId)->firstorFail();

        $appointment->update(request(['name','email','time','service','id',]));

    }


    public function delete($id)
    {
        $appointment = Appointment::where('id',$id)->delete();
    }

    


}