<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('nis')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['kepsek', 'TU', 'komite', 'siswa'])->default('siswa');
            $table->string('kode_akses')->nullable();
            $table->enum('status', ['Lengkap', 'Tidak lengkap'])->default('Tidak lengkap');
            $table->enum('aktivasi', ['Aktif', 'Tidak aktif'])->default('Tidak aktif');
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
        });
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
