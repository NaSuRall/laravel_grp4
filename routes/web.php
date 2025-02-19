<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Admin', [App\Http\Controllers\Admin_consult_appointment_controller::class, 'admin'])->name('admin');

Route::get('/appointment/{id}/edit', [AppointmentController::class, 'edit'])->name('appointment.edit');
Route::put('/appointment/{id}', [AppointmentController::class, 'update'])->name('appointment.update');
Route::delete('/appointment/{id}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');
