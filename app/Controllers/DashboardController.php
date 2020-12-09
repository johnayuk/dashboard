<?php

namespace App\Controllers;
use App\Models\User;
use  App\Requests\updateUserRequest;
use  App\Requests\UserRequest;
use App\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appoinment;
use App\Repositories\UserRepository;
use Validator;

class DashboardController extends Controller
{
  
    protected $userRepository;
    
    public function __construct(userRepository $userRepository)
    {
       $this->userRepository = $userRepository;
   
    }
   

    public function updateUser(updateUserRequest $request, $id)
    {
        $validated = $request->validated();

        $doctor = $this->userRepository->update($id);

        return redirect('/registered')->withErrors(['status' => 'user record successfully updated']);
    }

    public function delete($id)
    {
      // $user->appointments->delete();


      $user = $this->userRepository->delete($id);

          return redirect('/registered')->withErrors('Status', 'user deleted succesfully');
    }


    public function createUser(UserRequest $request)
    {
      $validated = $request->validated();
    
      $user = $this->userRepository->create($request->all());

      return redirect('/registered')->withErrors(['status'=>'Your Data is created']);
    }

   
}
