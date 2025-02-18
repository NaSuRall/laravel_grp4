<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin_appointment_controller extends Controller
{
    public function admin_appointment(){
        return view('Admin_appointment');
    }
}
