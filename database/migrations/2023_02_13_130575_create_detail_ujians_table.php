<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_ujians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_headerujian');
            $table->unsignedBigInteger('id_kelas');
            $table->dateTime('tanggal_ujian', $precision = 0);
            $table->string('token', 10)->nullable();
            $table->boolean('status');
            $table->foreign('id_headerujian')
                ->references('id')->on('header_ujians');
            $table->foreign('id_kelas')
                ->references('id')->on('kelas');
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
        Schema::dropIfExists('detail_ujians');
    }
}
