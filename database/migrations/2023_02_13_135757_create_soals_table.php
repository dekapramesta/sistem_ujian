<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Soal;
use App\Models\Mapel;


class CreateSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mapel');
            $table->string('soal', 100);
            $table->string('soal_gambar', 100);
            $table->string('jawaban', 100);
            $table->string('pilihan_a', 100);
            $table->string('pilihan_gambar_a', 20);
            $table->string('pilihan_b', 100);
            $table->string('pilihan_gambar_b', 20);
            $table->string('pilihan_c', 100);
            $table->string('pilihan_gambar_c', 20);
            $table->string('pilihan_d', 100);
            $table->string('pilihan_gambar_d', 20);
            $table->string('pilihan_e', 100);
            $table->string('pilihan_gambar_e', 20);
            $table->string('identitas', 10);
            $table->foreign('id_mapel')
            ->references('id')->on('mapels')->onDelete('cascade');
            $table->timestamps();
        });

        Soal::create([
            'id_mapel'=> '1',
            'soal'=> 'Siapa??',
            'soal_gambar'=> '',
            'jawaban'=> 'a',
            'pilihan_a' => 'ya',
            'pilihan_gambar_a' => '',
            'pilihan_b' => 'tidak',
            'pilihan_gambar_b' => '',
            'pilihan_c' => 'tak',
            'pilihan_gambar_c' => '',
            'pilihan_d' => 'yups',
            'pilihan_gambar_d' => '',
            'pilihan_e' => 'ntahlah',
            'pilihan_gambar_e' => '',
            'identitas' => Str::random(10),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soals');
    }
}
