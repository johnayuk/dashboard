<?php

namespace App\Controllers;

use App\Mail\ContactMail;
use App\Mail\Workers;
use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
Use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;


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


    public function workersMail(Request $request, $userId)
    {
        $doctor = Doctor::findOrFail($userId);

        // Ship order...

        // Mail::to($request->user())->send(new Workers($doctor));
        Mail::to($doctor->user->email)->send(new Workers($doctor));
    }

}
