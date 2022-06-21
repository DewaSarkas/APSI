<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\sub_kategori;
use App\Models\dokumen;
use Illuminate\Support\Facades\DB;

class kriteria2Controller extends Controller
{
    public function show()
    {
        $kategori = kategori::all();
        $sub_kategori = sub_kategori::all();
        $dokumen = dokumen::all();
        // dd($dokumen);
        return view('kriteria2', compact('kategori','sub_kategori','dokumen'));
    }

    function sub($id)
    {
        $data = DB::table('sub_kategori')->where('id', $id)->get();
        return $data;
    }

    function doc($id)
    {
        // $data = DB::table('dokumen')->join('sub_kategori','dokumen.sub_kategori_id','=','sub_kategori.id')->where('sub_kategori.id',$id)->get();
        $data = DB::table('dokumen')->where('sub_kategori_id', $id)->get();
        return $data;
    }

    function dokumen($id)
    {
        $data = DB::table('dokumen')->where('id', $id)->get();
        return $data;
    }

}
