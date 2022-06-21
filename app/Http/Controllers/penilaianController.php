<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\sub_kategori;
use App\Models\dokumen;
use App\Models\penilaian;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class penilaianController extends Controller
{
    public function show()
    {
        $kategori = kategori::all();
        $sub_kategori = sub_kategori::all();
        $dokumen = dokumen::all();
        return view('assessor/penilaian', compact('kategori','sub_kategori','dokumen'));
    }
    function sub($id)
    {
        $data = DB::table('sub_kategori')->where('id', $id)->get();
        return $data;
    }

    function smnt($id)
    {
        $data = dokumen::with('penilaian','penilaian.nilai')->where('id',$id)->get();
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

    public function nilai(Request $req)
    {
        $date = Carbon::now()->format('Y');
        if (penilaian::where('dokumen_id',$req->id)->first()) {
            $data = penilaian::where('dokumen_id',$req->id)->get();
            $thn = Carbon::parse($data[0]->created_at)->year;
            if (penilaian::where('dokumen_id',$req->id) && $date==$thn) {
            $dokumen = penilaian::where('dokumen_id',$req->id);
            $dokumen->update(['nilai_id'=>$req->nilai]);
            return redirect()->route('assesor/penilaian')->with('message','Nilai dokumen berhasil diubah!');
            }
        }else{
        $dokumen = new penilaian();
        $dokumen->dokumen_id = $req->id;
        $dokumen->nilai_id = $req->nilai;
        $dokumen->penilai = $req->penilai;
        $dokumen->save();
        $dokumen = dokumen::find($req->id);
        $dokumen->status = "Sudah Diperiksa";
        $dokumen->save();
        return redirect()->route('assesor/penilaian')->with('message','Dokumen berhasil dinilai!');
        }
    }
}
