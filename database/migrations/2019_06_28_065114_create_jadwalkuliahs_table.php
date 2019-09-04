<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalkuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalkuliah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hari');
            $table->string('kode_mk');
            $table->string('kode_dosen');
            $table->string('jam');
            $table->string('kode_jurusan');
            $table->string('kode_ruangan');
            $table->string('kode_tahun_akademik');
            $table->integer('semester');
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
        Schema::dropIfExists('jadwalkuliahs');
    }
}
