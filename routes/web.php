<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Frontend\DoctorsController;
use App\Http\Controllers\Frontend\PatientController;
use App\Http\Controllers\Frontend\DepartmentController;
use App\Http\Controllers\admin_panel\DashboardController;
use App\Http\Controllers\Frontend\DoctorDashboardController;
use App\Http\Controllers\admin_panel\DashboardPatientController;
use App\Http\Controllers\Frontend\Dashboard\ScheduleTimingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Backend Routes

Auth::routes();

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//dashboad index
// Route::get('/dashboard',[DashboardController::class,'viewDasboard'])->name('dashboard');
// Route::get('/update-status/{id}',[DashboardController::class,'updateStatus'])->name('update.status');
// Route::get('/delete-appointment/{id}',[DashboardController::class,'deleteAppointment'])->name('delete.appointment');

//dashboard appointments
Route::get('my-appointments',[DashboardPatientController::class,'viewAppointment'])->name('my.appointments');

//dashboard patients
Route::get('my-patients',[DashboardPatientController::class,'viewPatients'])->name('my.patients');

//dashboard doctor profile setting
Route::get('profile-setting',[DashboardPatientController::class,'profileSetting'])->name('profile.setting');
Route::get('update-profile-setting/{id}',[DashboardPatientController::class,'updateProfileSetting'])->name('updateProfile.setting');

//dashboard doctor schedule timing
// Route::get('create-schedule-timing',[DashboardPatientController::class,'createScheduleTiming'])->name('create.schedule.timing');
// Route::post('store-schedule-timing',[DashboardPatientController::class,'storeScheduleTiming'])->name('store.schedule-timing');
// Route::get('edit-schedule-timing',[DashboardPatientController::class,'editScheduleTiming'])->name('edit.schedule.timing');
// Route::post('update-schedule-timing',[DashboardPatientController::class,'updateScheduleTiming'])->name('update.schedule-timing');
// Route::post('update-schedule-duration',[DashboardPatientController::class,'updateScheduleDuration'])->name('update.schedule-duration');
// Route::delete('delete-schedule-timing',[DashboardPatientController::class,'deleteScheduleTiming'])->name('delete.schedule-timing');

// Route::get('schedule-timing',function () {
//     return view('frontend.Doctor.Dashboard.Schedule-Timings.index');
// })->name('schedule-timing.index');


// Frontend Routes
// Route::get('/doctor-profile',[DoctorsController::class, 'profileDepart'])->name('doctor.profile');


Route::resource('department', DepartmentController::class);
Route::get('department-cardiology', [DepartmentController::class, 'cardiology'])->name('department.cardiology');
Route::get('department-eyeCare', [DepartmentController::class, 'eyeCare'])->name('department.eyecare');
Route::get('department-Pulmonary', [DepartmentController::class, 'Pulmonary'])->name('department.Pulmonary');
Route::get('department-dentalCare', [DepartmentController::class, 'dentalCare'])->name('department.dentalCare');
Route::get('department-diagnostics', [DepartmentController::class, 'diagnostics'])->name('department.diagnostics');
Route::get('department-disabled', [DepartmentController::class, 'disabled'])->name('department.disabled');
Route::get('department-traumotoligy', [DepartmentController::class, 'traumotoligy'])->name('department.traumotoligy');
Route::get('department-neurology', [DepartmentController::class, 'neurology'])->name('department.neurology');


//doctor-dashboard frontend
Route::resource('doctor-dashboard', DoctorDashboardController::class);
Route::get('user-info', [DoctorDashboardController::class,'userInfo'])->name('user.info');
Route::post('user-info-update', [DoctorDashboardController::class,'updateUserInfo'])->name('user-info.update');
Route::get('user-password', [DoctorDashboardController::class, 'editPassword'])->name('user-password.editPassword');
Route::post('update-user-password', [DoctorDashboardController::class, 'updatePassword'])->name('user-password.updatePassword');
Route::get('appointments', [DoctorDashboardController::class, 'appointment'])->name('appointments.appointment');
Route::post('appointments-status-update', [DoctorDashboardController::class, 'appointmentStatusUpdate'])->name('appointments.statusUpdate');
Route::get('appointments/{id}', [DoctorDashboardController::class, 'appointmentDelete'])->name('appointmentDelete');
Route::get('my-patient', [DoctorDashboardController::class, 'myPatient'])->name('my-patient.myPatient');
Route::resource('schedule-timing', ScheduleTimingController::class);
// Route::delete('schedule-timing/{id}', [ScheduleTimingController::class, 'delete'])->name('schedule-timing.destroy');


// Route::post('/schedule-timing/{id}', [ScheduleTimingController::class, 'Delete'])->name('schedule-timing.Destroy');



Route::resource('doctors', DoctorsController::class);
Route::get('/{slug}',[DoctorsController::class, 'viewDoctorProfile'])->name('doctor.detail');
Route::get('doctors/update/{$id}', [DoctorsController::class, 'update'])->name('doctors.update');


Route::get('/', function () {
    return view('frontend.index.index');
})->name('home');

Route::get('patient-profile/{id}',[PatientController::class, 'patientDetail'])->name('patient-profile');
Route::delete('patient-appointment-destory',[PatientController::class, 'destory'])->name('patient.appointment.reject');

// Route::get('/register',[Controllers\registerController::class, 'showRegistrationForm'])->name('register');

// Route::POST('/new-user',[Controllers\registerController::class, 'create'])->name('make.user');





// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// Route::get('/invoice', [AppointmentController::class, 'showInvoice'])->name('invoice');


// frontend doctors all route
// Route::get('doctors',[DoctorsController::class, 'getDoctors'] )->name('doctor');
// Route::get('/doctor-profile',[DoctorsController::class, 'profileDepart'])->name('doctor.profile');
// Route::post('/create-doctor',[DoctorsController::class, 'createDoctor'])->name('create.doctor');
// Route::get('/{slug}',[DoctorsController::class, 'doctorDetail'] )->name('doctor.detail');

// frontend Appointment route
// Route::get('appointment/{id}',[AppointmentController::class, 'appointmentDetail'] )->name('appointment');
// Route::post('get-date',[AppointmentController::class, 'getAppointmentDays'] )->name('get.date');
// Route::post('make-appointment',[AppointmentController::class, 'makeAppointment'] )->name('make.appointment');






