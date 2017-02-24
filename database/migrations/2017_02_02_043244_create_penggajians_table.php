<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenggajiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggajians', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('Kode_tunjangan_pegawai');
            $table->foreign('Kode_tunjangan_pegawai')->references('id')
                  ->on('tunjangan_pegawais')->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('Status_pengambilan');
            $table->string('Petugas_penerima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penggajians');
    }
}
