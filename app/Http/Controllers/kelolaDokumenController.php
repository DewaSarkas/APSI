<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dokumen;
use App\Models\penilaian;
use App\Models\kategori;
use App\Models\sub_kategori;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class kelolaDokumenController extends Controller
{
    function show()
    {
        $kategori = kategori::get();
        $sub_kategori = sub_kategori::get();
        return view('staff.kelola_dokumen', compact('kategori','sub_kategori'));
    }

    public function kat($id)
    {
        $data = DB::table('sub_kategori')->where('kategori_id', $id)->get();
        return $data;
    }

    function tampil(){
        $data = dokumen::with('sub_kategori','sub_kategori.kategori')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('Aksi', function($row){
                $actionBtn = '<a href="kelola_dokumen/unduh/'.$row["id"].'" class="btn lihat" id="'.$row["id"].'">Unduh</a> <a class="btn ubah" id="'.$row["id"].'">Ubah</a> <a class="btn hapus"  id="'.$row["id"].'">Hapus</a>';
                return $actionBtn;
            })
            ->rawColumns(['Aksi'])
            ->make(true);
    }

    function tambah(Request $req)
    {
        $req->validate([
            'namaDokumen'=>'required',
            'berkas' => 'required|file|mimes:pdf',
            'subkategori' => 'required',
            'kategori' => 'required'
          ],
        [
            'berkas.mimes' => 'Dokumen harus berekstensi pdf!',
            'namaDokumen.required'=>'Nama dokumen wajib diisi!',
            'berkas.required' =>'Wajib memilih berkas dalam kolom berkas!',
            'subkategori.required' => 'Sub Kategori wajib diisi!',
            'kategori.required' => 'Kategori wajib diisi!'
        ]);
        $dokumen = new dokumen();
        $dokumen->namaDokumen = $req->namaDokumen;
        $dokumen->sub_kategori_id = $req->subkategori;
        if ($req->hasFile('berkas')) {
            $extension = $req->file('berkas')->extension();
            $filename = 'berkas_' . $dokumen->namaDokumen . '.' . $extension;
            $req->file('berkas')->storeAs('public/dokumen_akreditasi/', $filename);
            $dokumen->url = $filename;
        }
        $dokumen->status = "Belum Diperiksa";
        $dokumen->save();
        return redirect()->route('staff/kelola_dokumen')->with('message','Data berhasil ditambahkan!');
    }

    function ubah(Request $req,$id)
    {
        if ($req->hasFile('berkas')) {
        $req->validate([
            'namaDokumen'=>'required',
            'berkas' => 'required|file|mimes:pdf',
            'subkategori' => 'required',
            'kategori' => 'required'
          ],
        [
            'berkas.mimes' => 'Dokumen harus berekstensi pdf!',
            'namaDokumen.required'=>'Nama dokumen wajib diisi!',
            'berkas.required' =>'Wajib memilih berkas dalam kolom berkas!',
            'subkategori.required' => 'Sub Kategori wajib diisi!',
            'kategori.required' => 'Kategori wajib diisi!'
        ]);
        } else {
            $req->validate([
                'namaDokumen'=>'required',
                'berkas' => 'file|mimes:pdf',
                'subkategori' => 'required',
                'kategori' => 'required'
              ],
            [
                'berkas.mimes' => 'Dokumen harus berekstensi pdf!',
                'namaDokumen.required'=>'Nama dokumen wajib diisi!',
                'berkas.required' =>'Wajib memilih berkas dalam kolom berkas!',
                'subkategori.required' => 'Sub Kategori wajib diisi!',
                'kategori.required' => 'Kategori wajib diisi!'
            ]);
        }
        $oldUrl = DB::table('dokumen')->where('id', $id)->value('url');
        $dokumen = dokumen::find($id);
        $dokumen->namaDokumen = $req->namaDokumen;
        $dokumen->sub_kategori_id = $req->subkategori;
        if ($req->hasFile('berkas')) {
            $extension = $req->file('berkas')->extension();
            $filename = 'berkas_' . $dokumen->namaDokumen . '.' . $extension;
            $req->file('berkas')->storeAs('public/dokumen_akreditasi/', $filename);
            $dokumen->url = $filename;
            Storage::delete('public/dokumen_akreditasi/' . $oldUrl);
        }
        $dokumen->save();
        return redirect()->route('staff/kelola_dokumen')->with('message','Data berhasil diubah!');
    }

    function detail($request){
        $data = dokumen::where('id',$request)->with('sub_kategori','sub_kategori.kategori')->get();
        $data[0]->namaKategori=$data[0]->sub_kategori->kategori->nama;
        $data[0]->namaSubKategori=$data[0]->sub_kategori->nama;
        $data[0]->keterangan=$data[0]->sub_kategori->keterangan;
        // $data[0]->kategori=$data[0]->sub_kategori->kategori->nama;
        return $data;
    }

    function hapus($id){
        $nilai = penilaian::where('dokumen_id',$id);
        $nilai->delete();
        $data = dokumen::where('id',$id);
        $url = DB::table('dokumen')->where('id', $id)->value('url');
        Storage::delete('public/dokumen_akreditasi/' . $url);
        $data->delete();
        return redirect()->route('staff/kelola_dokumen')->with('message','Data berhasil dihapus!');
    }

    function unduh($id)
    {
        $url = DB::table('dokumen')->where('id', $id)->value('url');
        return response()->download(storage_path('app\public\dokumen_akreditasi\\' . $url));
    }
}
