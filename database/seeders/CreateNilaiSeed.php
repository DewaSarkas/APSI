<?php

namespace Database\Seeders;

use App\Models\nilai;
use Illuminate\Database\Seeder;

class CreateNilaiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nilai = [
            [
                'nilai' => 0,
                'keterangan' => 'Sangat Buruk'
            ],
            [
                'nilai' => 1,
                'keterangan' => 'Buruk'
            ],
            [
                'nilai' => 2,
                'keterangan' => 'Cukup'
            ],
            [
                'nilai' => 3,
                'keterangan' => 'Baik'
            ],
            [
                'nilai' => 4,
                'keterangan' => 'Sangat Baik'
            ],
        ];

        foreach ($nilai as $key => $value) {
            nilai::create($value);
        }

    }
}
