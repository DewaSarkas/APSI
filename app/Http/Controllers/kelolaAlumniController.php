<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;
use App\Models\User;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class kelolaAlumniController extends Controller
{
    public function show()
    {
        return view('staff/kelola_alumni');
    }



    public function tampil(Request $request)
    {
        if ($request->ajax()) {
            $data = mahasiswa::whereNotNull('lulusan')->with('users')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Aksi', function($row){
                    $actionBtn = '<a class="btn ubah"  id="'.$row["id"].'">Ubah</a><a class="btn hapus"  id="'.$row["id"].'">Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['Aksi'])
                ->make(true);
        }
    }

    public function hapus($id)
    {
        DB::table('mahasiswa')->where('id',$id)->update(['lulusan'=>null]);
        $user = DB::table('mahasiswa')->where('id',$id)->pluck('users_id');
        DB::table('users')->where('id',$user)->update(['roles_id'=>3]);
    return redirect()->route('staff/kelola_alumni')->with('message','Data berhasil dihapus!');
    }

    function ubah(Request $req,$id)
    {
        $datas = mahasiswa::where('id',$id)->first()->users_id;
        $data = mahasiswa::find($id);
        $user = User::where('id', $datas)->get();
        $users = User::where('id', $datas);
        if ($user[0]->email == $req->email) {
            $req->validate([
                'email'=>'required|email',
              ],
            [
                'email.unique' => 'Email duplikat!',
                'email.required' => 'Email Wajib Diisi',
            ]);
        }else{
            $req->validate([
                'email'=>'required|email|unique:users',
              ],
            [
                'email.unique' => 'Email duplikat!',
                'email.required' => 'Email Wajib Diisi',
            ]);
        }

        $users->update(['email'=>$req->email]);
        return redirect()->route('staff/kelola_alumni')->with('message','Data berhasil diubah!');
    }

    function detail($request){
        $data = mahasiswa::where('id',$request)->get();
        $data[0]->email=$data[0]->users->email;
        return $data ;
    }

}
