<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityYayasanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_yayasan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('yayasan_id');
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('yayasan_id')->references('id')->on('yayasan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_yayasan');
    }
}
