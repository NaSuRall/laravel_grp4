<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class Admin_schedule_controller extends Controller
{
    public function admin_schedule()
    {
        // Retrieve all schedule entries since user_id is no longer in the table.
        $plan = Schedule::all(); // Récupère tout sans filtrer par user_id
        return view('admin_schedule', compact('plan'));
    }

    public function send_form_admin(Request $request)
    {
        // Validate the incoming data.
        $request->validate([
            'day_of_week' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time'  => 'required',
            'end_time'    => 'required',
        ]);

        // Create the schedule entry without user_id.
        $planing = Schedule::create([
            'day_of_week' => $request->input('day_of_week'),
            'start_time'  => $request->input('start_time'),
            'end_time'    => $request->input('end_time'),
        ]);

        return redirect()->route('admin', $planing)->with('success', 'Créneau ajouté avec succès.');
    }
}
