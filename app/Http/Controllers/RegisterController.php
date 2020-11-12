<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Providers\RouteServiceProvider;
use Validator;
use App\User;

class RegisterController extends Controller
{
    

public function index(){
  return view('auth.register');
}

    
//     protected function create(Request $request)
//     {

//     //     // request()->validate([
//     //     //     'name' => 'required', 'string', 'max:255',
//     //     //     'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
//     //     //     'phone'=>'required',
//     //     //     'password' => 'required', 'string', 'min:8', 'confirmed',
//     //     // ]);
    
//     //     return User::create([
//     //         'name' => $request['name'],
//     //         'email' => $request['email'],
//     //         'phone'=>$request['phone'],
//     //         'password' => Hash::make($request['password']),
//     //     ]);

//     //     $data = $request ->all();
//     //     $check = $this->create($data);

//     //     return redirect::to("adminPage");
//     // }

//     $storeData = $request->validate([
//              'name' => 'required', 'string', 'max:255',
//             'email' => 'required|unique:users',
//              'phone'=>'required',
//              'password' => 'required', 'string', 'min:8', 'confirmed',
//     ]);
//   $todo = User::create($storeData);
//   return redirect('/login')->with('completed', 'student has been save');

// }

public function create(Request $request){
  $validator = Validator::make($request->all(),[
      'name' => ['required', 'string',],
      'email' => ['required|unique:users', 'string',],
      'phone' => ['required','string'],
      'password' => ['required','string'],
  ]);
  $user = new User();
  $user->name = $request->input('name');
  $user->email = $request->input('email');
  $user->phone = $request->input('phone');
  $user->password = $request->input('password');


  // dd($patient->name);

  $user->save();
  return redirect('/login')->withErrors(['status' => 'user record successfully']);
}

}