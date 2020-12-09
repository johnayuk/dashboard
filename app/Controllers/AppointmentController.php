<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Requests\AppointmentRequest;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Repositories\AppointmentRepository;

class AppointmentController extends Controller
{

    protected $appointmentRepository;
    
    public function __construct(appointmentRepository $appointmentRepository)
    {
       $this->appointmentRepository = $appointmentRepository;
   
    }

    public function createAppointment(AppointmentRequest $request)
    {

        $validated = $request->validated();

        $appointment = $this->appointmentRepository->create($request->all());

      
        return redirect('/view_bookings')->withErrors(['status' => 'Appointment successfully schedule']);

    }

    public function updateAppointment($appointmentId,$request)
    {
        $appointment = $this->appointmentRepository->update($appointmentId);

        return redirect('/view_bookings')->withErrors(['status' => 'Appointment successfully updated']);
    }

    public function deleteAppointment($id)
    {
        $appointment = $this->appointmentRepository->delete($id);

        return redirect('/view_bookings')->withErrors(['status' => 'Appointment deleted successfully']);
    }


}
