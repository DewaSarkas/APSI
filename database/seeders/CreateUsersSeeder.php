<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Staff A',
                'email' => 'staff_a@mail.com',
                'password' => Hash::make(123456),
                'roles_id' => 1,
            ],
            [
                'name' => 'Dosen A',
                'email' => 'dosen_a@mail.com',
                'password' => Hash::make(123456),
                'roles_id' => 2,
            ],
            [
                'name' => 'Mahasiswa A',
                'email' => 'mahasiswa_a@mail.com',
                'password' => Hash::make(123456),
                'roles_id' => 3,
            ],
            [
                'name' => 'Mitra A',
                'email' => 'mitra_a@mail.com',
                'password' => Hash::make(123456),
                'roles_id' => 4,
            ],
            [
                'name' => 'Assesor A',
                'email' => 'assesor_a@mail.com',
                'password' => Hash::make(123456),
                'roles_id' => 5,
            ],
            [
                'name' => 'Alumni A',
                'email' => 'alumni_a@mail.com',
                'password' => Hash::make(123456),
                'roles_id' => 6,
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
