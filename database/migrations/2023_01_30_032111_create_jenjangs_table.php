<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Jenjang;

class CreateJenjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenjangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenjang', 4);
            $table->string('identitas', 10);
            $table->timestamps();
        });

        Jenjang::create([
            'nama_jenjang'=> '10',
            'identitas' => Str::random(10),
        ]);

        Jenjang::create([
            'nama_jenjang'=> '11',
            'identitas' => Str::random(10),
        ]);

        Jenjang::create([
            'nama_jenjang'=> '12',
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
        Schema::dropIfExists('jenjangs');
    }
}
