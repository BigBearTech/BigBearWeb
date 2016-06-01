<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(0);
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->text('content')->nullable();
            $table->string('post_type', 50)->default('post');
            $table->datetime('drafted_at');
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id');
            $table->index('name');
            $table->index('slug');
            $table->index('post_type');
            $table->index('drafted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
