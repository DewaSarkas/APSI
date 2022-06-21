<?php

namespace App\Imports;

use App\Models\mahasiswa;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class MahasiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'email' => $row[7],
            'password' => Hash::make(123456)
        ]);

        return new mahasiswa([
            'npm' => $row[0],
            'nama' => $row[1],
            'jurusan' => $row[2],
            'alamat' => $row[3],
            'angkatan' => $row[4],
            'kelas' => $row[5],
            'jenisKelamin' => $row[6]
        ]);
    }
}
