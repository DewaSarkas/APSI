<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;
use App\Models\User;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel;

class kelolaMahasiswaController extends Controller
{
    function show(){
        return view('staff.kelola_mahasiswa');

    }

    function detail($request){
        $data = mahasiswa::where('id',$request)->with('users')->get();
        $data[0]->email=$data[0]->users->email;
        return $data ;
    }

    function tampil(){
            $data = mahasiswa::whereNull('lulusan')->with('users')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Aksi', function($row){
                    $actionBtn = '<a class="btn ubah" id="'.$row["id"].'">Ubah</a> <a class="btn hapus"  id="'.$row["id"].'">Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['Aksi'])
                ->make(true);
    }

    function tambah(Request $req)
    {
        $req->validate([
            'npm'=>'required|unique:mahasiswa|max:10',
            'nama'=>'required|regex:/^[a-zA-Z ]*$/',
            'alamat'=>'required',
            'email'=>'required|email|unique:users',
            'angkatan'=>'required|numeric',
            'kelas'=>'required',
            'jurusan'=>'required',
            'jenisKelamin'=>'required'
          ],
        [
            'npm.max' => 'NPM Maksimal berisi 10!',
            'email.unique' => 'Email duplikat!',
            'npm.unique' => 'NPM duplikat!',
            'npm.required' => 'NPM wajib diisi!',
            'nama.required' => 'Nama wajib diisi!',
            'alamat.required' => 'Alamat wajib diisi!',
            'email.required' => 'Email wajib diisi!',
            'angkatan.required' => 'Angkatan wajib diisi!',
            'angkatan.numeric' => 'Angkatan hanya berisi angka!',
            'nama.regex' => 'Nama hanya berisi alfabet!'
        ]);

        $user = new User;
        $user->name = $req->nama;
        $user->email = $req->email;
        $user->password = Hash::make(123456);
        $user->roles_id = 3;
        $user->save();
        $id = User::where('email',$req->email)->get('id');
        $data = new mahasiswa();
        $data->npm = $req->npm;
        $data->nama = $req->nama;
        $data->alamat = $req->alamat;
        $data->angkatan = $req->angkatan;
        $data->kelas = $req->kelas;
        $data->jurusan = $req->jurusan;
        $data->jenisKelamin = $req->jenisKelamin;
        $data->users_id = $id[0]->id;
        $data->save();
        return redirect()->route('staff/kelola_mahasiswa')->with('message','Data berhasil ditambahkan!');
    }

    function hapus($id){
    $data = mahasiswa::where('id',$id);
    $user = $data->first('users_id')->users_id;
    $data->delete();
    DB::table('users')->where('id', $user)->delete();

       return redirect()->route('staff/kelola_mahasiswa')->with('message','Data berhasil dihapus!');
    }

    public function ubah(Request $req, $id)
    {
        $datas = mahasiswa::where('id',$id)->first()->users_id;
        $data = mahasiswa::find($id);
        $user = User::where('id', $datas)->get();
        $users = User::where('id', $datas);
        if ($user[0]->email == $req->email) {
            $req->validate([
                'npm'=>'required|max:10',
                'nama'=>'required|regex:/^[a-zA-Z ]*$/',
                'email'=>'required|email',
                'alamat'=>'required',
                'angkatan'=>'required|numeric',
                'kelas'=>'required',
                'jurusan'=>'required',
                'jenisKelamin'=>'required',
              ],
            [
                'npm.max' => 'NPM Maksimal berisi 10!',
                'npm.unique' => 'NPM duplikat!',
                'npm.required' => 'NPM wajib diisi!',
                'nama.required' => 'Nama wajib diisi!',
                'alamat.required' => 'Alamat wajib diisi!',
                'email.required' => 'Email wajib diisi!',
                'angkatan.required' => 'Angkatan wajib diisi!',
                'angkatan.numeric' => 'Angkatan hanya berisi angka!',
                'nama.regex' => 'Nama hanya berisi alfabet!'
            ]);
        }else{
            $req->validate([
                'npm'=>'required|',
                'nama'=>'required|regex:/^[a-zA-Z ]*$/',
                'alamat'=>'required',
                'email'=>'required|email|unique:users',
                'angkatan'=>'required|numeric',
                'kelas'=>'required',
                'jurusan'=>'required',
                'jenisKelamin'=>'required',
              ],
            [
                'email.unique' => 'Email duplikat',
                'npm.unique' => 'NPM duplikat!',
                'npm.required' => 'NPM wajib diisi!',
                'nama.required' => 'Nama wajib diisi!',
                'alamat.required' => 'Alamat wajib diisi!',
                'email.required' => 'Email wajib diisi!',
                'angkatan.required' => 'Angkatan wajib diisi!',
                'angkatan.numeric' => 'Angkatan hanya berisi angka!',
                'nama.regex' => 'Nama hanya berisi alfabet!'
            ]);
        }

        //ACAN FIX
        $users->update(['email'=>$req->email]);
        $data->npm = $req->get('npm');
        $data->nama = $req->get('nama');
        $data->alamat = $req->get('alamat');
        $data->angkatan = $req->get('angkatan');
        $data->kelas = $req->get('kelas');
        $data->jurusan = $req->get('jurusan');
        $data->jenisKelamin = $req->get('jenisKelamin');
        $data->save();
        return redirect()->route('staff/kelola_mahasiswa')->with('message','Data berhasil diubah!');
    }

    public function cek()
    {
        $date = Carbon::now()->format('Y');
        $list[] = DB::table('mahasiswa')->where('angkatan','<=',($date-4))->whereNull('lulusan')->pluck('users_id');
        // dd($list[0][0]);
        if(!empty($list[0][0])){
        DB::table('mahasiswa')->where('angkatan','<=',($date-4))->whereNull('lulusan')->update(['lulusan'=>$date]);
        for($i=0;$i<count($list);$i++){
            DB::table('users')->where('id',$list[0][$i])->update(['roles_id'=>6]);
            }
            return redirect()->route('staff/kelola_mahasiswa')->with('message','Berhasil menambahkan alumni!');
        }else{
            return redirect()->route('staff/kelola_mahasiswa')->with('error','Tidak ada alumni yang ditambahkan!');
        }
    }
}
