<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan_masuk', function (Blueprint $table) {
            $table->string('id_kegiatan_masuk', 20)->primary();
            $table->string('id_partisipasi_kegiatan', 20);
            $table->date('tanggal_kegiatan_masuk');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_partisipasi_kegiatan')->references('id_partisipasi_kegiatan')->on('partisipasi_kegiatan')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatan_masuk');
    }
}
