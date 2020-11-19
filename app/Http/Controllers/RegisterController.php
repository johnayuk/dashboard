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
      'role'=> ['required','string'],
      'phone' => ['required','string'],
      'image'=>'mimes:jpeg,jpg,png,gif|required|max:10000',
      'password' => ['required','string'],
  ]);
  $user = new User();
  $user->name = $request->input('name');
  $user->email = $request->input('email');
  $user->role = $request->input('role');
  $user->phone = $request->input('phone');
  $user->password = $request->input('password');

  if ($request->hasFile('image')){
    $image = $request->file('image');
    $extension = $image->getClientOriginalExtension();
    $filename = time().'.'.$extension;
    $image->move('uploads/image',$filename);
    $user->image = $filename;
  //   Image::make($image)->resize(300,300)->save(public_path(). '/uploads/image/'.$filename);

  //   $user = Auth::user();
  //   $user->image = $filename;
}else{
    return $request;
    $user->image='';
}


  // dd($patient->name);

  $user->save();
  return redirect('/login')->withErrors(['status' => 'user record successfully']);
}

}