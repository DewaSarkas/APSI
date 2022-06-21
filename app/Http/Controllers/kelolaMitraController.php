<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mitra;
use App\Models\User;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class kelolaMitraController extends Controller
{
    function show()
    {
        return view('staff/kelola_mitra');
    }

    function tambah(Request $req)
    {
        $req->validate([
            'nama'=>'required|',
            'email'=>'required|email|unique:users',
          ],
        [
            'email.unique' => 'Email duplikat!',
            'nama.required' => 'Nama Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'nama.regex' => 'Nama Hanya Berisi Alfabet'
        ]);
        $user = new User;
        $user->name = $req->nama;
        $user->email = $req->email;
        $user->password = Hash::make(123456);
        $user->roles_id = 4;
        $user->save();
        $id = User::where('email',$req->email)->get('id');
        $data = new mitra();
        $data->nama = $req->nama;
        $data->users_id = $id[0]->id;
        $data->save();
        return redirect()->route('staff/kelola_mitra')->with('message','Data berhasil diubah!');
    }

    function tampil(){
        $data = mitra::with('users')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('Aksi', function($row){
                $actionBtn = '<a class="btn ubah" id="'.$row["id"].'">Ubah</a> <a class="btn hapus"  id="'.$row["id"].'">Hapus</a>';
                return $actionBtn;
            })
            ->rawColumns(['Aksi'])
            ->make(true);
    }

    function hapus($id)
    {
        $data = mitra::where('id',$id);
        $user = $data->first('users_id')->users_id;
        $data->delete();
        DB::table('users')->where('id', $user)->delete();
        return redirect()->route('staff/kelola_mitra')->with('message','Data berhasil dihapus!');
    }

    function ubah(Request $req,$id)
    {
        $datas = mitra::where('id',$id)->first()->users_id;
        $data = mitra::find($id);
        $user = User::where('id', $datas)->get();
        $users = User::where('id', $datas);
        if ($user[0]->email == $req->email) {
            $req->validate([
                'nama'=>'required|',
                'email'=>'required|email',
                ],
                [
                'nama.required' => 'Nama Wajib Diisi',
                'email.required' => 'Email Wajib Diisi',
                'nama.regex' => 'Nama Hanya Berisi Alfabet'
                ]);
        }else{
            $req->validate([
                'nama'=>'required|',
                'email'=>'required|email|unique:users',
                ],
                [
                'email.unique' => 'Email duplikat!',
                'nama.required' => 'Nama Wajib Diisi',
                'email.required' => 'Email Wajib Diisi',
                'nama.regex' => 'Nama Hanya Berisi Alfabet'
                ]);
        }

        $users->update(['email'=>$req->email]);
        $data->nama = $req->nama;
        $data->save();
        return redirect()->route('staff/kelola_mitra')->with('message','Data berhasil diubah!');
    }

    function detail($request){
        $data = mitra::where('id',$request)->get();
        $data[0]->email=$data[0]->users->email;
        return $data ;
    }

}
