<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Providers\RouteServiceProvider;
use App\Requests\UserRequest;
use App\Repositories\UserRepository;
use Validator;
use App\Models\User;

class RegisterController extends Controller
{
    

  protected $userRepository;
    
  public function __construct(userRepository $userRepository)
  {
     $this->userRepository = $userRepository;
 
  }



  public function index()
  {
    return view('auth.register');
  }



  public function create(UserRequest $request)
  {
    $validated = $request->validated();
  
    $user = $this->userRepository->create($request->all());

  
    return redirect('/login')->withErrors(['status' => 'You have Succesfully Registered, login to continue']);
    // dd('withErrors');
  }


//  public function updateUser(UserRequest $request, $id)
//  {
//   $validated = $request->validated();
  
//   $nurse = $this->registerRepository->update($id);
  
//   return redirect('/login')->withErrors(['status' => 'patient record successfully']);
//  }

}