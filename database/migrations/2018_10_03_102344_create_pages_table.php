<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->hashslug();
            $table->slug();
            $table->user();
            $table->name('title');
            $table->text('content')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('original_content')->nullable();
            $table->is('published', false);
            $table->at('published');
            $table->standardTime();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
