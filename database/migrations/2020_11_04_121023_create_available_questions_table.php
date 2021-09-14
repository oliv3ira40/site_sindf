<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailableQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_questions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('position')->nullable()->default(0);
            $table->string('question_text', 500)->nullable();
            $table->string('description', 1000)->nullable();

            $table->string('title_confirmation_text', '200')->nullable();
            $table->longText('confirmation_text', '10000')->nullable();
            $table->tinyInteger('reading_the_mandatory_confirmation_text')->nullable();
            // evaluation_id
            // question_topic_id
            // question_type_id

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
        Schema::dropIfExists('available_questions');
    }
}
