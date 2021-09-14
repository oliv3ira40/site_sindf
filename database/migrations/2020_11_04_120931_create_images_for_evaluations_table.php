<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesForEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_for_evaluations', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->integer('position')->nullable()->default(0);
            $table->string('name', 150)->nullable()->default('text');
            $table->string('name_slug', 150)->nullable()->default('text');
            $table->string('path', 300)->nullable()->default('text');
            // evaluation_id
            
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
        Schema::dropIfExists('images_for_evaluations');
    }
}
