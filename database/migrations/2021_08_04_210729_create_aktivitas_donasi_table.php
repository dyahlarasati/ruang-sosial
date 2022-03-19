<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktivitasDonasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktivitas_donasi', function (Blueprint $table) {
            $table->string('id_aktivitas_donasi', 20)->primary();
            $table->string('id_tempat_donasi', 20)->unique();
            $table->longText('foto_aktivitas');
            $table->string('kontak_koordinator');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_tempat_donasi')->references('id_tempat_donasi')->on('tempat_donasi')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aktivitas_donasi');
    }
}
