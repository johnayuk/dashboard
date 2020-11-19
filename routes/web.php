<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Patient;
use App\Doctor;
use App\Appointment;
use App\Department;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $doctors = Doctor::all();
    return view('welcome')->with('doctors',$doctors);;
});

Auth::routes(['register'=>false]);

Route::put('/createAppointment','Appointment\AppointmentController@createAppointment');
Route::get('/register', 'RegisterController@index')->name('register');
Route::put('/create', 'RegisterController@create')->name('create');


// Route::get('/view_bookings', function () {
//     $user = Auth::user();
//     $appointments = Appointment::all();
//     return view('bookAppointment')->with('appointments',$appointments);
// });





Route::get('/profile', 'HomeController@index')->name('profile');
// Route::get('/view_bookings', 'Appointment\AppointmentController@index')->name('view_bookings');


Route::get('/view_bookings', function () {
    $user = Auth::user();
    $appointments = Appointment::all();
    if(Auth::user()->role=="admin"){
    return view('bookAppointment')->with('appointments', $appointments);
    }
    return view('bookAppointment',['appointments' => $user-> appointments]);
});


Route::group(['middleware'=>['auth','admin']], function () {

    Route::get('/adminPage', function () {
        $users = User::all();
        $doctors = Doctor::all();
        // $users = User::count();
        // dd($doctors);
        return view('admin.adminPage', compact('users','doctors'));
        // ->with('users',$users, $doctors, );
    });

    Route::get('/registered', function () {
        $users = User::all();
        return view('admin.registered')->with('users',$users);
    });

    Route::get('/department', function () {
        $departments = Department::all();
        return view('department')->with('departments',$departments);
    });

    Route::get('/user_patient', function () {
        $patients = Patient::with(['doctor'])->get();
        $doctors = Doctor::with(['patients'])->get();
        return view('admin.patientdeck',compact('patients','doctors'));
    });

    Route::get('/doctor', function () {
        $doctors = Doctor::with(['department'])->get();
        $departments = Department::with(['doctors'])->get();
        // $departments = Department::all();
        return view('doctor',compact('departments','doctors'));
    });

    Route::put('/createDepartment', 'DepartmentController@createDepartment');
    Route::put('/createDoctor', 'DoctorController@createDoctor');
    Route::put('/create_patient','Patient\PatientController@createPatient');
    Route::put('/update_patient/{id}','Patient\PatientController@updatePatient');
    Route::delete('/delete_patient/{id}','Patient\PatientController@delete');
    Route::get('/role-register', 'Admin\DashboardController@registered');
    Route::delete('/delete_user/{id}','Admin\DashboardController@delete');
    Route::put('/update-users/{id}','Admin\DashboardController@update');
    Route::put('/createUser', 'Admin\DashboardController@createUser');
});