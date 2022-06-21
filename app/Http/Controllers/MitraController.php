<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function home()
    {
        return view('mitra/home');
    }
}
