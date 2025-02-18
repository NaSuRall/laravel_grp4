<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Group;
use Illuminate\Http\Request;

class Admin_appointment_controller extends Controller
{
    public function admin_appointment(){
        return view('Admin_appointment');
    }


    public function send_form_admin(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour créer un rendez-vous.');
        }

        $userId = auth()->id();

        $request->validate([
            'date' => 'required',
            'hour' => 'required',
            'description' => 'required|string|max:255',
        ]);

        // Sauvegarde en BDD
        Appointment::create([
            'user_id' => $userId,
            'date' => $request->input('date'),
            'hour' => $request->input('hour'),
            'description' => $request->input('description')
        ]);

        return redirect()->back()->with('success', 'Rendez-vous enregistré avec succès.');
    }

}
