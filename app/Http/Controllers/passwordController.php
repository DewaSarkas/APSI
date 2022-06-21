<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class passwordController extends Controller
{
    function show()
    {
        $id = Auth::id();
        return view('ubah_pw', compact('id'));
    }
    public function ubah(Request $req, $id)
    {
        $req->validate([
            'password1' => 'required|size:6|same:password2'
        ],
        [
            'password1.required' => 'Isi kolom kata sandi!',
            'password1.size' => 'Kata sandi minimal berisi 6 karakter!',
            'password1.same' => 'Kata sandi tidak sama saat konfirmasi!',
        ]);
        $data = User::find($id);
        $data->password = Hash::make($req->password1);
        $data->save();
        return redirect()->route('ubah_pw')->with('message','Kata sandi berhasil diubah!');
    }
}
