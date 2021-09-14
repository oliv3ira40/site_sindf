<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('title', 500)->nullable();
            $table->string('slug_title', 500)->nullable();
            $table->longText('thin_line', 5000)->nullable();
            $table->longText('content', 15000)->nullable();
            $table->string('metakey', 400)->nullable();
            $table->string('image_banner', 300)->nullable();
            $table->string('image_spotlight', 300)->nullable();
            $table->tinyInteger('health_calendar')->nullable();
            
            // status_post_id

            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
