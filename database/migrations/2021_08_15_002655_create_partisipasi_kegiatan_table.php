<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartisipasiKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partisipasi_kegiatan', function (Blueprint $table) {
            $table->string('id_partisipasi_kegiatan', 20)->primary();
            $table->unsignedBigInteger('user_id');
            $table->string('id_kegiatan', 20);
            $table->string('nama', 100);
            $table->text('alasan');
            // $table->string('lokasi_kegiatan');
            $table->boolean('status_verifikasi');
            $table->longText('bukti_pengajuan');
            // $table->date('tanggal_kegiatan_berlangsung');
            // $table->string('waktu_kegiatan');
            $table->date('tanggal_partisipasi');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('cascade');
            $table->foreign('id_kegiatan')->references('id_kegiatan')->on('kegiatan')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partisipasi_kegiatan');
    }
}
