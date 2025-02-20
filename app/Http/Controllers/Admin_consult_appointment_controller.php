<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Auth;
class Admin_consult_appointment_controller extends Controller
{
    public function admin()
    {
        // Récupérer les RDV dans la DB
        $rdv = Appointment::all();
        $plan = Schedule::all();
        return view('admin_consult_appointment', compact('rdv','plan'));
    }
}
