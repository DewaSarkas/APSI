<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->smallInteger('id')->autoIncrement();
            $table->string('namaDokumen',255);
            $table->string('url',100);
            $table->string('status',20);
            $table->smallInteger('sub_kategori_id');
            $table->timestamps();

            $table->foreign('sub_kategori_id')
                ->references('id')
                ->on('sub_kategori')
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
        Schema::dropIfExists('dokumen');
    }
}
