<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesAttributesTable extends Migration
{
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['text', 'list', 'images']);
            $table->string('title', 30);
            $table->json('options');
        });
    }

    public function down()
    {
        Schema::dropIfExists('attributes');
    }
}
