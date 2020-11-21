<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nurse;
use Validator;

class NurseController extends Controller
{
    public function createNurse(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => ['required', 'string',],
            'last_name' => ['required', 'string',],
            'email' => ['required','string'],
            'department_id' => ['required'],
            'image'=>'mimes:jpeg,jpg,png,gif|required|max:10000',


        ]);
        $nurse = new Nurse();
        $nurse->first_name = $request->input('first_name');
        $nurse->last_name = $request->input('last_name');
        $nurse->email = $request->input( 'email');
        $nurse->department_id = $request->get('department_id');

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $image->move('uploads/image/nurse',$filename);
            $nurse->image = $filename;
        //   Image::make($image)->resize(300,300)->save(public_path(). '/uploads/image/'.$filename);

        //   $user = Auth::user();
        //   $user->image = $filename;
        }else{
            return $request;
            $nurse->image='';
        }

        // dd($nurse->image);

        $nurse->save();
        // dd($nurse->image);
        return redirect('/nurse');
    }
    
}
