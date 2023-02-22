<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Guru;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('nama', 50);
            $table->string('nip', 20);
            $table->string('tanggal_lahir');
            $table->foreign('id_user')
            ->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Guru::create([
            'id_user' => '1',
            'nama'=> 'Drs Sutono',
            'nip'=> '196508102008011007',
            'tanggal_lahir'=>'08/10/1965'

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gurus');
    }
}
