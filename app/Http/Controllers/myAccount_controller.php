<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class myAccount_controller extends Controller
{
    public function index(){
        return view('myAccount');
    }
}
