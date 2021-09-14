<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPossibleQuestionAnswersToResponsesReceivedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('responses_received', function (Blueprint $table) {
            $table->unsignedBigInteger('possible_question_answer_id')->nullable();
            $table->foreign('possible_question_answer_id')
                ->references('id')->on('possible_question_answers')
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
        Schema::table('responses_received', function (Blueprint $table) {
            //
        });
    }
}
