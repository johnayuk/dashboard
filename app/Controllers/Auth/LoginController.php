<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Validator,Redirect,Response,Session;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

       public function index()
       {
           return view('auth.login');
       }



    public function login(Request $request)
    {
         

        $user = Auth::user();
            
          request()->validate([
              'email'=>'required',
              'password'=>'required',
          ]);

          $credentails = $request->only('email','password');

        if(Auth::attempt($credentails)){

             if (Auth::user()->role == 'admin') {
               return redirect()->intended ('/adminPage');

             }elseif(Auth::user()->role == 'doctor') {
                   return redirect()->intended ('profilePage');

             }elseif (Auth::user()->role == 'user') {
                return redirect()->intended ('homepage');
             }

        }else {
              return redirect('login')->withErrors('Please you have to register');
         }
        
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function logout(Request $request)
    {
        // Session::flush();
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
    }
}
