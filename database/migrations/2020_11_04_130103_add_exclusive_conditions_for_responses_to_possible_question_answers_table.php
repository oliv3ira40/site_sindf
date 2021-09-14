<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExclusiveConditionsForResponsesToPossibleQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('possible_question_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('exclusive_condit_resp_id')->nullable();
            $table->foreign('exclusive_condit_resp_id')
                ->references('id')->on('exclusive_conditions_for_responses')
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
        Schema::table('possible_question_answers', function (Blueprint $table) {
            //
        });
    }
}
