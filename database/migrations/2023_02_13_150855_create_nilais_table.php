<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Nilai;
use App\Models\Ujian;
use App\Models\Siswa;


class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ujian');
            $table->unsignedBigInteger('id_siswa');
            $table->string('jumlah_benar', 50);
            $table->string('jumlah_salah', 50);
            $table->string('nilai', 20);
            $table->string('identitas', 10);
            $table->foreign('id_ujian')
            ->references('id')->on('ujians')->onDelete('cascade');
            $table->foreign('id_siswa')
            ->references('id')->on('siswas')->onDelete('cascade');
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
        Schema::dropIfExists('nilais');
    }
}
