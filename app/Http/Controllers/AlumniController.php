<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function home()
    {
        return view('alumni/home');
    }
}
