<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dokumen;
use Illuminate\Support\Facades\DB;

class dokumenController extends Controller
{
    function lihat($id)
    {
        $filename = DB::table('dokumen')->where('id', $id)->value('url');
        return response()->file(storage_path('app\public\dokumen_akreditasi\\'.$filename));
    }
}
