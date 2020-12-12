<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Nurse;
use App\Models\AboutUs;

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
    $about = AboutUs::all();
    return view('welcome',compact('doctors','about'));
});

Route::get('/blog','BlogController@index');

Auth::routes(['register'=>false]);

Route::put('/createAppointment','AppointmentController@createAppointment');
Route::put('/updateAppointment/{id}','AppointmentController@updateAppointment');
Route::delete('/deleteAppointment/{id}','AppointmentController@deleteAppointment');


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
    $doctors = Doctor::all();
    $appointments = Appointment::all();
    if(Auth::user()->role=="admin"){
    return view('bookAppointment',compact('appointments','doctors'));
    }
    return view('bookAppointment',([ 'appointments' => $user->appointments, ]))
    ->with('doctors',$doctors);
});


Route::group(['middleware'=>['auth','admin']], function () {

    Route::get('/adminPage', function () {
        $users = User::all();
        $doctors = Doctor::all();
        $patients = Patient::all();
        $appointments = Appointment::all();
        $departments = Department::all();
        $nurses = Nurse::all();
        // $users = User::count();
        // dd($doctors);
        return view('admin.adminPage', compact('users','doctors','patients','appointments','departments','nurses'));
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

    Route::get('/nurse', function () {
        $nurses = Nurse::all();
        $departments = Department::with(['doctors'])->get();
        return view('nurse',compact('nurses','departments'));
    });

    Route::get('/user_patient', function () {
        $patients = Patient::with(['doctor'])->get();
        $doctors = Doctor::with(['patients'])->get();
        return view('admin.patientdeck',compact('patients','doctors'));
    });

    Route::get('/doctor', function () {
        $doctors = Doctor::with(['department'])->get();
        $departments = Department::with(['doctors'])->get();
        $users = User::all();
        // $departments = Department::all();
        return view('doctor',compact('departments','doctors','users'));
    });
     
    // Route::get('aboutUs', 'AboutUsController@index');
    Route::put('/updateAbout/{id}','AboutUsController@updateAbout');


    // $about = AboutUs::all();

    // return view('/aboutUs',compact('about'));


    Route::get('/aboutUs', function () {
        $about = AboutUs::all();

        return view('/aboutUs')->with('about',$about);
    });



    Route::put('/createDepartment', 'DepartmentController@createDepartment');
    Route::put('/createNurse', 'NurseController@createNurse');
    Route::put('/create_patient','PatientController@createPatient');
    Route::put('/update_patient/{id}','PatientController@updatePatient');
    Route::delete('/delete_patient/{id}','PatientController@delete');
    Route::get('/role-register', 'DashboardController@registered');
    Route::delete('/delete_user/{id}','DashboardController@delete');
    Route::put('/update-users/{id}','DashboardController@updateUser');
    Route::put('/createUser', 'DashboardController@createUser');

    Route::put('/createDoctor', 'DoctorController@createDoctor');
    Route::put('/updateDoctor/{id}','DoctorController@updateDoctor');
    Route::delete('/deleteDoctor/{id}','DoctorController@deleteDoctor');

    Route::put('/updateNurse/{id}', 'NurseController@updateNurse');
    Route::delete('/deleteNurse/{id}','NurseController@deleteNurse');

});