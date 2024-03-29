<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstMapelGuruKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_mapel_guru_kelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mapels');
            $table->unsignedBigInteger('id_gurus')->nullable();
            $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('id_jenjang')->nullable();
            $table->foreign('id_mapels')
                ->references('id')->on('mapels')->onDelete('cascade');
            $table->foreign('id_gurus')
                ->references('id')->on('gurus')->onDelete('cascade');
            $table->foreign('id_kelas')
                ->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('id_jenjang')
                ->references('id')->on('jenjangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_mapel_guru_kelas');
    }
}
