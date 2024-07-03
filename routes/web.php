<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\AdminController;

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
//----------------- Route Check Izin Users ----------------------------
Route::middleware(['check.auth'])->group(function () {
    Route::get('/', function () {
        return redirect('/login');
    });
    //----------------------- Route Login --------------------------------------------
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    //----------------------- Route Register ------------------------------------------
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});
//----------------------- Route Logout --------------------------------------------
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//------------------------- Route Password Management ----------------------------------
Route::get('/password/reset', [AuthController::class, 'showResetForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('/password/reset', [AuthController::class, 'reset'])->name('password.update');

//--------------- Route Prevent Tombol Back Browser --------------------------------------
Route::middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //--------------- Route Admin Controllers -------------------------------------------------
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::post('admin/approve_doctor/{user}', [AdminController::class, 'approveDoctor'])->name('admin.approve_doctor');
        Route::resource('/admin/patients', AdminController::class, ['as' => 'admin'])->only(['index', 'show', 'destroy']);
        Route::resource('/admin/doctors', AdminController::class, ['as' => 'admin'])->only(['index', 'show', 'destroy']);
        Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
        Route::post('/admin/settings', [AdminController::class, 'updateSettings']);
    });
    //--------------- Route Doctor Controllers -------------------------------------------------
    Route::middleware(['role:doctor', 'check_approval'])->group(function () {
        Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor.dashboard');
        Route::resource('/doctor/patients', DoctorController::class, ['as' => 'doctor'])->only(['index', 'show']);
        Route::resource('/doctor/medical-records', MedicalRecordController::class, ['as' => 'doctor']);
        Route::get('/doctor/prediction', [PredictionController::class, 'index'])->name('doctor.prediction');
        Route::post('/doctor/predict', [PredictionController::class, 'predict'])->name('doctor.predict');
    });
    //--------------- Route Patient Controllers -------------------------------------------------
    Route::middleware(['role:patient'])->group(function () {
        Route::get('/patient', [PatientController::class, 'index'])->name('patient.dashboard');
        Route::get('/patient/medical-records', [PatientController::class, 'medicalRecords'])->name('patient.medical-records');
    });
    //---------------- Route Medical Records Controller -----------------------------------------
    Route::get('/medical-records', [MedicalRecordController::class, 'index'])->name('medical_records.index');
    Route::get('/medical-records/{id}', [MedicalRecordController::class, 'show'])->name('medical_records.show');
    Route::get('/medical-records/{id}/edit', [MedicalRecordController::class, 'edit'])->name('medical_records.edit');
    Route::put('/medical-records/{id}', [MedicalRecordController::class, 'update'])->name('medical_records.update');
});