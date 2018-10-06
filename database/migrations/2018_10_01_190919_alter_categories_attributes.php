<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCategoriesAttributes extends Migration
{
    public function up()
    {
        Schema::table('categories_attributes', function (Blueprint $table) {
            $table->foreign('category_id', 'category_id_attributes_fk')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->foreign('attribute_id', 'attribute_id_attributes_fk')
                ->references('id')
                ->on('attributes')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('categories_attributes', function (Blueprint $table) {
            $table->dropForeign('category_id_attributes_fk');
            $table->dropForeign('attribute_id_attributes_fk');
        });
    }
}
