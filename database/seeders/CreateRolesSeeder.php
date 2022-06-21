<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class CreateRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'Dosen',
            ],
            [
                'name' => 'Mahasiswa',
            ],
            [
                'name' => 'Mitra',
            ],
            [
                'name' => 'Assesor',
            ],
            [
                'name' => 'Alumni',
            ],
        ];

        foreach ($role as $key => $value) {
            Role::create($value);
        }

    }
}
