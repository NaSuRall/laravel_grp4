<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class Admin_schedule_controller extends Controller
{
    public function admin_schedule()
    {

        $plan = Schedule::all();
        return view('admin_schedule', compact('plan'));
    }

    public function send_form_admin(Request $request)
    {

        $request->validate([
            'day_of_week' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time'  => 'required',
            'end_time'    => 'required',
        ]);


        $planing = Schedule::create([
            'day_of_week' => $request->input('day_of_week'),
            'start_time'  => $request->input('start_time'),
            'end_time'    => $request->input('end_time'),
        ]);

        return redirect()->route('home', $planing)->with('success', 'Créneau ajouté avec succès.');
    }
}
