<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class Admin_consult_appointment_controller extends Controller
{
    public function admin()
    {
        // Récupérer les RDV dans la DB
        $rdv = Appointment::all();
        return view('admin_consult_appointment', compact('rdv'));
    }
}
