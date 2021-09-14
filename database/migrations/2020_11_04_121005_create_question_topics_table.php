<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_topics', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('position')->nullable()->default(0);
            $table->string('name', 200)->nullable();
            $table->string('description', 1000)->nullable();
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
        Schema::dropIfExists('question_topics');
    }
}
