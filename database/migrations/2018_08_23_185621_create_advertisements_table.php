<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('description', 300);
            $table->unsignedInteger('price');
            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedBigInteger('visitors')->default(0);
            $table->json('images')->nullable();
            $table->boolean('published')->default(0);
            $table->boolean('archived')->default(0);
            $table->boolean('cancelled')->default(0);
            $table->dateTime('cancel_date')->nullable();
            $table->dateTime('archive_date')->nullable();
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
        Schema::dropIfExists('advertisements');
    }
}
