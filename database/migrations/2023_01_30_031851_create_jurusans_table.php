<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Jurusan;

class CreateJurusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jurusan', 6);
            $table->string('identitas', 10);
            $table->timestamps();
        });

        Jurusan::create([
            'nama_jurusan' => 'MIPA',
            'identitas' => Str::random(10),
        ]);
        Jurusan::create([
            'nama_jurusan' => 'IPS',
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
        Schema::dropIfExists('data_jurusans');
    }
}
