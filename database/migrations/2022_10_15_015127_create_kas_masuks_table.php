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
        Schema::create('kas_masuk', function (Blueprint $table) {
            $table->id('id_kas_masuk');
            $table->string('jenis_pemasukan');
            $table->integer('jumlah');
            $table->date('tanggal');
            $table->string('nama_penyetor');
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
        Schema::dropIfExists('kas_masuk');
    }
};
