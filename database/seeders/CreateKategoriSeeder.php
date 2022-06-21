<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\kategori;

class CreateKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            [
                'nama' => 'C.2.4.a Sistem Tata Pamong',
            ],
            [
                'nama' => 'C.2.4.b Kepemimpinan',
            ],
            [
                'nama' => 'C.2.4.c Pengelolaan',
            ],
            [
                'nama' => 'C.2.4.d) Sistem Penjaminan Mutu',
            ],
            [
                'nama' => 'C.2.4.e) Kerjasama',
            ],
            [
                'nama' => 'C.2.5 Indikator Kinerja Tambahan',
            ],
            [
                'nama' => 'C.2.6 Evaluasi Capaian Kinerja',
            ],
            [
                'nama' => 'C.2.7 Penjaminan Mutu',
            ],
            [
                'nama' => 'C.2.8 Kepuasan Pemangku Kepentingan',
            ],
        ];

        foreach ($kategori as $key => $value) {
            kategori::create($value);
        }

    }
}
