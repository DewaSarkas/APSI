<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->smallInteger('id')->autoIncrement();
            $table->string('npm',20)->unique();
            $table->string('nama',50);
            $table->string('jurusan',20);
            $table->string('alamat',50);
            $table->string('angkatan',7);
            $table->string('lulusan',7)->nullable();
            $table->string('kelas',10);
            $table->string('jenisKelamin',10);
            // $table->Integer('nilai');
            $table->timestamps();
            $table->smallInteger('users_id');

            $table->foreign('users_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}
