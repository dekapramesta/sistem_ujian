<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_soals');
            $table->unsignedBigInteger('id_headerujian');
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_jawaban')->nullable();
            $table->foreign('id_soals')
                ->references('id')->on('soals');
            $table->foreign('id_jawaban')
                ->references('id')->on('jawabans');
            $table->foreign('id_headerujian')
                ->references('id')->on('header_ujians');
            $table->foreign('id_siswa')
                ->references('id')->on('siswas');
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
        Schema::dropIfExists('temps');
    }
}
