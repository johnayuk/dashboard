<?php

use Illuminate\Support\Facades\Route;
use App\User;

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
    return view('welcome');
});

Auth::routes(['register'=>false]);



Route::get('/register', 'RegisterController@index')->name('register');

Route::put('/create', 'RegisterController@create')->name('create');


// Route::get('/login', 'Auth\LoginController@redirectTo')->name('login');


Route::get('/profile', 'HomeController@index')->name('profile');



Route::group(['middleware'=>['auth','admin']], function () {

    Route::get('/adminPage', function () {
        return view('admin.adminPage');
    });

    Route::get('/registered', function () {
        $users = User::all();
        return view('admin.registered')->with('users',$users);
    });

    Route::get('/user_patient', 'Patient\PatientController@index');

    Route::put('/create_patient','Patient\PatientController@createPatient');

    Route::put('/update_patient/{id}','Patient\PatientController@updatePatient');

    Route::delete('/delete_patient/{id}','Patient\PatientController@delete');



    Route::get('/role-register', 'Admin\DashboardController@registered');

    Route::delete('/delete_user/{id}','Admin\DashboardController@delete');

    Route::put('/update-users/{id}','Admin\DashboardController@update');

    Route::put('/createUser', 'Admin\DashboardController@createUser');
     
});