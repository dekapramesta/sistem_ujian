<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Mapel;

class CreateMapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jurusan');
            $table->string('nama_mapel', 20);
            $table->string('identitas', 10);
            $table->foreign('id_jurusan')
            ->references('id')->on('jurusans')->onDelete('cascade');
            $table->timestamps();
        });

        Mapel::create([
            'id_jurusan' => '1',
            'nama_mapel'=> 'Biologi',
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
        Schema::dropIfExists('data_mapels');
    }
}
