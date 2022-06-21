<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function home()
    {
        return view('dosen/home');
    }
}
