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


Route::middleware(['check.auth'])->group(function () {
    Route::get('/', function () {
        return redirect('/login');
    });

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});
// Auth routes
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/password/reset', [AuthController::class, 'showResetForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('/password/reset', [AuthController::class, 'reset'])->name('password.update');

Route::middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::resource('/admin/patients', AdminController::class, ['as' => 'admin'])->only(['index', 'show', 'destroy']);
        Route::resource('/admin/doctors', AdminController::class, ['as' => 'admin'])->only(['index', 'show', 'destroy']);
        Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
        Route::post('/admin/settings', [AdminController::class, 'updateSettings']);
    });

    Route::middleware(['role:doctor'])->group(function () {
        Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor.dashboard');
        Route::resource('/doctor/patients', DoctorController::class, ['as' => 'doctor'])->only(['index', 'show']);
        Route::resource('/doctor/medical-records', MedicalRecordController::class, ['as' => 'doctor']);
        Route::get('/doctor/prediction', [PredictionController::class, 'index'])->name('doctor.prediction');
        Route::post('/doctor/predict', [PredictionController::class, 'predict'])->name('doctor.predict');
    });

    Route::middleware(['role:patient'])->group(function () {
        Route::get('/patient', [PatientController::class, 'index'])->name('patient.dashboard');
        Route::get('/patient/medical-records', [PatientController::class, 'medicalRecords'])->name('patient.medical-records');
    });
});