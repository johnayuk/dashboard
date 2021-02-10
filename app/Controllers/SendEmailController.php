<?php

namespace App\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
Use Illuminate\Support\Facades\Auth;
use App\Models\User;

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


         return redirect()
    }
}
