<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_ujians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jadwalujian');
            $table->unsignedBigInteger('id_gurus');
            $table->unsignedBigInteger('id_jenjangs');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('id_jadwalujian')
                ->references('id')->on('jadwal_ujians');
            $table->foreign('id_gurus')
                ->references('id')->on('gurus');
            $table->foreign('id_jenjangs')
                ->references('id')->on('jenjangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('header_ujians');
    }
}
