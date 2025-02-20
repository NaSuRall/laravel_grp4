<?php

namespace App\Http\Controllers;
use App\Models\Schedule;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $plan = Schedule::all(); // Récupère tous les créneaux
        return view('home', compact('plan'));
    }
}
