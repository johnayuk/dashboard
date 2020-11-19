<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Appointment;
use App\User;

class AppointmentController extends Controller
{

    // $appointments = Appointment::with('user')->get();

   public function index()
   {
    

    }




    public function createAppointment(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'time'=>'required',
            'service'=>'required'
        ]);

        $user = Auth::user();

        $appointments = new Appointment();
        $appointments->name = $request->get('name');
        $appointments->email = $request->get('email');
        $appointments->time = $request->get('time');
        $appointments->service = $request->get('service');
        $appointments->user_id = $user->id;

        // dd($appointments->user->name);
        $appointments->save();

        return redirect('/view_bookings');

    }
}
