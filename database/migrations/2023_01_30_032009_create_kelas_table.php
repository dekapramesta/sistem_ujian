<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Kelas;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jurusan');
            $table->string('nama_kelas', 10);
            $table->string('identitas', 10);
            $table->foreign('id_jurusan')
            ->references('id')->on('jurusans')->onDelete('cascade');
            $table->timestamps();
        });

        Kelas::create([
            'id_jurusan' => '1',
            'nama_kelas'=> '1',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '1',
            'nama_kelas'=> '2',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '1',
            'nama_kelas'=> '3',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '2',
            'nama_kelas'=> '1',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '3',
            'nama_kelas'=> '1',
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
        Schema::dropIfExists('data_kelas');
    }
}
