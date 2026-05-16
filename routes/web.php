<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->hasRole('admin')) return redirect()->route('admin.dashboard');
    if ($user->hasRole('doctor')) return redirect()->route('doctor.dashboard');
    if ($user->hasRole('patient')) return redirect()->route('patient.dashboard');
    if ($user->hasRole('receptionist')) return redirect()->route('receptionist.dashboard');
    if ($user->hasRole('pharmacist')) return redirect()->route('pharmacist.dashboard');
    
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
        Route::resource('departments', \App\Http\Controllers\Admin\DepartmentController::class);
        Route::get('users', [\App\Http\Controllers\Admin\AdminUserController::class, 'index'])->name('users.index');
    });

    // Doctor Routes
    Route::middleware(['role:doctor'])->prefix('doctor')->name('doctor.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\DoctorController::class, 'index'])->name('dashboard');
        Route::resource('schedules', \App\Http\Controllers\Doctor\DoctorScheduleController::class)->except(['show']);
        Route::get('appointments', [\App\Http\Controllers\Doctor\DoctorAppointmentController::class, 'index'])->name('appointments.index');
        Route::resource('medical-records', \App\Http\Controllers\Doctor\DoctorMedicalRecordController::class)->except(['show']);
        Route::resource('prescriptions', \App\Http\Controllers\Doctor\DoctorPrescriptionController::class)->except(['show']);
    });

    // Patient Routes
    Route::middleware(['role:patient'])->prefix('patient')->name('patient.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\PatientController::class, 'index'])->name('dashboard');
        Route::resource('appointments', \App\Http\Controllers\Patient\PatientAppointmentController::class)->only(['index', 'create', 'store']);
        Route::get('medical-records', [\App\Http\Controllers\Patient\PatientMedicalRecordController::class, 'index'])->name('medical-records.index');
        Route::get('invoices', [\App\Http\Controllers\Patient\PatientInvoiceController::class, 'index'])->name('invoices.index');
    });

    // Receptionist Routes
    Route::middleware(['role:receptionist'])->prefix('receptionist')->name('receptionist.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\ReceptionistController::class, 'index'])->name('dashboard');
        Route::get('appointments', [\App\Http\Controllers\Receptionist\ReceptionistAppointmentController::class, 'index'])->name('appointments.index');
        Route::resource('bed-allotments', \App\Http\Controllers\Receptionist\ReceptionistBedAllotmentController::class)->except(['show']);
        Route::resource('invoices', \App\Http\Controllers\Receptionist\ReceptionistInvoiceController::class)->except(['show']);
    });

    // Pharmacist Routes
    Route::middleware(['role:pharmacist'])->prefix('pharmacist')->name('pharmacist.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\PharmacistController::class, 'index'])->name('dashboard');
        Route::resource('medicines', \App\Http\Controllers\Pharmacist\PharmacistMedicineController::class)->except(['show']);
        Route::get('prescriptions', [\App\Http\Controllers\Pharmacist\PharmacistPrescriptionController::class, 'index'])->name('prescriptions.index');
    });
});

require __DIR__.'/auth.php';
