<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriDonasiYayasanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_donasi_yayasan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('yayasan_id');
            $table->unsignedBigInteger('kategori_donasi_id');
            $table->timestamps();

            $table->foreign('yayasan_id')->references('id')->on('yayasan');
            $table->foreign('kategori_donasi_id')->references('id')->on('kategori_donasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_donasi_yayasan');
    }
}
