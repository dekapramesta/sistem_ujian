<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_ujians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_th_akademiks');
            $table->date('tanggal_ujian');
            $table->time('waktu_ujian');
            $table->string('jenis_ujian');
            $table->tinyInteger('status');
            $table->foreign('id_th_akademiks')
            ->references('id')->on('th_akademiks');
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
        Schema::dropIfExists('jadwal_ujians');
    }
}
