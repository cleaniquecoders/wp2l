<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->hashslug();
            $table->addNullableForeign('comments', 'parent_id');
            $table->addForeign('users');
            $table->addForeign('posts');
            $table->name('author_name');
            $table->name('author_url');
            $table->json('author_avatar_urls');
            $table->text('content')->nullable();
            $table->is('approved');
            $table->at('approved');
            $table->standardTime();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
