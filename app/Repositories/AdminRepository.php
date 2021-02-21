<?php

namespace App\Repositories;

use App\Models\Admin;

class AdminRepository
{


    public function createAdmin(array $request)
    {

        $admin = new Admin();
        // $doctor->first_name = $request['first_name'];
        // $doctor->last_name = $request['last_name'];
        // $doctor->email = $request['email'];
        // $doctor->password = $request['password'];
        $admin->user_id = $request['user_id'];

        // $doctor->password = $request['password'];

        if ($request['image']){
                   $image = $request['image'];
                   $extension = $image->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $image->move('uploads/image/admin',$filename);
                    $admin->image = $filename;
            
                }else{
                    return $request;
                    $admin->image='';
                }

                $admin->save();
                return $admin;
    }

    public function update($id)
    {
    // $doctor = Doctor::where('id',$doctorId)->firstorFail()
    // ->update(request(['first_name','last_name','email','time','specialization','department_id']));

  
    // $where = array('id' => $doctorId);
    $doctor = Admin::where('id',$id)->first();

    if (request('image'))
    {
        $image = request('image');
        $extension = $image->getClientOriginalExtension();
         $filename = time().'.'.$extension;
         $image->move('uploads/image/admin',$filename);
         $doctor['image'] = "$filename";
    }
    
    // dd($doctor);

    // $doctor->first_name = request('first_name');
    // $doctor->last_name = request('last_name');
    // $doctor->email = request('email');
    // $doctor->specialization = request('specialization');
    // $doctor->department_id = request('department_id');

    $doctor->save();
    return $doctor;

     }

    public function delete($id)
    {
        $appointment = Admin::where('id',$id)->delete();
    }

}