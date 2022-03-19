<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->string('id_kegiatan', 20)->primary();
            $table->string('id_tempat_kegiatan', 20)->unique();
            $table->string('nama_kegiatan');
            $table->date('tanggal_kegiatan');
            $table->string('waktu_kegiatan');
            $table->longText('foto_kegiatan');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_tempat_kegiatan')->references('id_tempat_kegiatan')->on('tempat_kegiatan')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
}
