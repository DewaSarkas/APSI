<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Assesor;
use App\Models\dokumen;
use App\Models\dosen;
use App\Models\mahasiswa;
use App\Models\mitra;

class StaffController extends Controller
{
    public function home()
    {
        $alumni = mahasiswa::whereNotNull('lulusan')->count();
        $assesor = Assesor::count();
        $dokumen = dokumen::count();
        $dosen = dosen::count();
        $mahasiswa = mahasiswa::whereNull('lulusan')->count();
        $mitra = mitra::count();
        return view('staff/home', compact('alumni','assesor','dokumen','dosen','mahasiswa','mitra'));
    }
}
