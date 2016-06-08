<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(0);
            $table->string('display_name')->nullable();
            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->string('location')->nullable();
            $table->string('url')->nullable();
            $table->text('content')->nullable();
            $table->boolean('display_url')->default(false);
            $table->boolean('featured')->default(false);
            $table->string('status', 30)->nullable()->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('testimonials');
    }
}
