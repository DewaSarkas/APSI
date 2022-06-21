<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssesorController extends Controller
{
    public function home()
    {
        return view('assessor/home');
    }
}
