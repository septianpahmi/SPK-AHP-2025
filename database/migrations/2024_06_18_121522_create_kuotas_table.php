<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_beasiswa');
            $table->unsignedBigInteger('id_kelas');
            $table->integer('kuota');
            $table->timestamps();

            $table->foreign('id_beasiswa')->references('id')->on('beasiswas')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kuotas');
    }
}
