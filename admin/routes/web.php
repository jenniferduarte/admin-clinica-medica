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
    'attendances'       => 'AttendanceController',
    'doctors'           => 'DoctorController',
    'doctors.schedules' => 'ScheduleController',
    'laboratories'      => 'LaboratoryController',
    'medicaments'       => 'MedicamentController',
    'patients'          => 'PatientController',
    'patients.records'  => 'RecordController',
    'prescriptions'     => 'PrescriptionController',
    'receptionists'     => 'ReceptionistController',
    'responsibles'      => 'ResponsibleController',
    'results'           => 'ResultController',
    'users'             => 'UserController',
]);

Route::get('/password', 'UserController@editPassword')->name('edit-password');
Route::put('/password', 'UserController@updatePassword')->name('update-password');

Route::get('/prescriptions-exams', 'PrescriptionController@indexExams')->name('index-prescriptions-exams');
Route::get('/prescriptions-medicaments', 'PrescriptionController@indexMedicaments')->name('index-prescriptions-medicaments');;


// Ajax
//Route::post('/search-doctors', 'DoctorController@ajaxSearch')->name('search-doctors');
Route::get('/{doctor}/available-dates', 'DoctorController@availableDates')->name('available-dates');
Route::get('/{doctor}/available-times', 'DoctorController@availableTimes')->name('available-times');
Route::get('/attendances-perdate', 'AttendanceController@ajaxIndexPerDate')->name('attendances-perdate');
Route::put('/attendances/{attendance}/status/{status}', 'AttendanceController@updateStatus')->name('attendance-update-status');
Route::get('/dashboard', 'HomeController@dashboardAdmin')->name('dash-admin');
Route::get('/top-specialties', 'HomeController@topSpecialties')->name('top-specialties');
Route::get('/doctors-attendances', 'HomeController@doctorsAttendances')->name('doctors-attendances');
