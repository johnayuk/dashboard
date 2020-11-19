<?php

namespace App\Http\Controllers\Admin;
use App\User;
use  App\http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class DashboardController extends Controller
{
  
    // public function registeredUsers(){
    //    $users = User::all();
    //     return redirect('/registered');
    // }


    public function edit(Request $request,$id){
         $users = User::findorFail($id);
         return view('admin.editregistered')->with('users',$users);

    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required'
        ]);

        $user = User::find($id);

        $input = $request -> all();

        $user->fill($input)->save();

        // return redirect('/dashboard')->withErrors(['status' => 'record successfully updated']);

        // $users = User::find($id);
        // $users->name = $request->input('user_name');
        //     $users->user_type = $request->input('user_type');
        
        // $users->update();

        return redirect('/role-register')->withErrors('status','Your Data is Updated');
    }

    public function delete(Request $request,$id)
    {
          $del =User::findOrFail($id);
          $del->delete();

          return redirect('/registered')->withErrors('Status', 'user deleted succesfully');
    }

    
    public function createUser(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string',],
            'email' => ['required|unique:users', 'string',],
            'phone' => ['required','string'],
            'password' => ['required','string'],
            'role' => ['required','string'],
             'image'=>'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = $request->input('password');
        $user->role = $request->input('role');

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


        // dd($user);

        $user->save();
        return redirect('/registered');
    }
   
}
