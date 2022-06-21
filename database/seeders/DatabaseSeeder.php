<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateRolesSeeder::class);
        $this->call(CreateUsersSeeder::class);
        $this->call(CreateKategoriSeeder::class);
        $this->call(CreateSubKategoriSeeder::class);
        $this->call(CreateNilaiSeed::class);
    }
}
