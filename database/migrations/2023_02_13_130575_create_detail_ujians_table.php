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
            $table->unsignedBigInteger('id_jadwal_ujians');
            $table->unsignedBigInteger('id_mst_mapel_guru_kelas');
            $table->string('token', 10)->nullable();
            $table->boolean('status');
            $table->foreign('id_jadwal_ujians')
                ->references('id')->on('jadwal_ujians');
            $table->foreign('id_mst_mapel_guru_kelas')
                ->references('id')->on('mst_mapel_guru_kelas');
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
