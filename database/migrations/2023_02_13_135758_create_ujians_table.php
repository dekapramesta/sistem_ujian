<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Ujian;
use App\Models\Kelas;
use App\Models\Soal;
use App\Models\ThAkademik;
use App\Models\Ruang;


class CreateUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('id_soal');
            $table->unsignedBigInteger('id_th_akademik');
            $table->string('jum_soal', 50);
            $table->string('acak_soal', 20);
            $table->string('tgl_ujian', 30);
            $table->string('jam_ujian', 20);
            $table->string('status_ujian', 5);
            $table->string('identitas', 10);
            $table->foreign('id_kelas')
            ->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('id_soal')
            ->references('id')->on('soals')->onDelete('cascade');
            $table->foreign('id_th_akademik')
            ->references('id')->on('th_akademiks')->onDelete('cascade');
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
        Schema::dropIfExists('ujians');
    }
}
