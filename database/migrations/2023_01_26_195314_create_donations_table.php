<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('yayasan_id');
            $table->unsignedBigInteger('user_id');
            $table->string('nama_pengirim');
            $table->string('alamat_pengirim');
            $table->string('no_tlp_pengirim');
            $table->string('tujuan_donasi');
            $table->string('kondisi_barang');
            $table->integer('jumlah_barang');
            $table->text('deskripsi_barang');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('nama_kurir')->nullable();
            $table->string('resi_kurir')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('yayasan_id')->references('id')->on('yayasan');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donasi');
    }
}
