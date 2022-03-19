<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTunawismaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tunawisma', function (Blueprint $table) {
            $table->string('id_tunawisma', 20)->primary();
            $table->string('id_panti', 20);
            $table->string('nama_tunawisma');
            $table->date('tanggal_lahir');
            $table->string('nama_orang_tua');
            $table->enum('keterangan_keluarga', ['YATIM', 'PIATU', 'YATIM_PIATU']);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_panti')->references('id_panti')->on('panti')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tunawisma');
    }
}
