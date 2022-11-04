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
        Schema::create('kas_keluar', function (Blueprint $table) {
            $table->id('id_kas_keluar');
            $table->string('jenis');
            $table->integer('jumlah');
            $table->date('tanggal');
            $table->string('nama_penarik');
            $table->longText('keterangan')->nullable()->default('Tidak ada keterangan');
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
        Schema::dropIfExists('kas_keluar');
    }
};
