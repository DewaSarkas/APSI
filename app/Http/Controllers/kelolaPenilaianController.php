<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penilaian;
use App\Models\dokumen;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use PDF;

class kelolaPenilaianController extends Controller
{
    public function show()
    {
        return view('staff/kelola_penilaian');
    }

    public function tampil(Request $request)
    {
            $data = penilaian::with('nilai','dokumen')->distinct()->get([DB::raw('YEAR(created_at) as year')]);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Aksi', function($row){
                    $actionBtn = '<a href="kelola_penilaian/unduh/'.$row["year"].'" class="btn cetak"  id="'.$row["id"].'">Cetak</a>';
                    return $actionBtn;
                })
                ->rawColumns(['Aksi'])
                ->make(true);
    }

    public function hapus($id)
    {
        $data = penilaian::where('id',$id);
        $id = $data->first('dokumen_id')->dokumen_id;
        $data->delete();
        DB::table('dokumen')->where('id',$id)->update(['status'=>'Belum Diperiksa']);
        return redirect()->route('staff/kelola_penilaian')->with('message','Data berhasil dihapus!');
    }

    public function unduh($tahun)
    {
        $data = penilaian::with('dokumen','nilai','dokumen.sub_kategori','dokumen.sub_kategori.kategori')->where(DB::raw('YEAR(created_at)'),$tahun)->get();
        $rata2 = 0;
        foreach ($data as $dt) {
            $rata2 += $dt->nilai->nilai;
        }
        $rata2 /= count($data);
        // dd($dt->dokumen->sub_kategori->kategori);
        $pdf = PDF::loadview('nilai', ['data' => $data, 'rata' => $rata2]);
        return $pdf->download('penilaian'.now().'.pdf');
    }
}
