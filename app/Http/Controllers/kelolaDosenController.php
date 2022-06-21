<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dosen;
use App\Models\User;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class kelolaDosenController extends Controller
{
    public function show()
    {
        return view('staff/kelola_dosen');
    }

    public function tampil(Request $request)
    {
        if ($request->ajax()) {
            $data = dosen::with('users')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Aksi', function($row){
                    $actionBtn = '<a class="btn ubah" id="'.$row["id"].'">Ubah</a> <a class="btn hapus"  id="'.$row["id"].'">Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['Aksi'])
                ->make(true);
        }
    }

    public function detail($request){
        $data = dosen::where('id',$request)->get();
        $data[0]->email=$data[0]->users->email;
        return $data ;
    }

    public function tambah(Request $req)
    {
        $req->validate([
            'nidn' => 'required|numeric|max:10',
            'nama' => 'required|regex:/^[a-zA-Z ]*$/',
            'email' => 'required|email|unique:users',
            'alamat' => 'required'
        ],
    [
        'email.unique' => 'Email duplikat!',
        'nidn.max' => 'NIDN maksimal berisi 10!',
        'nidn.required' => 'NIDN wajib diisi!',
        'nidn.numeric' => 'NIDN hanya berisi angka!',
        'nama.required' => 'Nama wajib diisi!',
        'nama.regex' => 'Nama hanya berisi alfabet!',
        'email.required' => 'Email wajib diisi!',
        'alamat.required' => 'Alamat wajib diisi!'
    ]);
        $user = new User;
        $user->name = $req->nama;
        $user->email = $req->email;
        $user->password = Hash::make(123456);
        $user->roles_id = 2;
        $user->save();
        $id = User::where('email',$req->email)->get('id');
        $data = new dosen();
        $data->nidn = $req->nidn;
        $data->nama = $req->nama;
        $data->alamat = $req->alamat;
        $data->users_id = $id[0]->id;
        $data->save();
        return redirect()->route('staff/kelola_dosen')->with('message','Data berhasil ditambahkan!');
    }

    function ubah(Request $req, $id)
    {
        $datas = dosen::where('id',$id)->first()->users_id;
        $data = dosen::find($id);
        $user = User::where('id', $datas)->get();
        $users = User::where('id', $datas);
        if ($user[0]->email == $req->email){
            $req->validate([
                'nidn' => 'required|numeric|max:10',
                'nama' => 'required|regex:/^[a-zA-Z ]*$/',
                'email' => 'required|email',
                'alamat' => 'required'
            ],
            [
            'nidn.max' => 'NIDN maksimal berisi 10!',
            'nidn.required' => 'NIDN wajib diisi!',
            'nidn.numeric' => 'NIDN hanya berisi angka!',
            'nama.required' => 'Nama wajib diisi!',
            'nama.regex' => 'Nama hanya berisi alfabet!',
            'email.required' => 'Email wajib diisi!',
            'alamat.required' => 'Alamat wajib diisi!'
            ]);
        }else{
            $req->validate([
                'nidn' => 'required|numeric',
                'nama' => 'required|regex:/^[a-zA-Z ]*$/',
                'email' => 'required|email|unique:users',
                'alamat' => 'required'
            ],
            [
            'email.unique' => 'Email duplikat!',
            'nidn.required' => 'NIDN wajib diisi!',
            'nidn.numeric' => 'NIDN hanya berisi angka!',
            'nama.required' => 'Nama wajib diisi!',
            'nama.regex' => 'Nama hanya berisi alfabet!',
            'email.required' => 'Email wajib diisi!',
            'alamat.required' => 'Alamat wajib diisi!'
            ]);
        }
        $users->update(['email'=>$req->email]);
        $data = dosen::find($id);
        $data->nidn = $req->nidn;
        $data->nama = $req->nama;
        $data->alamat = $req->alamat;
        $data->save();
        return redirect()->route('staff/kelola_dosen')->with('message','Data berhasil diubah!');
    }

    function hapus($id)
    {
        $data = dosen::find($id);
        $user = $data->first('users_id')->users_id;
        $data->delete();
        DB::table('users')->where('id', $user)->delete();
        return redirect()->route('staff/kelola_dosen')->with('message','Data berhasil dihapus!');
    }

}
