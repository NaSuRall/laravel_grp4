<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        // Fetch the most recent schedule for each day of the week
        $latestSchedules = Schedule::orderBy('created_at', 'desc')
            ->get()
            ->groupBy('day_of_week')
            ->map(function ($group) {
                return $group->first();
            })
            ->values();

        // Map the schedules to the required format for the view
        $schedules = $latestSchedules->map(function ($schedule) {
            return [
                'day_of_week' => $schedule->day_of_week,
                'start_time'  => $schedule->start_time,
                'end_time'    => $schedule->end_time,
            ];
        });

        $appointments = Appointment::where('date', '>=', Carbon::today())
            ->get()
            ->map(function ($appointment) {
                return [
                    'date' => $appointment->date, // YYYY-MM-DD
                    'hour' => $appointment->hour, // HH:MM
                ];
            });

        return view('appointment', compact('schedules', 'appointments'));
    }

    public function store(Request $request)
    {
        // Validate the input. The appointment_hour is expected to be in HH:00 format.
        $request->validate([
            'appointment_date' => 'required|date',
            'appointment_hour' => ['required', 'regex:/^(0[0-9]|1[0-9]|2[0-3]):00$/'],
            'consultation_type'    => 'required|in:standard,urgent',
            'description'          => 'required|string|max:1000',
        ]);

        // Combine the date and hour to form a datetime
        $dateTime = Carbon::parse($request->appointment_date . ' ' . $request->appointment_hour);

        // Create and save the appointment
        $appointment = new Appointment([
            'user_id'           => Auth::id(),
            'date'              => $dateTime->format('Y-m-d'),
            'hour'              => $dateTime->format('H:i'),
            'consultation_type' => $request->consultation_type,
            'description'       => $request->description,
        ]);

        $appointment->save();

        return redirect()->route('rendezvous')
            ->with('success', 'Rendez-vous pris avec succès!');
    }
}
