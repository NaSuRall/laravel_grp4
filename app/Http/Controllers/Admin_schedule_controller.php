<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class Admin_schedule_controller extends Controller
{
    public function admin_schedule(){
        $plan = Schedule::where('user_id', auth()->id())->get();

        return view('admin_schedule', compact('plan'));
    }

    public function send_form_admin(Request $request)
    {
        // Validation des données
        $request->validate([
            'user_id' => 'required',
            'day_of_week' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        // Vérification des données reçues

        // Création du créneau
       $planing = Schedule::create([
            'user_id' => auth()->id(),
            'day_of_week' => $request->input('day_of_week'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
        ]);

        return redirect()->route('admin.schedule', $planing)->with('success', 'Créneau ajouté avec succès.');
    }
}
