<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_ujians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswas');
            $table->unsignedBigInteger('id_detail_ujians');
            $table->foreign('id_siswas')
                ->references('id')->on('siswas');
            $table->foreign('id_detail_ujians')
                ->references('id')->on('detail_ujians');
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
        Schema::dropIfExists('peserta_ujians');
    }
}