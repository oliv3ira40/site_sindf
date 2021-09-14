<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuestionTopicsToAvailableQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('available_questions', function (Blueprint $table) {
            $table->unsignedBigInteger('question_topic_id')->nullable();
            $table->foreign('question_topic_id')
                ->references('id')->on('question_topics')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('available_questions', function (Blueprint $table) {
            //
        });
    }
}
