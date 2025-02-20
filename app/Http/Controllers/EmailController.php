<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\MonEmail;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index(Request $request){
     $details = [
          'titre' => 'Confirmation rendez-vous Docto Hrlibe',
          'message' => 'Voici le mail de confirmation du rendez-vous de : '
       ];

     $plan = Schedule::all();
      Mail::to('doctohrlibe@romain-poulain.fr')->send(new MonEmail($details));

       return view('home', compact('details', 'plan'));
    }
}
