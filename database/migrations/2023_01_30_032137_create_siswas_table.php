<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Siswa;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_kelas');
            $table->text('nama', 50);
            $table->bigInteger('nis')->length(7);
            $table->date('tanggal_lahir');
            $table->bigInteger('no_telp')->length(14) -> nullable();
            $table->string('email', 25) -> nullable();
            $table->string('foto_profil', 25) -> nullable();
            $table->foreign('id_user')
                ->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kelas')
                ->references('id')->on('kelas')->onDelete('cascade');
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
        Schema::dropIfExists('siswas');
    }
}
