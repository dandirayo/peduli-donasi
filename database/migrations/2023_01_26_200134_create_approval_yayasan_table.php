<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalYayasanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approval_yayasan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('city');
            $table->string('address');
            $table->string('contact');
            $table->string('bank_name');
            $table->string('bank_number');
            $table->string('bank_owner');
            $table->text('description');
            $table->text('donation_purposes');
            $table->string('logo')->nullable();
            $table->boolean('category_food')->default(false);
            $table->boolean('category_stationary')->default(false);
            $table->boolean('category_clothes')->default(false);
            $table->string('yayasan_documents')->nullable();
            $table->string('status');
            $table->string('comment')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('approval_yayasan');
    }
}
