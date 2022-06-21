<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->smallInteger('id')->autoIncrement();
            $table->smallInteger('dokumen_id');
            $table->smallInteger('nilai_id');
            $table->string('penilai',30);
            $table->timestamps();

            $table->foreign('dokumen_id')
                ->references('id')
                ->on('dokumen')
                ->onUpdate('cascade');
            $table->foreign('nilai_id')
                ->references('id')
                ->on('nilai')
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
        Schema::dropIfExists('penilaian');
    }
}
