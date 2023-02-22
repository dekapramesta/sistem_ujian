<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 20)->unique();
            $table->string('password');
            $table->string('jabatan', 7);
            $table->string('verified', 2)->default('0');
            $table->timestamps();
        });

        User::create([
            'username' => '23456',
            'password' => '12345',
            'jabatan' => 'guru',

        ]);

        User::create([
            'username' => '12345',
            'password' => '23456',
            'jabatan' => 'siswa',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
