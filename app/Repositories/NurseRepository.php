<?php

namespace App\Repositories;

use App\Models\Nurse;

class NurseRepository
{


public function create(array $request){

        $nurse = new Nurse();
        // $nurse->first_name = $request['first_name'];
        // $nurse->last_name = $request['last_name'];
        // $nurse->email = $request['email'];
        $nurse->department_id = $request['department_id'];
        $nurse->user_id = $request['user_id'];


        //  if ($request['image']){
        //            $image = $request['image'];
        //            $extension = $image->getClientOriginalExtension();
        //             $filename = time().'.'.$extension;
        //             $image->move('uploads/image/nurse',$filename);
        //             $nurse->image = $filename;
            
        //         }else{
        //             return $request;
        //             $nurse->image='';
        //         }

                $nurse->save();
                return $nurse;


    
    }


    public function update($id)
    {
    // $doctor = Doctor::where('id',$doctorId)->firstorFail()
    // ->update(request(['first_name','last_name','email','time','specialization','department_id']));

  
    // $where = array('id' => $doctorId);
    $nurse = Nurse::where('id',$id)->first();

    // if (request('image'))
    // {
    //     $image = request('image');
    //     $extension = $image->getClientOriginalExtension();
    //      $filename = time().'.'.$extension;
    //      $image->move('uploads/image/nurse',$filename);
    //      $nurse['image'] = "$filename";
    // }
    // $nurse->first_name = request('first_name');
    // $nurse->last_name = request('last_name');
    // $nurse->email = request('email');
    $nurse->department_id = request('department_id');

    $nurse->save();
    return $nurse;

    }


    public function delete($id)
    {
        $nurse = Nurse::where('id',$id)->delete();
    }

}