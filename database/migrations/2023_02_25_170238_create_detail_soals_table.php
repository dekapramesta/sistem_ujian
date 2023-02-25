<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_soals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_soal');
            $table->longText('soal');
            $table->string('soal_gambar');
            $table->longText('pilihan_a');
            $table->string('pilihan_gambar_a', 255);
            $table->longText('pilihan_b');
            $table->string('pilihan_gambar_b', 255);
            $table->longText('pilihan_c');
            $table->string('pilihan_gambar_c', 255);
            $table->longText('pilihan_d');
            $table->string('pilihan_gambar_d', 255);
            $table->longText('jawaban');
            $table->string('jawaban_gambar_e', 255);
            $table->foreign('id_soal')
            ->references('id')->on('soals');
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
        Schema::dropIfExists('detail_soals');
    }
}
