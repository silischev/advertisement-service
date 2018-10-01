<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesAttributesTable extends Migration
{
    public function up()
    {
        Schema::create('categories_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->enum('type', ['text', 'list', 'images']);
            $table->json('data');
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories_attributes');
    }
}
