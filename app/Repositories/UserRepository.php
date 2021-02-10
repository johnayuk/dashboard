<?php

namespace App\Repositories;


use App\Models\User;
use App\Models\Appoinment;

use Illuminate\Support\Facades\Auth;

class UserRepository{

    public function create(array $request)
    {

        $user = new User();
        $user->name = $request['name'];
        $user->lastName = $request['lastName'];
        $user->email = $request['email'];
        $user->role = $request['role'];
        $user->phone = $request['phone'];
        $user->specialization = $request['specialization'];
        $user->address = $request['address'];
        $user->dateEmployed= $request['dateEmployed'];
        $user->password = $request['password'];

        if ($request['image']){
            $image = $request['image'];
            $extension = $image->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $image->move('uploads/image',$filename);
            $user->image = $filename;
        

        //   $user = Auth::user();
        //   $user->image = $filename;
        }else{
            return $request;
            $user->image='';
    }


    // dd($patient->name);

    $user->save();
    }


    
    public function update($id)
    {
    // $doctor = Doctor::where('id',$doctorId)->firstorFail()
    // ->update(request(['first_name','last_name','email','time','specialization','department_id']));

  
    // $where = array('id' => $doctorId);
    $user = User::where('id',$id)->first();

    if (request('image'))
    {
        $image = request('image');
        $extension = $image->getClientOriginalExtension();
         $filename = time().'.'.$extension;
         $image->move('uploads/image',$filename);
         $user['image'] = "$filename";
    }
    $user->name = request('name');
    $user->email = request('email');
    $user->role = request('role');
    $user->phone= request('phone');

    $user->save();
    return  $user;

    }


    public function delete($id)
    {
        $user = User::where('id',$id)->delete();
    }
}