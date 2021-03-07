<?php

namespace App\Controllers;

use App\Mail\ContactMail;
use App\Mail\DoctorMail;
use App\Mail\NurseMail;
use App\Mail\Workers;
use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
Use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Nurse;

class SendEmailController extends Controller
{
    
    public function sendMail(Request $request)
    {

        // dd(request()->all());

          

             $data = request()->validate([
                'name' =>  'required',
                'message' => 'required',
                'email' => 'required|email'
             ]);
                
         Mail::to('john1234ayuk@gmail.com')->send(new ContactMail($data));


         return redirect('/homepage')->with('success', 'Thank you for contacting us');
    }


    public function DoctorsMail(Request $request, $userId)
    {
        $doctor = Doctor::findOrFail($userId);

        $data = request()->validate([
            'message' => 'required',
         ]);

       
        Mail::to($doctor->user->email)->send(new DoctorMail($data));

        return redirect('/doctor')->withErrors(['status'=> 'Email has been sent...']);
    }

    
    public function NursesMail(Request $request, $userId)
    {
        $nurse = Nurse::findOrFail($userId);

        $data = request()->validate([
            'message' => 'required',
         ]);

        
        Mail::to($nurse->user->email)->send(new NurseMail($data));

        return redirect('/nurse')->withErrors(['status'=> 'Email has been sent...']);
    }

}
