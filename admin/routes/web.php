<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes([
    'register' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    'attendances' => 'AttendanceController',
    'doctors' => 'DoctorController',
    'doctors.schedules' => 'ScheduleController',
    'medicaments' => 'MedicamentController',
    'patients' => 'PatientController',
]);

// Ajax
//Route::post('/search-doctors', 'DoctorController@ajaxSearch')->name('search-doctors');
Route::get('/{doctor}/available-dates', 'DoctorController@availableDates')->name('available-dates');
Route::get('/{doctor}/available-times', 'DoctorController@availableTimes')->name('available-times');
Route::get('/attendances-perdate', 'AttendanceController@ajaxIndexPerDate')->name('attendances-perdate');
