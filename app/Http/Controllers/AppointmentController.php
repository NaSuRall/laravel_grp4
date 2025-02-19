<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class AppointmentController extends Controller
{
    public function index()
    {
        // Fetch all schedules and simplify the data structure
        $schedules = Schedule::all()->map(function($schedule) {
            return [
                'day_of_week' => $schedule->day_of_week,
                'start_time'  => $schedule->start_time,
                'end_time'    => $schedule->end_time,
            ];
        });

        return view('appointment', compact('schedules'));
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'appointment_datetime' => 'required',
            'consultation_type'    => 'required',
        ]);

        // Convert the datetime string to a Carbon instance
        $dateTime = Carbon::parse($request->appointment_datetime);

        // Create and save the appointment (assumes you have an Appointment model)
        $appointment = new \App\Models\Appointment([
            'date'              => $dateTime->format('Y-m-d'),
            'hour'              => $dateTime->format('H:i:s'),
            'consultation_type' => $request->consultation_type,
            'description'       => $request->description,
        ]);

        $appointment->save();

        return redirect()->route('rendezvous')->with('success', 'Rendez-vous pris avec succès!');
    }
}
