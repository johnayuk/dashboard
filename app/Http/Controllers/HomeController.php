<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $appointments = Appointment::all();
        // $user = User::all();
        // $use= Appointment::count();
        // return view('sth')->with(['posts'=>$user->posts]);
        // return view('profile')->with(['appointment'=>$user->appointment]);

        return view('profile');
    }
}
