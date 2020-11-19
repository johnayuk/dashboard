<?php

namespace App\Http\Controllers;
use App\Doctor;
use Validator;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function createDoctor(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => ['required', 'string',],
            'last_name' => ['required', 'string',],
            'email' => ['required','string'],
            'specialization' => ['required','string'],
            'department_id' => ['required'],
            'image'=>'mimes:jpeg,jpg,png,gif|required|max:10000',


        ]);
        $doctor = new Doctor();
        $doctor->first_name = $request->input('first_name');
        $doctor->last_name = $request->input('last_name');
        $doctor->email = $request->input( 'email');
        $doctor->specialization = $request->input('specialization' );
        $doctor->department_id = $request->get('department_id');

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $image->move('uploads/image',$filename);
            $doctor->image = $filename;
        //   Image::make($image)->resize(300,300)->save(public_path(). '/uploads/image/'.$filename);

        //   $user = Auth::user();
        //   $user->image = $filename;
        }else{
            return $request;
            $doctor->image='';
        }

        // dd($user->name);

        $doctor->save();
        return redirect('/doctor');
    }
    
}
