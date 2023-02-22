<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\ThAkademik;

class CreateThAkademiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('th_akademiks', function (Blueprint $table) {
            $table->id();
            $table->string('th_akademik', 12);
            $table->string('nama_semester', 8);
            $table->string('identitas', 10);
            $table->timestamps();
        });

        ThAkademik::create([
            'th_akademik' => '2022/2023',
            'nama_semester' => 'Genap',
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
        Schema::dropIfExists('th_akademiks');
    }
}
