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
          'titre' => 'Bonjour !',
          'message' => 'Ceci est un e-mail envoyé via Laravel et Gmail SMTP.'
       ];

      Mail::to('doctohrlibe@romain-poulain.fr')->send(new MonEmail($details));

       return view('mail', compact('details'));
    }
}
