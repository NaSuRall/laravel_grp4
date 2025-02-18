<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Admin/appointment', [App\Http\Controllers\Admin_appointment_controller::class, 'admin_appointment'])->name('admin.appointment');
