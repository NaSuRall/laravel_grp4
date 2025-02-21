<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MonEmail;

class AppointmentController extends Controller
{
    public function index()
    {

        $latestSchedules = Schedule::orderBy('created_at', 'desc')
            ->get()
            ->groupBy('day_of_week')
            ->map(function ($group) {
                return $group->first();
            })
            ->values();


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
                    'date' => $appointment->date,
                    'hour' => $appointment->hour,
                ];
            });

        return view('appointment', compact('schedules', 'appointments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'appointment_date' => 'required|date',
            'appointment_hour' => ['required', 'regex:/^(0[0-9]|1[0-9]|2[0-3]):00$/'],
            'consultation_type'    => 'required|in:standard,urgent',
            'description'          => 'required|string|max:1000',
        ]);

        $dateTime = Carbon::parse($request->appointment_date . ' ' . $request->appointment_hour);

        $details = [
            'titre' => 'Bonjour ! Voici le mail de Confirmation de rendez-vous chez Docto Hrlibe ',
            'message' => 'Merci beaucoup de faire confiance à Docto Hrlibe pour prendre votre rendez-vous, bon courage et soignez-vous bien !'
        ];

        Mail::to('doctohrlibe@romain-poulain.fr')->send(new MonEmail($details));

        $appointment = new Appointment([
            'user_id'           => Auth::id(),
            'date'              => $dateTime->format('Y-m-d'),
            'hour'              => $dateTime->format('H:i'),
            'consultation_type' => $request->consultation_type,
            'description'       => $request->description,
        ]);

        $appointment->save();
        $plan = Schedule::all();

        session()->flash('success', 'Votre rendez-vous a bien été enregistré.');

        return view('home', compact('details', 'plan'));
    }



    public  function edit()
    {
        $plan = Schedule::all();

    }
    public  function destroy(){

    }
}
