    <?php

    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('home');
    });
    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/Admin', [App\Http\Controllers\Admin_consult_appointment_controller::class, 'admin'])->name('admin');
    Route::get('/Admin/schedule', [App\Http\Controllers\Admin_schedule_controller::class, 'admin_schedule'])->name('admin.schedule');
    Route::post('/Admin/appointment/formSub', [App\Http\Controllers\Admin_schedule_controller::class, 'send_form_admin'])->name('send_form_admin');
    Route::get('/myAccount', [App\Http\Controllers\myAccount_controller::class, 'index'])->name('myAcount');
    Route::get('/rendezvous', [App\Http\Controllers\AppointmentController::class, 'index'])->name('rendezvous');
    Route::post('/rendezvous/store', [App\Http\Controllers\AppointmentController::class, 'store'])->name('store.appointment');




    Route::get('/logout', function () {
        Auth::logout(); // Déconnexion de l'utilisateur
        return redirect('/home'); // Rediriger vers la page d'accueil (ou une autre page)
    })->name('logout');

Route::get('/appointment/{id}/edit', [AppointmentController::class, 'edit'])->name('appointment.edit');
Route::put('/appointment/{id}', [AppointmentController::class, 'update'])->name('appointment.update');
Route::delete('/appointment/{id}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');
