<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulirs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('id_motor');
            $table->string('nama_motor');
            $table->string('email');
            $table->string('no_hp');
            $table->integer('no_ktp');
            $table->date('tanggal_sewa');
            $table->string('lokasi_pengantaran');
            $table->string('lokasi_pengembalian');
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
        Schema::dropIfExists('formulirs');
    }
};
