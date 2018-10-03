<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->hashslug();
            $table->slug();
            $table->name();
            $table->standardTime();
        });

        Schema::create('post_category', function (Blueprint $table) {
            $table->increments('id');
            $table->addForeign('posts');
            $table->addForeign('categories');
            $table->standardTime();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('post_category');
        Schema::dropIfExists('categories');
    }
}
